{* Smarty *}
<ul>
	<li><a href="/{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('matl_project', $lang)}</a></li>
	<li><a href="/profile/list{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('people', $lang)}</a></li>
	<li><a href="/match/list{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('matches', $lang)}</a></li>
	<li><a href="/rating{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('rating', $lang)}</a></li>
	<li><a href="/fame/list{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('hall_of_fame', $lang)}</a></li>
	{if (isset($menu_links) and ($menu_links|@count > 0))}
		{foreach $menu_links as $link}
			{if ($link->url != '')}<li><a href="/{$link->url}{if ($lang != $default_language)}?lang={$lang}{/if}">{$link->title}</a></li>{/if}
		{/foreach}
	{/if}
	{if (isset($user) and ($user != null))}
		{if ($user->permissions > 0)}
			<li>
				<a href="/match/new_cup{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('new_cup_match', $lang)}</a>
			</li> 
		{/if}
		{if ($user->permissions > 1)}
			<li>
				<a href="/create_new_page{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('new_page', $lang)}</a>
			</li> 
		{/if}
		{if ($user->permissions > 2)}
			<li>
				<a href="/localization{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('localization', $lang)}</a>
			</li>
			<li>
				<a href="/generate_sitemap{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('sitemap', $lang)}</a>
			</li>
		{/if}
	{/if}
</ul>
