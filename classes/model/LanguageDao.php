<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class LanguageDao {
	public function findAll() {
        $query = DbHelper::getConnection()->prepare("select l.* from languages l order by l.id asc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
    public function findById($id) {
        $query = DbHelper::getConnection()->prepare("select * from languages l where l.id = ? limit 1");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create($id, $icon) {
		$query = DbHelper::getConnection()->prepare("insert into languages(id, icon) values(?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $id, PDO::PARAM_STR);
			$query->bindParam(2, $icon, PDO::PARAM_STR);
			$query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($new_id, $icon, $id) {
        $query = DbHelper::getConnection()->prepare("update languages set id = ?, icon = ? where id = ?");
        $query->bindParam(1, $new_id, PDO::PARAM_STR);
		$query->bindParam(2, $icon, PDO::PARAM_STR);
        $query->bindParam(3, $id, PDO::PARAM_STR);
        $query->execute();
    }
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete languages.* from languages where languages.id = ?");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
    }

}
