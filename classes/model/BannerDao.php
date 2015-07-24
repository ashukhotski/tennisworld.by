<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */
 
class BannerDao {
    public function findAll() {
        $query = DbHelper::getConnection()->prepare("select b.* from banners b");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function create($image_url, $site_url) {
        $query = DbHelper::getConnection()->prepare("insert ignore into banners(image_url, site_url) values(?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
            $query->bindParam(1, $image_url, PDO::PARAM_STR);
            $query->bindParam(2, $site_url, PDO::PARAM_STR);
            $query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($id, $image_url, $site_url) {
        $query = DbHelper::getConnection()->prepare("update banners set image_url = ?, site_url = ? where id = ?");
		try {
			DbHelper::getConnection()->beginTransaction();
            $query->bindParam(1, $image_url, PDO::PARAM_STR);
            $query->bindParam(2, $site_url, PDO::PARAM_STR);
			$query->bindParam(3, $id, PDO::PARAM_INT);
            $query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete from banners where id = ?");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
    }

}
