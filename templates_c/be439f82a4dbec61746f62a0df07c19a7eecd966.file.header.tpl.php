<?php /* Smarty version Smarty-3.0.8, created on 2014-07-19 22:20:35
         compiled from "templates/header.tpl" */ ?>
<?php /*%%SmartyHeaderCode:4182141753cac503ef9830-43996556%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be439f82a4dbec61746f62a0df07c19a7eecd966' => 
    array (
      0 => 'templates/header.tpl',
      1 => 1405797631,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '4182141753cac503ef9830-43996556',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><a class="header-link" href="/<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><span class="yellow">TENNIS</span><span class="white">WORLD</span></a></h1><br />
<p><?php echo localize('social_network_for_tennis_lovers',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />

<div class="header-menu round">
	<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
		<span><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('my_page',$_smarty_tpl->getVariable('lang')->value);?>
</a></span>
		<span><a href="/signin/logoff<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('exit',$_smarty_tpl->getVariable('lang')->value);?>
</a></span>
	<?php }else{ ?>
		<span><a href="/signup<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('signin',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('signup',$_smarty_tpl->getVariable('lang')->value);?>
</a></span>
	<?php }?>
	<span><strong class="red">new!</strong> <a href="/match/auction<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('match_auction',$_smarty_tpl->getVariable('lang')->value);?>
 </a></span> 
	<span><strong class="red">new!</strong> <a href="/match/cup<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('cup',$_smarty_tpl->getVariable('lang')->value);?>
 </a></span> 
</div><br />
<span class="header-contacts">
	<?php echo localize('contact_info',$_smarty_tpl->getVariable('lang')->value);?>

</span>
<img class="logo" src="/theme/img/players_logo.png" />
<!--
<?php if ((isset($_smarty_tpl->getVariable('languages',null,true,false)->value)&&(count($_smarty_tpl->getVariable('languages')->value)>0))){?>
	<div class="header-localize">
		<?php  $_smarty_tpl->tpl_vars['language'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('languages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['language']->key => $_smarty_tpl->tpl_vars['language']->value){
?>
			<a href="<?php echo $_smarty_tpl->getVariable('request_uri')->value;?>
" onclick="javascript: document.cookie = 'lang=<?php echo $_smarty_tpl->getVariable('language')->value->id;?>
; path=/; domain=.<?php echo $_smarty_tpl->getVariable('cookie_domain')->value;?>
';"><img src="<?php echo $_smarty_tpl->getVariable('language')->value->icon;?>
" /></a>
		<?php }} ?>
	</div>
<?php }?>
-->
<div class="header-localize">
	<select onchange="javascript: document.cookie = 'lang='+this.value+'; path=/; domain=.<?php echo $_smarty_tpl->getVariable('cookie_domain')->value;?>
'; document.location = (this.value == '<?php echo $_smarty_tpl->getVariable('default_language')->value;?>
') ? '<?php echo array_shift(explode('?lang=',$_smarty_tpl->getVariable('request_uri')->value));?>
' : '<?php echo array_shift(explode('?lang=',$_smarty_tpl->getVariable('request_uri')->value));?>
?lang='+this.value">
		<option value="be" <?php if (($_smarty_tpl->getVariable('lang')->value=='be')){?>selected<?php }?>>на беларускай</option>
		<option value="ru" <?php if (($_smarty_tpl->getVariable('lang')->value=='ru')){?>selected<?php }?>>на русском</option>
	</select><br />
</div>
