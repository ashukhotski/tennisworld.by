<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */
 
class NewsDao {
    public function findAll() {
        $query = DbHelper::getConnection()->prepare("select date_format(n.datetime, '%d/%m/%Y') as datetime, n.text from news n order by datetime desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByDatetime($datetime) {
        $query = DbHelper::getConnection()->prepare("select date_format(n.datetime, '%d/%m/%Y') as datetime, n.text from news n where n.datetime = str_to_date(?, '%d/%m/%Y') order by datetime desc");
        $query->bindParam(1, $datetime, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create($news) {
        if ($news instanceof News) {
            $query = DbHelper::getConnection()->prepare("insert into news(datetime, header, text) values(str_to_date(?, '%d/%m/%Y'), ?, ?)");
            $query->bindParam(1, $news->getDatetime(), PDO::PARAM_STR);
			$query->bindParam(2, $news->getHeader(), PDO::PARAM_STR);
            $query->bindParam(3, $news->getText(), PDO::PARAM_STR);
            $query->execute();
        }
    }
	
	public function delete($datetime) {
		$query = DbHelper::getConnection()->prepare("delete from news where datetime = str_to_date(?, '%d/%m/%Y')");
		$query->bindParam(1, $datetime, PDO::PARAM_STR);
		$query->execute();
    }
	
	public function save($text, $datetime) {
		$query = DbHelper::getConnection()->prepare("update news set text = ? where datetime = str_to_date(?, '%d/%m/%Y')");
        $query->bindParam(1, $text, PDO::PARAM_STR);
		$query->bindParam(2, $datetime, PDO::PARAM_STR);
        $query->execute();
	}

}
