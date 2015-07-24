<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class ratingController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		
		if (isset($_POST['update']) and !empty($_POST['playerId']) and ($user != null) and ($user->permissions > 2)) {
			$profile = $this->profileDao->findById((int) $_POST['playerId']);
			if ($profile != null) {
				//$this->profileDao->updateRating($profile->id, (int) $_POST['points'], (int) $_POST['points'] - $profile->points);
				$this->profileDao->updateRating($profile->id, (int) $_POST['points'], (int) $_POST['progress']);
			}
			$this->sendRedirect('rating');
		}
		
		$meta = (object) array();
		$meta->title = localize('rating', $this->getLanguage());
		$meta->keywords = '';
		$this->smarty->assign('meta', $meta);
		$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
		
		$players = $this->profileDao->getRating();
		foreach ($players as $player) {
			$win = $this->matchDao->countWinA($player->id)->matches_count + $this->matchDao->countWinB($player->id)->matches_count;
			$loose = $this->matchDao->countLooseA($player->id)->matches_count + $this->matchDao->countLooseB($player->id)->matches_count;
			
			$player->win = $win;
			$player->loose = $loose;
		}
		$this->smarty->assign('players', $players);
		$this->smarty->assign('content', $this->smarty->fetch('content/rating.tpl'));
		
		$this->smarty->display('Layout.tpl');
    }
    
}
