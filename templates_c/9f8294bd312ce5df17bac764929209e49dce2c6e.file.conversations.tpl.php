<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 23:06:04
         compiled from "templates/content/conversations.tpl" */ ?>
<?php /*%%SmartyHeaderCode:12904655245345a82c3f1206-79414378%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9f8294bd312ce5df17bac764929209e49dce2c6e' => 
    array (
      0 => 'templates/content/conversations.tpl',
      1 => 1397049843,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '12904655245345a82c3f1206-79414378',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('conversations',$_smarty_tpl->getVariable('lang')->value);?>
</h1><br />
<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&isset($_smarty_tpl->getVariable('conversations',null,true,false)->value)&&(count($_smarty_tpl->getVariable('conversations')->value)>0))){?>
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<?php  $_smarty_tpl->tpl_vars['conversation'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('conversations')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['conversation']->key => $_smarty_tpl->tpl_vars['conversation']->value){
?>
			<tr valign="top" align="left">
				<td width="100px">
					<img class="profile-image-mini" style="width: 80px; max-height: 120px" src="<?php if (($_smarty_tpl->getVariable('user')->value->id!=$_smarty_tpl->getVariable('conversation')->value->author)){?><?php echo $_smarty_tpl->getVariable('conversation')->value->author_img;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('conversation')->value->recipient_img;?>
<?php }?>" />
				</td>
				<td <?php if (($_smarty_tpl->getVariable('conversation')->value->status==1)){?>bgcolor="#E5FFFF"<?php }?> style="padding: 4px">
					<p><?php if (($_smarty_tpl->getVariable('user')->value->id!=$_smarty_tpl->getVariable('conversation')->value->author)){?><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('conversation')->value->author;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('conversation')->value->author_name;?>
</a></strong> <?php if ((lastVisit($_smarty_tpl->getVariable('conversation')->value->author_online)<5)){?><span style="color: grey">(online)</span><?php }?><?php }else{ ?><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('conversation')->value->recipient;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('conversation')->value->recipient_name;?>
</a></strong> <?php if ((lastVisit($_smarty_tpl->getVariable('conversation')->value->recipient_online)<5)){?><span style="color: grey">(online)</span><?php }?><?php }?></p>
					<p><?php echo $_smarty_tpl->getVariable('conversation')->value->msg_date;?>
</p><br />
					<p><a href="/conversation/view/<?php if (($_smarty_tpl->getVariable('user')->value->id!=$_smarty_tpl->getVariable('conversation')->value->author)){?><?php echo $_smarty_tpl->getVariable('conversation')->value->author;?>
<?php }else{ ?><?php echo $_smarty_tpl->getVariable('conversation')->value->recipient;?>
<?php }?><?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>">
						<?php if (($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('conversation')->value->author)){?><img align="left" class="profile-image-mini" style="width: 30px; max-height: 40px; margin: 0 8px" src="<?php echo $_smarty_tpl->getVariable('conversation')->value->author_img;?>
" /><?php }?>
						<?php if ((mb_strlen($_smarty_tpl->getVariable('conversation')->value->body)>140)){?><?php echo mb_substr($_smarty_tpl->getVariable('conversation')->value->body,0,140);?>
... <?php }else{ ?><?php echo $_smarty_tpl->getVariable('conversation')->value->body;?>
<?php }?>
					</a></p><br />
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