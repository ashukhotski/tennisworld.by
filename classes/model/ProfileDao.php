<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class ProfileDao {
	private $id = 0;
	
	public function getId() { return $this->id; }
	
	public function setId($id) { $this->id = $id; }
	
	public function findAll() {
        $query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id order by p.online desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findByType($profile_type) {
        $query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.profile_type = ? order by p.id asc");
		$query->bindParam(1, $profile_type, PDO::PARAM_STR);
	   $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function random() {
		$query = DbHelper::getConnection()->prepare("select p.*, r.points, r.progress from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id order by rand() limit 1");
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
	}
	
    public function findById($id) {
        $query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress, (select count(*) from rating where points >= r.points and progress != 0) as position from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.id = ? limit 1");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByVkId($id) {
        $query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress, (select count(*) from rating where points >= r.points and progress != 0) as position from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.vk_id = ? limit 1");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByFbId($id) {
        $query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress, (select count(*) from rating where points >= r.points and progress != 0) as position from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.fb_id = ? limit 1");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByEmail($email) {
		if ($email == null) {
			return null;
		} else {
			$query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress, (select count(*) from rating where points >= r.points and progress != 0) as position from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.email = ? limit 1");
			$query->bindParam(1, $email, PDO::PARAM_STR);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}
    }

    public function findByEmailAndPassword($email, $password) {
		if ($email == null or $password == null) {
			return null;
		} else {
			$query = DbHelper::getConnection()->prepare("select p.*, a.permissions, r.points, r.progress, (select count(*) from rating where points >= r.points and progress != 0) as position from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.email = ? and p.password = ? limit 1");
			$query->bindParam(1, $email, PDO::PARAM_STR);
			$query->bindParam(2, $password, PDO::PARAM_STR);
			$query->execute();
			return $query->fetch(PDO::FETCH_OBJ);
		}
    }
	
	public function setPermissions($id, $permissions) {
		$query = DbHelper::getConnection()->prepare("update access set permissions = ? where user_id = ?");
		$query->bindParam(1, $permissions, PDO::PARAM_INT);
		$query->bindParam(2, $id, PDO::PARAM_INT);
		$query->execute();
	}
	
	public function getRating() {
		$query = DbHelper::getConnection()->prepare("select distinct p.*, r.points, r.progress, (select count(*) from rating where points >= r.points and progress != 0) as position from profiles p inner join rating r on p.id = r.player_id inner join matches m on p.id = m.player_a or p.id = m.player_b where m.status = 'finished' or m.status = 'cup' order by r.points desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function updateRating($id, $points, $progress = 0) {
		$query = DbHelper::getConnection()->prepare("update rating set points = ?, progress = ? where player_id = ?");
		$query->bindParam(1, $points, PDO::PARAM_INT);
		$query->bindParam(2, $progress, PDO::PARAM_INT);
		$query->bindParam(3, $id, PDO::PARAM_INT);
		$query->execute();
	}

    public function create($email, $password, $profile_type, $name, $birthday, $phone, $city, $level, $plays, $backhand, $height, $weight, $racket, $bio, $vk_id, $fb_id, $photo_url) {
        $this->id = 0;
		if ($vk_id != null) {
			$query = DbHelper::getConnection()->prepare("insert into profiles(email, password, profile_type, name, birthday, phone, city, level, plays, backhand, height, weight, racket, bio, vk_id, photo_url) values(?, ?, ?, ?, str_to_date(?, '%Y-%m-%d'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) on duplicate key update vk_id = values(vk_id)");
		} else if ($fb_id != null) {
			$query = DbHelper::getConnection()->prepare("insert into profiles(email, password, profile_type, name, birthday, phone, city, level, plays, backhand, height, weight, racket, bio, fb_id, photo_url) values(?, ?, ?, ?, str_to_date(?, '%Y-%m-%d'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?) on duplicate key update fb_id = values(fb_id)");
		} else {
			$query = DbHelper::getConnection()->prepare("insert ignore into profiles(email, password, profile_type, name, birthday, phone, city, level, plays, backhand, height, weight, racket, bio, photo_url) values(?, ?, ?, ?, str_to_date(?, '%Y-%m-%d'), ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
		}
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $email, PDO::PARAM_STR);
			$query->bindParam(2, $password, PDO::PARAM_STR);
			$query->bindParam(3, $profile_type, PDO::PARAM_STR);
			$query->bindParam(4, $name, PDO::PARAM_STR);
			$query->bindParam(5, $birthday, PDO::PARAM_STR);
			$query->bindParam(6, $phone, PDO::PARAM_STR);
			$query->bindParam(7, $city, PDO::PARAM_STR);
			$query->bindParam(8, $level, PDO::PARAM_STR);
			$query->bindParam(9, $plays, PDO::PARAM_STR);
			$query->bindParam(10, $backhand, PDO::PARAM_STR);
			$query->bindParam(11, $height, PDO::PARAM_INT);
			$query->bindParam(12, $weight, PDO::PARAM_INT);
			$query->bindParam(13, $racket, PDO::PARAM_STR);
			$query->bindParam(14, $bio, PDO::PARAM_STR);
			if ($vk_id != null) {
				$query->bindParam(15, $vk_id, PDO::PARAM_STR);
				$query->bindParam(16, $photo_url, PDO::PARAM_STR);
			} else if ($fb_id != null) {
				$query->bindParam(15, $fb_id, PDO::PARAM_STR);
				$query->bindParam(16, $photo_url, PDO::PARAM_STR);
			} else {
				$query->bindParam(15, $photo_url, PDO::PARAM_STR);
			}
			$query->execute();
			DbHelper::getConnection()->commit();
			
			$query = DbHelper::getConnection()->prepare("select id from profiles where email ".(($email != null) ? "=" : "is")." ? and password ".(($password != null) ? "=" : "is")." ? and fb_id ".(($fb_id != null) ? "=" : "is")." ? and vk_id ".(($vk_id != null) ? "=" : "is")." ? limit 1");
			$query->bindParam(1, $email, PDO::PARAM_STR);
			$query->bindParam(2, $password, PDO::PARAM_STR);
			$query->bindParam(3, $fb_id, PDO::PARAM_STR);
			$query->bindParam(4, $vk_id, PDO::PARAM_STR);
			$query->execute();
			$profile = $query->fetch(PDO::FETCH_OBJ);
			if ($profile != null) {
				$this->setId($profile->id);
			} else {
				$this->setId(0);
			}
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
		if ($this->id != 0) {
			$query = DbHelper::getConnection()->prepare("insert ignore into access(user_id, permissions) values(?, 0)");
			$query->bindParam(1, $this->id, PDO::PARAM_INT);
			$query->execute();
			$query = DbHelper::getConnection()->prepare("insert ignore into rating(player_id, points, progress) values(?, 1000, 0)");
			$query->bindParam(1, $this->id, PDO::PARAM_INT);
			$query->execute();
		}
    }
	
	public function update($id, $email, $password, $profile_type, $name, $birthday, $phone, $city, $level, $plays, $backhand, $height, $weight, $racket, $bio, $photo_url) {
        $query = DbHelper::getConnection()->prepare("update profiles set email = ?, password = ?, profile_type = ?, name = ?, birthday = str_to_date(?, '%Y-%m-%d'), phone = ?, city = ?, level = ?, plays = ?, backhand = ?, height = ?, weight = ?, racket = ?, bio = ?, photo_url = ? where id = ?");
        $query->bindParam(1, $email, PDO::PARAM_STR);
		$query->bindParam(2, $password, PDO::PARAM_STR);
        $query->bindParam(3, $profile_type, PDO::PARAM_STR);
		$query->bindParam(4, $name, PDO::PARAM_STR);
		$query->bindParam(5, $birthday, PDO::PARAM_STR);
		$query->bindParam(6, $phone, PDO::PARAM_STR);
		$query->bindParam(7, $city, PDO::PARAM_STR);
		$query->bindParam(8, $level, PDO::PARAM_STR);
		$query->bindParam(9, $plays, PDO::PARAM_STR);
		$query->bindParam(10, $backhand, PDO::PARAM_STR);
		$query->bindParam(11, $height, PDO::PARAM_INT);
		$query->bindParam(12, $weight, PDO::PARAM_INT);
		$query->bindParam(13, $racket, PDO::PARAM_STR);
		$query->bindParam(14, $bio, PDO::PARAM_STR);
		$query->bindParam(15, $photo_url, PDO::PARAM_STR);
		$query->bindParam(16, $id, PDO::PARAM_INT);
        $query->execute();
    }
	
	public function updateFb($id, $fb_id) {
		$query = DbHelper::getConnection()->prepare("update profiles set fb_id = ? where id = ?");
        $query->bindParam(1, $fb_id, PDO::PARAM_STR);
		$query->bindParam(2, $id, PDO::PARAM_INT);
        $query->execute();
	}
	
	public function updateVk($id, $vk_id) {
		$query = DbHelper::getConnection()->prepare("update profiles set vk_id = ? where id = ?");
        $query->bindParam(1, $vk_id, PDO::PARAM_STR);
		$query->bindParam(2, $id, PDO::PARAM_INT);
        $query->execute();
	}
	
	public function updateOnline($id) {
		$query = DbHelper::getConnection()->prepare("update profiles set online = now() where id = ?");
		$query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
	}
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete profiles.* from profiles where profiles.id = ?");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
    }
	
	public function search($name, $city, $level, $online = null) {
		if (!empty($online)) {
			$query = DbHelper::getConnection()->prepare("select p.*, r.points, r.progress from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.name like CONCAT('%', ?, '%') and p.city like CONCAT('%', ?, '%') and p.level like CONCAT('%', ?, '%') and TIMESTAMPDIFF(MINUTE,.runTime,NOW()) < 5 order by p.online desc");
        } else {
			$query = DbHelper::getConnection()->prepare("select p.*, r.points, r.progress from profiles p left join access a on p.id = a.user_id left join rating r on p.id = r.player_id where p.name like CONCAT('%', ?, '%') and p.city like CONCAT('%', ?, '%') and p.level like CONCAT('%', ?, '%') order by p.online desc");
		}
		$query->bindParam(1, $name, PDO::PARAM_STR);
		$query->bindParam(2, $city, PDO::PARAM_STR);
		$query->bindParam(3, $level, PDO::PARAM_STR);
		$query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}

}
