<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
 
class signinController extends Controller {

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

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
        if (isset($_REQUEST['_action'])) {         
            switch ($_REQUEST['_action']) {
				case "tennisworld":
					if ($user != null) { $this->sendRedirect('profile/view/'.$user->id); }
					if (!empty($_POST['email']) and !empty($_POST['password'])) {
						$user_profile = 1;
						$email = $_POST['email'];
						$password = $_POST['password'];
						try { 
							$user = $this->profileDao->findByEmailAndPassword($email, $password);
							if ($user != null) {
								$_SESSION['user'] = $user;
								$this->sendRedirect('profile/view/'.$user->id);
							} else { $this->sendRedirect('signup'); }
						} catch (Exception $e) { $user_profile = null; }
					} else { $user_profile = null; }
					break;
				case "remind":
					if ($user != null) { $this->sendRedirect('profile/view/'.$user->id); }
					if (isset($_POST['email']) and preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $_POST['email'])) {
						try {
							$user = $this->profileDao->findByEmail($_POST['email']);
							if ($user != null) {
								$to = $user->email;
								$subject = localize('registration_info', $this->getLanguage());
								$message = localize('email', $this->getLanguage()).": ".$user->email."\n".localize('password', $this->getLanguage()).": ".$user->password;
								$headers = "From: Tennisworld.by <tennisworld.by@gmail.com>\r\nContent-type: text/html; charset=utf-8 \r\n";
								mail ($to, $subject, $message, $headers);
								$user = null;
							}
						} catch (Exception $e) { $this->sendRedirect('error'); }
					}
					$this->sendRedirect('signup');
					break;
                case "facebook":
                    try {
                        $user_profile = $this->signin( "Facebook" );
						if ($user != null) { 
							$this->profileDao->updateFb($user->id, $user_profile->identifier);
							$this->sendRedirect('profile/view/'.$user->id); 
						} else {
							if ($user_profile != null) {
								$user = $this->profileDao->findByFbId($user_profile->identifier);
								if ($user != null) { 
									$_SESSION['user'] = $user;
									$this->sendRedirect('profile/view/'.$user->id); 
								}
								
								$email = $user_profile->emailVerified;
								$password = null;
								$profile_type = "not_specified";
								$name = $user_profile->firstName." ".$user_profile->lastName;
								$birthday = $user_profile->birthYear."-".$user_profile->birthMonth."-".$user_profile->birthDay;
								$phone = null;
								$city = $user_profile->region;
								$level = "not_specified";
								$plays = "not_specified";
								$backhand = "not_specified";
								$height = 0;
								$weight = 0;
								$racket = "not_specified";
								$bio = $user_profile->description;
								$vk_id = null;
								$fb_id = $user_profile->identifier;
								$photo_url = isset($user_profile->photoURL) ? $user_profile->photoURL : null;
								($photo_url == null) and $photo_url = "/theme/img/default_avatar.gif";
							}
						}
                    } catch( Exception $e ) { }
                    break;
				case "vkontakte":		
					try {
                        $user_profile = $this->signin( "Vkontakte" );
						if ($user != null) { 
							$this->profileDao->updateVk($user->id, $user_profile->identifier);
							$this->sendRedirect('profile/view/'.$user->id); 
						} else {
							if ($user_profile != null) {
								$user = $this->profileDao->findByVkId($user_profile->identifier);
								if ($user != null) { 
									$_SESSION['user'] = $user;
									$this->sendRedirect('profile/view/'.$user->id); 
								}
							
								$email = $user_profile->emailVerified;
								$password = null;
								$profile_type = "not_specified";
								$name = $user_profile->firstName." ".$user_profile->lastName;
								$birthday = $user_profile->birthYear."-".$user_profile->birthMonth."-".$user_profile->birthDay;
								$phone = null;
								$city = null;
								$level = "not_specified";
								$plays = "not_specified";
								$backhand = "not_specified";
								$height = 0;
								$weight = 0;
								$racket = "not_specified";
								$bio = null;
								$vk_id = $user_profile->identifier;
								$fb_id = null;
								$photo_url = isset($user_profile->photoURL) ? $user_profile->photoURL : null;
								($photo_url == null) and $photo_url = "/theme/img/default_avatar.gif";
							}
						}
                    } catch( Exception $e ) { }
                    break;
				case "logoff":
					$user_profile = null;
					$user = null;
					$_SESSION['user'] = null;
					if (isset($_SESSION['user'])) unset($_SESSION['user']);
					break;
            }
			if ($user_profile != null) {
				try {
					$this->profileDao->create($email, $password, $profile_type, $name, $birthday, $phone, $city, $level, $plays, $backhand, $height, $weight, $racket, $bio, $vk_id, $fb_id, $photo_url);
					$user = $this->profileDao->findById($this->profileDao->getId());
					if ($user == null) { 
						$this->sendRedirect('signup'); 
					} else {
						$_SESSION['user'] = $user;
						$this->sendRedirect('profile/view/'.$user->id);
					}
				} catch (Exception $e) { }
			}
        }	
		
		$this->sendRedirect('signup');
    }
    
}
