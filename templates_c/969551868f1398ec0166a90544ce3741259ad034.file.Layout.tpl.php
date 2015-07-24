<?php /* Smarty version Smarty-3.0.8, created on 2014-04-19 21:36:34
         compiled from "templates/Layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:20610661045352c232bddac2-59506676%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '969551868f1398ec0166a90544ce3741259ad034' => 
    array (
      0 => 'templates/Layout.tpl',
      1 => 1397932593,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '20610661045352c232bddac2-59506676',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		<?php if ((isset($_smarty_tpl->getVariable('head',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('head')->value;?>
<?php }?>
	</head>
	<body>
		<div class="layout">
			<div class="header">
				<?php if ((isset($_smarty_tpl->getVariable('header',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('header')->value;?>
<?php }?>
			</div>
			<div class="menu">
				<?php if ((isset($_smarty_tpl->getVariable('menu',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('menu')->value;?>
<?php }?>
			</div><br clear="all" />
			<div class="content">
				<div class="left">
					<?php if ((isset($_smarty_tpl->getVariable('content',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('content')->value;?>
<?php }?>
				</div>
				<div class="right">
					<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
					<div class="yashare-auto-init" style="text-align: right" data-yashareL10n="<?php echo $_smarty_tpl->getVariable('lang')->value;?>
" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,yaru,moimir"></div>
					<?php if ((isset($_smarty_tpl->getVariable('user_menu',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('user_menu')->value;?>
<?php }?><p style="text-align: right"><a href="http://vk.com/liga_tennisa" target="_blank"><img width="280px" src="/theme/img/tennis_logo3_<?php echo $_smarty_tpl->getVariable('lang')->value;?>
.png" /></a></p>
					<?php if ((isset($_smarty_tpl->getVariable('context',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('context')->value;?>
<?php }?>
				</div>
				<br clear="all" /><br />
			</div>
			<br clear="all" />
			<div class="footer">
				<?php if ((isset($_smarty_tpl->getVariable('footer',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('footer')->value;?>
<?php }?>
			</div>
		</div>
	</body>
</html>