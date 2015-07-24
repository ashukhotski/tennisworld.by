<?php
	define('HTTP_TITLE', 'TENNISWORLD.by');
	define('HTTP_SERVER', 'http://'.trim($_SERVER['HTTP_HOST'], '/'));
	define('HTTP_COOKIE_DOMAIN', trim($_SERVER['HTTP_HOST'], '/'));
	define('DOCUMENT_ROOT', trim($_SERVER['DOCUMENT_ROOT'], '/'));
	define('DIR_WS_CLASSES', 'classes/');
	define('DIR_WS_LIB', 'lib/');
	define('DIR_WS_THEMES', 'themes/');
	define('DIR_WS_IMAGES', '/images/');
	
	define('SMARTY_DIR', rtrim(DIR_WS_LIB, '/') .'/Smarty-3.0.8/libs/');
	define('TEMPLATE_DIR', 'templates/');
	define('COMPILE_DIR', 'templates_c/');
	define('CONFIG_DIR', 'configs/');
	define('CACHE_DIR', 'cache/');
	
	define('DB_HOST', 'localhost');
	define('DB_USERNAME', '');
	define('DB_PASSWORD', '');
	define('DB_DATABASE', '');
	
	define('MAX_IN_ROW', 25);
	define('MAX_FILESIZE', 102400);
	define('MAX_IMG_WIDTH', 320);
	define('MAX_IMG_HEIGHT', 240);
?>
