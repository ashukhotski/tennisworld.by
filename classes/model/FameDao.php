<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:45
 * To change this template use File | Settings | File Templates.
 */

class FameDao {
	public function getTitles() {
		$query = DbHelper::getConnection()->prepare("select * from titles order by id desc");
		$query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function getTitlesByPlayer($id) {
		$query = DbHelper::getConnection()->prepare("select * from titles where player_id = ? order by id desc");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function getTitlesGroupByPlayer() {
		$query = DbHelper::getConnection()->prepare("select p.name, p.photo_url, t.*, count(*) as titles_quantity from titles t inner join profiles p on p.id = t.player_id group by player_id order by titles_quantity desc, title asc");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
	}
	
	public function createTitle($player_id, $tournament, $title) {
		$picture = '/theme/img/medals/'.$title.'.png';
		$query = DbHelper::getConnection()->prepare("insert into titles(player_id, tournament, title, picture) values(?, ?, ?, ?)");
		$query->bindParam(1, $player_id, PDO::PARAM_INT);
		$query->bindParam(2, $tournament, PDO::PARAM_STR);
		$query->bindParam(3, $title, PDO::PARAM_STR);
		$query->bindParam(4, $picture, PDO::PARAM_STR);
		$query->execute();
	}
	
	public function updateCup($id, $player_id, $tournament, $title) {
		$picture = '/theme/img/medals/'.$title.'.png';
		$query = DbHelper::getConnection()->prepare("update titles set player_id = ?, tournament = ?, title = ?, picture = ? where id = ?");
		$query->bindParam(1, $player_id, PDO::PARAM_INT);
		$query->bindParam(2, $tournament, PDO::PARAM_STR);
		$query->bindParam(3, $title, PDO::PARAM_STR);
		$query->bindParam(4, $picture, PDO::PARAM_STR);
		$query->bindParam(5, $id, PDO::PARAM_INT);
		$query->execute();
	}
	
	public function deleteTitle($id) {
		$query = DbHelper::getConnection()->prepare("delete titles.* from titles where id = ?");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
	}

}