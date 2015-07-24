<?php /* Smarty version Smarty-3.0.8, created on 2014-07-19 22:24:58
         compiled from "templates/menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:91448465253cac60aa55a71-13687967%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b6da4162c469d98c5e879f8e0b21e18d44108090' => 
    array (
      0 => 'templates/menu.tpl',
      1 => 1405797897,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '91448465253cac60aa55a71-13687967',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<ul>
	<li><a href="/<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
	<li><a href="/profile/list<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('people',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
	<li><a href="/match/list<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('matches',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
	<li><a href="/rating<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('rating',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
	<li><a href="/fame/list<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('hall_of_fame',$_smarty_tpl->getVariable('lang')->value);?>
</a></li>
	<?php if ((isset($_smarty_tpl->getVariable('menu_links',null,true,false)->value)&&(count($_smarty_tpl->getVariable('menu_links')->value)>0))){?>
		<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu_links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
?>
			<?php if (($_smarty_tpl->getVariable('link')->value->url!='')){?><li><a href="/<?php echo $_smarty_tpl->getVariable('link')->value->url;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('link')->value->title;?>
</a></li><?php }?>
		<?php }} ?>
	<?php }?>
	<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
		<?php if (($_smarty_tpl->getVariable('user')->value->permissions>0)){?>
			<li>
				<a href="/match/new_cup<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('new_cup_match',$_smarty_tpl->getVariable('lang')->value);?>
</a>
			</li> 
		<?php }?>
		<?php if (($_smarty_tpl->getVariable('user')->value->permissions>1)){?>
			<li>
				<a href="/create_new_page<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('new_page',$_smarty_tpl->getVariable('lang')->value);?>
</a>
			</li> 
		<?php }?>
		<?php if (($_smarty_tpl->getVariable('user')->value->permissions>2)){?>
			<li>
				<a href="/localization<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('localization',$_smarty_tpl->getVariable('lang')->value);?>
</a>
			</li>
			<li>
				<a href="/generate_sitemap<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('sitemap',$_smarty_tpl->getVariable('lang')->value);?>
</a>
			</li>
		<?php }?>
	<?php }?>
</ul>
