{* Smarty *}
<h1><a class="header-link" href="/{if ($lang != $default_language)}?lang={$lang}{/if}"><span class="yellow">TENNIS</span><span class="white">WORLD</span></a></h1><br />
<p>{localize('social_network_for_tennis_lovers', $lang)}</p><br />

<div class="header-menu round">
	{if (isset($user) and ($user != null))}
		<span><a href="/profile/view/{$user->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('my_page', $lang)}</a></span>
		<span><a href="/signin/logoff{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('exit', $lang)}</a></span>
	{else}
		<span><a href="/signup{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('signin', $lang)} | {localize('signup', $lang)}</a></span>
	{/if}
	<span><strong class="red">new!</strong> <a href="/match/auction{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('match_auction', $lang)} </a></span> 
	<span><strong class="red">new!</strong> <a href="/match/cup{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('cup', $lang)} </a></span> 
</div><br />
<span class="header-contacts">
	{localize('contact_info', $lang)}
</span>
<img class="logo" src="/theme/img/players_logo.png" />
<!--
{if (isset($languages) and ($languages|@count > 0))}
	<div class="header-localize">
		{foreach $languages as $language}
			<a href="{$request_uri}" onclick="javascript: document.cookie = 'lang={$language->id}; path=/; domain=.{$cookie_domain}';"><img src="{$language->icon}" /></a>
		{/foreach}
	</div>
{/if}
-->
<div class="header-localize">
	<select onchange="javascript: document.cookie = 'lang='+this.value+'; path=/; domain=.{$cookie_domain}'; document.location = (this.value == '{$default_language}') ? '{array_shift(explode('?lang=', $request_uri))}' : '{array_shift(explode('?lang=', $request_uri))}?lang='+this.value">
		<option value="be" {if ($lang == 'be')}selected{/if}>на беларускай</option>
		<option value="ru" {if ($lang == 'ru')}selected{/if}>на русском</option>
	</select><br />
</div>
