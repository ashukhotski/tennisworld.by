<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class MatchDao {
	public function findAll() {
        $query = DbHelper::getConnection()->prepare("select m.*, pa.name palyer_a_name, pb.name player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id order by m.match_date desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findAuctionsOnly() {
		$query = DbHelper::getConnection()->prepare("select m.*, pa.name, pa.birthday, pa.weight, pa.height, pa.level, pa.photo_url, pa.online from matches m inner join profiles pa on m.player_a = pa.id where m.status = 'auction' order by m.match_date desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
    public function findById($id) {
        $query = DbHelper::getConnection()->prepare("select m.*, pa.name player_a_name, pb.name player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.id = ? limit 1");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByStatus($status) {
        $query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.status = ? order by m.match_date desc");
        $query->bindParam(1, $status, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function countByStatus($status) {
        $query = DbHelper::getConnection()->prepare("select count(*) as matches_count from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.status = ? limit 1");
        $query->bindParam(1, $status, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByPlayerA($id) {
        $query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.player_a = ? order by m.match_date desc");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findByPlayerB($id) {
        $query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.player_b = ? order by m.match_date desc");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByPlayerAB($id_a, $id_b) {
		$query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.player_a = ? and m.player_b = ? order by m.match_date desc");
		$query->bindParam(1, $id_a, PDO::PARAM_INT);
		$query->bindParam(2, $id_b, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findByPlayerAandBandStatus($id_a, $id_b, $status = 'finished') {
		$query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where ((m.player_a = :a and m.player_b = :b) or (m.player_a = :b and m.player_b = :a)) and m.status = :s order by m.match_date desc");
		$query->bindParam(':a', $id_a, PDO::PARAM_INT);
		$query->bindParam(':b', $id_b, PDO::PARAM_INT);
		$query->bindParam(':s', $status, PDO::PARAM_STR);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function countByPlayerAB($id_a, $id_b) {
		$query = DbHelper::getConnection()->prepare("select count(*) as matches_count from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.player_a = ? and m.player_b = ? limit 1");
		$query->bindParam(1, $id_a, PDO::PARAM_INT);
		$query->bindParam(2, $id_b, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function findByPlayerAorB($id) {
		$query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.player_a = ? or m.player_b = ? order by m.match_date desc");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->bindParam(2, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function findByPlayerAorBandStatus($id, $status) {
		$query = DbHelper::getConnection()->prepare("select m.*, pa.name as player_a_name, pb.name as player_b_name from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where (m.player_a = :id or m.player_b = :id) and m.status = :status order by m.match_date desc");
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->execute();
		return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function randomMatchId($match_date, $a, $b) {
		$query = DbHelper::getConnection()->prepare("select m.id from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where m.match_date = ? and m.player_a = ? and m.player_b = ? limit 1");
        $query->bindParam(1, $match_date, PDO::PARAM_STR);
		$query->bindParam(2, $a, PDO::PARAM_INT);
		$query->bindParam(3, $b, PDO::PARAM_INT);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function countByPlayerAorBandStatus($id, $status) {
		$query = DbHelper::getConnection()->prepare("select count(*) as matches_count from matches m inner join profiles pa on m.player_a = pa.id inner join profiles pb on m.player_b = pb.id where (m.player_a = :id or m.player_b = :id) and m.status = :status limit 1");
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->bindParam(':status', $status, PDO::PARAM_STR);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
    }
	
	public function countWinA($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as matches_count from (select m.* from matches m inner join profiles p on m.player_a = p.id where m.player_a = ? and m.status = 'finished' having ((m.set_1_a > m.set_1_b) and (m.set_2_a  > m.set_2_b or m.set_3_a > m.set_3_b)) or ((m.set_2_a > m.set_2_b) and (m.set_1_a  > m.set_1_b or m.set_3_a > m.set_3_b))) as mc limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function countLooseA($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as matches_count from (select m.* from matches m inner join profiles p on m.player_a = p.id where m.player_a = ? and m.status = 'finished' having ((m.set_1_a < m.set_1_b) and (m.set_2_a  < m.set_2_b or m.set_3_a < m.set_3_b)) or ((m.set_2_a < m.set_2_b) and (m.set_1_a  < m.set_1_b or m.set_3_a < m.set_3_b))) as mc limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function countWinB($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as matches_count from (select m.* from matches m inner join profiles p on m.player_b = p.id where m.player_b = ? and m.status = 'finished' having ((m.set_1_a < m.set_1_b) and (m.set_2_a  < m.set_2_b or m.set_3_a < m.set_3_b)) or ((m.set_2_a < m.set_2_b) and (m.set_1_a  < m.set_1_b or m.set_3_a < m.set_3_b))) as mc limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}
	
	public function countLooseB($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as matches_count from (select m.* from matches m inner join profiles p on m.player_b = p.id where m.player_b = ? and m.status = 'finished' having ((m.set_1_a > m.set_1_b) and (m.set_2_a  > m.set_2_b or m.set_3_a > m.set_3_b)) or ((m.set_2_a > m.set_2_b) and (m.set_1_a  > m.set_1_b or m.set_3_a > m.set_3_b))) as mc limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}

    public function create($match_date, $max_sets, $player_a, $player_b, $summary, $status) {
        $id = 0;
		$query = DbHelper::getConnection()->prepare("insert into matches(match_date, max_sets, player_a, player_b, summary, status) values(str_to_date(?, '%Y-%m-%d %H:%i'), ?, ?, ?, ?, ?)");
		try {
			DbHelper::getConnection()->beginTransaction();
			$query->bindParam(1, $match_date, PDO::PARAM_STR);
			$query->bindParam(2, $max_sets, PDO::PARAM_INT);
			$query->bindParam(3, $player_a, PDO::PARAM_INT);
			$query->bindParam(4, $player_b, PDO::PARAM_INT);
			$query->bindParam(5, $summary, PDO::PARAM_STR);
			$query->bindParam(6, $status, PDO::PARAM_STR);
			$query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($id, $match_date, $max_sets, $player_a, $player_b, $set_1_a, $set_1_b, $set_2_a, $set_2_b, $set_3_a, $set_3_b, $summary, $status, $player_a_points, $player_b_points, $player_a_diff, $player_b_diff) {
        $query = DbHelper::getConnection()->prepare("update matches set match_date = str_to_date(?, '%Y-%m-%d %H:%i'), max_sets = ?, player_a = ?, player_b = ?, set_1_a = ?, set_1_b = ?, set_2_a = ?, set_2_b = ?, set_3_a = ?, set_3_b = ?, summary = ?, status = ?, player_a_points = ?, player_b_points = ?, player_a_diff = ?, player_b_diff = ? where id = ?");
        $query->bindParam(1, $match_date, PDO::PARAM_STR);
		$query->bindParam(2, $max_sets, PDO::PARAM_INT);
        $query->bindParam(3, $player_a, PDO::PARAM_INT);
		$query->bindParam(4, $player_b, PDO::PARAM_INT);
		$query->bindParam(5, $set_1_a, PDO::PARAM_INT);
		$query->bindParam(6, $set_1_b, PDO::PARAM_INT);
		$query->bindParam(7, $set_2_a, PDO::PARAM_INT);
		$query->bindParam(8, $set_2_b, PDO::PARAM_INT);
		$query->bindParam(9, $set_3_a, PDO::PARAM_INT);
		$query->bindParam(10, $set_3_b, PDO::PARAM_INT);
		$query->bindParam(11, $summary, PDO::PARAM_STR);
		$query->bindParam(12, $status, PDO::PARAM_STR);
		$query->bindParam(13, $player_a_points, PDO::PARAM_INT);
		$query->bindParam(14, $player_b_points, PDO::PARAM_INT);
		$query->bindParam(15, $player_a_diff, PDO::PARAM_INT);
		$query->bindParam(16, $player_b_diff, PDO::PARAM_INT);
		$query->bindParam(17, $id, PDO::PARAM_INT);
        $query->execute();
    }
	
	/*public function update($id, $match_date, $max_sets, $player_a, $player_b, $set_1_a, $set_1_b, $set_1_a_aces, $set_1_b_aces, $set_1_a_faults, $set_1_b_faults, $set_1_a_first_serve, $set_1_b_first_serve, $set_1_a_second_serve, $set_1_b_second_serve, $set_2_a, $set_2_b, $set_2_a_aces, $set_2_b_aces, $set_2_a_faults, $set_2_b_faults, $set_2_a_first_serve, $set_2_b_first_serve, $set_2_a_second_serve, $set_2_b_second_serve, $set_3_a, $set_3_b, $set_3_a_aces, $set_3_b_aces, $set_3_a_faults, $set_3_b_faults, $set_3_a_first_serve, $set_3_b_first_serve, $set_3_a_second_serve, $set_3_b_second_serve, $set_4_a, $set_4_b, $set_5_a, $set_5_b, $summary, $status) {
        $query = DbHelper::getConnection()->prepare("update matches set match_date = str_to_date(?, '%Y-%m-%d %H:%i'), max_sets = ?, player_a = ?, player_b = ?, set_1_a = ?, set_1_b = ?, set_1_a_aces = ?, set_1_b_aces = ?, set_1_a_faults = ?, set_1_b_faults = ?, set_1_a_first_serve = ?, set_1_b_first_serve = ?, set_1_a_second_serve = ?, set_1_b_second_serve = ?, set_2_a = ?, set_2_b = ?, set_2_a_aces = ?, set_2_b_aces = ?, set_2_a_faults = ?, set_2_b_faults = ?, set_2_a_first_serve = ?, set_2_b_first_serve = ?, set_2_a_second_serve = ?, set_2_b_second_serve = ?, set_3_a = ?, set_3_b = ?, set_3_a_aces = ?, set_3_b_aces = ?, set_3_a_faults = ?, set_3_b_faults = ?, set_3_a_first_serve = ?, set_3_b_first_serve = ?, set_3_a_second_serve = ?, set_3_b_second_serve = ?, set_4_a = ?, set_4_b = ?, set_5_a = ?, set_5_b = ?, summary = ?, status = ? where id = ?");
        $query->bindParam(1, $match_date, PDO::PARAM_STR);
		$query->bindParam(2, $max_sets, PDO::PARAM_INT);
        $query->bindParam(3, $player_a, PDO::PARAM_INT);
		$query->bindParam(4, $player_b, PDO::PARAM_INT);
		$query->bindParam(5, $set_1_a, PDO::PARAM_INT);
		$query->bindParam(6, $set_1_b, PDO::PARAM_INT);
		$query->bindParam(7, $set_1_a_aces, PDO::PARAM_INT);
		$query->bindParam(8, $set_1_b_aces, PDO::PARAM_INT);
		$query->bindParam(9, $set_1_a_faults, PDO::PARAM_INT);
		$query->bindParam(10, $set_1_b_faults, PDO::PARAM_INT);
		$query->bindParam(11, $set_1_a_first_serve, PDO::PARAM_INT);
		$query->bindParam(12, $set_1_b_first_serve, PDO::PARAM_INT);
		$query->bindParam(13, $set_1_a_second_serve, PDO::PARAM_INT);
		$query->bindParam(14, $set_1_b_second_serve, PDO::PARAM_INT);
		$query->bindParam(15, $set_2_a, PDO::PARAM_INT);
		$query->bindParam(16, $set_2_b, PDO::PARAM_INT);
		$query->bindParam(17, $set_2_a_aces, PDO::PARAM_INT);
		$query->bindParam(18, $set_2_b_aces, PDO::PARAM_INT);
		$query->bindParam(19, $set_2_a_faults, PDO::PARAM_INT);
		$query->bindParam(20, $set_2_b_faults, PDO::PARAM_INT);
		$query->bindParam(21, $set_2_a_first_serve, PDO::PARAM_INT);
		$query->bindParam(22, $set_2_b_first_serve, PDO::PARAM_INT);
		$query->bindParam(23, $set_2_a_second_serve, PDO::PARAM_INT);
		$query->bindParam(24, $set_2_b_second_serve, PDO::PARAM_INT);
		$query->bindParam(25, $set_3_a, PDO::PARAM_INT);
		$query->bindParam(26, $set_3_b, PDO::PARAM_INT);
		$query->bindParam(27, $set_3_a_aces, PDO::PARAM_INT);
		$query->bindParam(28, $set_3_b_aces, PDO::PARAM_INT);
		$query->bindParam(29, $set_3_a_faults, PDO::PARAM_INT);
		$query->bindParam(30, $set_3_b_faults, PDO::PARAM_INT);
		$query->bindParam(31, $set_3_a_first_serve, PDO::PARAM_INT);
		$query->bindParam(32, $set_3_b_first_serve, PDO::PARAM_INT);
		$query->bindParam(33, $set_3_a_second_serve, PDO::PARAM_INT);
		$query->bindParam(34, $set_3_b_second_serve, PDO::PARAM_INT);
		$query->bindParam(35, $set_4_a, PDO::PARAM_INT);
		$query->bindParam(36, $set_4_b, PDO::PARAM_INT);
		$query->bindParam(37, $set_5_a, PDO::PARAM_INT);
		$query->bindParam(38, $set_5_b, PDO::PARAM_INT);
		$query->bindParam(39, $summary, PDO::PARAM_STR);
		$query->bindParam(40, $status, PDO::PARAM_STR);
		$query->bindParam(41, $id, PDO::PARAM_INT);
        $query->execute();
    }*/
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete matches.* from matches where matches.id = ?");
        $query->bindParam(1, $id, PDO::PARAM_STR);
        $query->execute();
    }

}
