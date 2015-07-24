<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class adminController extends Controller {

	private $user;
	
	private $isAdmin;

    public function __construct() {
        parent::__construct();
		if (isset($_SESSION['user']) && ($_SESSION['user'] instanceof User)) {
			$this->user = $_SESSION['user'];
			$userDao = new UserDao();
			$this->isAdmin = $userDao->findById($this->user->getId())->admin;
		} else {
			$this->user = null;
			$this->isAdmin = '0';
		}
    }

    public function render() {
		try {
			if ($this->isAdmin == '1') {
				(!isset($_REQUEST['_action'])) and $_REQUEST['_action'] = 'news';
				switch ($_REQUEST['_action']) {
					case 'info':
						$constantDao = new ConstantDao();
						if (isset($_POST['constant_action'])) {
							switch ($_POST['constant_action']) {
								case 'edit':
									$constant = null;
									$constant = $constantDao->findById($_POST['constant_name']);
									if ($constant != null) {
										$constantDao->save($constant->name, $_POST['constant_value']);
									}
									$this->sendRedirect('admin/info');
									break;
							}
						}
						$constants = $constantDao->findAll();
						$this->smarty->assign('constants', $constants);
						$this->smarty->assign('content', $this->smarty->fetch('admin/content/info.tpl'));
						break;
					case 'news':
						$newsDao = new NewsDao();
						if (isset($_POST['news_action'])) {
							switch ($_POST['news_action']) {
								case 'create':
									$newsItem = new News(date("d/m/Y"), $_POST['news_text']);
									$newsDao->create($newsItem);
									$this->sendRedirect('admin/news');
									break;
								case 'delete':
									$newsDao->delete($_POST['news_date']);
									$this->sendRedirect('admin/news');
									break;
								case 'edit':
									$newsItem = null;
									$newsItem = $newsDao->findByDatetime($_POST['news_date']);
									if ($newsItem != null) {
										$newsDao->save($_POST['news_text'], $newsItem->datetime);
									}
									$this->sendRedirect('admin/news');
									break;
							}
						}
						$news = $newsDao->findAll();
						$this->smarty->assign('news', $news);
						$this->smarty->assign('content', $this->smarty->fetch('admin/content/news.tpl'));
						break;
					case 'newsletter':
						if (isset($_POST['newsletter_action'])) {
							switch ($_POST['newsletter_action']) {
								case 'send':
									$userDao = new UserDao();
									$users = $userDao->getSubscribers();
									$emailList = array();
									$i = 0;
									foreach ($users as $user) {
										$emailList[$i] = $user->email;
										$i++;
									}
									if ($i > 0) {
										$to = implode(",", $emailList);
										$subject = "Newsletter from Kaltherzig";
										$message = $_POST['newsletter_text'];
										$headers = "From: Kaltherzig.de <kalt.info@gmail.com>\r\nContent-type: text/html; charset=utf-8 \r\n";
										mail ($to, $subject, $message, $headers);
									}
									$this->sendRedirect('admin/newsletter');
									break;
								}
							}
						$this->smarty->assign('content', $this->smarty->fetch('admin/content/newsletter.tpl'));
						break;
					case 'tours':
						$tourdateDao = new TourdateDao();
						if (isset($_POST['tour_action'])) {
							switch ($_POST['tour_action']) {
								case 'create':
									$tourdate = new Tourdate(date("d/m/Y", strtotime($_POST['tour_date'])), $_POST['tour_place']);
									$tourdateDao->create($tourdate);
									$this->sendRedirect('admin/tours');
									break;
								case 'delete':
									$tourdateDao->delete($_POST['tour_date']);
									$this->sendRedirect('admin/tours');
									break;
								case 'edit':
									break;
							}
						}
						$tourdates = $tourdateDao->findAll();
						$this->smarty->assign('tourdates', $tourdates);
						$this->smarty->assign('content', $this->smarty->fetch('admin/content/tours.tpl'));
						break;
					case 'users':
						$userDao = new UserDao();
						if (isset($_POST['user_action'])) {
							switch ($_POST['user_action']) {
								case 'delete':
									$userDao->delete($_POST['user_id']);
									$this->sendRedirect('admin/users');
									break;
								case 'edit':
									break;
							}
						}
						$users = $userDao->findAll();
						$this->smarty->assign('users', $users);
						$this->smarty->assign('content', $this->smarty->fetch('admin/content/users.tpl'));
						break;
				}
				$this->smarty->assign('head', $this->smarty->fetch('admin/head.tpl'));
				$this->smarty->assign('header', $this->smarty->fetch('admin/header.tpl'));
				$this->smarty->assign('footer', $this->smarty->fetch('admin/footer.tpl'));
				$this->smarty->display('admin/Layout.tpl');
			} else {
				$this->sendRedirect('error');
			}
		} catch (Exception $e) {
			$this->sendRedirect('error');
		}
    }
    
}
