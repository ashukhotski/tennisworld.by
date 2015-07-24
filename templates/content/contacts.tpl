{*Smarty*}
{if (isset($person) and isset($displayed_contacts))}
	<h1>{$person->name} | 
	{if ($displayed_contacts == 'following')}
		{localize('followings', $lang)} ({$contacts_count})</h1> <a href="/contact/followers/{$person->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('followers', $lang)}</a>
	{elseif ($displayed_contacts == 'followers')} 
		{localize('followers', $lang)} ({$contacts_count})</h1> <a href="/contact/following/{$person->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('followings', $lang)}</a>
	{else}</h1>{/if}
	<br /><br />
	{if (isset($profiles) and ($profiles|@count > 0))}
		<table width="100%" cellspacing="5" cellpadding="5" border="0">
			{foreach $profiles as $profile}
				<tr valign="top" align="left">
					<td width="120px">
						<img class="profile-image-mini" src="{$profile->photo_url}" /><br />
					</td>
					<td>
						<p><a href="/profile/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize($profile->name, $lang)}</a> {if (lastVisit($profile->online) < 5)}
							<span style="color: grey">(online)</span>
						{else}
							<span style="color: grey">({localize('last_visit', $lang)}: {if ($profile->online != '0000-00-00 00:00:00')}{$profile->online}{else}{localize('a_long_time_ago', $lang)}{/if})</span>
						{/if}</p>
						<!--{if (($user != null) and ($displayed_contacts == 'following'))}
							<p><a href="/contact/remove/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('unfollow', $lang)}</a></p>
						{elseif (($user != null) and ($displayed_contacts == 'followers'))} 
							<p><a href="/contact/new/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('follow', $lang)}</a></p>
						{else}{/if}-->
						<p><a href="/match/new/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('call_for_match', $lang)}</a> | <a href="/conversation/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('start_conversation', $lang)}</a></p>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr />
					</td>
				</tr>
			{/foreach}
		</table>
	{/if}
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}