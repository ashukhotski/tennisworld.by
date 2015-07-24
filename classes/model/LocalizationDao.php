<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class LocalizationDao {
	public function findAll() {
        $query = DbHelper::getConnection()->prepare("select l.* from localization l order by l.id asc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
    public function findByIdAndLanguage($id, $lang) {
        $query = DbHelper::getConnection()->prepare("select * from localization l where l.id = ? and l.lang = ? limit 1");
        $query->bindParam(1, $id, PDO::PARAM_STR);
		$query->bindParam(2, $lang, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create($id, $lang, $value) {
		$query = DbHelper::getConnection()->prepare("insert into localization(id, lang, value) values(?, ?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $id, PDO::PARAM_STR);
			$query->bindParam(2, $lang, PDO::PARAM_STR);
			$query->bindParam(3, $value, PDO::PARAM_STR);
			$query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($id, $lang, $value) {
        $query = DbHelper::getConnection()->prepare("update localization set value = ? where id = ? and lang = ?");
        $query->bindParam(1, $value, PDO::PARAM_STR);
		$query->bindParam(2, $id, PDO::PARAM_STR);
        $query->bindParam(3, $lang, PDO::PARAM_STR);
        $query->execute();
    }
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete localization.* from localization where localization.id = ?");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
    }

}
