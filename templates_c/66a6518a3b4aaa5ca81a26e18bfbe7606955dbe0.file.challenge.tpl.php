<?php /* Smarty version Smarty-3.0.8, created on 2014-04-10 09:24:00
         compiled from "templates/content/challenge.tpl" */ ?>
<?php /*%%SmartyHeaderCode:36269199553463900406927-14685687%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '66a6518a3b4aaa5ca81a26e18bfbe7606955dbe0' => 
    array (
      0 => 'templates/content/challenge.tpl',
      1 => 1396963469,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '36269199553463900406927-14685687',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('challenge',$_smarty_tpl->getVariable('lang')->value);?>
</h1><br />
<?php if ((isset($_smarty_tpl->getVariable('profile',null,true,false)->value)&&($_smarty_tpl->getVariable('profile')->value!=null))){?>
<form id="challengeForm" name="challengeForm" action="/match/new/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="center" align="left">
			<td width="150px">
				<p><?php echo localize('competitor',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			</td>
			<td width="250px">
				<p><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('profile')->value->name;?>
</a></p>
				<input type="hidden" name="playerB" value="<?php echo $_smarty_tpl->getVariable('profile')->value->id;?>
" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td width="150px" colspan="3">
				<p><?php echo localize('match_date',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
				<div id="calendar" class="calendar"></div>
				<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>
" />
			</td>
		</tr>
		<tr valign="center" align="left">
			<td width="150px">
				<p><?php echo localize('match_time',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			</td>
			<td width="250px">
				<select name="hour">
					<?php  $_smarty_tpl->tpl_vars['h'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('hours')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['h']->key => $_smarty_tpl->tpl_vars['h']->value){
?>
						<option value="<?php echo $_smarty_tpl->tpl_vars['h']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['h']->value;?>
:00</option>
					<?php }} ?>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td width="150px">
				<p><?php echo localize('max_sets',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
			</td>
			<td width="250px">
				<select name="max_sets">
					<option value="3">3</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td colspan="3">
				<p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
				<textarea name="summary"></textarea>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td colspan="3">
				<input type="submit" name="challenge" value="OK" />
			</td>
		</tr>
	</table>
</form>
<?php }else{ ?>
<?php }?>