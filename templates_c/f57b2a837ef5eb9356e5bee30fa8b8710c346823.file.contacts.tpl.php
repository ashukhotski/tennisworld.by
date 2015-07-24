<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:49:35
         compiled from "templates/content/contacts.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2412934565345963fb3ccf5-24391820%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f57b2a837ef5eb9356e5bee30fa8b8710c346823' => 
    array (
      0 => 'templates/content/contacts.tpl',
      1 => 1396963473,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2412934565345963fb3ccf5-24391820',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((isset($_smarty_tpl->getVariable('person',null,true,false)->value)&&isset($_smarty_tpl->getVariable('displayed_contacts',null,true,false)->value))){?>
	<h1><?php echo $_smarty_tpl->getVariable('person')->value->name;?>
 | 
	<?php if (($_smarty_tpl->getVariable('displayed_contacts')->value=='following')){?>
		<?php echo localize('followings',$_smarty_tpl->getVariable('lang')->value);?>
 (<?php echo $_smarty_tpl->getVariable('contacts_count')->value;?>
)</h1> <a href="/contact/followers/<?php echo $_smarty_tpl->getVariable('person')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('followers',$_smarty_tpl->getVariable('lang')->value);?>
</a>
	<?php }elseif(($_smarty_tpl->getVariable('displayed_contacts')->value=='followers')){?> 
		<?php echo localize('followers',$_smarty_tpl->getVariable('lang')->value);?>
 (<?php echo $_smarty_tpl->getVariable('contacts_count')->value;?>
)</h1> <a href="/contact/following/<?php echo $_smarty_tpl->getVariable('person')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('followings',$_smarty_tpl->getVariable('lang')->value);?>
</a>
	<?php }else{ ?></h1><?php }?>
	<br /><br />
	<?php if ((isset($_smarty_tpl->getVariable('profiles',null,true,false)->value)&&(count($_smarty_tpl->getVariable('profiles')->value)>0))){?>
		<table width="100%" cellspacing="5" cellpadding="5" border="0">
			<?php  $_smarty_tpl->tpl_vars['profile'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('profiles')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['profile']->key => $_smarty_tpl->tpl_vars['profile']->value){
?>
				<tr valign="top" align="left">
					<td width="120px">
						<img class="profile-image-mini" src="<?php echo $_smarty_tpl->getVariable('profile')->value->photo_url;?>
" /><br />
					</td>
					<td>
						<p><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize($_smarty_tpl->getVariable('profile')->value->name,$_smarty_tpl->getVariable('lang')->value);?>
</a> <?php if ((lastVisit($_smarty_tpl->getVariable('profile')->value->online)<5)){?>
							<span style="color: grey">(online)</span>
						<?php }else{ ?>
							<span style="color: grey">(<?php echo localize('last_visit',$_smarty_tpl->getVariable('lang')->value);?>
: <?php if (($_smarty_tpl->getVariable('profile')->value->online!='0000-00-00 00:00:00')){?><?php echo $_smarty_tpl->getVariable('profile')->value->online;?>
<?php }else{ ?><?php echo localize('a_long_time_ago',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?>)</span>
						<?php }?></p>
						<!--<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('displayed_contacts')->value=='following'))){?>
							<p><a href="/contact/remove/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('unfollow',$_smarty_tpl->getVariable('lang')->value);?>
</a></p>
						<?php }elseif((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('displayed_contacts')->value=='followers'))){?> 
							<p><a href="/contact/new/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('follow',$_smarty_tpl->getVariable('lang')->value);?>
</a></p>
						<?php }else{ ?><?php }?>-->
						<p><a href="/match/new/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('call_for_match',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/conversation/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('start_conversation',$_smarty_tpl->getVariable('lang')->value);?>
</a></p>
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