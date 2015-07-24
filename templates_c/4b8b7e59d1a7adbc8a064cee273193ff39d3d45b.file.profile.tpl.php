<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:29:59
         compiled from "templates/content/profile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:803879686534591a726ca12-97216938%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4b8b7e59d1a7adbc8a064cee273193ff39d3d45b' => 
    array (
      0 => 'templates/content/profile.tpl',
      1 => 1397046910,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '803879686534591a726ca12-97216938',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('people',$_smarty_tpl->getVariable('lang')->value);?>
 <?php if ((isset($_smarty_tpl->getVariable('profile',null,true,false)->value)&&($_smarty_tpl->getVariable('profile')->value!=null))){?>| <?php echo $_smarty_tpl->getVariable('profile')->value->name;?>
<?php }?></h1>
<?php if ((isset($_smarty_tpl->getVariable('profile',null,true,false)->value)&&($_smarty_tpl->getVariable('profile')->value!=null))){?>
	<?php if ((lastVisit($_smarty_tpl->getVariable('profile')->value->online)<5)){?>
		<p><span style="color: grey">online</span></p>
	<?php }else{ ?>
		<p><span style="color: grey"><?php echo localize('last_visit',$_smarty_tpl->getVariable('lang')->value);?>
: <?php if (($_smarty_tpl->getVariable('profile')->value->online!='0000-00-00 00:00:00')){?><?php echo $_smarty_tpl->getVariable('profile')->value->online;?>
<?php }else{ ?><?php echo localize('a_long_time_ago',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?></span></p>
	<?php }?>
<?php }?>
<br />
<?php if ((isset($_smarty_tpl->getVariable('profile',null,true,false)->value)&&($_smarty_tpl->getVariable('profile')->value!=null))){?>
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="220px" rowspan="13">
				<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>2)&&($_smarty_tpl->getVariable('user')->value->permissions>$_smarty_tpl->getVariable('profile')->value->permissions))){?>
					<form id="adminForm" name="adminForm" action="/profile/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
						<input type="hidden" name="action" value="access" />
						<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
" />
						<select name="permissions">
							<option value="0" <?php if (($_smarty_tpl->getVariable('profile')->value->permissions==0)){?>selected<?php }?>><?php echo localize('user',$_smarty_tpl->getVariable('lang')->value);?>
</option>
							<option value="1" <?php if (($_smarty_tpl->getVariable('profile')->value->permissions==1)){?>selected<?php }?>><?php echo localize('match_manager',$_smarty_tpl->getVariable('lang')->value);?>
</option>
							<option value="2" <?php if (($_smarty_tpl->getVariable('profile')->value->permissions==2)){?>selected<?php }?>><?php echo localize('content_manager',$_smarty_tpl->getVariable('lang')->value);?>
</option>
							<?php if (($_smarty_tpl->getVariable('user')->value->permissions>3)){?><option value="3" <?php if (($_smarty_tpl->getVariable('profile')->value->permissions==3)){?>selected<?php }?>><?php echo localize('administrator',$_smarty_tpl->getVariable('lang')->value);?>
</option><?php }?>
						</select>
						<input type="submit" name="submit" value="OK" />
					</form>
					<?php if (($_smarty_tpl->getVariable('user')->value->permissions>3)){?>
						<form id="deleteForm" name="deleteForm" action="/profile/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
							<input type="hidden" name="action" value="delete" />
							<input type="hidden" name="_id" value="<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
" />
							<input type="submit" name="submit" value="delete" />
						</form>
					<?php }?>
				<?php }?>
				<img class="profile-image" src="<?php echo $_smarty_tpl->getVariable('profile')->value->photo_url;?>
" /><br />
				<div class="profile-sidebar">
					<ul>
						<li><a href="/match/player/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('matches',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
						<li><a href="/contact/followers/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('followers',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
						<li><a href="/contact/following/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('followings',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
					<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('profile')->value->id))){?>
						<li><a href="/profile/edit<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('edit',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
						</ul>
					<?php }elseif((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id!=$_smarty_tpl->getVariable('profile')->value->id))){?>
						<?php if ((isset($_smarty_tpl->getVariable('followed',null,true,false)->value)&&($_smarty_tpl->getVariable('followed')->value>0))){?>
							<li><a href="/contact/remove/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('unfollow',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
						<?php }else{ ?>
							<li><a href="/contact/new/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('follow',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
						<?php }?>
						<li><a href="/match/new/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><span style="font-size: 16px"><?php echo localize('call_for_match',$_smarty_tpl->getVariable('lang')->value);?>
</span></a></li>
						<li><a href="/conversation/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('start_conversation',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
						</ul>
					<?php }else{ ?>
						</ul>
					<?php }?>
				</div><br />
				<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id!=$_smarty_tpl->getVariable('profile')->value->id))){?>
					<p><?php echo localize('fast_message',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					<form id="messageForm" name="messageForm" action="/conversation/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
						<textarea name="body" style="width: 200px; height: 80px; resize: none; overflow-y: scroll"></textarea><br />
						<input type="hidden" name="recipient" value="<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
" />
						<input type="submit" name="message" value="OK" />
					</form>
				<?php }?>
			</td>
			<td width="120px">
				<p><strong><?php echo localize('name',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo localize($_smarty_tpl->getVariable('profile')->value->name,$_smarty_tpl->getVariable('lang')->value);?>
  </p>
			</td>
		</tr>	
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('age',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo calculateAge($_smarty_tpl->getVariable('profile')->value->birthday);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('rating',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php if ((isset($_smarty_tpl->getVariable('plmatches',null,true,false)->value)&&(count($_smarty_tpl->getVariable('plmatches')->value)>0))){?><b><?php echo $_smarty_tpl->getVariable('profile')->value->position;?>
</b> (<?php echo $_smarty_tpl->getVariable('profile')->value->points;?>
 pts)<?php }else{ ?>-<?php }?></p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('phone',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo $_smarty_tpl->getVariable('profile')->value->phone;?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('city',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo $_smarty_tpl->getVariable('profile')->value->city;?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('height',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php if (($_smarty_tpl->getVariable('profile')->value->height>0)){?><?php echo $_smarty_tpl->getVariable('profile')->value->height;?>
 <?php echo localize('cm',$_smarty_tpl->getVariable('lang')->value);?>
<?php }else{ ?><?php echo localize('not_specified',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?></p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('weight',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php if (($_smarty_tpl->getVariable('profile')->value->weight>0)){?><?php echo $_smarty_tpl->getVariable('profile')->value->weight;?>
 <?php echo localize('kg',$_smarty_tpl->getVariable('lang')->value);?>
<?php }else{ ?><?php echo localize('not_specified',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?></p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('profile_type',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo localize($_smarty_tpl->getVariable('profile')->value->profile_type,$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('level',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo localize($_smarty_tpl->getVariable('profile')->value->level,$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('plays',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo localize($_smarty_tpl->getVariable('profile')->value->plays,$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('backhand',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo localize($_smarty_tpl->getVariable('profile')->value->backhand,$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong><?php echo localize('racket',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
			</td>
			<td>
				<p><?php echo localize($_smarty_tpl->getVariable('profile')->value->racket,$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="2">
				<p><strong><?php echo localize('bio',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
				<?php if ((trim($_smarty_tpl->getVariable('profile')->value->bio)!='')){?><?php echo $_smarty_tpl->getVariable('profile')->value->bio;?>
<?php }else{ ?><p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><?php }?>
				<br />
				<?php if ((isset($_smarty_tpl->getVariable('plmatches',null,true,false)->value)&&(count($_smarty_tpl->getVariable('plmatches')->value)>0))){?>
					<b>2014-01-01 00:00</b>
					<div style="display: block; height: 20px; width: 300px; background: #ccffff; margin: 4px 0;">
						<b>&nbsp;&nbsp;&nbsp;+1000 pts!</b>
					</div>
					<?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable;
 $_from = array_reverse($_smarty_tpl->getVariable('plmatches')->value); if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
?>
						<?php if (($_smarty_tpl->getVariable('match')->value->player_a==$_smarty_tpl->getVariable('profile')->value->id)){?>
							<b><a href="/match/view/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><u><?php echo mb_substr($_smarty_tpl->getVariable('match')->value->match_date,0,16);?>
</u></a> vs <a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_b;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_b_name;?>
</a></b>
							<div style="display: block; height: 20px; width: <?php echo $_smarty_tpl->getVariable('match')->value->player_a_points-700;?>
px; background: <?php if (($_smarty_tpl->getVariable('match')->value->player_a_diff>0)){?>#ccffff<?php }else{ ?>#ffccff<?php }?>; margin: 4px 0;">
								<b>&nbsp;&nbsp;&nbsp;<?php if (($_smarty_tpl->getVariable('match')->value->player_a_diff>0)){?>+<?php }?><?php echo $_smarty_tpl->getVariable('match')->value->player_a_diff;?>
 pts = <?php echo $_smarty_tpl->getVariable('match')->value->player_a_points;?>
</b>
							</div>
						<?php }?>
						<?php if (($_smarty_tpl->getVariable('match')->value->player_b==$_smarty_tpl->getVariable('profile')->value->id)){?>
							<b><a href="/match/view/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><u><?php echo mb_substr($_smarty_tpl->getVariable('match')->value->match_date,0,16);?>
</u></a> vs <a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_a_name;?>
</a></b>
							<div style="display: block; height: 2p0x; width: <?php echo $_smarty_tpl->getVariable('match')->value->player_b_points-700;?>
px; background: <?php if (($_smarty_tpl->getVariable('match')->value->player_b_diff>0)){?>#ccffff<?php }else{ ?>#ffccff<?php }?>; margin: 4px 0;">
								<b>&nbsp;&nbsp;&nbsp;<?php if (($_smarty_tpl->getVariable('match')->value->player_b_diff>0)){?>+<?php }?><?php echo $_smarty_tpl->getVariable('match')->value->player_b_diff;?>
 pts = <?php echo $_smarty_tpl->getVariable('match')->value->player_b_points;?>
</b>
							</div>
						<?php }?>
					<?php }} ?>
				<?php }?>
			</td>
		</tr>		
	</table>
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>