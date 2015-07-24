<?php /* Smarty version Smarty-3.0.8, created on 2014-04-19 21:47:44
         compiled from "templates/content/rating.tpl" */ ?>
<?php /*%%SmartyHeaderCode:9391894575352c4d0ad66f9-52972891%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '9e338d6879be7eb7a34f50e3f708e5c3327f3b0d' => 
    array (
      0 => 'templates/content/rating.tpl',
      1 => 1397933262,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '9391894575352c4d0ad66f9-52972891',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<style>
	table th { padding-left: 10px; }
	table tr td { height: 20px; padding: 10px; }
</style>
<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('rating',$_smarty_tpl->getVariable('lang')->value);?>
</h1>
<p><?php if (($_smarty_tpl->getVariable('lang')->value=='be')){?>ад 11 студзеня 2014 года<?php }else{ ?>от 11 января 2014 года<?php }?></p><br />
<?php if ((isset($_smarty_tpl->getVariable('players',null,true,false)->value)&&(count($_smarty_tpl->getVariable('players')->value)>0))){?>
	<table width="100%" cellspacing="2" cellpadding="2" class="rating">
		<th valign="top" align="left"><strong>#</strong></th>
		<th valign="top" align="left"><strong><?php echo localize('name',$_smarty_tpl->getVariable('lang')->value);?>
</strong></th>
		<th valign="top" align="left"><strong>W / L</strong></th>
		<th valign="top" align="left"><strong>pts</strong></th>
		<th valign="top" align="left"><strong>+/-</strong></th>
		<?php  $_smarty_tpl->tpl_vars['player'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('players')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
 $_smarty_tpl->tpl_vars['player']->total= $_smarty_tpl->_count($_from);
 $_smarty_tpl->tpl_vars['player']->iteration=0;
if ($_smarty_tpl->tpl_vars['player']->total > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['player']->key => $_smarty_tpl->tpl_vars['player']->value){
 $_smarty_tpl->tpl_vars['player']->iteration++;
 $_smarty_tpl->tpl_vars['player']->last = $_smarty_tpl->tpl_vars['player']->iteration === $_smarty_tpl->tpl_vars['player']->total;
?>
			<tr valign="center" align="left" class="<?php if (($_smarty_tpl->getVariable('player')->value->position==1)){?>gold<?php }elseif(($_smarty_tpl->getVariable('player')->value->position==2)){?>silver<?php }elseif(($_smarty_tpl->getVariable('player')->value->position==3)){?>bronze<?php }elseif(($_smarty_tpl->tpl_vars['player']->last&&($_smarty_tpl->getVariable('player')->value->position>16))){?>last<?php }elseif(($_smarty_tpl->tpl_vars['player']->iteration%2==0)){?>odd<?php }else{ ?>even<?php }?>">
				<td><?php echo $_smarty_tpl->getVariable('player')->value->position;?>
</td>
				<td><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('player')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" <?php if (($_smarty_tpl->getVariable('player')->value->position<=3)){?>style="font-weight: bold"<?php }?>><?php echo $_smarty_tpl->getVariable('player')->value->name;?>
</a></td>
				<td><?php echo $_smarty_tpl->getVariable('player')->value->win;?>
 / <?php echo $_smarty_tpl->getVariable('player')->value->loose;?>
</td>
				<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>2))){?>
					<form id="ratingForm-<?php echo $_smarty_tpl->getVariable('player')->value->id;?>
" name="ratingForm-<?php echo $_smarty_tpl->getVariable('player')->value->id;?>
" action="/rating<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
					<td>
						
						<input type="hidden" name="playerId" value="<?php echo $_smarty_tpl->getVariable('player')->value->id;?>
" />
						<input type="text" name="points" value="<?php echo $_smarty_tpl->getVariable('player')->value->points;?>
" />
								
					</td>
					<td>
						<input type="text" name="progress" style="width: 30px" value="<?php echo $_smarty_tpl->getVariable('player')->value->progress;?>
" />
						<input type="submit" name="update" value="OK" />
					</td>
					</form>
				<?php }else{ ?>
					<td><?php echo $_smarty_tpl->getVariable('player')->value->points;?>
</td>
					<td><?php echo $_smarty_tpl->getVariable('player')->value->progress;?>
</td>
				<?php }?>
			</tr>
		<?php }} ?>
	</table>
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>