<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:54
 * To change this template use File | Settings | File Templates.
 */
 
class contactController extends Controller {

	public function __construct() {
        parent::__construct();
    }
	
	public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		if (true) {
			if (!isset($_REQUEST['_action']) or (empty($_REQUEST['_action'])) and ($user != null)) { $this->sendRedirect('contact/following/'.$user->id); }
			if (!empty($_REQUEST['_action']) and is_numeric($_REQUEST['_action'])) { $this->sendRedirect('contact/followers/'.$_REQUEST['_action']); }
			switch ($_REQUEST['_action']) {
				case 'new':
					if (!empty($_REQUEST['_id']) and is_numeric($_REQUEST['_id']) and ($user != null) and ($user->id != $_REQUEST['_id'])) {
						try {
							$profile = $this->profileDao->findById((int) $_REQUEST['_id']);
							if ($profile != null) {
								$this->contactDao->create($user->id, $profile->id);
								$this->sendRedirect('profile/view/'.$profile->id);
							}
						} catch (Exception $e) { }
					} else {  }
					$this->sendRedirect('error');
					break;
				case 'remove':
					if (!empty($_REQUEST['_id']) and is_numeric($_REQUEST['_id']) and ($user != null) and ($user->id != $_REQUEST['_id'])) {
						try {
							$profile = $this->profileDao->findById((int) $_REQUEST['_id']);
							if ($profile != null) {
								$this->contactDao->delete($user->id, $profile->id);
								$this->sendRedirect('profile/view/'.$profile->id);
							}
						} catch (Exception $e) { }
					} else {  }
					$this->sendRedirect('error');
					break;
				case 'following':
					if (empty($_REQUEST['_id'])) { $this->sendRedirect('contact/following/'.$user->id); }
					try {
						$person = $this->profileDao->findById((int) $_REQUEST['_id']);
						if ($person != null) {
							$this->smarty->assign('displayed_contacts', 'following');
							$this->smarty->assign('person', $person);
							$this->smarty->assign('profiles', $this->contactDao->findFollowings($person->id));
							$this->smarty->assign('contacts_count', $this->contactDao->countFollowings($person->id)->contacts_count);
							
							$meta = (object) array();
							$meta->title = $person->name.' | '.localize('followings', $this->getLanguage());
							$meta->keywords = '';
							$this->smarty->assign('meta', $meta);
							$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
						}
					} catch (Exception $e) { }
					break;
				case 'followers':
					if (empty($_REQUEST['_id'])) { $this->sendRedirect('contact/followers/'.$user->id); }
					try {
						$person = $this->profileDao->findById((int) $_REQUEST['_id']);
						if ($person != null) {
							$this->smarty->assign('displayed_contacts', 'followers');
							$this->smarty->assign('person', $person);
							$this->smarty->assign('profiles', $this->contactDao->findFollowers($person->id));
							$this->smarty->assign('contacts_count', $this->contactDao->countFollowers($person->id)->contacts_count);
							
							$meta = (object) array();
							$meta->title = $person->name.' | '.localize('followers', $this->getLanguage());
							$meta->keywords = '';
							$this->smarty->assign('meta', $meta);
							$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
						}
					} catch (Exception $e) { }
					break;
			}
			$this->smarty->assign('content', $this->smarty->fetch('content/contacts.tpl'));
		}
		$this->smarty->display('Layout.tpl');
	}
}