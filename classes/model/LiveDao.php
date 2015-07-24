<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class LiveDao {
	public function findAll() {
        $query = DbHelper::getConnection()->prepare("select l.* from live l inner join matches m on l.match_id = m.id order by l.id desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
    public function findByMatchId($id) {
        $query = DbHelper::getConnection()->prepare("select * from live l where l.match_id = ? order by l.id desc");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($comment, $match_id) {
        $id = 0;
		$query = DbHelper::getConnection()->prepare("insert into live(comment, match_id) values(?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $comment, PDO::PARAM_STR);
			$query->bindParam(2, $match_id, PDO::PARAM_INT);
			$query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($id, $comment, $match_id) {
        $query = DbHelper::getConnection()->prepare("update live set comment = ?, match_id = ? where id = ?");
        $query->bindParam(1, $comment, PDO::PARAM_STR);
		$query->bindParam(2, $match_id, PDO::PARAM_INT);
        $query->bindParam(3, $id, PDO::PARAM_INT);
        $query->execute();
    }
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete live.* from live where live.id = ?");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
    }

}
