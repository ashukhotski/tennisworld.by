<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:54:48
         compiled from "templates/content/signup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:106557462853459778a5a9b7-61898607%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7ba9d5e9481a14f61026356ac828bc399b231013' => 
    array (
      0 => 'templates/content/signup.tpl',
      1 => 1396963528,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '106557462853459778a5a9b7-61898607',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h2><?php echo localize('signin',$_smarty_tpl->getVariable('lang')->value);?>
</h2>
<a href="/signin/facebook<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('facebook',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/signin/vkontakte<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('vkontakte',$_smarty_tpl->getVariable('lang')->value);?>
</a><br /><br />
<form id="signinForm" name="signinForm" action="/signin/tennisworld<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('email',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('email_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('password',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="password" name="password" value="" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('password_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="signin" value="OK" />
			</td>
		</tr>
	</table>
</form>
<br />
<p><strong><?php echo localize('forgot_the_password',$_smarty_tpl->getVariable('lang')->value);?>
</strong></p>
<form id="passwordForm" name="passwordForm" action="/signin/remind" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('email',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('email_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="remind" value="OK" />
			</td>
		</tr>
	</table>
</form>
<br /><hr /><br />
<h2><?php echo localize('signup',$_smarty_tpl->getVariable('lang')->value);?>
</h2>
<a href="/signin/facebook<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('facebook',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/signin/vkontakte<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('vkontakte',$_smarty_tpl->getVariable('lang')->value);?>
</a><br /><br />
<form id="signupForm" name="signupForm" action="/signup/new<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post" enctype="multipart/form-data"  accept-charset="utf-8">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('email',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->email;?>
<?php }?>" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('email_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('password',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="password" name="password" value="" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('password_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('name',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="name" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->name;?>
<?php }?>" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('name_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>	
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('birth_year',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<?php if ((isset($_smarty_tpl->getVariable('years',null,true,false)->value)&&(count($_smarty_tpl->getVariable('years')->value)>0))){?>
					<select name="year">
						<?php  $_smarty_tpl->tpl_vars['y'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('years')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['y']->key => $_smarty_tpl->tpl_vars['y']->value){
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['y']->value;?>
" <?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value)&&($_smarty_tpl->getVariable('data')->value->year==$_smarty_tpl->tpl_vars['y']->value))){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['y']->value;?>
</option>
						<?php }} ?>
					</select>
				<?php }else{ ?>
					<input type="text" name="year" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->year;?>
<?php }?>" />
				<?php }?>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('birth_month',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<?php if ((isset($_smarty_tpl->getVariable('months',null,true,false)->value)&&(count($_smarty_tpl->getVariable('months')->value)>0))){?>
					<select name="month">
						<?php  $_smarty_tpl->tpl_vars['m'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('months')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['m']->key => $_smarty_tpl->tpl_vars['m']->value){
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['m']->value;?>
" <?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value)&&($_smarty_tpl->getVariable('data')->value->month==$_smarty_tpl->tpl_vars['m']->value))){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>
						<?php }} ?>
					</select>
				<?php }else{ ?>
					<input type="text" name="month" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->month;?>
<?php }?>" />
				<?php }?>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('birth_day',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="day" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->day;?>
<?php }?>" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('phone',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="phone" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->phone;?>
<?php }?>" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('city',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="city" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->city;?>
<?php }?>" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('height',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="height" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->height;?>
<?php }?>" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('weight',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="weight" value="<?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->weight;?>
<?php }?>" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('profile_type',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<select name="profile_type">
					<option value="not_specified"></option>
					<option value="player"><?php echo localize('player',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="coach"><?php echo localize('coach',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('level',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<select name="level">
					<option value="not_specified"></option>
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
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('plays',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<select name="plays">
					<option value="not_specified"></option>
					<option value="right_arm"><?php echo localize('right_arm',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="left_arm"><?php echo localize('left_arm',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('backhand',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<select name="backhand">
					<option value="not_specified"></option>
					<option value="one_handed"><?php echo localize('one_handed',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="two_handed"><?php echo localize('two_handed',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('racket',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<select name="racket">
					<option value="not_specified"></option>
					<option value="Babolat">Babolat</option>
					<option value="Dunlop">Dunlop</option>
					<option value="Fischer">Fischer</option>
					<option value="Head">Head</option>
					<option value="Prince">Prince</option>
					<option value="Slazenger">Slazenger</option>
					<option value="Wilson">Wilson</option>
					<option value="Yonex">Yonex</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<p><?php echo localize('bio',$_smarty_tpl->getVariable('lang')->value);?>
</p>
				<textarea name="bio" class="ckeditor"><?php if ((isset($_smarty_tpl->getVariable('data',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('data')->value->bio;?>
<?php }?></textarea>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="signup" value="OK" />
			</td>
		</tr>
	</table>
</form>