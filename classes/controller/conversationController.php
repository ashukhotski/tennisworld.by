<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
 
class conversationController extends Controller {

	public function __construct() {
        parent::__construct();
    }
	
	public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		if ($user == null) { 
			$this->sendRedirect('signup'); 
		} else {
			if (!isset($_REQUEST['_action']) or (empty($_REQUEST['_action']))) { $this->sendRedirect('conversation/list'); }
			if (!empty($_REQUEST['_action']) and is_numeric($_REQUEST['_action'])) { $this->sendRedirect('conversation/view/'.$_REQUEST['_action']); }
			switch ($_REQUEST['_action']) {
				case 'view':
					(!isset($_REQUEST['_id']) and !empty($_POST['recipient'])) and $_REQUEST['_id'] = $_POST['recipient'];
					if (isset($_REQUEST['_id']) and is_numeric($_REQUEST['_id'])) {
						$id = (int) $_REQUEST['_id'];
						try {
							$profile = $this->profileDao->findById($id);
							if ($profile != null) {
								$conversation_id = ($user->id > $profile->id) ? $profile->id."_".$user->id : $user->id."_".$profile->id;
								$this->smarty->assign('profile', $profile);
								
								if (isset($_POST['message']) and !empty($_POST['body'])) {
									try {
										$this->conversationDao->create($user->id, $profile->id, $_POST['body'], $conversation_id);
									} catch (Exception $e) { }
									$this->sendRedirect('conversation/view/'.$profile->id);
								}
								
								$messages = $this->conversationDao->findByConversationId($conversation_id);
								if ($messages != null) {
									foreach ($messages as $i=>$message) {
										if ($message->recipient == $user->id) {
											$this->conversationDao->update($message->id, 0);
											$message->status = 0;
										}
										$messages[$i] = $message;
									}
								}
								$this->smarty->assign('conversation_messages', $messages);
							} else { }
						} catch (Exception $e) { }
					} else { $this->sendRedirect('conversation/list'); }
					$this->smarty->assign('content', $this->smarty->fetch('content/conversation.tpl'));
					break;
				case 'list':
					try {
						$this->smarty->assign('conversations', $this->conversationDao->findAll($user->id));
					} catch (Exception $e) { }
					$this->smarty->assign('content', $this->smarty->fetch('content/conversations.tpl'));
					break;
			}
			$meta = (object) array();
			$meta->title = localize('my_messages', $this->getLanguage());
			$meta->keywords = '';
			$this->smarty->assign('meta', $meta);
			$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
		}
		$this->smarty->display('Layout.tpl');
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
