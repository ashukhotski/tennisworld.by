<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class pageController extends Controller {
	
    public function __construct() {
        parent::__construct();
    }

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		
		(!isset($_REQUEST['_controller']) or ($_REQUEST['_controller'] == 'page')) and $_REQUEST['_controller'] = '';
			
		if ($_REQUEST['_controller'] == 'create_new_page') {
			if (($user != null) and ($user->permissions > 1)) {
				if (isset($_POST['action']) and ($_POST['action'] == 'create')) {
					$page = (object) array();
					$page->url = $_POST['url'];
					$page->title = $_POST['title'];
					$page->keywords = $_POST['keywords'];
					$page->body = $_POST['body'];
					$page->parent_id = (isset($_POST['parent_id']) and !empty($_POST['parent_id'])) ? $_POST['parent_id'] : 'ROOT';
					try {
						if (($this->pageDao->findByUrl($page->url) != null) and ($page->parent_id != 'ROOT')) { $page->url = date('YmdHis'); }
						$languages = $this->languageDao->findAll();
						foreach ($languages as $language) { $this->pageDao->create($page->url, $language->id, $page->title, $page->body, $page->keywords, $page->parent_id); }
						$page = $this->pageDao->findByUrlAndLanguage($page->url, $this->getLanguage());
						if ($page != null) { $this->sendRedirect(($page->parent_id != 'ROOT' and $page->parent_id != '') ? $page->parent_id."/".$page->url : $page->url); }
					} catch (Exception $e) { }
					$this->smarty->assign('page', $page);
					$this->sendRedirect('create_new_page');
				}
				$this->smarty->assign('content', $this->smarty->fetch('admin/page.tpl'));
			} else { $this->sendRedirect('error'); }
		} elseif ($_REQUEST['_controller'] == 'backup_database') {
			if (($user != null) and ($user->permissions > 3)) {
				$status = '';
				try {
					$filename='database_backup_'.date('Y_m_d_H_i_s').'.sql';
					$result=exec('mysqldump --default-character-set=utf8 --set-charset '.DB_DATABASE.' --password='.DB_PASSWORD.' --user='.DB_USERNAME.' --single-transaction -r '.$_SERVER["DOCUMENT_ROOT"].'/backup/'.$filename, $output);
					$email = new PHPMailer();
					$email->From      = 'info@tennisworld.by';
					$email->FromName  = 'TENNISWORLD';
					$email->Subject   = 'Database Backup '.date('Y-m-d H:i:s');
					$email->Body      = 'Attachement:';
					$email->AddAddress( 'a.shukhotski@gmail.com' );

					$file_to_attach = $_SERVER["DOCUMENT_ROOT"].'/backup/'.$filename;

					$email->AddAttachment( $file_to_attach , $filename);

					$status = $email->Send();
					if($output=='') {/* no output is good */} else {/* we have something to log the output here*/}
				} catch (Exception $e) { echo $e->getMessage(); }
				$this->smarty->assign('content', '<h1>MySQL Database Backup</h1><br /><br /><p>'.$status.'</p><br />');
			} else { $this->sendRedirect('error'); }
		} elseif ($_REQUEST['_controller'] == 'generate_sitemap') {
			if (($user != null) and ($user->permissions > 1)) {
				try {
					//$pages = $this->pageDao->distinct();
					$pages = $this->pageDao->findAll();
					foreach ($pages as $page) {
						$url = (($page->parent_id != 'ROOT') and ($page->parent_id != '')) ? '/'.$page->parent_id.'/'.$page->url : '/'.$page->url;
						if ($page->lang != $this->getDefaultLanguage()) { $url .= '?lang='.$page->lang; }
						$entries[] = new xml_sitemap_entry($url, '0.9', 'daily');
					}
					
					$profiles = $this->profileDao->findAll();
					foreach ($profiles as $profile) {
						$url = '/profile/view/'.$profile->id;
						$entries[] = new xml_sitemap_entry($url, '0.9', 'daily');
					}
					
					$matches = $this->matchDao->findByStatus('finished');
					foreach ($matches as $match) {
						$url = '/match/view/'.$match->id;
						$entries[] = new xml_sitemap_entry($url, '0.9', 'daily');
					}

					$conf = new xml_sitemap_generator_config;
					$conf->setDomain(HTTP_COOKIE_DOMAIN);
					$conf->setPath($_SERVER["DOCUMENT_ROOT"]);
					$conf->setFilename('sitemap.xml');
					$conf->setEntries($entries);

					$generator = new xml_sitemap_generator($conf);
					$generator->write();
					
					$xml = file_get_contents('http://'.HTTP_COOKIE_DOMAIN.'/sitemap.xml');
					$xml = str_replace("<", "&lt;", $xml);
					$xml = str_replace(">", "&gt;", $xml);
					$this->smarty->assign('content', '<pre>'.$xml.'</pre>' );
				} catch (Exception $e) { }
			} else { $this->sendRedirect('error'); }
		} elseif ($_REQUEST['_controller'] == 'error') {
			$this->smarty->assign('content', $this->smarty->fetch('content/error404.tpl'));
		} else {		
			$url = (isset($_REQUEST['_action']) and !empty($_REQUEST['_action'])) ? $_REQUEST['_action'] : $_REQUEST['_controller'];
			$page = $this->pageDao->findByUrlAndLanguage($url, $this->getLanguage());
			if ($page != null) {
				if (isset($_POST['action']) and ($user != null) and ($user->permissions > 1)) {
					$page->title = $_POST['title'];
					$page->keywords = $_POST['keywords'];
					$page->body = $_POST['body'];
					$page->parent_id = (isset($_POST['parent_id']) and !empty($_POST['parent_id'])) ? $_POST['parent_id'] : 'ROOT';
					$page->url = isset($_POST['new_url']) ? $_POST['new_url'] : $_POST['url'];
					$url = $_POST['url'];
					switch ($_POST['action']) {
						case 'delete':
							$this->pageDao->delete($url, $page->lang);
							$this->sendRedirect('');
							break;
						case 'edit':
							$this->pageDao->update($page->url, $page->lang, $page->title, $page->body, $page->keywords, $page->parent_id, $url, $page->lang);
							$this->sendRedirect(($page->parent_id != 'ROOT' and $page->parent_id != '') ? $page->parent_id."/".$page->url : $page->url);
							break;
					}
				}
				if (($page->parent_id != 'ROOT' and $page->parent_id != '') and isset($_POST['postComment']) and !empty($_POST['body']) and ($user != null)) {
					try {
						$this->pageDao->postComment($_POST['body'], $page->url, $user->id); 
					} catch (Exception $e) { }
					$this->sendRedirect($page->parent_id.'/'.$page->url);
				}
				if (($page->parent_id != 'ROOT' and $page->parent_id != '') and isset($_POST['deleteComment']) and !empty($_POST['commentId']) and is_numeric($_POST['commentId']) and ($user != null) and ($user->permissions > 1)) {
					try {
						$this->pageDao->deleteComment((int) $_POST['commentId']); 
					} catch (Exception $e) { }
					$this->sendRedirect($page->parent_id.'/'.$page->url);
				}
				$this->smarty->assign('page', $page);
				$this->smarty->assign('subpages', $this->pageDao->findByParentIdAndLanguage($page->url, $this->getLanguage()));
				$this->smarty->assign('comments', $this->pageDao->fetchComments($page->url));
				$this->smarty->assign('content', $this->smarty->fetch('content/page.tpl'));
				
				$meta = (object) array();
				$meta->title = $page->title;
				$meta->keywords = $page->keywords;
				$this->smarty->assign('meta', $meta);
				$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
			} else {
				$this->sendRedirect('error');
			}
		}
		$this->smarty->display('Layout.tpl');
    }
    
}
