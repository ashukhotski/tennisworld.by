<?php /* Smarty version Smarty-3.0.8, created on 2014-04-09 21:02:18
         compiled from "templates/content/page.tpl" */ ?>
<?php /*%%SmartyHeaderCode:111149676853458b2a013470-26389624%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f3e817fb113702eebb8576d2a068a34b8f8572e9' => 
    array (
      0 => 'templates/content/page.tpl',
      1 => 1396963501,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '111149676853458b2a013470-26389624',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>


	<script type="text/javascript">
		/*$(function(){
			$('#scroll').slimScroll({
				height: '600px'
			});
		});*/
	</script>


<div id="scroll">
	<?php if ((isset($_smarty_tpl->getVariable('page',null,true,false)->value)&&($_smarty_tpl->getVariable('page')->value!=null))){?>
		<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>1))){?>
			<form id="pageForm" name="pageForm" action="<?php echo $_smarty_tpl->getVariable('request_uri')->value;?>
" method="post">
				<input type="hidden" name="url" value="<?php echo $_smarty_tpl->getVariable('page')->value->url;?>
" />
				<?php if (($_smarty_tpl->getVariable('page')->value->url!='')){?>
					<p><?php echo localize('url',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					<input type="text" name="new_url" value="<?php echo $_smarty_tpl->getVariable('page')->value->url;?>
" /><br />
				
					<p><?php echo localize('parent_page',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
					<select name="parent_id">
						<option value="ROOT" <?php if (($_smarty_tpl->getVariable('page')->value->parent_id=='ROOT')){?>selected<?php }?>></option>
						<?php if ((isset($_smarty_tpl->getVariable('menu_links',null,true,false)->value)&&(count($_smarty_tpl->getVariable('menu_links')->value)>0))){?>
							<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('menu_links')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
?>
								<?php if ((($_smarty_tpl->getVariable('link')->value->url!=$_smarty_tpl->getVariable('page')->value->url)&&($_smarty_tpl->getVariable('link')->value->url!=''))){?>
									<option value="<?php echo $_smarty_tpl->getVariable('link')->value->url;?>
" <?php if (($_smarty_tpl->getVariable('link')->value->url==$_smarty_tpl->getVariable('page')->value->parent_id)){?>selected<?php }?>><?php echo $_smarty_tpl->getVariable('link')->value->title;?>
</option>
								<?php }?>
							<?php }} ?>
						<?php }?>
					</select>
					<br />
				<?php }?>
				<p><?php echo localize('title',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
				<input type="text" name="title" value="<?php echo $_smarty_tpl->getVariable('page')->value->title;?>
" /><br />
				<p><?php echo localize('keywords',$_smarty_tpl->getVariable('lang')->value);?>
: </p>
				<textarea name="keywords"><?php echo $_smarty_tpl->getVariable('page')->value->keywords;?>
</textarea><br />
				<p><?php echo localize('text',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
				<textarea class="ckeditor" name="body"><?php echo $_smarty_tpl->getVariable('page')->value->body;?>
</textarea><br />
				<select name="action">
					<option value="edit" selected><?php echo localize('edit',$_smarty_tpl->getVariable('lang')->value);?>
</option>
					<option value="delete"><?php echo localize('delete',$_smarty_tpl->getVariable('lang')->value);?>
</option>
				</select>
				<input type="submit" name="submit" value="OK" /><br />
			</form>
		<?php }else{ ?>
			<?php if (($_smarty_tpl->getVariable('page')->value->parent_id!='ROOT')){?><a href="/<?php echo $_smarty_tpl->getVariable('page')->value->parent_id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo localize('back',$_smarty_tpl->getVariable('lang')->value);?>
</a><br /><?php }?>
			<h1><?php echo $_smarty_tpl->getVariable('page')->value->title;?>
</h1><br />
			<?php if ((!empty($_smarty_tpl->getVariable('page',null,true,false)->value->keywords))){?><p><strong><?php echo localize('keywords',$_smarty_tpl->getVariable('lang')->value);?>
:</strong> <span class="red"><?php echo $_smarty_tpl->getVariable('page')->value->keywords;?>
</span></p><br /><?php }?>
			<?php echo $_smarty_tpl->getVariable('page')->value->body;?>

		<?php }?>
		<br />
		<?php if ((isset($_smarty_tpl->getVariable('subpages',null,true,false)->value)&&(count($_smarty_tpl->getVariable('subpages')->value)>0))){?>
			<?php  $_smarty_tpl->tpl_vars['subpage'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('subpages')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['subpage']->key => $_smarty_tpl->tpl_vars['subpage']->value){
?>
				<h3><a href="/<?php echo $_smarty_tpl->getVariable('page')->value->url;?>
/<?php echo $_smarty_tpl->getVariable('subpage')->value->url;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('subpage')->value->title;?>
</a></h3>
				<?php if ((!empty($_smarty_tpl->getVariable('subpage',null,true,false)->value->keywords))){?><p><?php echo localize('keywords',$_smarty_tpl->getVariable('lang')->value);?>
: <span class="red"><?php echo $_smarty_tpl->getVariable('subpage')->value->keywords;?>
</span></p><?php }?>
				<br />
			<?php }} ?>
		<?php }?>
		<?php if ((($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('page')->value->parent_id!='ROOT')&&($_smarty_tpl->getVariable('page')->value->parent_id!=''))){?>
			<form id="commentForm" name="commentForm" action="<?php echo $_smarty_tpl->getVariable('request_uri')->value;?>
" method="post">
				<p><?php echo localize('write_your_comment',$_smarty_tpl->getVariable('lang')->value);?>
:</p>
				<textarea name="body"></textarea><br />
				<input type="submit" name="postComment" value="OK" /><br />
			</form>
		<?php }?>
		<?php if ((isset($_smarty_tpl->getVariable('comments',null,true,false)->value)&&(count($_smarty_tpl->getVariable('comments')->value)>0))){?>
			<?php  $_smarty_tpl->tpl_vars['comment'] = new Smarty_Variable;
 $_from = $_smarty_tpl->getVariable('comments')->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
if ($_smarty_tpl->_count($_from) > 0){
    foreach ($_from as $_smarty_tpl->tpl_vars['comment']->key => $_smarty_tpl->tpl_vars['comment']->value){
?>
				<br /><hr /><br />
				<p><strong><?php echo $_smarty_tpl->getVariable('comment')->value->comment_date;?>
 <a href="/profile/view/<?php echo $_smarty_tpl->getVariable('comment')->value->profile_id;?>
<?php if (($_smarty_tpl->getVariable('lang')->value!=$_smarty_tpl->getVariable('default_language')->value)){?>?lang=<?php echo $_smarty_tpl->getVariable('lang')->value;?>
<?php }?>"><?php echo $_smarty_tpl->getVariable('comment')->value->name;?>
</a>:</strong> <?php echo $_smarty_tpl->getVariable('comment')->value->body;?>
</p>
				<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null)&&($_smarty_tpl->getVariable('user')->value->permissions>1))){?>
					<form id="delCommentForm-<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
" name="delCommentForm-<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
" action="<?php echo $_smarty_tpl->getVariable('request_uri')->value;?>
" method="post">
						<input type="hidden" name="commentId" value="<?php echo $_smarty_tpl->getVariable('comment')->value->id;?>
" />
						<input type="submit" name="deleteComment" value="<?php echo localize('delete',$_smarty_tpl->getVariable('lang')->value);?>
" /><br />
					</form>
				<?php }?>
			<?php }} ?>
		<?php }?>
	<?php }?>
</div>