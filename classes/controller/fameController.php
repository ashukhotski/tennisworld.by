<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class fameController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		
		if (!isset($_REQUEST['_action']) or (empty($_REQUEST['_action']))) { 
			$this->sendRedirect('fame/list');
		}
		if (!empty($_REQUEST['_action']) and is_numeric($_REQUEST['_action'])) { $this->sendRedirect('fame/view/'.$_REQUEST['_action']); }
		
		switch ($_REQUEST['_action']) {
			case 'new':
				if (!empty($_POST['title']) and !empty($_POST['tournament']) and !empty($_POST['playerId']) and ($user != null) and ($user->permissions > 2)) {
					$profile = $this->profileDao->findById((int) $_POST['playerId']);
					if (($profile != null) && in_array($_POST['title'], array('semifinalist', 'finalist', 'champion', 'miss_tennis', 'tennis_hero'))) {
						$this->fameDao->createTitle($profile->id, $_POST['tournament'], $_POST['title']);
					}
				}
				$this->sendRedirect('fame/list');
				break;
			case 'delete':
				if (isset($_POST['id']) and is_numeric($_POST['id']) and ($user != null) and ($user->permissions > 2)) {
					try {
						$this->fameDao->deleteTitle($id);
					} catch (Exception $e) { }
				}
				$this->sendRedirect('fame/list');
				break;
			case 'view':
				break;
			case 'list':
			default:
				if (isset($_POST['update']) and !empty($_POST['id']) and !empty($_POST['playerId']) and !empty($_POST['tournament']) and ($user != null) and ($user->permissions > 2)) {
					$profile = $this->profileDao->findById((int) $_POST['playerId']);
					if (($profile != null) && in_array($_POST['title'], array('semifinalist', 'finalist', 'champion', 'miss_tennis', 'tennis_hero'))) {
						$this->profileDao->updateRating($profile->id, $_POST['tournament'], $_POST['title'], (int) $_POST['id']);
					}
					$this->sendRedirect('fame/list');
				}
			
				$titles = $this->fameDao->getTitlesGroupByPlayer();
				foreach ($titles as $title) {
					$medals = $this->fameDao->getTitlesByPlayer($title->player_id);
					$title->medals = $medals;
				}
				$this->smarty->assign('titles', $titles);
				$this->smarty->assign('profiles', $this->profileDao->findAll());
				$this->smarty->assign('content', $this->smarty->fetch('content/fame.tpl'));
				break;
		}
		
		$meta = (object) array();
		$meta->title = localize('hall_of_fame', $this->getLanguage());
		$meta->keywords = '';
		$this->smarty->assign('meta', $meta);
		$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
		
		$this->smarty->display('Layout.tpl');
    }
    
}
