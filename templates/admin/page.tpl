{* Smarty *}
<div id="scroll">
	{if (isset($user) and ($user != null) and ($user->permissions > 1))}
		<form id="pageForm" name="pageForm" action="/create_new_page{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
			<p>{localize('url', $lang)}:</p>
			<input type="text" name="url" value="{if (isset($page))}{$page->url}{/if}" /><br />
				
			<p>{localize('title', $lang)}:</p>
			<input type="text" name="title" value="{if (isset($page))}{$page->title}{/if}" /><br />
				
			<p>{localize('parent_page', $lang)}:</p>
			<select name="parent_id">
				<option value="ROOT" {if (isset($page) and ($page->parent_id == 'ROOT'))}selected{/if}></option>
				{if (isset($menu_links) and ($menu_links|@count > 0))}
					{foreach $menu_links as $link}
						{if ($link->url != '')}<option value="{$link->url}" {if (isset($page) and ($link->url == $page->parent_id))}selected{/if}>{$link->title}</option>{/if}
					{/foreach}
				{/if}
			</select>
			<br />

			<p>{localize('keywords', $lang)}: </p>
			<textarea name="keywords">{if (isset($page))}{$page->keywords}{/if}</textarea><br />
			<p>{localize('text', $lang)}:</p>
			<textarea class="ckeditor" name="body">{if (isset($page))}{$page->body}{/if}</textarea><br />
			<input type="hidden" name="action" value="create" />
			<input type="submit" name="submit" value="OK" /><br />
		</form>
	{/if}
</div>