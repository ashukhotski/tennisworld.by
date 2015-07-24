<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 14.06.13
 * Time: 22:36
 * To change this template use File | Settings | File Templates.
 */
 
class Controller {
    protected $smarty;
	
	protected $pageDao;
	
	protected $profileDao;
	
	protected $matchDao;
	
	protected $liveDao;
	
	protected $localizationDao;
	
	protected $languageDao;
	
	protected $conversationDao;
	
	protected $contactDao;
	
	protected $bannerDao;
	
	protected $fameDao;

    protected function __construct() {
        $this->smarty = new Smarty();
		$this->smarty->template_dir = TEMPLATE_DIR;
		$this->smarty->compile_dir = COMPILE_DIR;
		$this->smarty->config_dir = CONFIG_DIR;
		$this->smarty->cache_dir = CACHE_DIR;
		
		$this->pageDao = new PageDao();
		$this->profileDao = new ProfileDao();
		$this->matchDao = new MatchDao();
		$this->liveDao = new LiveDao();
		$this->localizationDao = new LocalizationDao();
		$this->languageDao = new LanguageDao();
		$this->conversationDao = new ConversationDao();
		$this->contactDao = new ContactDao();
		$this->bannerDao = new BannerDao();
		$this->fameDao = new FameDao();
		
		$this->smarty->assign('cookie_domain', HTTP_COOKIE_DOMAIN);
		
		$years = array();
		for ($y = (int) date("Y") - 13; $y >= 1900; $y--) { $years[] = $y; }
		$this->smarty->assign('years', $years);
		
		$months = array();
		for ($m = 1; $m <= 12; $m++) { $months[] = ($m < 10) ? '0'.$m : $m; }
		$this->smarty->assign('months', $months);
		
		$hours = array();
		for ($h = 0; $h <= 23; $h++) { $hours[] = ($h < 10) ? '0'.$h : $h; }
		$this->smarty->assign('hours', $hours);
		
		$lang = $this->getLanguage();
		
		$this->smarty->assign('lang', $lang);
		$this->smarty->assign('default_language', $this->getDefaultLanguage());
		
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
	
		if ($user != null) { 
			$this->profileDao->updateOnline($user->id);
			$this->smarty->assign('user', $user); 
			$this->smarty->assign('new_messages_count', $this->conversationDao->countNewMessages($user->id)->messages_count);
			$this->smarty->assign('unaccepted_matches_count', $this->matchDao->countByPlayerAorBandStatus($user->id, 'unaccepted')->matches_count);
			$this->smarty->assign('accepted_matches_count', $this->matchDao->countByPlayerAorBandStatus($user->id, 'accepted')->matches_count);
			$this->smarty->assign('ready_to_play_matches_count', $this->matchDao->countByPlayerAorBandStatus($user->id, 'ready_to_play')->matches_count);
			$this->smarty->assign('to_be_continued_matches_count', $this->matchDao->countByPlayerAorBandStatus($user->id, 'to_be_continued')->matches_count);
			$this->smarty->assign('finished_matches_count', $this->matchDao->countByPlayerAorBandStatus($user->id, 'finished')->matches_count);
			$this->smarty->assign('denied_matches_count', $this->matchDao->countByPlayerAorBandStatus($user->id, 'denied')->matches_count);
			$this->smarty->assign('followings_count', $this->contactDao->countFollowings($user->id)->contacts_count);
			$this->smarty->assign('followers_count', $this->contactDao->countFollowers($user->id)->contacts_count);
			$this->smarty->assign('user_menu', $this->smarty->fetch('secured/user_menu.tpl'));
		} else {
			$this->smarty->assign('user', null); 
		}
		$this->smarty->assign('banners', $this->bannerDao->findAll());
		$pages = $this->pageDao->findByParentIdAndLanguage('ROOT', $lang);
		$this->smarty->assign('menu_links', array_reverse($pages));
		$languages = $this->languageDao->findAll();
		$this->smarty->assign('languages', $languages);
		$this->smarty->assign('request_uri', '/'.trim($_SERVER['REQUEST_URI'], '/'));
		$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
        $this->smarty->assign('header', $this->smarty->fetch('header.tpl'));
		$this->smarty->assign('menu', $this->smarty->fetch('menu.tpl'));
		$this->smarty->assign('footer', $this->smarty->fetch('footer.tpl'));
    }
	
	protected function getLanguage() {
		$lang = (!isset($_COOKIE['lang'])) ? substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) : $_COOKIE['lang'];
		$language = null;
		$language = $this->languageDao->findById($lang);
		if ($language == null) { $lang = $this->getDefaultLanguage(); }
		return $lang;
	}
	
	protected function getDefaultLanguage() {
		return "ru";
	}
	
	protected function sendRedirect( $url ) {
		$url = 'http://'.trim($_SERVER['HTTP_HOST'], '/').'/'.$url;
		if ($this->getLanguage() != $this->getDefaultLanguage()) { $url .= '?lang='.$this->getLanguage(); }
		Header( 'Location: ' . $url );
		exit();
	}

}
