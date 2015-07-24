<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 12.06.13
 * Time: 0:02
 * To change this template use File | Settings | File Templates.
 */
 
class UrlRewrite {
    protected $url;
	protected $protocol;
	protected $host;
	protected $params;
	protected $result;

	public function __construct($url, $ssl = false) {
		$url_array = explode('?', trim($url, '/'));
		$this->url = trim($url, '/');
		$this->protocol = (!$ssl) ? 'http://' : 'https://';
		$this->host = trim($_SERVER['HTTP_HOST'], '/');
	}
	function replace($exp, $to, $obj) {
		return preg_replace($exp, $to, $obj);
	}
	public function rewriteURL() {
		$this->result = $this->protocol.$this->host;
		$this->params = explode('&', $this->url);
		$this->result .= implode(array_map(create_function('$x', 'return preg_replace(\'/(.*?)=/\', \'/\', $x);'), $this->params));
		return $this->result;
	}
	public function activateParams($params_list = array('_controller', '_action', '_id', '_page')) {
		$this->result = array();
		
		if (!empty($this->url)) {
			$url_and_lang = explode('?lang=', $this->url, 2);
			$url = (isset($url_and_lang[0]) and !empty($url_and_lang[0])) ? $url_and_lang[0] : '';
			$lang = (isset($url_and_lang[1]) and !empty($url_and_lang[1])) ? $url_and_lang[1] : 'ru';
		} else { 
			$url = '';
			$lang = 'ru';
		}
		$_COOKIE['lang'] = $lang;
		
		if (!empty($url)) {
			$this->params = explode('/', $url);
			foreach ($params_list as $key=>$value) $this->result[$value] = (isset($this->params[$key])) ? $this->params[$key] : null;
		} else $this->result[$params_list[0]] = 'page';
		return $this->result;
	}
}
