<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Alexander
 * Date: 11.06.13
 * Time: 22:48
 * To change this template use File | Settings | File Templates.
 */

class matchController extends Controller {

    public function __construct() {
        parent::__construct();
    }
	
	private function fillData($values) {
		$data = (object) array();
		if (!empty($values)) {
			foreach ($values as $key=>$value) {
				$data->$key = $value;
			}
		}
		return $data;
	}
	
	private function getK($id) {
		$count = 0;
		try {
			$count = $this->matchDao->countByPlayerAorBandStatus($id, 'finished')->matches_count;
		} catch (Exception $e) { }
		if ($count < 15) { return 30; }
		if ($count >= 15 and $count < 30) { return 15; }
		if ($count >= 30) { return 10; }
	}
	
	private function elo($player_a, $player_b, $s) {
		$p_a = 1 / (1 + pow(10, ($player_b->points - $player_a->points) / 400));
		$r_a_new = $player_a->points + 20 * ($s - $p_a);
		//$r_a_new = $player_a->points + $this->getK($player_a->id) * ($s - $p_a);

		$p_b = 1 - $p_a;
		$r_b_new = $player_b->points + 20 * (1 - $s - $p_b);
		//$p_b = 1 / (1 + pow(10, ($player_a->points - $player_b->points) / 400));
		//$r_b_new = $player_b->points + $this->getK($player_b->id) * (1 - $s - $p_b);

		try {
			$this->profileDao->updateRating($player_a->id, $r_a_new, $r_a_new - $player_a->points);
			$this->profileDao->updateRating($player_b->id, $r_b_new, $r_b_new - $player_b->points);
		} catch (Exception $e) { }
	}
	
	private function validate($values, $current_password) {
		$status = true;
		if (!empty($values)) {
			try {
				($current_password != $values->current_password) and $status = false;
				!preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $values->email) and $status = false;
				!preg_match("/^[a-zA-Z0-9]{6,}$/", $values->password) and $status = false;
				!preg_match("/^([a-zA-Zа-яА-Яўі'\-]+\ )*[a-zA-Zа-яА-Яўі'\-]+$/u", $values->name) and $status = false;
			} catch (Exception $e) { $status = false; }
		} else { $status = false; }
		return $status;
	}

    public function render() {
		$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;
		$user = ($user != null) ? $this->profileDao->findById($user->id) : null;
		if (!isset($_REQUEST['_action']) or (empty($_REQUEST['_action']))) { 
			$this->sendRedirect('match/list');
		}
		if (!empty($_REQUEST['_action']) and is_numeric($_REQUEST['_action'])) { $this->sendRedirect('match/view/'.$_REQUEST['_action']); }
		switch ($_REQUEST['_action']) {
			case 'cup':
				try {
					$matches = $this->matchDao->findByStatus('cup');
					$this->smarty->assign('matches', $matches);
				} catch (Exception $e) { }
				$this->smarty->assign('content', $this->smarty->fetch('content/matches.tpl'));
				break;
			case 'new_cup':
				if (($user != null) && ($user->permissions > 0)) {
					if (isset($_POST['action']) && !empty($_POST['player_a']) && !empty($_POST['player_b']) && is_numeric($_POST['player_a']) && is_numeric($_POST['player_b'])) {
						try {
							$match_date = $_POST['date']." ".$_POST['hour'].":00";
							$max_sets = 3;
							$player_a = $this->profileDao->findById((int) $_POST['player_a']);
							$player_b = $this->profileDao->findById((int) $_POST['player_b']);
							$summary = $_POST['summary'];
							if (($player_a != null) && ($player_b != null)) {
								$this->matchDao->create($match_date, $max_sets, $player_a->id, $player_b->id, $summary, 'cup');
								$this->sendRedirect('match/cup');
							} else { $this->sendRedirect('error'); }
						} catch (Exception $e) { echo $e->getMessage(); exit; }
					}
					$this->smarty->assign('profiles', $this->profileDao->findAll());
					$this->smarty->assign('content', $this->smarty->fetch('content/new_cup.tpl'));
				} else { $this->sendRedirect('signup'); }
				break;
			case 'view':
				if (isset($_REQUEST['_id']) and is_numeric($_REQUEST['_id'])) {
					$id = (int) $_REQUEST['_id'];
					if ($user != null) { $this->smarty->assign('profile', $user); }
					try {
						$match = $this->matchDao->findById($id);
						if ($match != null and !in_array($match->status, array('ready_to_play', 'to_be_continued', 'finished', 'cup'))) {
							if (($user != null and !in_array($user->id, array($match->player_a, $match->player_b))) or $user == null) { $match = null; }
						}
						if ($match != null) {
							$this->smarty->assign('match', $match);
							$this->smarty->assign('player_a', $this->profileDao->findById($match->player_a));
							$this->smarty->assign('player_b', $this->profileDao->findById($match->player_b));
							$this->smarty->assign('prev_matches', $this->matchDao->findByPlayerAandBandStatus($match->player_a, $match->player_b, 'finished'));
						}
					} catch (Exception $e) { }
					
				} else {
					$this->sendRedirect('match/list');
				}
				$this->smarty->assign('content', $this->smarty->fetch('content/match.tpl'));
				break;
			case 'auction':
				if (isset($_POST['action']) and ($user != null)) {
					switch ($_POST['action']) {
						case 'new':
							try {
								$match_date = $_POST['date']." ".$_POST['hour'].":00";
								$max_sets = 3;
								$summary = $_POST['summary'];
								$this->matchDao->create($match_date, $max_sets, $user->id, $user->id, $summary, 'auction');
							} catch (Exception $e) { echo $e->getMessage(); exit; }
							break;
						case 'accept':
							try {
								$match = $this->matchDao->findById((int) $_POST['id']);
								if (($match != null) and ($match->player_a != $user->id) and ($match->player_b == $match->player_a)) {
									$match->player_b = $user->id;
									$this->matchDao->update($match->id, $match->match_date, 3, $match->player_a, $match->player_b, $match->set_1_a, $match->set_1_b, $match->set_2_a, $match->set_2_b, $match->set_3_a, $match->set_3_b, $match->summary, 'ready_to_play');
									$this->sendRedirect('match/view/'.$match->id);
								}
							} catch (Exception $e) { }
							break;
						case 'cancel':
							try {
								$match = $this->matchDao->findById((int) $_POST['id']);
								if (($match != null) and (($match->player_a == $user->id) or ($user->permissions > 0))) {
									$this->matchDao->delete($match->id);
								}
							} catch (Exception $e) { }
							break;
						/*default:
							$this->sendRedirect('error');*/
					}
					$this->sendRedirect('match/auction');
				}
				$this->smarty->assign('matches', $this->matchDao->findAuctionsOnly());
				$this->smarty->assign('content', $this->smarty->fetch('content/auction.tpl'));
				break;
			/*case 'random':
				if ($user != null) {
					if (isset($_POST['challenge'])) {
						$profile = $this->profileDao->random();
						$match_date = $_POST['date']." ".$_POST['hour'].":00";
						$max_sets = 3;
						$summary = $_POST['summary'];
						try {
							$this->matchDao->create($match_date, $max_sets, $user->id, $profile->id, $summary, 'unaccepted');
							$match_id = $this->matchDao->randomMatchId($match_date, $user->id, $profile->id)->id;
							$subject = localize('unaccepted', $this->getLanguage());
							$headers = "From: Tennisworld.by <info@tennisworld.by>\r\nContent-type: text/html; charset=utf-8 \r\n";
							if (preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $profile->email)) {
								mail ($profile->email, $subject, $match_date." \r\n".localize('competitor', $this->getLanguage()).": ".$user->name." \r\n", $headers);
							}
							$this->sendRedirect('match/view/'.$match_id);
						} catch (Exception $e) { $this->sendRedirect('error'); }
					}
					$this->smarty->assign('content', $this->smarty->fetch('content/random.tpl'));
				} else { $this->sendRedirect('profile/list'); }
				break;*/
			case 'new':
				if (isset($_REQUEST['_id']) and !empty($_REQUEST['_id']) and is_numeric($_REQUEST['_id']) and $user != null) {
					$profile = $this->profileDao->findById((int) $_REQUEST['_id']);
					if ($profile != null) {
						if (isset($_POST['challenge'])) { 
							if (($_POST['playerB'] == $_REQUEST['_id']) and !empty($_POST['date'])) {
								$match_date = $_POST['date']." ".$_POST['hour'].":00";
								$max_sets = 3;
								$summary = $_POST['summary'];
								try {
									$this->matchDao->create($match_date, $max_sets, $user->id, $profile->id, $summary, 'unaccepted');

									$subject = localize('unaccepted', $this->getLanguage());
									$headers = "From: Tennisworld.by <info@tennisworld.by>\r\nContent-type: text/html; charset=utf-8 \r\n";
									if (preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $profile->email)) {
										mail ($profile->email, $subject, $match_date." \r\n".localize('competitor', $this->getLanguage()).": ".$user->name." \r\n", $headers);
									}
								} catch (Exception $e) { }
							}
							$this->sendRedirect('match/my');
						}
						$this->smarty->assign('profile', $profile);
						$this->smarty->assign('content', $this->smarty->fetch('content/challenge.tpl'));
					} else { $this->sendRedirect('profile/list'); }
				} else { $this->sendRedirect('profile/list'); }
				break;
			case 'cancel':
				(!isset($_REQUEST['_id']) and !empty($_POST['_id'])) and $_REQUEST['_id'] = $_POST['_id'];
				if (!empty($_REQUEST['_id']) and is_numeric($_REQUEST['_id']) and ($user != null)) {
					try {
						$match = $this->matchDao->findById((int) $_REQUEST['_id']);
						if (($match != null) and (($match->player_a == $user->id) or ($user->permissions > 0))) {
							$this->matchDao->delete((int) $_REQUEST['_id']);
						}
					} catch (Exception $e) { }
				}
				$this->sendRedirect('match/my');
				break;
			case 'edit':
				(!isset($_REQUEST['_id']) and !empty($_POST['_id'])) and $_REQUEST['_id'] = $_POST['_id'];
				if (!empty($_REQUEST['_id']) and is_numeric($_REQUEST['_id']) and ($user != null)) {
					try {
					$match = $this->matchDao->findById((int) $_REQUEST['_id']);
						if (($match != null) and (($match->player_a == $user->id) or ($match->player_b == $user->id) or ($user->permissions > 0))) {
							switch ($_POST['action']) {
								case 'accept':
									$match->match_date = $_POST['date']." ".$_POST['hour'].":00";
									$match->max_sets = 3;
									$match->status = 'accepted';
									break;
								case 'deny':
									$match->status = 'denied';
									break;
								case 'ready':
									$match->status = 'ready_to_play';
									break;
								case 'continue':
									if ($user->permissions > 0) {
										$match->status = 'to_be_continued';
										$match->match_date = $_POST['date']." ".$_POST['hour'].":00";
										$match->set_1_a = $_POST['set_1_a'];
										$match->set_2_a = $_POST['set_2_a'];
										$match->set_3_a = $_POST['set_3_a'];
										$match->set_1_b = $_POST['set_1_b'];
										$match->set_2_b = $_POST['set_2_b'];
										$match->set_3_b = $_POST['set_3_b'];
										$match->summary = $_POST['summary'];
										$match->max_sets = 3;
									}
									break;

								case 'update':
									if ($user->permissions > 0) {
										$match->match_date = $_POST['date']." ".$_POST['hour'].":00";
										
										$match->set_1_a = $_POST['set_1_a'];
										/*$match->set_1_a_aces = $_POST['set_1_a_aces'];
										$match->set_1_a_faults = $_POST['set_1_a_faults'];
										$match->set_1_a_first_serve = $_POST['set_1_a_first_serve'];
										$match->set_1_a_second_serve = $_POST['set_1_a_second_serve'];*/
										
										$match->set_2_a = $_POST['set_2_a'];
										/*$match->set_2_a_aces = $_POST['set_2_a_aces'];
										$match->set_2_a_faults = $_POST['set_2_a_faults'];
										$match->set_2_a_first_serve = $_POST['set_2_a_first_serve'];
										$match->set_2_a_second_serve = $_POST['set_2_a_second_serve'];*/
										
										$match->set_3_a = $_POST['set_3_a'];
										/*$match->set_3_a_aces = $_POST['set_3_a_aces'];
										$match->set_3_a_faults = $_POST['set_3_a_faults'];
										$match->set_3_a_first_serve = $_POST['set_3_a_first_serve'];
										$match->set_3_a_second_serve = $_POST['set_3_a_second_serve'];*/
										
										$match->set_1_b = $_POST['set_1_b'];
										/*$match->set_1_b_aces = $_POST['set_1_b_aces'];
										$match->set_1_b_faults = $_POST['set_1_b_faults'];
										$match->set_1_b_first_serve = $_POST['set_1_b_first_serve'];
										$match->set_1_b_second_serve = $_POST['set_1_b_second_serve'];*/
										
										$match->set_2_b = $_POST['set_2_b'];
										/*$match->set_2_b_aces = $_POST['set_2_b_aces'];
										$match->set_2_b_faults = $_POST['set_2_b_faults'];
										$match->set_2_b_first_serve = $_POST['set_2_b_first_serve'];
										$match->set_2_b_second_serve = $_POST['set_2_b_second_serve'];*/
										
										$match->set_3_b = $_POST['set_3_b'];
										/*$match->set_3_b_aces = $_POST['set_3_b_aces'];
										$match->set_3_b_faults = $_POST['set_3_b_faults'];
										$match->set_3_b_first_serve = $_POST['set_3_b_first_serve'];
										$match->set_3_b_second_serve = $_POST['set_3_b_second_serve'];*/
										
										if ($match->max_sets > 3) {
											/*$match->set_4_a = $_POST['set_4_a'];
											$match->set_5_a = $_POST['set_5_a'];
											$match->set_4_b = $_POST['set_4_b'];
											$match->set_5_b = $_POST['set_5_b'];*/
										}

										$match->max_sets = 3;
										$match->summary = $_POST['summary'];
										
										if ($match->status == 'ready_to_play' or $match->status == 'to_be_continued') {
											$match->player_a_points = $this->profileDao->findById($match->player_a)->points;
											$match->player_b_points = $this->profileDao->findById($match->player_b)->points;
											
											$s = ((($match->set_1_a > $match->set_1_b) and ($match->set_2_a  > $match->set_2_b or $match->set_3_a > $match->set_3_b)) or (($match->set_2_a > $match->set_2_b) and ($match->set_1_a  > $match->set_1_b or $match->set_3_a > $match->set_3_b))) ? 1 : 0;
											$this->elo($this->profileDao->findById($match->player_a), $this->profileDao->findById($match->player_b), $s);
											
											$match->player_a_diff = $this->profileDao->findById($match->player_a)->points - $match->player_a_points;
											$match->player_b_diff = $this->profileDao->findById($match->player_b)->points - $match->player_b_points;
											$match->player_a_points += $match->player_a_diff;
											$match->player_b_points += $match->player_b_diff;
										}
										
										$match->status = ($match->status == 'cup') ? 'cup' : 'finished';
									}
									break;
							}
							$this->matchDao->update($match->id, $match->match_date, 3, $match->player_a, $match->player_b, $match->set_1_a, $match->set_1_b, $match->set_2_a, $match->set_2_b, $match->set_3_a, $match->set_3_b, $match->summary, $match->status, $match->player_a_points, $match->player_b_points, $match->player_a_diff, $match->player_b_diff);
							$subject = localize($match->status, $this->getLanguage());
							$headers = "From: Tennisworld.by <info@tennisworld.by>\r\nContent-type: text/html; charset=utf-8 \r\n";
							if (($match->status == 'ready_to_play') and preg_match("/^([a-zA-Z0-9_\-]+\.)*[a-zA-Z0-9_\-]+@([a-zA-Z0-9][a-zA-Z0-9\-]*[a-zA-Z0-9]\.)+[a-zA-Z]{2,6}$/", $this->profileDao->findById($match->player_a)->email)) {
								mail ($this->profileDao->findById($match->player_a)->email, $subject, $match->match_date." \r\n".localize('competitor', $this->getLanguage()).": ".$this->profileDao->findById($match->player_b)->name." \r\n", $headers);
							}	
						}
					} catch (Exception $e) { }
					$this->sendRedirect('match/view/'.$_REQUEST['_id']);
				}
				$this->sendRedirect('match/my');
				break;
			case 'my':
				if ($user != null) {
					try {
						$matches = (isset($_REQUEST['_id']) and in_array($_REQUEST['_id'], array('unaccepted', 'accepted', 'ready_to_play', 'to_be_continued', 'finished', 'denied', 'cup'))) ? $this->matchDao->findByPlayerAorBandStatus($user->id, $_REQUEST['_id']) : $this->matchDao->findByPlayerAorB($user->id);
						$this->smarty->assign('matches', $matches);
					} catch (Exception $e) { }
					$this->smarty->assign('content', $this->smarty->fetch('content/matches.tpl'));
				} else { $this->sendRedirect('match/list'); }
				break;
			case 'player':
				if (isset($_REQUEST['_id']) and is_numeric($_REQUEST['_id'])) {
					try {
						$matches = $this->matchDao->findByPlayerAorBandStatus((int) $_REQUEST['_id'], 'finished');
						$this->smarty->assign('matches', $matches);
					} catch (Exception $e) { }
				}
				$this->smarty->assign('content', $this->smarty->fetch('content/matches.tpl'));
				break;
			case 'list':
			default:
				try {
					if (!isset($_REQUEST['_id']) or !in_array($_REQUEST['_id'], array('ready_to_play', 'to_be_continued', 'finished'))) {
						$matches = array_merge($this->matchDao->findByStatus('ready_to_play'), $this->matchDao->findByStatus('to_be_continued'), $this->matchDao->findByStatus('finished'));
					} else {
						$matches = $this->matchDao->findByStatus($_REQUEST['_id']);
					}
					$this->smarty->assign('matches', $matches);
				} catch (Exception $e) { }
				$this->smarty->assign('content', $this->smarty->fetch('content/matches.tpl'));
				break;
		}
		$meta = (object) array();
		$meta->title = localize('matches', $this->getLanguage());
		$meta->keywords = '';
		$this->smarty->assign('meta', $meta);
		$this->smarty->assign('head', $this->smarty->fetch('head.tpl'));
		$this->smarty->display('Layout.tpl');
    }
    
}
