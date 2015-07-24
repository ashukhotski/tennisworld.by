<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:54:54
         compiled from "templates/secured/user_menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1920580445345977e294cf0-07665501%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '42e8cfd1757664172bb85776d107ba13e6a5dfef' => 
    array (
      0 => 'templates/secured/user_menu.tpl',
      1 => 1396963440,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1920580445345977e294cf0-07665501',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
	<div class="user-sidebar round">
		<ul>
			<li>
				<a href="/conversation/list<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('my_messages',$_smarty_tpl->getVariable('lang')->value);?>
<?php if (($_smarty_tpl->getVariable('new_messages_count')->value>0)){?> (<?php echo $_smarty_tpl->getVariable('new_messages_count')->value;?>
)<?php }?></a>
			</li>
			<li>
				<a href="/contact/following/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('my_contacts',$_smarty_tpl->getVariable('lang')->value);?>
</a>
				<ul>
					<li><a href="/contact/followers/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('followers',$_smarty_tpl->getVariable('lang')->value);?>
<?php if ((isset($_smarty_tpl->getVariable('followers_count',null,true,false)->value)&&is_numeric($_smarty_tpl->getVariable('followers_count')->value))){?> (<?php echo $_smarty_tpl->getVariable('followers_count')->value;?>
)<?php }?></a></li>
					<li><a href="/contact/following/<?php echo $_smarty_tpl->getVariable('user')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('followings',$_smarty_tpl->getVariable('lang')->value);?>
<?php if ((isset($_smarty_tpl->getVariable('followings_count',null,true,false)->value)&&is_numeric($_smarty_tpl->getVariable('followings_count')->value))){?> (<?php echo $_smarty_tpl->getVariable('followings_count')->value;?>
)<?php }?></a></li>
				</ul>
			</li>
			<li>
				<a href="/match/auction<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><span class="red"><b>new!</b></span> <?php echo localize('match_auction',$_smarty_tpl->getVariable('lang')->value);?>
 </a> 
			</li>
			<?php if ((true)){?>
				<li>
					<a href="/conversation/view/5<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('report_match_result',$_smarty_tpl->getVariable('lang')->value);?>
</a>
				</li>
			<?php }else{ ?>
				<li>
					<a href="/match/random<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><span class="red"><b>new!</b></span> <?php echo localize('random_match',$_smarty_tpl->getVariable('lang')->value);?>
 </a> 
				</li>
			<?php }?>
			<li>
				<a href="/match/my<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('my_matches',$_smarty_tpl->getVariable('lang')->value);?>
</a>
				<ul>
					<li><a href="/match/my/unaccepted<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('unaccepted',$_smarty_tpl->getVariable('lang')->value);?>
<?php if (($_smarty_tpl->getVariable('unaccepted_matches_count')->value>0)){?> (<?php echo $_smarty_tpl->getVariable('unaccepted_matches_count')->value;?>
)<?php }?></a></li>
					<li><a href="/match/my/denied<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('denied',$_smarty_tpl->getVariable('lang')->value);?>
<?php if (($_smarty_tpl->getVariable('denied_matches_count')->value>0)){?> (<?php echo $_smarty_tpl->getVariable('denied_matches_count')->value;?>
)<?php }?></a></li>
					<li><a href="/match/my/ready_to_play<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
<?php if (($_smarty_tpl->getVariable('ready_to_play_matches_count')->value>0)){?> (<?php echo $_smarty_tpl->getVariable('ready_to_play_matches_count')->value;?>
)<?php }?></a></li>
					<li><a href="/match/my/to_be_continued<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('to_be_continued',$_smarty_tpl->getVariable('lang')->value);?>
<?php if (($_smarty_tpl->getVariable('to_be_continued_matches_count')->value>0)){?> (<?php echo $_smarty_tpl->getVariable('to_be_continued_matches_count')->value;?>
)<?php }?></a></li>
					<li><a href="/match/my/finished<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('finished',$_smarty_tpl->getVariable('lang')->value);?>
<?php if (($_smarty_tpl->getVariable('finished_matches_count')->value>0)){?> (<?php echo $_smarty_tpl->getVariable('finished_matches_count')->value;?>
)<?php }?></a></li>
				</ul>
			</li>
		</ul>
	</div><br />
<?php }?>