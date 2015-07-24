<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class welcomeController extends Controller {

    public function __construct() {
        parent::__construct();
    }

    public function render() {
		$this->smarty->assign('content', $this->smarty->fetch('content/welcome.tpl'));
		$this->smarty->display('Layout.tpl');
    }
    
}
