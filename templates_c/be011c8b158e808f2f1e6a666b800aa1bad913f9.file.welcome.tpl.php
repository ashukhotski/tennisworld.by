<?php /* Smarty version Smarty-3.0.8, created on 2014-04-28 12:10:28
         compiled from "templates/content/welcome.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1726654781535e1b04935943-72800234%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be011c8b158e808f2f1e6a666b800aa1bad913f9' => 
    array (
      0 => 'templates/content/welcome.tpl',
      1 => 1388443368,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1726654781535e1b04935943-72800234',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1>Welcome</h1>
<div class="left">
	<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
		<p>Hello, <?php echo $_smarty_tpl->getVariable('user')->value->name;?>
!</p>
	<?php }else{ ?>
		<p>You're not authorized!</p>
	<?php }?>
	<br />
</div>