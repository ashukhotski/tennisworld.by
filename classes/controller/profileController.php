<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class profileController extends Controller {

    public function __construct() {
        parent::__construct();
    }
	
	private function fillData($values) {
		$data = (object) array();
		if (!empty($values)) {
			foreach ($values as $key=>$value) {
				$data->$key = $value;
			}
		}
		return $data;
	}
	
	private function validate($values, $current_password) {
		$errors = (object) array();
		$errors->current_password = null;
		$errors->password = null;
		$errors->email = null;
		$errors->name = null;
		$status = true;
		if (!empty($values)) {
			try {
				if ($current_password != $values->current_password) { $status = false; $errors->current_password = localize('current_password_error', $this->getLanguage()); }
				if (!preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $values->email)) { $status = false; $errors->email = localize('email_error', $this->getLanguage()); }
				if (!preg_match("/^[a-zA-Z0-9]{6,}$/", $values->password)) { $status = false; $errors->password = localize('password_error', $this->getLanguage()); }
				if (!preg_match("/^([a-zA-Zа-яА-Яўі'\-]+\ ){1}[a-zA-Zа-яА-Яўі'\-]+$/u", $values->name)) { $status = false; $errors->name = localize('name_error', $this->getLanguage()); }
			} catch (Exception $e) { $status = false; }
		} else { $status = false; }
		if ($status == false) { $_SESSION['errors'] = $errors; }
		return $status;
	}

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		if (!isset($_REQUEST['_action']) or (empty($_REQUEST['_action']))) { 
			if ($user == null) { 
				$this->sendRedirect('profile/list');
			} else {
				$this->sendRedirect('profile/view/'.$user->id);
			}
		}
		if (!empty($_REQUEST['_action']) and is_numeric($_REQUEST['_action'])) { $this->sendRedirect('profile/view/'.$_REQUEST['_action']); }
		switch ($_REQUEST['_action']) {
			case 'ajax':
				if ($user != null) {
					$this->profileDao->updateOnline($user->id);
				}
				break;
			case 'view':
				if (isset($_SESSION['errors'])) { unset($_SESSION['errors']); }
				if (isset($_POST['action']) and ($_POST['action'] == 'access') and isset($_POST['_id']) and is_numeric($_POST['_id'])) {
					$permissions = isset($_POST['permissions']) ? (int) $_POST['permissions'] : 0;
					$profile = $this->profileDao->findById((int) $_POST['_id']);
					
					if (isset($user) and ($user != null) and ($profile != null) and ($user->permissions > 2) and ($user->permissions > $profile->permissions) and ($user->permissions > $permissions)) {
						try {
							$this->profileDao->setPermissions($profile->id, $permissions);
							$profile = null;
						} catch (Exception $e) { }
					}
					$this->sendRedirect('profile/view/'.$_POST['_id']);
				}
				if (isset($_POST['action']) and ($_POST['action'] == 'delete') and isset($_POST['_id']) and is_numeric($_POST['_id'])) {
					$profile = $this->profileDao->findById((int) $_POST['_id']);
					
					if (isset($user) and ($user != null) and ($profile != null) and ($user->permissions > 3) and ($user->permissions > $profile->permissions)) {
						try {
							$this->profileDao->delete($profile->id);
							$profile = null;
						} catch (Exception $e) { }
					}
					$this->sendRedirect('profile/view/'.$_POST['_id']);
				}
				
				if (isset($_REQUEST['_id']) and is_numeric($_REQUEST['_id'])) {
					$id = (int) $_REQUEST['_id'];	
					if ($user != null and $user->id == $id) {
						$this->smarty->assign('plmatches', $this->matchDao->findByPlayerAorBandStatus($user->id, 'finished'));
						$this->smarty->assign('profile', $user);
						$meta = (object) array();
						$meta->title = $user->name;
						$meta->keywords = '';
						$this->smarty->assign('meta', $meta);
						$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
					} else {
						try {
							$profile = $this->profileDao->findById($id);
							if ($profile != null) {
								$this->smarty->assign('plmatches', $this->matchDao->findByPlayerAorBandStatus($profile->id, 'finished'));
								$this->smarty->assign('profile', $profile);
								$meta = (object) array();
								$meta->title = $profile->name;
								$meta->keywords = '';
								$this->smarty->assign('meta', $meta);
								$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
								if ($user != null) {
									$this->smarty->assign('followed', $this->contactDao->exist($user->id, $profile->id)->contacts_count);
								}
							}
						} catch (Exception $e) { }
					}
					
				} else {
					if (empty($_REQUEST['_id']) and $user != null) { $this->sendRedirect('profile/view/'.$user->id); }
				}
				$this->smarty->assign('content', $this->smarty->fetch('content/profile.tpl'));
				break;
			case 'edit':
				if ($user != null) {
					if (isset($_POST['edit'])) {
						empty($_POST['password']) and $_POST['password'] = $_POST['current_password'];
						$data = $this->fillData($_POST);
						$_SESSION['data'] = $data;
						if (
							$this->validate($data, $user->password)
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
							$photo_url = $_POST['photo_url'];
							if (isset($_FILES['photo']) and !empty($_FILES['photo']['name'])) {			
								$dir = $_SERVER["DOCUMENT_ROOT"]."/images/profiles/";
								if (!is_dir($dir)) mkdir($dir, 0777);
								if (is_uploaded_file($_FILES['photo']['tmp_name'])) {
									move_uploaded_file($_FILES['photo']['tmp_name'], $dir."/".$user->id.".".array_pop(explode('.', $_FILES['photo']['name'])));
									$photo_url = "/images/profiles/".$user->id.".".array_pop(explode('.', $_FILES['photo']['name']));
								} 
							}	
						
							try {
								$this->profileDao->update($user->id, $email, $password, $profile_type, $name, $birthday, $phone, $city, $level, $plays, $backhand, $height, $weight, $racket, $bio, $photo_url);
								$user = $this->profileDao->findByEmailAndPassword($email, $password);
								if ($user != null) {
									$_SESSION['user'] = $user;
									if (isset($_SESSION['data'])) { unset($_SESSION['data']); }
									if (isset($_SESSION['errors'])) { unset($_SESSION['errors']); }
									//$this->sendRedirect('profile/view/'.$user->id);
								} else { }
							} catch (Exception $e) { }
						} else { }
						$this->sendRedirect('profile/edit');
					} else { }
					$meta = (object) array();
					$meta->title = $user->name;
					$meta->keywords = '';
					$this->smarty->assign('meta', $meta);
					$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
					if (isset($_SESSION['data'])) { $this->smarty->assign('data', $_SESSION['data']); }
					if (isset($_SESSION['errors'])) { $this->smarty->assign('errors', $_SESSION['errors']); }
					$this->smarty->assign('content', $this->smarty->fetch('content/editProfile.tpl'));
				} else { $this->sendRedirect('signup'); }
				break;
			case 'list':
			default:
				if (isset($_SESSION['errors'])) { unset($_SESSION['errors']); }
				try {
					if (isset($_REQUEST['_id']) and !empty($_REQUEST['_id'])) {
						switch ($_REQUEST['_id']) {
							case 'players':
								$profiles = $this->profileDao->findByType('player');
								break;
							case 'coaches': 
								$profiles = $this->profileDao->findByType('coach');
								break;
							case 'lovers':
								$profiles = $this->profileDao->findByType('not_specified');
								break;
							case 'all':
							default:
								$profiles = $this->profileDao->findAll();
								break;
						}
					} else { $this->sendRedirect('profile/list/all'); }
					
					if (isset($_POST['search'])) {
						!isset($_POST['online']) and $_POST['online'] = '';
						$results = $this->profileDao->search($_POST['name'], $_POST['city'], $_POST['level'], $_POST['online']);
						$tmp = $profiles;
						$profiles = array();
						foreach ($tmp as $profile) {
							foreach ($results as $result) {
								if ($result->id == $profile->id) { $profiles[] = $profile; }
							}
						}
						//$_SESSION['search_results'] = $profiles;
						//$this->sendRedirect($_SERVER['REQUEST_URI']);
					} else {
						//if (isset($_SESSION['search_results'])) { unset($_SESSION['search_results']); }
					}
					//if (isset($_SESSION['search_results'])) { $profiles = $_SESSION['search_results']; }
					$this->smarty->assign('profiles', $profiles);
				} catch (Exception $e) { }
				$meta = (object) array();
				$meta->title = localize('people', $this->getLanguage());
				$meta->keywords = '';
				$this->smarty->assign('meta', $meta);
				$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
				$this->smarty->assign('content', $this->smarty->fetch('content/profiles.tpl'));
				break;
		}
		
		$this->smarty->display('Layout.tpl');
    }
    
}
