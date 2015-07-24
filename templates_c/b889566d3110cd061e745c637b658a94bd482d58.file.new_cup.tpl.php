<?php /* Smarty version Smarty-3.0.8, created on 2014-07-19 22:11:04
         compiled from "templates/content/new_cup.tpl" */ ?>
<?php /*%%SmartyHeaderCode:114563192353cac2c82bea21-71600655%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b889566d3110cd061e745c637b658a94bd482d58' => 
    array (
      0 => 'templates/content/new_cup.tpl',
      1 => 1405797050,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '114563192353cac2c82bea21-71600655',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('new_cup',$_smarty_tpl->getVariable('lang')->value);?>
</h1><br />

<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value->permissions>2))){?>
	<form id="cupForm" name="cupForm" method="post" action="/match/new_cup<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>">
		<p><?php echo localize('match_date',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
		<div id="calendar" class="calendar"></div>
		<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>
" />
		<br />
		<label for="hour"><?php echo localize('match_time',$_smarty_tpl->getVariable('lang')->value);?>
:</label>
		<select name="hour" id="hour">
			<?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hours')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['h']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['h']->value;?>
:00</option>
			<?php }} ?>
		</select>
		<br /><br />
		<label for="player_a">player_a:</label>
		<select name="player_a" id="player_a">
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
		<br /><br />
		<label for="player_b">player_b:</label>
		<select name="player_b" id="player_b">
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
		<br /><br />
		<p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
		<textarea class="ckeditor" name="summary" id="summary" ></textarea>
		<br />

		
		<input type="submit" name="action" value="OK" /><br /><br />
	</form>
<?php }?>