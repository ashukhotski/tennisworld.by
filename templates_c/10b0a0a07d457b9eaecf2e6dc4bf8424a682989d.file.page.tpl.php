<?php /* Smarty version Smarty-3.0.8, created on 2014-04-10 00:47:41
         compiled from "templates/admin/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:13005004505345bffd5a34a3-34261453%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '10b0a0a07d457b9eaecf2e6dc4bf8424a682989d' => 
    array (
      0 => 'templates/admin/page.tpl',
      1 => 1396963454,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '13005004505345bffd5a34a3-34261453',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<div id="scroll">
	<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>1))){?>
		<form id="pageForm" name="pageForm" action="/create_new_page<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
			<p><?php echo localize('url',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			<input type="text" name="url" value="<?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('page')->value->url;?>
<?php }?>" /><br />
				
			<p><?php echo localize('title',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			<input type="text" name="title" value="<?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('page')->value->title;?>
<?php }?>" /><br />
				
			<p><?php echo localize('parent_page',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			<select name="parent_id">
				<option value="ROOT" <?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value)&&($_smarty_tpl->getVariable('page')->value->parent_id=='ROOT'))){?>selected<?php }?>></option>
				<?php if ((isset($_smarty_tpl->getVariable('menu_links',null,true,false)->value)&&(count($_smarty_tpl->getVariable('menu_links')->value)>0))){?>
					<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu_links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
?>
						<?php if (($_smarty_tpl->getVariable('link')->value->url!='')){?><option value="<?php echo $_smarty_tpl->getVariable('link')->value->url;?>
" <?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value)&&($_smarty_tpl->getVariable('link')->value->url==$_smarty_tpl->getVariable('page')->value->parent_id))){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('link')->value->title;?>
</option><?php }?>
					<?php }} ?>
				<?php }?>
			</select>
			<br />

			<p><?php echo localize('keywords',$_smarty_tpl->getVariable('lang')->value);?>
: </p>
			<textarea name="keywords"><?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('page')->value->keywords;?>
<?php }?></textarea><br />
			<p><?php echo localize('text',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			<textarea class="ckeditor" name="body"><?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('page')->value->body;?>
<?php }?></textarea><br />
			<input type="hidden" name="action" value="create" />
			<input type="submit" name="submit" value="OK" /><br />
		</form>
	<?php }?>
</div>