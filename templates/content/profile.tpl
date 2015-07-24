{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('people', $lang)} {if (isset($profile) and ($profile != null))}| {$profile->name}{/if}</h1>
{if (isset($profile) and ($profile != null))}
	{if (lastVisit($profile->online) < 5)}
		<p><span style="color: grey">online</span></p>
	{else}
		<p><span style="color: grey">{localize('last_visit', $lang)}: {if ($profile->online != '0000-00-00 00:00:00')}{$profile->online}{else}{localize('a_long_time_ago', $lang)}{/if}</span></p>
	{/if}
{/if}
<br />
{if (isset($profile) and ($profile != null))}
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="220px" rowspan="13">
				{if (isset($user) and ($user != null) and ($user->permissions > 2) and ($user->permissions > $profile->permissions))}
					<form id="adminForm" name="adminForm" action="/profile/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
						<input type="hidden" name="action" value="access" />
						<input type="hidden" name="_id" value="{$profile->id}" />
						<select name="permissions">
							<option value="0" {if ($profile->permissions == 0)}selected{/if}>{localize('user', $lang)}</option>
							<option value="1" {if ($profile->permissions == 1)}selected{/if}>{localize('match_manager', $lang)}</option>
							<option value="2" {if ($profile->permissions == 2)}selected{/if}>{localize('content_manager', $lang)}</option>
							{if ($user->permissions > 3)}<option value="3" {if ($profile->permissions == 3)}selected{/if}>{localize('administrator', $lang)}</option>{/if}
						</select>
						<input type="submit" name="submit" value="OK" />
					</form>
					{if ($user->permissions > 3)}
						<form id="deleteForm" name="deleteForm" action="/profile/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
							<input type="hidden" name="action" value="delete" />
							<input type="hidden" name="_id" value="{$profile->id}" />
							<input type="submit" name="submit" value="delete" />
						</form>
					{/if}
				{/if}
				<img class="profile-image" src="{$profile->photo_url}" /><br />
				<div class="profile-sidebar">
					<ul>
						<li><a href="/match/player/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('matches', $lang)}</a></li>
						<li><a href="/contact/followers/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('followers', $lang)}</a></li>
						<li><a href="/contact/following/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('followings', $lang)}</a></li>
					{if (isset($user) and ($user != null) and ($user->id == $profile->id))}
						<li><a href="/profile/edit{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('edit', $lang)}</a></li>
						</ul>
					{elseif (isset($user) and ($user != null) and ($user->id != $profile->id))}
						{if (isset($followed) and ($followed > 0))}
							<li><a href="/contact/remove/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('unfollow', $lang)}</a></li>
						{else}
							<li><a href="/contact/new/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('follow', $lang)}</a></li>
						{/if}
						<li><a href="/match/new/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}"><span style="font-size: 16px">{localize('call_for_match', $lang)}</span></a></li>
						<li><a href="/conversation/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('start_conversation', $lang)}</a></li>
						</ul>
					{else}
						</ul>
					{/if}
				</div><br />
				{if (isset($user) and ($user != null) and ($user->id != $profile->id))}
					<p>{localize('fast_message', $lang)}:</p>
					<form id="messageForm" name="messageForm" action="/conversation/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
						<textarea name="body" style="width: 200px; height: 80px; resize: none; overflow-y: scroll"></textarea><br />
						<input type="hidden" name="recipient" value="{$profile->id}" />
						<input type="submit" name="message" value="OK" />
					</form>
				{/if}
			</td>
			<td width="120px">
				<p><strong>{localize('name', $lang)}:</strong></p>
			</td>
			<td>
				<p>{localize($profile->name, $lang)}  </p>
			</td>
		</tr>	
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('age', $lang)}:</strong></p>
			</td>
			<td>
				<p>{calculateAge($profile->birthday)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('rating', $lang)}:</strong></p>
			</td>
			<td>
				<p>{if (isset($plmatches) and ($plmatches|@count > 0))}<b>{$profile->position}</b> ({$profile->points} pts){else}-{/if}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('phone', $lang)}:</strong></p>
			</td>
			<td>
				<p>{$profile->phone}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('city', $lang)}:</strong></p>
			</td>
			<td>
				<p>{$profile->city}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('height', $lang)}:</strong></p>
			</td>
			<td>
				<p>{if ($profile->height > 0)}{$profile->height} {localize('cm', $lang)}{else}{localize('not_specified', $lang)}{/if}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('weight', $lang)}:</strong></p>
			</td>
			<td>
				<p>{if ($profile->weight > 0)}{$profile->weight} {localize('kg', $lang)}{else}{localize('not_specified', $lang)}{/if}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('profile_type', $lang)}:</strong></p>
			</td>
			<td>
				<p>{localize($profile->profile_type, $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('level', $lang)}:</strong></p>
			</td>
			<td>
				<p>{localize($profile->level, $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('plays', $lang)}:</strong></p>
			</td>
			<td>
				<p>{localize($profile->plays, $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('backhand', $lang)}:</strong></p>
			</td>
			<td>
				<p>{localize($profile->backhand, $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="120px">
				<p><strong>{localize('racket', $lang)}:</strong></p>
			</td>
			<td>
				<p>{localize($profile->racket, $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="2">
				<p><strong>{localize('bio', $lang)}:</strong></p>
				{if (trim($profile->bio) != '')}{$profile->bio}{else}<p>{localize('empty', $lang)}</p>{/if}
				<br />
				{if (isset($plmatches) and ($plmatches|@count > 0))}
					<b>2014-01-01 00:00</b>
					<div style="display: block; height: 20px; width: 300px; background: #ccffff; margin: 4px 0;">
						<b>&nbsp;&nbsp;&nbsp;+1000 pts!</b>
					</div>
					{foreach array_reverse($plmatches) as $match}
						{if ($match->player_a == $profile->id)}
							<b><a href="/match/view/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}"><u>{mb_substr($match->match_date, 0, 16)}</u></a> vs <a href="/profile/view/{$match->player_b}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_b_name}</a></b>
							<div style="display: block; height: 20px; width: {$match->player_a_points - 700}px; background: {if ($match->player_a_diff > 0)}#ccffff{else}#ffccff{/if}; margin: 4px 0;">
								<b>&nbsp;&nbsp;&nbsp;{if ($match->player_a_diff > 0)}+{/if}{$match->player_a_diff} pts = {$match->player_a_points}</b>
							</div>
						{/if}
						{if ($match->player_b == $profile->id)}
							<b><a href="/match/view/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}"><u>{mb_substr($match->match_date, 0, 16)}</u></a> vs <a href="/profile/view/{$match->player_a}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_a_name}</a></b>
							<div style="display: block; height: 2p0x; width: {$match->player_b_points - 700}px; background: {if ($match->player_b_diff > 0)}#ccffff{else}#ffccff{/if}; margin: 4px 0;">
								<b>&nbsp;&nbsp;&nbsp;{if ($match->player_b_diff > 0)}+{/if}{$match->player_b_diff} pts = {$match->player_b_points}</b>
							</div>
						{/if}
					{/foreach}
				{/if}
			</td>
		</tr>		
	</table>
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}