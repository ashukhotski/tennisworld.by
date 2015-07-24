<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 23:56
 * To change this template use File | Settings | File Templates.
 */
 
class Router {
    protected $controller;
	protected $defaultController;
	protected $path;
	protected $_class;
	protected $_object;

	public function __construct($controller, $path, $default = 'pageController') {
		$this->controller = $controller.'Controller';
		$this->defaultController = $default;
		$this->path = rtrim($path, '/');
		$this->getController();
	}
	protected function isFile() {
		clearstatcache();
		return is_file($this->path.'/'.$this->controller.'.php');
	}
	protected function getController() {
		if ($this->isFile()) {
			include_once($this->path.'/'.$this->controller.'.php');
			$this->_class = $this->controller;
		} else {
			include_once($this->path.'/'.$this->defaultController.'.php');
			$this->_class = $this->defaultController;
		}
	}
	public function createObject() {
		try {
			$this->_object = new $this->_class;
		} catch (Exception $e) {
			echo $e->getMessage();
			exit();
		}
		return $this->_object;
	}
}
