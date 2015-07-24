<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 23:06:18
         compiled from "templates/content/editProfile.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16415236305345a83aa400b7-55327874%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3fc7b1610c606209675adfa7a0dd3fe6e994fa6d' => 
    array (
      0 => 'templates/content/editProfile.tpl',
      1 => 1396963486,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16415236305345a83aa400b7-55327874',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
<h1><?php echo localize('edit_profile',$_smarty_tpl->getVariable('lang')->value);?>
</h2><br />
<form id="editForm" name="editForm" action="/profile/edit<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post" enctype="multipart/form-data" accept-charset="utf-8">
	<?php if ((isset($_smarty_tpl->getVariable('errors',null,true,false)->value))){?>
		<?php if (($_smarty_tpl->getVariable('errors')->value->email!=null)){?>
			<script type="text/javascript">alert('<?php echo $_smarty_tpl->getVariable('errors')->value->email;?>
')</script>
		<?php }?>
		<?php if (($_smarty_tpl->getVariable('errors')->value->current_password!=null)){?>
			<script type="text/javascript">alert('<?php echo $_smarty_tpl->getVariable('errors')->value->current_password;?>
')</script>
		<?php }?>
		<?php if (($_smarty_tpl->getVariable('errors')->value->current_password==null&&$_smarty_tpl->getVariable('errors')->value->password!=null)){?>
			<script type="text/javascript">alert('<?php echo $_smarty_tpl->getVariable('errors')->value->password;?>
')</script>
		<?php }?>
		<?php if (($_smarty_tpl->getVariable('errors')->value->name!=null)){?>
			<script type="text/javascript">alert('<?php echo $_smarty_tpl->getVariable('errors')->value->name;?>
')</script>
		<?php }?>
	<?php }?>
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('email',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->email;?>
<?php }?>" />
				<?php if ((isset($_smarty_tpl->getVariable('errors',null,true,false)->value))){?>
					<?php if (($_smarty_tpl->getVariable('errors')->value->email!=null)){?>
						<p><span class="red"><?php echo $_smarty_tpl->getVariable('errors')->value->email;?>
</span></p>
					<?php }?>
				<?php }?>
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
				<?php if ((isset($_smarty_tpl->getVariable('errors',null,true,false)->value))){?>
					<?php if (($_smarty_tpl->getVariable('errors')->value->current_password==null&&$_smarty_tpl->getVariable('errors')->value->password!=null)){?>
						<p><span class="red"><?php echo $_smarty_tpl->getVariable('errors')->value->password;?>
</span></p>
					<?php }?>
				<?php }?>
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
				<input type="text" name="name" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->name;?>
<?php }?>" />
				<?php if ((isset($_smarty_tpl->getVariable('errors',null,true,false)->value))){?>
					<?php if (($_smarty_tpl->getVariable('errors')->value->name!=null)){?>
						<p><span class="red"><?php echo $_smarty_tpl->getVariable('errors')->value->name;?>
</span></p>
					<?php }?>
				<?php }?>
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
" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&(mb_substr($_smarty_tpl->getVariable('user')->value->birthday,0,4)==$_smarty_tpl->tpl_vars['y']->value))){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['y']->value;?>
</option>
						<?php }} ?>
					</select>
				<?php }else{ ?>
					<input type="text" name="year" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo mb_substr($_smarty_tpl->getVariable('user')->value->birthday,0,4);?>
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
" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&(mb_substr($_smarty_tpl->getVariable('user')->value->birthday,5,2)==$_smarty_tpl->tpl_vars['m']->value))){?>selected<?php }?>><?php echo $_smarty_tpl->tpl_vars['m']->value;?>
</option>
						<?php }} ?>
					</select>
				<?php }else{ ?>
					<input type="text" name="month" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo mb_substr($_smarty_tpl->getVariable('user')->value->birthday,5,2);?>
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
				<input type="text" name="day" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo mb_substr($_smarty_tpl->getVariable('user')->value->birthday,8,2);?>
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
				<input type="text" name="phone" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->phone;?>
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
				<input type="text" name="city" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->city;?>
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
				<input type="text" name="height" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->height;?>
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
				<input type="text" name="weight" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->weight;?>
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
					<option value="not_specified" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->profile_type=='not_specified'))){?>selected<?php }?>></option>
					<option value="player" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->profile_type=='player'))){?>selected<?php }?>><?php echo localize('player',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="coach" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->profile_type=='coach'))){?>selected<?php }?>><?php echo localize('coach',$_smarty_tpl->getVariable('lang')->value);?>
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
					<option value="not_specified" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->level=='not_specified'))){?>selected<?php }?>></option>
					<option value="beginner" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->level=='beginner'))){?>selected<?php }?>><?php echo localize('beginner',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="medium" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->level=='medium'))){?>selected<?php }?>><?php echo localize('medium',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="advanced" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->level=='advanced'))){?>selected<?php }?>><?php echo localize('advanced',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="profi" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->level=='profi'))){?>selected<?php }?>><?php echo localize('profi',$_smarty_tpl->getVariable('lang')->value);?>
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
					<option value="not_specified" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->plays=='not_specified'))){?>selected<?php }?>></option>
					<option value="right_arm" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->plays=='right_arm'))){?>selected<?php }?>><?php echo localize('right_arm',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="left_arm" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->plays=='left_arm'))){?>selected<?php }?>><?php echo localize('left_arm',$_smarty_tpl->getVariable('lang')->value);?>
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
					<option value="not_specified" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->backhand=='not_specified'))){?>selected<?php }?>></option>
					<option value="one_handed" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->backhand=='one_handed'))){?>selected<?php }?>><?php echo localize('one_handed',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="two_handed" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->backhand=='two_handed'))){?>selected<?php }?>><?php echo localize('two_handed',$_smarty_tpl->getVariable('lang')->value);?>
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
					<option value="not_specified" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='not_specified'))){?>selected<?php }?>></option>
					<option value="Babolat" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Babolat'))){?>selected<?php }?>>Babolat</option>
					<option value="Dunlop" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Dunlop'))){?>selected<?php }?>>Dunlop</option>
					<option value="Fischer" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Fischer'))){?>selected<?php }?>>Fischer</option>
					<option value="Head" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Head'))){?>selected<?php }?>>Head</option>
					<option value="Prince" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Prince'))){?>selected<?php }?>>Prince</option>
					<option value="Slazenger" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Slazenger'))){?>selected<?php }?>>Slazenger</option>
					<option value="Wilson" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Wilson'))){?>selected<?php }?>>Wilson</option>
					<option value="Yonex" <?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->racket=='Yonex'))){?>selected<?php }?>>Yonex</option>
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
				<textarea name="bio" class="ckeditor"><?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->bio;?>
<?php }?></textarea>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('photo',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="file" name="photo" />
				<input type="hidden" name="photo_url" value="<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user')->value->photo_url;?>
<?php }?>" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p><?php echo localize('current_password',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
			<td width="250px">
				<input type="password" name="current_password" value="" />
				<?php if ((isset($_smarty_tpl->getVariable('errors',null,true,false)->value))){?>
					<?php if (($_smarty_tpl->getVariable('errors')->value->current_password!=null)){?>
						<p><span class="red"><?php echo $_smarty_tpl->getVariable('errors')->value->current_password;?>
</span></p>
					<?php }?>
				<?php }?>
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> <?php echo localize('current_password_help',$_smarty_tpl->getVariable('lang')->value);?>
</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="edit" value="OK" />
			</td>
		</tr>
	</table>
</form>
<?php }else{ ?>
	<p><?php echo localize('error',$_smarty_tpl->getVariable('lang')->value);?>
! <?php echo localize('person_not_found',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>