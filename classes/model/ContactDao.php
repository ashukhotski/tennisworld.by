<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */
 
class ContactDao {
    public function findFollowers($id) {
        $query = DbHelper::getConnection()->prepare("select c.follower as id, p1.name, p1.photo_url, p1.online from contacts c inner join profiles p1 on c.follower = p1.id inner join profiles p2 on c.following = p2.id where c.following = ? order by c.follower asc");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function countFollowers($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as contacts_count from contacts where following = ? limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function findFollowings($id) {
        $query = DbHelper::getConnection()->prepare("select c.following as id, p2.name, p2.photo_url, p2.online from contacts c inner join profiles p1 on c.follower = p1.id inner join profiles p2 on c.following = p2.id where c.follower = ? order by c.following asc");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function countFollowings($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as contacts_count from contacts where follower = ? limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function exist($follower, $following) {
		$query = DbHelper::getConnection()->prepare("select count(*) as contacts_count from contacts where follower = ? and following = ? limit 1");
		$query->bindParam(1, $follower, PDO::PARAM_INT);
		$query->bindParam(2, $following, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}

    public function create($follower, $following) {
        $query = DbHelper::getConnection()->prepare("insert ignore into contacts(follower, following) values(?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
            $query->bindParam(1, $follower, PDO::PARAM_INT);
            $query->bindParam(2, $following, PDO::PARAM_INT);
            $query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function delete($follower, $following) {
        $query = DbHelper::getConnection()->prepare("delete from contacts where follower = ? and following = ?");
        $query->bindParam(1, $follower, PDO::PARAM_INT);
        $query->bindParam(2, $following, PDO::PARAM_INT);
        $query->execute();
    }

}
