<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 21:35
 * To change this template use File | Settings | File Templates.
 */
 
class ConversationDao {
    public function findAll($id) {
        $query = DbHelper::getConnection()->prepare("select * from (select m.*, pa.name as author_name, pa.photo_url as author_img, pa.online as author_online, pr.name as recipient_name, pr.photo_url as recipient_img, pr.online as recipient_online from messages m inner join profiles pa on m.author = pa.id inner join profiles pr on m.recipient = pr.id where m.author = :id or m.recipient = :id order by m.msg_date desc) c group by conversation_id order by msg_date desc");
		$query->bindParam(':id', $id, PDO::PARAM_INT);
		$query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }

    public function findByConversationId($conversation_id) {
        $query = DbHelper::getConnection()->prepare("select m.*, pa.name as author_name, pa.photo_url as author_img, pr.name as recipient_name, pr.photo_url as recipient_img from messages m inner join profiles pa on m.author = pa.id inner join profiles pr on m.recipient = pr.id where conversation_id = ? order by m.msg_date desc");
        $query->bindParam(1, $conversation_id, PDO::PARAM_STR);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
	
	public function countNewMessages($id) {
		$query = DbHelper::getConnection()->prepare("select count(*) as messages_count from messages where recipient = ? and status = 1 limit 1");
		$query->bindParam(1, $id, PDO::PARAM_INT);
		$query->execute();
		return $query->fetch(PDO::FETCH_OBJ);
	}

    public function create($author, $recipient, $body, $conversation_id) {
        $query = DbHelper::getConnection()->prepare("insert into messages(author, recipient, body, conversation_id, status) values(?, ?, ?, ?, 1)");
		try {
			DbHelper::getConnection()->beginTransaction();
            $query->bindParam(1, $author, PDO::PARAM_INT);
            $query->bindParam(2, $recipient, PDO::PARAM_INT);
			$query->bindParam(3, $body, PDO::PARAM_STR);
			$query->bindParam(4, $conversation_id, PDO::PARAM_STR);
            $query->execute();
			DbHelper::getConnection()->commit();
		} catch (PDOException $e) { 
			DbHelper::getConnection()->rollback();
		}
    }
	
	public function update($id, $status) {
		$query = DbHelper::getConnection()->prepare("update messages set status = ? where id = ?");
		$query->bindParam(1, $status, PDO::PARAM_INT);
        $query->bindParam(2, $id, PDO::PARAM_INT);
		$query->execute();
	}
	
	public function delete($id) {
        $query = DbHelper::getConnection()->prepare("delete from messages where id = ?");
        $query->bindParam(1, $id, PDO::PARAM_INT);
        $query->execute();
    }

}
