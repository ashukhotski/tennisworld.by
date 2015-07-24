<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class PageDao {
	public function findAll() {
        $query = DbHelper::getConnection()->prepare("select p.* from pages p order by p.creation_time desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function distinct() {
		$query = DbHelper::getConnection()->prepare("select distinct url, parent_id from pages");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function findByUrl($url) {
        $query = DbHelper::getConnection()->prepare("select * from pages p where p.url = ?");
        $query->bindParam(1, $url, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findByUrlAndLanguage($url, $lang) {
        $query = DbHelper::getConnection()->prepare("select * from pages p where p.url = ? and p.lang = ? limit 1");
        $query->bindParam(1, $url, PDO::PARAM_INT);
		$query->bindParam(2, $lang, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByParentId($id) {
        $query = DbHelper::getConnection()->prepare("select * from pages p where p.parent_id = ?");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findByParentIdAndLanguage($id, $lang) {
		if ($id != null) {
			$query = DbHelper::getConnection()->prepare("select * from pages p where p.parent_id = ? and p.lang = ?");
			$query->bindParam(1, $id, PDO::PARAM_STR);
			$query->bindParam(2, $lang, PDO::PARAM_STR);
		} else {
			$query = DbHelper::getConnection()->prepare("select * from pages p where p.parent_id is null and p.lang = ?");
			$query->bindParam(1, $lang, PDO::PARAM_STR);
		}   
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($url, $lang, $title, $body, $keywords, $parent_id) {
        $id = 0;
		$query = DbHelper::getConnection()->prepare("insert ignore into pages(url, lang, title, body, keywords, parent_id) values(?, ?, ?, ?, ?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $url, PDO::PARAM_STR);
			$query->bindParam(2, $lang, PDO::PARAM_STR);
			$query->bindParam(3, $title, PDO::PARAM_STR);
			$query->bindParam(4, $body, PDO::PARAM_STR);
			$query->bindParam(5, $keywords, PDO::PARAM_STR);
			$query->bindParam(6, $parent_id, PDO::PARAM_STR);
			$query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($new_url, $new_lang, $title, $body, $keywords, $parent_id, $url, $lang) {
        $query = DbHelper::getConnection()->prepare("update pages set url = ?, lang = ?, title=?, body = ?, keywords = ?, parent_id = ? where url = ? and lang = ?");
        $query->bindParam(1, $new_url, PDO::PARAM_STR);
		$query->bindParam(2, $new_lang, PDO::PARAM_STR);
		$query->bindParam(3, $title, PDO::PARAM_STR);
		$query->bindParam(4, $body, PDO::PARAM_STR);
		$query->bindParam(5, $keywords, PDO::PARAM_STR);
		$query->bindParam(6, $parent_id, PDO::PARAM_STR);
        $query->bindParam(7, $url, PDO::PARAM_STR);
		$query->bindParam(8, $lang, PDO::PARAM_STR);
        $query->execute();
    }
	
	public function delete($url, $lang) {
		$query = DbHelper::getConnection()->prepare("delete pages.* from pages where pages.parent_id = ? and pages.lang = ?");
		$query->bindParam(1, $url, PDO::PARAM_STR);
		$query->bindParam(2, $lang, PDO::PARAM_STR);
        $query->execute();
        $query = DbHelper::getConnection()->prepare("delete pages.* from pages where pages.url = ? and pages.lang = ?");
        $query->bindParam(1, $url, PDO::PARAM_STR);
		$query->bindParam(2, $lang, PDO::PARAM_STR);
        $query->execute();
    }
	
	public function fetchComments($id) {
		$query = DbHelper::getConnection()->prepare("select c.*, pr.name from comments c inner join pages p on c.page_id = p.url inner join profiles pr on c.profile_id = pr.id where c.page_id = ? order by c.id desc");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function postComment($body, $page_id, $profile_id) {
		$query = DbHelper::getConnection()->prepare("insert ignore into comments(body, page_id, profile_id) values(?, ?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $body, PDO::PARAM_STR);
			$query->bindParam(2, $page_id, PDO::PARAM_STR);
			$query->bindParam(3, $profile_id, PDO::PARAM_INT);
			$query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
	}
	
	public function deleteComment($id) {
		$query = DbHelper::getConnection()->prepare("delete comments.* from comments where comments.id = ?");
		$query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
    }

}
