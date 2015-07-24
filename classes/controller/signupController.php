<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
 
class signupController extends Controller {

    public function __construct() {
        parent::__construct();
    }
	
	private function signin( $provider ) {
		global $auth_config;
		$hybridauth = new Hybrid_Auth( $auth_config );    
        $adapter = $hybridauth->authenticate( $provider );
		$user_profile = $adapter->getUserProfile();
		return (!empty($user_profile)) ? $user_profile : null;
	}
	
	private function fillData($values) {
		$data = (object) array();
		if (!empty($values)) {
			foreach ($values as $key=>$value) {
				$data->$key = $value;
			}
			/*$data->email = $values['email'];
			$data->profile_type = $values['profile_type'];
			$data->name = $values['name'];
			$data->year = $values['year'];
			$data->month = $values['month'];
			$data->day = $values['day'];
			$data->phone = $values['phone'];
			$data->city = $values['city'];
			$data->level = $values['level'];
			$data->plays = $values['plays'];
			$data->backhand = $values['backhand'];
			$data->height = (int) $values['height'];
			$data->weight = (int) $values['weight'];
			$data->racket = $values['racket'];
			$data->bio = $values['bio'];*/
		}
		return $data;
	}
	
	private function validate($values) {
		$status = true;
		if (!empty($values)) {
			try {
				!preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $values->email) and $status = false;
				!preg_match("/^[a-zA-Z0-9]{6,}$/", $values->password) and $status = false;
				!preg_match("/^([a-zA-Zа-яА-Яўі'\-]+\ ){1}[a-zA-Zа-яА-Яўі'\-]+$/u", $values->name) and $status = false;
			} catch (Exception $e) { $status = false; }
		} else { $status = false; }
		return $status;
	}

    public function render() {
		if (isset($_SESSION['user']) and ($_SESSION['user'] != null)) { $this->sendRedirect('welcome'); }
        (!isset($_REQUEST['_action'])) and $_REQUEST['_action'] = "";         
        switch ($_REQUEST['_action']) {
			case "":
				//$this->smarty->assign('content', $this->smarty->fetch('content/signup.tpl'));
				break;
			case "new":
				$user = null;
				if (isset($_POST['signup'])) {
					$data = $this->fillData($_POST);
					$_SESSION['data'] = $data;
					if (
						$this->validate($data)
					) {
						$email = $_POST['email'];
						$password = $_POST['password'];
						$profile_type = $_POST['profile_type'];
						$name = $_POST['name'];
						$birthday = $_POST['year']."-".$_POST['month']."-".$_POST['day'];
						$phone = $_POST['phone'];
						$city = $_POST['city'];
						$level = $_POST['level'];
						$plays = $_POST['plays'];
						$backhand = $_POST['backhand'];
						$height = (int) $_POST['height'];
						$weight = (int) $_POST['weight'];
						$racket = $_POST['racket'];
						$bio = $_POST['bio'];
						$vk_id = null;
						$fb_id = null;
						$photo_url = "/theme/img/default_avatar.gif";
					
						try {
							$this->profileDao->create($email, $password, $profile_type, $name, $birthday, $phone, $city, $level, $plays, $backhand, $height, $weight, $racket, $bio, $vk_id, $fb_id, $photo_url);
							$user = $this->profileDao->findByEmailAndPassword($email, $password);
							if ($user != null) {
								$_SESSION['user'] = $user;
								if (isset($_SESSION['data'])) { unset($_SESSION['data']); }
								
								$to = $user->email;
								$subject = localize('registration_info', $this->getLanguage());
								$message = localize('email', $this->getLanguage()).": ".$user->email."\n".localize('password', $this->getLanguage()).": ".$user->password;
								$headers = "From: Tennisworld.by <tennisworld.by@gmail.com>\r\nContent-type: text/html; charset=utf-8 \r\n";
								mail ($to, $subject, $message, $headers);
								
								$this->sendRedirect('profile/view/'.$user->id);
							} else { }
						} catch (Exception $e) { }
					} else { } 
				} else { }
				$this->sendRedirect('signup');
				break;
			default:
				$this->sendRedirect('error');
				break;
        }
		if (isset($_SESSION['data'])) { $this->smarty->assign('data', $_SESSION['data']); }
		$meta = (object) array();
		$meta->title = localize('signin', $this->getLanguage()).' ('.localize('signup', $this->getLanguage()).')';
		$meta->keywords = '';
		$this->smarty->assign('meta', $meta);
		$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
		$this->smarty->assign('content', $this->smarty->fetch('content/signup.tpl'));
		$this->smarty->display('Layout.tpl');
    }	
    
}
