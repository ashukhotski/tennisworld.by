<?php /* Smarty version Smarty-3.0.8, created on 2014-04-13 23:58:26
         compiled from "templates/admin/localization.tpl" */ ?>
<?php /*%%SmartyHeaderCode:810343463534afa72b2c189-82230873%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '2dd36bcb2aa2661acbd20cc7baa8137988d68eeb' => 
    array (
      0 => 'templates/admin/localization.tpl',
      1 => 1396963449,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '810343463534afa72b2c189-82230873',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>2))){?>
	<h2><?php echo localize('create_constants',$_smarty_tpl->getVariable('lang')->value);?>
</h2><br />
	<form id="createConstant" name="createConstant" action="/localization<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
		<input type="hidden" name="action" value="create" />
		<p><strong><?php echo localize('name',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <br /><input type="text" name="id" value="" /></p>
		<p><strong><?php echo localize('value',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
		<textarea name="value"></textarea><br />
		<input type="submit" name="create" value="OK" /><br /> 
	</form>
	<br /><hr /><br />
	<h2><?php echo localize('edit_constants',$_smarty_tpl->getVariable('lang')->value);?>
</h2><br />
	<?php if ((isset($_smarty_tpl->getVariable('constants',null,true,false)->value)&&(count($_smarty_tpl->getVariable('constants')->value)>0))){?>
		<?php  $_smarty_tpl->tpl_vars['constant'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('constants')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['constant']->key => $_smarty_tpl->tpl_vars['constant']->value){
?>
			<form id="editConstant-<?php echo $_smarty_tpl->getVariable('constant')->value->id;?>
-<?php echo $_smarty_tpl->getVariable('constant')->value->lang;?>
" name="editConstant-<?php echo $_smarty_tpl->getVariable('constant')->value->id;?>
-<?php echo $_smarty_tpl->getVariable('constant')->value->lang;?>
" action="/localization<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
				<input type="hidden" name="action" value="edit" />
				<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('constant')->value->id;?>
" />
				<input type="hidden" name="lang" value="<?php echo $_smarty_tpl->getVariable('constant')->value->lang;?>
" />
				<p><strong><?php echo localize('name',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo $_smarty_tpl->getVariable('constant')->value->id;?>
</p>
				<p><strong><?php echo localize('locale',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo $_smarty_tpl->getVariable('constant')->value->lang;?>
</p>
				<p><strong><?php echo localize('value',$_smarty_tpl->getVariable('lang')->value);?>
:</strong></p>
				<textarea name="value"><?php echo $_smarty_tpl->getVariable('constant')->value->value;?>
</textarea><br />
				<input type="submit" name="edit" value="OK" /><br /> 
			</form>
			<br /><hr /><br />
		<?php }} ?>
	<?php }?>
<?php }?>