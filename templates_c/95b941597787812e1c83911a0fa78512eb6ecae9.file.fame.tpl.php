<?php /* Smarty version Smarty-3.0.8, created on 2014-04-28 23:43:16
         compiled from "templates/content/fame.tpl" */ ?>
<?php /*%%SmartyHeaderCode:170464137535ebd64b32a85-38931779%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '95b941597787812e1c83911a0fa78512eb6ecae9' => 
    array (
      0 => 'templates/content/fame.tpl',
      1 => 1398717795,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '170464137535ebd64b32a85-38931779',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('hall_of_fame',$_smarty_tpl->getVariable('lang')->value);?>
</h1>
<p><?php if (($_smarty_tpl->getVariable('lang')->value=='be')){?>ад 11 студзеня 2014 года<?php }else{ ?>от 11 января 2014 года<?php }?></p><br />

<?php if ((isset($_smarty_tpl->getVariable('profiles',null,true,false)->value)&&isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->permissions>2))){?>
	<form id="fameForm" name="fameForm" method="post" action="/fame/new">
		<label for="playerId">player:</label>
		<select name="playerId" id="playerId">
			<option selected></option>
			<?php  $_smarty_tpl->tpl_vars['profile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('profiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['profile']->key => $_smarty_tpl->tpl_vars['profile']->value){
?>
				<option value="<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
"><?php echo $_smarty_tpl->getVariable('profile')->value->name;?>
</option>
			<?php }} ?>
		</select>
		<br />
		<label for="tournament">tournament:</label>
		<input type="text" name="tournament" id="tournament" />
		<br />
		<label for="title">title:</label>
		<select name="title" id="title">
			<option selected></option>
			<option value="semifinalist"><?php echo localize('semifinalist',$_smarty_tpl->getVariable('lang')->value);?>
</option>
			<option value="finalist"><?php echo localize('finalist',$_smarty_tpl->getVariable('lang')->value);?>
</option>
			<option value="champion"><?php echo localize('champion',$_smarty_tpl->getVariable('lang')->value);?>
</option>
			<option value="miss_tennis"><?php echo localize('miss_tennis',$_smarty_tpl->getVariable('lang')->value);?>
</option>
			<option value="tennis_hero"><?php echo localize('tennis_hero',$_smarty_tpl->getVariable('lang')->value);?>
</option>
		</select>
		
		<input type="submit" name="new" value="OK" /><br /><br />
	</form>
<?php }?>

<?php if ((isset($_smarty_tpl->getVariable('titles',null,true,false)->value)&&(count($_smarty_tpl->getVariable('titles')->value)>0))){?>

	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<?php  $_smarty_tpl->tpl_vars['title'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('titles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['title']->key => $_smarty_tpl->tpl_vars['title']->value){
?>
			<tr valign="top" align="left">
				<td width="120px">
					<img class="profile-image-mini" src="<?php echo $_smarty_tpl->getVariable('title')->value->photo_url;?>
" />
					<p><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('title')->value->player_id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize($_smarty_tpl->getVariable('title')->value->name,$_smarty_tpl->getVariable('lang')->value);?>
</a></p><br />
				</td>
				<td>
					
					<?php if ((isset($_smarty_tpl->getVariable('title',null,true,false)->value->medals)&&(count($_smarty_tpl->getVariable('title')->value->medals)>0))){?>
						<?php  $_smarty_tpl->tpl_vars['medal'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('title')->value->medals; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['medal']->key => $_smarty_tpl->tpl_vars['medal']->value){
?>
							<img style="display: inline-block; height: 100px; margin: 5px; cursor: pointer" alt="<?php echo localize($_smarty_tpl->getVariable('medal')->value->tournament,$_smarty_tpl->getVariable('lang')->value);?>
 - <?php echo localize($_smarty_tpl->getVariable('medal')->value->title,$_smarty_tpl->getVariable('lang')->value);?>
<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->permissions>2))){?> id:<?php echo $_smarty_tpl->getVariable('medal')->value->id;?>
<?php }?>" title="<?php echo localize($_smarty_tpl->getVariable('medal')->value->tournament,$_smarty_tpl->getVariable('lang')->value);?>
 - <?php echo localize($_smarty_tpl->getVariable('medal')->value->title,$_smarty_tpl->getVariable('lang')->value);?>
" src="<?php echo $_smarty_tpl->getVariable('medal')->value->picture;?>
" />
						<?php }} ?>
					<?php }?>
					<br />
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