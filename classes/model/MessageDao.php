<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */
 
class MessageDao {
    public function findAll() {
        $query = DbHelper::getConnection()->prepare("select m.*, u.name as user from messages m inner join users u on m.userId = u.id order by m.datetime desc");
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findById($datetime) {
        $query = DbHelper::getConnection()->prepare("select m.* from messages m inner join users u on m.userId = u.id where m.datetime = ? limit 1");
        $query->bindParam(1, $datetime, PDO::PARAM_STR);
        $query->execute();
        return $query->fetch(PDO::FETCH_OBJ);
    }

    public function create($message) {
        if ($message instanceof Message) {
            $query = DbHelper::getConnection()->prepare("insert into messages(userId, text) values(?, ?)");
            //$query->bindParam(1, $message->getDatetime(), PDO::PARAM_STR);
            $query->bindParam(1, $message->getUserId(), PDO::PARAM_STR);
            $query->bindParam(2, $message->getText(), PDO::PARAM_STR);
            $query->execute();
        }
    }
	
	public function delete($datetime) {
        $query = DbHelper::getConnection()->prepare("delete from messages where datetime = ?");
        $query->bindParam(1, $datetime, PDO::PARAM_STR);
        $query->execute();
    }

}
