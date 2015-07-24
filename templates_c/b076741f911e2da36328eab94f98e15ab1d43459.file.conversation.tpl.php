<?php /* Smarty version Smarty-3.0.8, created on 2014-04-10 00:44:50
         compiled from "templates/content/conversation.tpl" */ ?>
<?php /*%%SmartyHeaderCode:17639210595345bf522fcb33-41941272%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b076741f911e2da36328eab94f98e15ab1d43459' => 
    array (
      0 => 'templates/content/conversation.tpl',
      1 => 1397047725,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '17639210595345bf522fcb33-41941272',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('profile')->value!=null))){?>
	<a href="/conversation/list<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('back',$_smarty_tpl->getVariable('lang')->value);?>
</a><br />
	<h1><?php echo $_smarty_tpl->getVariable('profile')->value->name;?>
 (<?php echo localize('view_conversation',$_smarty_tpl->getVariable('lang')->value);?>
)</h1>
	<?php if ((lastVisit($_smarty_tpl->getVariable('profile')->value->online)<5)){?>
		<p><span style="color: grey">online</span></p>
	<?php }else{ ?>
		<p><span style="color: grey"><?php echo localize('last_visit',$_smarty_tpl->getVariable('lang')->value);?>
: <?php if (($_smarty_tpl->getVariable('profile')->value->online!='0000-00-00 00:00:00')){?><?php echo $_smarty_tpl->getVariable('profile')->value->online;?>
<?php }else{ ?><?php echo localize('a_long_time_ago',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?></span></p>
	<?php }?>
	<br /><p><?php echo localize('type_your_message_here',$_smarty_tpl->getVariable('lang')->value);?>
</p>
	<form id="messageForm" name="messageForm" action="/conversation/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
		<textarea name="body" style="width: 100%; height: 50px; resize: none; overflow-y: scroll"></textarea><br />
		<input type="hidden" name="recipient" value="<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
" />
		<input type="submit" name="message" value="OK" />
	</form>
	<br />
	<?php if ((isset($_smarty_tpl->getVariable('conversation_messages',null,true,false)->value)&&(count($_smarty_tpl->getVariable('conversation_messages')->value)>0))){?>
		<table width="100%" cellspacing="5" cellpadding="5" border="0">
			<?php  $_smarty_tpl->tpl_vars['message'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('conversation_messages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['message']->key => $_smarty_tpl->tpl_vars['message']->value){
?>
				<tr valign="top" align="left">
					<td width="100px">
						<img class="profile-image-mini" style="width: 80px; max-height: 120px" src="<?php echo $_smarty_tpl->getVariable('message')->value->author_img;?>
" />
					</td>
					<td>
						<p><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('message')->value->author;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('message')->value->author_name;?>
</a></strong></p>
						<p><?php echo $_smarty_tpl->getVariable('message')->value->msg_date;?>
</p><br />
						<p><?php echo $_smarty_tpl->getVariable('message')->value->body;?>
</p><br />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr />
					</td>
				</tr>
			<?php }} ?>
		</table>
	<?php }?>
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>