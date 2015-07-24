<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 20:18
 * To change this template use File | Settings | File Templates.
 */

class DbHelper {
	protected static $db;

	private function __construct() {
		try {
			self::$db = new PDO('mysql:host='.DB_HOST.';dbname='.DB_DATABASE.';charset=utf8', DB_USERNAME, DB_PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
			self::$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch (PDOException $e) {
			echo "Connection Error: ".$e->getMessage();
			exit();
		}
	}
	public static function getConnection() {
		if (!self::$db) {
			new DbHelper();
		}
		return self::$db;
	}
}
