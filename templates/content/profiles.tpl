{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('people', $lang)}</h1>
<a href="/profile/list/all{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('all', $lang)}</a> | <a href="/profile/list/players{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('players', $lang)}</a> | <a href="/profile/list/coaches{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('coaches', $lang)}</a> | <a href="/profile/list/lovers{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('just_tennis_lovers', $lang)}</a><br /><br />
<form id="searchForm" name="searchForm" action="{$request_uri}" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td>
				<p>{localize('name', $lang)}</p>
				<input type="text" name="name" value="" />
			</td>
			<td>
				<p>{localize('city', $lang)}</p>
				<input type="text" name="city" value="" />
			</td>
			<td>
				<p>{localize('level', $lang)}</p>
				<select name="level">
					<option value="" selected></option>
					<option value="not_specified">{localize('not_specified', $lang)}</option>
					<option value="beginner">{localize('beginner', $lang)}</option>
					<option value="medium">{localize('medium', $lang)}</option>
					<option value="advanced">{localize('advanced', $lang)}</option>
					<option value="profi">{localize('profi', $lang)}</option>
				</select>
			</td>
			<td><br /><input type="checkbox" name="online" id="online" value="online" /><label for="online">{localize('online', $lang)}</label></td>
			<td><br /><input type="submit" name="search" value="OK" /></td>
		</tr>
	</table>
</form><br />
{if (isset($profiles) and ($profiles|@count > 0))}
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		{foreach $profiles as $profile}
			<tr valign="top" align="left">
				<td width="120px">
					<img class="profile-image-mini" src="{$profile->photo_url}" /><br />
				</td>
				<td>
					<p><a href="/profile/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize($profile->name, $lang)}</a> ({localize('age', $lang)}: {calculateAge($profile->birthday)}){if (!empty($profile->city))}, {$profile->city}{/if}{if (!empty($profile->phone))}, {$profile->phone}{/if}</p>
					<p><strong>{localize('profile_type', $lang)}:</strong> {localize($profile->profile_type, $lang)}</p>
					<p><strong>{localize('level', $lang)}:</strong> {localize($profile->level, $lang)}</p>
					{if (lastVisit($profile->online) < 5)}
						<p><span style="color: grey">online</span></p>
					{else}
						<p><span style="color: grey">{localize('last_visit', $lang)}: {if ($profile->online != '0000-00-00 00:00:00')}{$profile->online}{else}{localize('a_long_time_ago', $lang)}{/if}</span></p>
					{/if}<br />
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<hr />
				</td>
			</tr>
		{/foreach}
	</table>
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}