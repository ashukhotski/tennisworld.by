<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
 
class messageController {

	private $user;

    public function __construct() {
		if (isset($_SESSION['user']) && ($_SESSION['user'] instanceof User)) {
			$this->user = $_SESSION['user'];
		} else {
			$this->user = null;
		}
	}
	
	private function post( $text ) {
		if ($this->user != null) {
			try {
				$message = new Message(date('Y-m-d H:i:s'), $text, $this->user->getId());
				$messageDao = new MessageDao();
				$messageDao->create($message);
			} catch (Exception $e) { }
		}
	}
	
	private function delete( $id ) {
		if ($this->user != null) {
			try {
				$message = null;
				$messageDao = new MessageDao();
				$message = $messageDao->findById($id);
				if ($message != null && ($this->user->getAdmin() == '1' || $this->user->getId() == $message->userId)) {
					$messageDao->delete($message->datetime);
				} else { }
			} catch (Exception $e) { }
		}
	}
	
	private function get() {
		$messageDao = new MessageDao();
		$messages = null;
		$messages = $messageDao->findAll();
		$result = '';
		if ($messages != null) {
			foreach ($messages as $message) {
				$result .= '<p><strong>'.$message->user.'</strong>: <br />"'.$message->text.'"';
				if (($this->user != null) && ($this->user->getAdmin() == '1' || $this->user->getId() == $message->userId)) {
					$result .= '<span style="font-size: 9px; cursor: pointer;" onmouseover="this.style.textDecoration = \'underline\';" onmouseout="this.style.textDecoration = \'none\'" onclick="deleteMessage(\''.$message->datetime.'\')"> &lArr; delete</span>';
				}
				$result .= '</p>';
			}
		} else {
			$result = '<p>No messages...</p>';
		}
		return $result;
	}

    public function ajax() {
		if (isset($_POST['action'])) {
			switch ($_POST['action']) {
				case 'post':
					$this->post($_POST['text']);
					echo "ok";
					break;
				case 'delete':
					var_dump($this->delete($_POST['id']));
					break;
				case 'get':
					echo $this->get();
					break;
			}
		}

    }
   
}
