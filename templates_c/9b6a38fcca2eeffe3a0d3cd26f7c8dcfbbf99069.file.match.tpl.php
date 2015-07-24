<?php /* Smarty version Smarty-3.0.8, created on 2014-07-19 22:31:43
         compiled from "templates/content/match.tpl" */ ?>
<?php /*%%SmartyHeaderCode:62578986253cac79f9b9570-31742982%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9b6a38fcca2eeffe3a0d3cd26f7c8dcfbbf99069' => 
    array (
      0 => 'templates/content/match.tpl',
      1 => 1405798301,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62578986253cac79f9b9570-31742982',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((isset($_smarty_tpl->getVariable('match',null,true,false)->value)&&($_smarty_tpl->getVariable('match')->value!=null)&&($_smarty_tpl->getVariable('player_a')->value!=null)&&($_smarty_tpl->getVariable('player_b')->value!=null))){?>
	<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('matches',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo $_smarty_tpl->getVariable('match')->value->player_a_name;?>
 - <?php echo $_smarty_tpl->getVariable('match')->value->player_b_name;?>
</h1>
	<p><?php echo mb_substr($_smarty_tpl->getVariable('match')->value->match_date,0,16);?>
</p><br />
	<?php if ((($_smarty_tpl->getVariable('match')->value->status=='unaccepted')&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('match')->value->player_a))){?>
		<p><?php echo localize('competitor',$_smarty_tpl->getVariable('lang')->value);?>
: <a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_b;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_b_name;?>
</a></p>
		<p><?php echo localize('challenge_has_not_been_accepted_yet',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
		<?php if ((!empty($_smarty_tpl->getVariable('match',null,true,false)->value->summary))){?><p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
: <?php echo $_smarty_tpl->getVariable('match')->value->summary;?>
</p><br /><?php }?>
		<form id="challengeForm" name="challengeForm" action="/match/cancel/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
			<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
			<input type="submit" name="cancel" value="<?php echo localize('cancel_match',$_smarty_tpl->getVariable('lang')->value);?>
" />
		</form>
		
	<?php }elseif((($_smarty_tpl->getVariable('match')->value->status=='unaccepted')&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('match')->value->player_b))){?>
		<p><?php echo localize('challenge_has_not_been_accepted_yet',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
		<?php if ((!empty($_smarty_tpl->getVariable('match',null,true,false)->value->summary))){?><p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
: <?php echo $_smarty_tpl->getVariable('match')->value->summary;?>
</p><br /><?php }?>
		<form id="challengeForm" name="challengeForm" action="/match/edit/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
			<table width="100%" cellspacing="5" cellpadding="5" border="0">
				<tr valign="center" align="left">
					<td width="170px">
						<p><?php echo localize('competitor',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					</td>
					<td width="270px">
						<p><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_a_name;?>
</a></p>
						<input type="hidden" name="playerB" value="<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
" />
					</td>
					<td>
						<p> </p>
					</td>
				</tr>
				<tr valign="center" align="left">
					<td width="170px">
						<p><?php echo localize('match_date',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					</td>
					<td width="270px">
						<p><?php echo mb_substr($_smarty_tpl->getVariable('match')->value->match_date,0,16);?>
</p>
					</td>
					<td>
						<p> </p>
					</td>
				</tr>
				<tr valign="center" align="left">
					<td width="170px">
						<p><?php echo localize('max_sets',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					</td>
					<td width="270px">
						<select name="max_sets">
							<option value="3" <?php if (($_smarty_tpl->getVariable('match')->value->max_sets==3)){?>selected<?php }?>>3</option>
						</select>
					</td>
					<td>
						<p> </p>
					</td>
				</tr>
			</table>
			<select name="action">
				<option value="ready"><?php echo localize('accept_challenge',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				<option value="deny"><?php echo localize('deny_challenge',$_smarty_tpl->getVariable('lang')->value);?>
</option>
			</select>
			<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
			<input type="submit" name="edit" value="OK" />
		</form>
	<?php }elseif((($_smarty_tpl->getVariable('match')->value->status=='accepted')&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('match')->value->player_a))){?>
		<p><?php echo localize('challenge_has_been_accepted_but_not_ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
</p>
		<p><?php echo localize('competitor',$_smarty_tpl->getVariable('lang')->value);?>
: <a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_b;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_b_name;?>
</a></p>
		<p><?php echo localize('dont_forget_to_check_match_date',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
		<form id="challengeForm" name="challengeForm" action="/match/edit/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
			<select name="action">
				<option value="ready"><?php echo localize('ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				<option value="deny"><?php echo localize('deny_challenge',$_smarty_tpl->getVariable('lang')->value);?>
</option>
			</select>
			<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
			<input type="submit" name="edit" value="OK" />
		</form>
	<?php }elseif((($_smarty_tpl->getVariable('match')->value->status=='accepted')&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('match')->value->player_b))){?>
		<p><?php echo localize('challenge_has_been_accepted_but_not_ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
</p>
		<p><?php echo localize('wait_until_your_opponent_check_it',$_smarty_tpl->getVariable('lang')->value);?>
</p>
		<p><?php echo localize('competitor',$_smarty_tpl->getVariable('lang')->value);?>
: <a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_a_name;?>
</a></p><br />
		<form id="challengeForm" name="challengeForm" action="/match/edit/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
			<input type="hidden" name="action" value="deny" />
			<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
			<input type="submit" name="edit" value="<?php echo localize('deny_challenge',$_smarty_tpl->getVariable('lang')->value);?>
" />
		</form>
	<?php }elseif((($_smarty_tpl->getVariable('match')->value->status=='ready_to_play')||($_smarty_tpl->getVariable('match')->value->status=='to_be_continued')||($_smarty_tpl->getVariable('match')->value->status=='finished')||($_smarty_tpl->getVariable('match')->value->status=='cup'))){?>
		<?php if (($_smarty_tpl->getVariable('match')->value->status=='ready_to_play')){?>
			<p><?php echo localize('match_is_ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			<p><?php echo localize('waiting_for_results',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
		<?php }?>
		<?php if (($_smarty_tpl->getVariable('match')->value->status=='to_be_continued')){?>
			<p><?php echo localize('to_be_continued',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
		<?php }?> 
		
		<?php if ((!empty($_smarty_tpl->getVariable('match',null,true,false)->value->summary))){?><p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
: <?php echo $_smarty_tpl->getVariable('match')->value->summary;?>
</p><br /><?php }?>
		<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
			<form id="challengeForm" name="challengeForm" action="/match/edit/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
				<p><?php echo localize('edit_general_info',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
				<table width="100%" cellspacing="5" cellpadding="5" border="0">
					<tr valign="center" align="left">
						<td width="150px" colspan="3">
							<p><?php echo localize('match_date',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
							<div id="calendar" class="calendar"></div>
							<input type="hidden" name="date" id="date" value="<?php echo $_smarty_tpl->getVariable('match')->value->match_date;?>
" />
						</td>
					</tr>
					<tr valign="center" align="left">
						<td width="170px">
							<p><?php echo localize('match_time',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
						</td>
						<td width="270px">
							<select name="hour">
								<?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hours')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
?>
									<option value="<?php echo $_smarty_tpl->tpl_vars['h']->value;?>
" <?php if ((mb_substr($_smarty_tpl->getVariable('match')->value->match_date,11,2)==$_smarty_tpl->tpl_vars['h']->value)){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['h']->value;?>
:00</option>
								<?php }} ?>
							</select>
						</td>
						<td>
							<p> </p>
						</td>
					</tr>
					<tr valign="center" align="left">
						<td width="170px">
							<p><?php echo localize('max_sets',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
						</td>
						<td width="270px">
							<select name="max_sets">
								<option value="3" <?php if (($_smarty_tpl->getVariable('match')->value->max_sets==3)){?>selected<?php }?>>3</option>
							</select>
						</td>
						<td>
							<p> </p>
						</td>
					</tr>
					<tr valign="center" align="left">
						<td colspan="3">
							<p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
							<textarea name="summary"><?php echo $_smarty_tpl->getVariable('match')->value->summary;?>
</textarea>
						</td>
					</tr>
				</table>
		<?php }?>
		
		<table width="100%" cellspacing="2" cellpadding="2" border="1" class="matches">
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_a_name;?>
</a></strong></p>
				</td>
				<td class="score">
					<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
						<input type="text" name="set_1_a" value="<?php echo $_smarty_tpl->getVariable('match')->value->set_1_a;?>
" style="width: 20px" />
					<?php }else{ ?>
						<p><?php if (($_smarty_tpl->getVariable('match')->value->set_1_a>$_smarty_tpl->getVariable('match')->value->set_1_b)){?><strong><?php }?><?php echo $_smarty_tpl->getVariable('match')->value->set_1_a>0||$_smarty_tpl->getVariable('match')->value->set_1_b>0 ? $_smarty_tpl->getVariable('match')->value->set_1_a : '-';?>
<?php if (($_smarty_tpl->getVariable('match')->value->set_1_a>$_smarty_tpl->getVariable('match')->value->set_1_b)){?></strong><?php }?></p>
					<?php }?>
				</td>
				<td class="score">
					<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
						<input type="text" name="set_2_a" value="<?php echo $_smarty_tpl->getVariable('match')->value->set_2_a;?>
" style="width: 20px" />
					<?php }else{ ?>
						<p><?php if (($_smarty_tpl->getVariable('match')->value->set_2_a>$_smarty_tpl->getVariable('match')->value->set_2_b)){?><strong><?php }?><?php echo $_smarty_tpl->getVariable('match')->value->set_2_a>0||$_smarty_tpl->getVariable('match')->value->set_2_b>0 ? $_smarty_tpl->getVariable('match')->value->set_2_a : '-';?>
<?php if (($_smarty_tpl->getVariable('match')->value->set_2_a>$_smarty_tpl->getVariable('match')->value->set_2_b)){?></strong><?php }?></p>
					<?php }?>
				</td>
				<td class="score">
					<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
						<input type="text" name="set_3_a" value="<?php echo $_smarty_tpl->getVariable('match')->value->set_3_a;?>
" style="width: 20px" />
					<?php }else{ ?>
						<p><?php if (($_smarty_tpl->getVariable('match')->value->set_3_a>$_smarty_tpl->getVariable('match')->value->set_3_b)){?><strong><?php }?><?php echo $_smarty_tpl->getVariable('match')->value->set_3_a>0||$_smarty_tpl->getVariable('match')->value->set_3_b>0 ? $_smarty_tpl->getVariable('match')->value->set_3_a : '-';?>
<?php if (($_smarty_tpl->getVariable('match')->value->set_3_a>$_smarty_tpl->getVariable('match')->value->set_3_b)){?></strong><?php }?></p>
					<?php }?>
				</td>
			</tr>
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_b;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_b_name;?>
</a></strong></p>
				</td>
				<td class="score">
					<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
						<input type="text" name="set_1_b" value="<?php echo $_smarty_tpl->getVariable('match')->value->set_1_b;?>
" style="width: 20px" />
					<?php }else{ ?>
						<p><?php if (($_smarty_tpl->getVariable('match')->value->set_1_a<$_smarty_tpl->getVariable('match')->value->set_1_b)){?><strong><?php }?><?php echo $_smarty_tpl->getVariable('match')->value->set_1_a>0||$_smarty_tpl->getVariable('match')->value->set_1_b>0 ? $_smarty_tpl->getVariable('match')->value->set_1_b : '-';?>
<?php if (($_smarty_tpl->getVariable('match')->value->set_1_a<$_smarty_tpl->getVariable('match')->value->set_1_b)){?><strong><?php }?></p>
					<?php }?>
				</td>
				<td class="score">
					<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
						<input type="text" name="set_2_b" value="<?php echo $_smarty_tpl->getVariable('match')->value->set_2_b;?>
" style="width: 20px" />
					<?php }else{ ?>
						<p><?php if (($_smarty_tpl->getVariable('match')->value->set_2_a<$_smarty_tpl->getVariable('match')->value->set_2_b)){?><strong><?php }?><?php echo $_smarty_tpl->getVariable('match')->value->set_2_a>0||$_smarty_tpl->getVariable('match')->value->set_2_b>0 ? $_smarty_tpl->getVariable('match')->value->set_2_b : '-';?>
<?php if (($_smarty_tpl->getVariable('match')->value->set_2_a<$_smarty_tpl->getVariable('match')->value->set_2_b)){?><strong><?php }?></p>
					<?php }?>
				</td>
				<td class="score">
					<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
						<input type="text" name="set_3_b" value="<?php echo $_smarty_tpl->getVariable('match')->value->set_3_b;?>
" style="width: 20px" />
					<?php }else{ ?>
						<p><?php if (($_smarty_tpl->getVariable('match')->value->set_3_a<$_smarty_tpl->getVariable('match')->value->set_3_b)){?><strong><?php }?><?php echo $_smarty_tpl->getVariable('match')->value->set_3_a>0||$_smarty_tpl->getVariable('match')->value->set_3_b>0 ? $_smarty_tpl->getVariable('match')->value->set_3_b : '-';?>
<?php if (($_smarty_tpl->getVariable('match')->value->set_3_a<$_smarty_tpl->getVariable('match')->value->set_3_b)){?><strong><?php }?></p>
					<?php }?>
				</td>
			</tr>	
		</table>
		<br />
		<table class="versus" width="100%" cellpadding="5" style="color: #FFFFFF">
			<tr valign="top">
				<td width="190px" align="center">
					<strong><?php echo $_smarty_tpl->getVariable('player_a')->value->name;?>
</strong>
					<img src="<?php echo $_smarty_tpl->getVariable('player_a')->value->photo_url;?>
" width="170px" border="1" style="background: #EEEEEE" />
				</td>
				<td colspan="2" align="center">
					<h2 class="yellow">VS</h2>
					<table width="100%" border="1" style="color: #000000">
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('age',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php echo calculateAge($_smarty_tpl->getVariable('player_a')->value->birthday);?>
</td>
							<td align="left"><?php echo calculateAge($_smarty_tpl->getVariable('player_b')->value->birthday);?>
</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('height',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php echo $_smarty_tpl->getVariable('player_a')->value->height;?>
</td>
							<td align="left"><?php echo $_smarty_tpl->getVariable('player_b')->value->height;?>
</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('weight',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php echo $_smarty_tpl->getVariable('player_a')->value->weight;?>
</td>
							<td align="left"><?php echo $_smarty_tpl->getVariable('player_b')->value->weight;?>
</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('plays',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php echo localize($_smarty_tpl->getVariable('player_a')->value->plays,$_smarty_tpl->getVariable('lang')->value);?>
</td>
							<td align="left"><?php echo localize($_smarty_tpl->getVariable('player_b')->value->plays,$_smarty_tpl->getVariable('lang')->value);?>
</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('backhand',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php echo localize($_smarty_tpl->getVariable('player_a')->value->backhand,$_smarty_tpl->getVariable('lang')->value);?>
</td>
							<td align="left"><?php echo localize($_smarty_tpl->getVariable('player_b')->value->backhand,$_smarty_tpl->getVariable('lang')->value);?>
</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('racket',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php echo localize($_smarty_tpl->getVariable('player_a')->value->racket,$_smarty_tpl->getVariable('lang')->value);?>
</td>
							<td align="left"><?php echo localize($_smarty_tpl->getVariable('player_b')->value->racket,$_smarty_tpl->getVariable('lang')->value);?>
</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong><?php echo localize('rating',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
						</tr>
						<tr valign="top">
							<td align="right"><?php if (($_smarty_tpl->getVariable('player_a')->value->progress!=0)){?><b><?php echo $_smarty_tpl->getVariable('player_a')->value->position;?>
</b><br />(<?php echo $_smarty_tpl->getVariable('player_a')->value->points;?>
 pts)<?php }else{ ?>-<?php }?></td>
							<td align="left"><?php if (($_smarty_tpl->getVariable('player_b')->value->progress!=0)){?><b><?php echo $_smarty_tpl->getVariable('player_b')->value->position;?>
</b><br />(<?php echo $_smarty_tpl->getVariable('player_b')->value->points;?>
 pts)<?php }else{ ?>-<?php }?></td>
						</tr>
						<?php if ((isset($_smarty_tpl->getVariable('prev_matches',null,true,false)->value)&&(count($_smarty_tpl->getVariable('prev_matches')->value)>0))){?>
							<tr valign="top" align="center" bgcolor="#EEEEEE">
								<td colspan="2"><strong><?php echo localize('match_history',$_smarty_tpl->getVariable('lang')->value);?>
</strong></td>
							</tr>
							<?php  $_smarty_tpl->tpl_vars['pmatch'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('prev_matches')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['pmatch']->key => $_smarty_tpl->tpl_vars['pmatch']->value){
?>
								<tr valign="top" align="left">
									<td colspan="2">
										<?php echo mb_substr($_smarty_tpl->getVariable('pmatch')->value->match_date,0,16);?>
:
										<?php echo $_smarty_tpl->getVariable('pmatch')->value->set_1_a;?>
 - <?php echo $_smarty_tpl->getVariable('pmatch')->value->set_1_b;?>
, <?php echo $_smarty_tpl->getVariable('pmatch')->value->set_2_a;?>
 - <?php echo $_smarty_tpl->getVariable('pmatch')->value->set_2_b;?>
<?php if (($_smarty_tpl->getVariable('pmatch')->value->set_3_a>0||$_smarty_tpl->getVariable('pmatch')->value->set_3_b>0)){?>, <?php echo $_smarty_tpl->getVariable('pmatch')->value->set_3_a;?>
 - <?php echo $_smarty_tpl->getVariable('pmatch')->value->set_3_b;?>
<?php }?><br />
										<?php echo localize('winner',$_smarty_tpl->getVariable('lang')->value);?>
: <?php if ((($_smarty_tpl->getVariable('pmatch')->value->set_1_a>$_smarty_tpl->getVariable('pmatch')->value->set_1_b&&($_smarty_tpl->getVariable('pmatch')->value->set_2_a>$_smarty_tpl->getVariable('pmatch')->value->set_2_b||$_smarty_tpl->getVariable('pmatch')->value->set_3_a>$_smarty_tpl->getVariable('pmatch')->value->set_3_b))||($_smarty_tpl->getVariable('pmatch')->value->set_2_a>$_smarty_tpl->getVariable('pmatch')->value->set_2_b&&($_smarty_tpl->getVariable('pmatch')->value->set_1_a>$_smarty_tpl->getVariable('pmatch')->value->set_1_b||$_smarty_tpl->getVariable('pmatch')->value->set_3_a>$_smarty_tpl->getVariable('pmatch')->value->set_3_b)))){?><?php echo $_smarty_tpl->getVariable('pmatch')->value->player_a_name;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('pmatch')->value->player_b_name;?>
<?php }?>
									</td>
								</tr>
							<?php }} ?>
						<?php }?>
					</table>
				</td>
				<td width="190px" align="center">
					<strong><?php echo $_smarty_tpl->getVariable('player_b')->value->name;?>
</strong>
					<img src="<?php echo $_smarty_tpl->getVariable('player_b')->value->photo_url;?>
" width="170px" border="1" style="background: #EEEEEE" />
				</td>
			</tr>
		</table>
		<br />
			
		<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>0))){?>
				<select name="action"> 
					<option value="update"><?php echo localize('finished',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<?php if (($_smarty_tpl->getVariable('match')->value->status!='finished')){?><option value="continue" <?php if (($_smarty_tpl->getVariable('match')->value->status=='to_be_continued')){?>selected<?php }?>><?php echo localize('to_be_continued',$_smarty_tpl->getVariable('lang')->value);?>
</option><?php }?>
				</select>
				<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
				<input type="submit" name="edit" value="OK" />
			</form><br />
			<?php if (($_smarty_tpl->getVariable('user')->value->permissions>3)){?>
				<form id="deleteForm" name="deleteForm" action="/match/cancel/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
					<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
					<input type="submit" name="cancel" value="<?php echo localize('cancel_match',$_smarty_tpl->getVariable('lang')->value);?>
" />
				</form>
			<?php }?>
		<?php }?>
	<?php }elseif((($_smarty_tpl->getVariable('match')->value->status=='denied')&&($_smarty_tpl->getVariable('user')->value!=null))){?>
		<p><?php echo localize('match_was_denied',$_smarty_tpl->getVariable('lang')->value);?>
</p>
		<?php if (($_smarty_tpl->getVariable('match')->value->player_a==$_smarty_tpl->getVariable('user')->value->id)){?>
			<p><?php echo localize('would_you_like_to_cancel_it',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
			<form id="deleteForm" name="deleteForm" action="/match/cancel/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
				<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
				<input type="submit" name="cancel" value="<?php echo localize('cancel_match',$_smarty_tpl->getVariable('lang')->value);?>
" />
			</form>
		<?php }?>
	<?php }else{ ?>
		...
	<?php }?>
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>