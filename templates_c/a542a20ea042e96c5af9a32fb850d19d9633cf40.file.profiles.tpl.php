<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:30:17
         compiled from "templates/content/profiles.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2115808109534591b99dbc62-64087660%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a542a20ea042e96c5af9a32fb850d19d9633cf40' => 
    array (
      0 => 'templates/content/profiles.tpl',
      1 => 1396963510,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2115808109534591b99dbc62-64087660',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('people',$_smarty_tpl->getVariable('lang')->value);?>
</h1>
<a href="/profile/list/all<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('all',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/profile/list/players<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('players',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/profile/list/coaches<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('coaches',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/profile/list/lovers<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('just_tennis_lovers',$_smarty_tpl->getVariable('lang')->value);?>
</a><br /><br />
<form id="searchForm" name="searchForm" action="<?php echo $_smarty_tpl->getVariable('request_uri')->value;?>
" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td>
				<p><?php echo localize('name',$_smarty_tpl->getVariable('lang')->value);?>
</p>
				<input type="text" name="name" value="" />
			</td>
			<td>
				<p><?php echo localize('city',$_smarty_tpl->getVariable('lang')->value);?>
</p>
				<input type="text" name="city" value="" />
			</td>
			<td>
				<p><?php echo localize('level',$_smarty_tpl->getVariable('lang')->value);?>
</p>
				<select name="level">
					<option value="" selected></option>
					<option value="not_specified"><?php echo localize('not_specified',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="beginner"><?php echo localize('beginner',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="medium"><?php echo localize('medium',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="advanced"><?php echo localize('advanced',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="profi"><?php echo localize('profi',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				</select>
			</td>
			<td><br /><input type="checkbox" name="online" id="online" value="online" /><label for="online"><?php echo localize('online',$_smarty_tpl->getVariable('lang')->value);?>
</label></td>
			<td><br /><input type="submit" name="search" value="OK" /></td>
		</tr>
	</table>
</form><br />
<?php if ((isset($_smarty_tpl->getVariable('profiles',null,true,false)->value)&&(count($_smarty_tpl->getVariable('profiles')->value)>0))){?>
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<?php  $_smarty_tpl->tpl_vars['profile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('profiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['profile']->key => $_smarty_tpl->tpl_vars['profile']->value){
?>
			<tr valign="top" align="left">
				<td width="120px">
					<img class="profile-image-mini" src="<?php echo $_smarty_tpl->getVariable('profile')->value->photo_url;?>
" /><br />
				</td>
				<td>
					<p><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize($_smarty_tpl->getVariable('profile')->value->name,$_smarty_tpl->getVariable('lang')->value);?>
</a> (<?php echo localize('age',$_smarty_tpl->getVariable('lang')->value);?>
: <?php echo calculateAge($_smarty_tpl->getVariable('profile')->value->birthday);?>
)<?php if ((!empty($_smarty_tpl->getVariable('profile',null,true,false)->value->city))){?>, <?php echo $_smarty_tpl->getVariable('profile')->value->city;?>
<?php }?><?php if ((!empty($_smarty_tpl->getVariable('profile',null,true,false)->value->phone))){?>, <?php echo $_smarty_tpl->getVariable('profile')->value->phone;?>
<?php }?></p>
					<p><strong><?php echo localize('profile_type',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo localize($_smarty_tpl->getVariable('profile')->value->profile_type,$_smarty_tpl->getVariable('lang')->value);?>
</p>
					<p><strong><?php echo localize('level',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo localize($_smarty_tpl->getVariable('profile')->value->level,$_smarty_tpl->getVariable('lang')->value);?>
</p>
					<?php if ((lastVisit($_smarty_tpl->getVariable('profile')->value->online)<5)){?>
						<p><span style="color: grey">online</span></p>
					<?php }else{ ?>
						<p><span style="color: grey"><?php echo localize('last_visit',$_smarty_tpl->getVariable('lang')->value);?>
: <?php if (($_smarty_tpl->getVariable('profile')->value->online!='0000-00-00 00:00:00')){?><?php echo $_smarty_tpl->getVariable('profile')->value->online;?>
<?php }else{ ?><?php echo localize('a_long_time_ago',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?></span></p>
					<?php }?><br />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<hr />
				</td>
			</tr>
		<?php }} ?>
	</table>
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>