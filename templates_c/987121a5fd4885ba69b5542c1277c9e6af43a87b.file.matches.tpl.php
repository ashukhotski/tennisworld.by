<?php /* Smarty version Smarty-3.0.8, created on 2014-07-19 22:46:39
         compiled from "templates/content/matches.tpl" */ ?>
<?php /*%%SmartyHeaderCode:181661814353cacb1f7a7417-15114595%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '987121a5fd4885ba69b5542c1277c9e6af43a87b' => 
    array (
      0 => 'templates/content/matches.tpl',
      1 => 1405799192,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '181661814353cacb1f7a7417-15114595',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<?php if ((isset($_smarty_tpl->getVariable('request_uri',null,true,false)->value)&&($_smarty_tpl->getVariable('request_uri')->value=='/match/cup'))){?>
	<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('cup',$_smarty_tpl->getVariable('lang')->value);?>
</h1><br />
<?php }else{ ?>
	<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('matches',$_smarty_tpl->getVariable('lang')->value);?>
</h1>
	<?php if ((isset($_smarty_tpl->getVariable('request_uri',null,true,false)->value)&&(mb_strpos($_smarty_tpl->getVariable('request_uri')->value,'match/list')!=false))){?><a href="/match/list<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('all',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/match/list/finished<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('finished',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/match/list/to_be_continued<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('to_be_continued',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/match/list/ready_to_play<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
</a><br /><?php }?>
	<?php if ((isset($_smarty_tpl->getVariable('request_uri',null,true,false)->value)&&(mb_strpos($_smarty_tpl->getVariable('request_uri')->value,'match/my')!=false))){?><a href="/match/my<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('all',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/match/my/finished<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('finished',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/match/my/to_be_continued<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('to_be_continued',$_smarty_tpl->getVariable('lang')->value);?>
</a> | <a href="/match/my/ready_to_play<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('ready_to_play',$_smarty_tpl->getVariable('lang')->value);?>
</a><br /><?php }?>
	<br />
<?php }?>
<?php if ((isset($_smarty_tpl->getVariable('matches',null,true,false)->value)&&(count($_smarty_tpl->getVariable('matches')->value)>0))){?>
	
		<?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('matches')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
?>
		<table width="100%" cellspacing="2" cellpadding="2" border="1" class="matches">
			<tr valign="center">
				<td colspan="7" class="preview">
					<p><a href="/match/view/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo mb_substr($_smarty_tpl->getVariable('match')->value->match_date,0,16);?>
</a></p>
				</td>
			</tr>
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_a_name;?>
</a></strong> <?php if (($_smarty_tpl->getVariable('match')->value->status=='finished')){?><?php if ((($_smarty_tpl->getVariable('match')->value->set_1_a>$_smarty_tpl->getVariable('match')->value->set_1_b&&($_smarty_tpl->getVariable('match')->value->set_2_a>$_smarty_tpl->getVariable('match')->value->set_2_b||$_smarty_tpl->getVariable('match')->value->set_3_a>$_smarty_tpl->getVariable('match')->value->set_3_b))||($_smarty_tpl->getVariable('match')->value->set_2_a>$_smarty_tpl->getVariable('match')->value->set_2_b&&($_smarty_tpl->getVariable('match')->value->set_1_a>$_smarty_tpl->getVariable('match')->value->set_1_b||$_smarty_tpl->getVariable('match')->value->set_3_a>$_smarty_tpl->getVariable('match')->value->set_3_b)))){?><img height="30px" align="right" alt="win" src="/theme/img/yes.png" /><?php }else{ ?><img height="30px" align="right" alt="lose" src="/theme/img/no.png" /><?php }?><?php }?></p>
				</td>
				<td class="score">
					<p><?php if (($_smarty_tpl->getVariable('match')->value->set_1_a>0||$_smarty_tpl->getVariable('match')->value->set_1_b>0)){?><?php echo $_smarty_tpl->getVariable('match')->value->set_1_a;?>
<?php }else{ ?>-<?php }?></p>
				</td>
				<td class="score">
					<p><?php if (($_smarty_tpl->getVariable('match')->value->set_2_a>0||$_smarty_tpl->getVariable('match')->value->set_2_b>0)){?><?php echo $_smarty_tpl->getVariable('match')->value->set_2_a;?>
<?php }else{ ?>-<?php }?></p>
				</td>
				<td class="score">
					<p><?php if (($_smarty_tpl->getVariable('match')->value->set_3_a>0||$_smarty_tpl->getVariable('match')->value->set_3_b>0)){?><?php echo $_smarty_tpl->getVariable('match')->value->set_3_a;?>
<?php }else{ ?>-<?php }?></p>
				</td>
				<td rowspan="2" class="status ">
					<p><a href="/match/view/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><span class="red"><b><?php echo localize($_smarty_tpl->getVariable('match')->value->status,$_smarty_tpl->getVariable('lang')->value);?>
</b></span></a></p>
				</td>
				<?php if ((1==2)){?>
					<td rowspan="2" class="view">
						<p><a href="/match/view/<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('view',$_smarty_tpl->getVariable('lang')->value);?>
</a></p>
					</td>
				<?php }?>
			</tr>
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_b;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->player_b_name;?>
</a></strong> <?php if (($_smarty_tpl->getVariable('match')->value->status=='finished')){?><?php if ((($_smarty_tpl->getVariable('match')->value->set_1_a>$_smarty_tpl->getVariable('match')->value->set_1_b&&($_smarty_tpl->getVariable('match')->value->set_2_a>$_smarty_tpl->getVariable('match')->value->set_2_b||$_smarty_tpl->getVariable('match')->value->set_3_a>$_smarty_tpl->getVariable('match')->value->set_3_b))||($_smarty_tpl->getVariable('match')->value->set_2_a>$_smarty_tpl->getVariable('match')->value->set_2_b&&($_smarty_tpl->getVariable('match')->value->set_1_a>$_smarty_tpl->getVariable('match')->value->set_1_b||$_smarty_tpl->getVariable('match')->value->set_3_a>$_smarty_tpl->getVariable('match')->value->set_3_b)))){?><img height="30px" align="right" alt="lose" src="/theme/img/no.png" /><?php }else{ ?><img height="30px" align="right" alt="win" src="/theme/img/yes.png" /><?php }?><?php }?></p>
				</td>
				<td class="score">
					<p><?php if (($_smarty_tpl->getVariable('match')->value->set_1_a>0||$_smarty_tpl->getVariable('match')->value->set_1_b>0)){?><?php echo $_smarty_tpl->getVariable('match')->value->set_1_b;?>
<?php }else{ ?>-<?php }?></p>
				</td>
				<td class="score">
					<p><?php if (($_smarty_tpl->getVariable('match')->value->set_2_a>0||$_smarty_tpl->getVariable('match')->value->set_2_b>0)){?><?php echo $_smarty_tpl->getVariable('match')->value->set_2_b;?>
<?php }else{ ?>-<?php }?></p>
				</td>
				<td class="score">
					<p><?php if (($_smarty_tpl->getVariable('match')->value->set_3_a>0||$_smarty_tpl->getVariable('match')->value->set_3_b>0)){?><?php echo $_smarty_tpl->getVariable('match')->value->set_3_b;?>
<?php }else{ ?>-<?php }?></p>
				</td>
			</tr>
		</table>
		<br />
		<?php }} ?>
	
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>