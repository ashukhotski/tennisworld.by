<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class localizationController extends Controller {
	
    public function __construct() {
        parent::__construct();
    }

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		
		if (($user != null) and ($user->permissions > 2)) {
			try {
				if (isset($_POST['action'])) {
					switch ($_POST['action']) {
						case 'edit':
							if (!empty($_POST['id']) and !empty($_POST['lang']) and !empty($_POST['value'])) {
								$this->localizationDao->update($_POST['id'], $_POST['lang'], $_POST['value']);
							}
							break;
						case 'create':
							if (!empty($_POST['id']) and !empty($_POST['value'])) {
								$languages = $this->languageDao->findAll();
								foreach ($languages as $language) {
									$this->localizationDao->create($_POST['id'], $language->id, $_POST['value']);
								}
							}
							break;
					}
					$this->sendRedirect('localization');
				}
				$this->smarty->assign('constants', $this->localizationDao->findAll());
			} catch (Exception $e) { echo $e->getMessage(); exit; }
			$this->smarty->assign('content', $this->smarty->fetch('admin/localization.tpl'));
		} else { $this->sendRedirect('error'); }
		
		$this->smarty->display('Layout.tpl');
	}
}