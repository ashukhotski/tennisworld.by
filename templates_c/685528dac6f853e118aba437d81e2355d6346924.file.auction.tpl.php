<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:07:36
         compiled from "templates/content/auction.tpl" */ ?>
<?php /*%%SmartyHeaderCode:21618620453458c685469b6-60785324%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '685528dac6f853e118aba437d81e2355d6346924' => 
    array (
      0 => 'templates/content/auction.tpl',
      1 => 1396963465,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '21618620453458c685469b6-60785324',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<h1><?php echo localize('matl_project',$_smarty_tpl->getVariable('lang')->value);?>
 | <?php echo localize('match_auction',$_smarty_tpl->getVariable('lang')->value);?>
</h1><br />
<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
	<h3><?php echo localize('challenge',$_smarty_tpl->getVariable('lang')->value);?>
</h3>
	<form id="newAuctionForm" name="newAuctionForm" action="/match/auction<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
		<table width="100%" cellspacing="5" cellpadding="5" border="0">
			<tr valign="top" align="left">
				<td width="150px" colspan="2">
					<p><?php echo localize('match_date',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					<div id="calendar" class="calendar"></div>
					<input type="hidden" name="date" id="date" value="<?php echo date('Y-m-d');?>
" />
				</td>
				<td width="150px">
					<p><?php echo localize('match_time',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
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
					<p><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					<textarea name="summary"></textarea>
				</td>
			</tr>
			<tr valign="center" align="left">
				<td colspan="3">
					<input type="hidden" name="action" value="new" />
					<input type="submit" name="new" value="<?php echo localize('offer_a_match',$_smarty_tpl->getVariable('lang')->value);?>
" />
				</td>
			</tr>
		</table>
	</form>
	<br /><hr /><br />
<?php }?>
<?php if ((isset($_smarty_tpl->getVariable('matches',null,true,false)->value)&&(count($_smarty_tpl->getVariable('matches')->value)>0))){?>
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<?php  $_smarty_tpl->tpl_vars['match'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('matches')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['match']->key => $_smarty_tpl->tpl_vars['match']->value){
?>
			<tr valign="top">
				<td width="190px" align="left">	
					<img src="<?php echo $_smarty_tpl->getVariable('match')->value->photo_url;?>
" width="170px" border="1" style="background: #EEEEEE" />
					<p><strong><a href="/profile/view/<?php echo $_smarty_tpl->getVariable('match')->value->player_a;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('match')->value->name;?>
</a></strong></p>
					<p><strong><?php echo localize('age',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo calculateAge($_smarty_tpl->getVariable('match')->value->birthday);?>
</p>
					<p><strong><?php echo localize('height',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo $_smarty_tpl->getVariable('match')->value->height;?>
 cm</p>
					<p><strong><?php echo localize('weight',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo $_smarty_tpl->getVariable('match')->value->weight;?>
 kg</p>
					<p><strong><?php echo localize('level',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo localize($_smarty_tpl->getVariable('match')->value->level,$_smarty_tpl->getVariable('lang')->value);?>
</p>
					<?php if ((lastVisit($_smarty_tpl->getVariable('match')->value->online)<5)){?>
						<p><span style="color: grey">online</span></p>
					<?php }else{ ?>
						<p><span style="color: grey"><?php echo localize('last_visit',$_smarty_tpl->getVariable('lang')->value);?>
: <?php if (($_smarty_tpl->getVariable('match')->value->online!='0000-00-00 00:00:00')){?><?php echo $_smarty_tpl->getVariable('match')->value->online;?>
<?php }else{ ?><?php echo localize('a_long_time_ago',$_smarty_tpl->getVariable('lang')->value);?>
<?php }?></span></p>
					<?php }?>
				</td>
				<td>
					<p><strong><?php echo localize('match_date',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo mb_substr($_smarty_tpl->getVariable('match')->value->match_date,0,16);?>
</p>
					<?php if ((!empty($_smarty_tpl->getVariable('match',null,true,false)->value->summary))){?><p><strong><?php echo localize('match_comments',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <?php echo $_smarty_tpl->getVariable('match')->value->summary;?>
</p><?php }?>
					<br />
					<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id!=$_smarty_tpl->getVariable('match')->value->player_a))){?>
						<form id="bidAuctionForm-<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" name="bidAuctionForm-<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" action="/match/auction<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
							<input type="hidden" name="action" value="accept" />
							<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
							<input type="submit" name="accept" value="<?php echo localize('accept_challenge',$_smarty_tpl->getVariable('lang')->value);?>
" />
						</form>
					<?php }?>
					<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->id==$_smarty_tpl->getVariable('match')->value->player_a))){?>
						<form id="cancelAuctionForm-<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" name="cancelAuctionForm-<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" action="/match/auction<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>" method="post">
							<input type="hidden" name="action" value="cancel" />
							<input type="hidden" name="id" value="<?php echo $_smarty_tpl->getVariable('match')->value->id;?>
" />
							<input type="submit" name="accept" value="<?php echo localize('cancel_match',$_smarty_tpl->getVariable('lang')->value);?>
" />
						</form>
					<?php }?>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br /><hr /><br />
				</td>
			</tr>
		<?php }} ?>
	</table>
<?php }else{ ?>
	<p><?php echo localize('empty',$_smarty_tpl->getVariable('lang')->value);?>
</p><br />
<?php }?>