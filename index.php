<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:03
 * To change this template use File | Settings | File Templates.
 */

require_once('conf/config.php');
require_once(SMARTY_DIR . 'Smarty.class.php');
require_once(DIR_WS_CLASSES . 'util/DbHelper.php');
require_once(DIR_WS_CLASSES . 'util/Router.php');
require_once(DIR_WS_CLASSES . 'util/UrlRewrite.php');

require_once(DIR_WS_CLASSES . 'model/ProfileDao.php');
require_once(DIR_WS_CLASSES . 'model/MatchDao.php');
require_once(DIR_WS_CLASSES . 'model/LiveDao.php');
require_once(DIR_WS_CLASSES . 'model/PageDao.php');
require_once(DIR_WS_CLASSES . 'model/LocalizationDao.php');
require_once(DIR_WS_CLASSES . 'model/LanguageDao.php');
require_once(DIR_WS_CLASSES . 'model/ConversationDao.php');
require_once(DIR_WS_CLASSES . 'model/ContactDao.php');
require_once(DIR_WS_CLASSES . 'model/BannerDao.php');
require_once(DIR_WS_CLASSES . 'model/FameDao.php');

require_once(DIR_WS_CLASSES . 'controller/Controller.php');

function localize($id, $lang) {
	$localizationDao = new LocalizationDao();
	$loc = $localizationDao->findByIdAndLanguage($id, $lang);
	return (!empty($loc)) ? $loc->value : $id;
}

function calculateAge($birthday) {
	$bday = new DateTime($birthday);
	$today = new DateTime('00:00:00');
	$diff = $today->diff($bday);
	return $diff->y;
}

function lastVisit($online) {
	$to_time = strtotime(date('Y-m-d H:i:s'));
	$from_time = strtotime($online);
	return round(abs($to_time - $from_time) / 60,2);
}

session_start();

global $auth_config;
$auth_config = dirname(__FILE__) . "/lib/hybridauth/config.php";
require_once(DIR_WS_LIB . 'hybridauth/Hybrid/Auth.php');
require_once(DIR_WS_LIB . 'sitemap/class.xml.sitemap.generator.php');
require_once(DIR_WS_LIB . 'PHPMailer_5.2.4/class.phpmailer.php');

foreach($_REQUEST as $key => $val) {
	if(isset($$key)) unset($$key);
}
if (get_magic_quotes_gpc()) {
	$_GET = array_map('stripslashes', $_GET);
	$_POST = array_map('stripslashes', $_POST);
	$_COOKIE = array_map('stripslashes', $_COOKIE);
};
ini_set("magic_quotes_gpc","0");
ini_set("magic_quotes_runtime","0");
ini_set("display_errors","0");
ini_set("error_reporting", E_NOTICE);

$UrlRewrite = new UrlRewrite($_SERVER['REQUEST_URI']);
$_REQUEST = $UrlRewrite->activateParams();

if (isset($_SESSION['data']) and ($_REQUEST['_controller'] != 'signup')) { unset($_SESSION['data']); }

$router = new Router($_REQUEST['_controller'], rtrim(DIR_WS_CLASSES, '/').'/controller/');
$controller = $router->createObject();
$controller->render();


 
