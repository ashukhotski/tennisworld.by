{* Smarty *}
{literal}
	<script type="text/javascript">
		/*$(function(){
			$('#scroll').slimScroll({
				height: '600px'
			});
		});*/
	</script>
{/literal}

<div id="scroll">
	{if (isset($page) and ($page != null))}
		{if (isset($user) and ($user != null) and ($user->permissions > 1))}
			<form id="pageForm" name="pageForm" action="{$request_uri}" method="post">
				<input type="hidden" name="url" value="{$page->url}" />
				{if ($page->url != '')}
					<p>{localize('url', $lang)}:</p>
					<input type="text" name="new_url" value="{$page->url}" /><br />
				
					<p>{localize('parent_page', $lang)}:</p>
					<select name="parent_id">
						<option value="ROOT" {if ($page->parent_id == 'ROOT')}selected{/if}></option>
						{if (isset($menu_links) and ($menu_links|@count > 0))}
							{foreach $menu_links as $link}
								{if (($link->url != $page->url) and ($link->url != ''))}
									<option value="{$link->url}" {if ($link->url == $page->parent_id)}selected{/if}>{$link->title}</option>
								{/if}
							{/foreach}
						{/if}
					</select>
					<br />
				{/if}
				<p>{localize('title', $lang)}:</p>
				<input type="text" name="title" value="{$page->title}" /><br />
				<p>{localize('keywords', $lang)}: </p>
				<textarea name="keywords">{$page->keywords}</textarea><br />
				<p>{localize('text', $lang)}:</p>
				<textarea class="ckeditor" name="body">{$page->body}</textarea><br />
				<select name="action">
					<option value="edit" selected>{localize('edit', $lang)}</option>
					<option value="delete">{localize('delete', $lang)}</option>
				</select>
				<input type="submit" name="submit" value="OK" /><br />
			</form>
		{else}
			{if ($page->parent_id != 'ROOT')}<a href="/{$page->parent_id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('back', $lang)}</a><br />{/if}
			<h1>{$page->title}</h1><br />
			{if (!empty($page->keywords))}<p><strong>{localize('keywords', $lang)}:</strong> <span class="red">{$page->keywords}</span></p><br />{/if}
			{$page->body}
		{/if}
		<br />
		{if (isset($subpages) and ($subpages|@count > 0))}
			{foreach $subpages as $subpage}
				<h3><a href="/{$page->url}/{$subpage->url}{if ($lang != $default_language)}?lang={$lang}{/if}">{$subpage->title}</a></h3>
				{if (!empty($subpage->keywords))}<p>{localize('keywords', $lang)}: <span class="red">{$subpage->keywords}</span></p>{/if}
				<br />
			{/foreach}
		{/if}
		{if (($user != null) and ($page->parent_id != 'ROOT') and ($page->parent_id != ''))}
			<form id="commentForm" name="commentForm" action="{$request_uri}" method="post">
				<p>{localize('write_your_comment', $lang)}:</p>
				<textarea name="body"></textarea><br />
				<input type="submit" name="postComment" value="OK" /><br />
			</form>
		{/if}
		{if (isset($comments) and ($comments|@count > 0))}
			{foreach $comments as $comment}
				<br /><hr /><br />
				<p><strong>{$comment->comment_date} <a href="/profile/view/{$comment->profile_id}{if ($lang != $default_language)}?lang={$lang}{/if}">{$comment->name}</a>:</strong> {$comment->body}</p>
				{if (isset($user) and ($user != null) and ($user->permissions > 1))}
					<form id="delCommentForm-{$comment->id}" name="delCommentForm-{$comment->id}" action="{$request_uri}" method="post">
						<input type="hidden" name="commentId" value="{$comment->id}" />
						<input type="submit" name="deleteComment" value="{localize('delete', $lang)}" /><br />
					</form>
				{/if}
			{/foreach}
		{/if}
	{/if}
</div>