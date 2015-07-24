<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
 
class signinController {

    public function __construct() { }
	
	private function signin( $provider ) {
		global $auth_config;
		$hybridauth = new Hybrid_Auth( $auth_config );    
        $adapter = $hybridauth->authenticate( $provider );
		$user_profile = $adapter->getUserProfile();
		return (!empty($user_profile)) ? $user_profile : null;
	}

    public function ajax() {
        if (isset($_POST['action'])) {
            switch ($_POST['action']) {
                case "facebook":
                    try {
                        $user_profile = $this->signin( "Facebook" );
                    } catch( Exception $e ) { }
                    break;
				case "vkontakte":
					try {
                        $user_profile = $this->signin( "Vkontakte" );
                    } catch( Exception $e ) { }
                    break;
				case "logoff":
					$user_profile = null;
					$_SESSION['user'] = null;
					if (isset($_SESSION['user'])) unset($_SESSION['user']);
					break;
            }
			if ($user_profile != null) {
				try {
					empty($user_profile->emailVerified) and $user_profile->emailVerified = "";
					$user = new User($user_profile->identifier, $user_profile->emailVerified, $user_profile->firstName." ".$user_profile->lastName);
					$userDao = new UserDao();
					$userDao->create($user);
					$_SESSION['user'] = $user;
				} catch (Exception $e) { }
			}
        }
    }
   
}
