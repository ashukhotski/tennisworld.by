{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('hall_of_fame', $lang)}</h1>
<p>{if ($lang == 'be')}ад 11 студзеня 2014 года{else}от 11 января 2014 года{/if}</p><br />

{if (isset($profiles) and isset($user) and ($user->permissions > 2))}
	<form id="fameForm" name="fameForm" method="post" action="/fame/new">
		<label for="playerId">player:</label>
		<select name="playerId" id="playerId">
			<option selected></option>
			{foreach $profiles as $profile}
				<option value="{$profile->id}">{$profile->name}</option>
			{/foreach}
		</select>
		<br />
		<label for="tournament">tournament:</label>
		<input type="text" name="tournament" id="tournament" />
		<br />
		<label for="title">title:</label>
		<select name="title" id="title">
			<option selected></option>
			<option value="semifinalist">{localize('semifinalist', $lang)}</option>
			<option value="finalist">{localize('finalist', $lang)}</option>
			<option value="champion">{localize('champion', $lang)}</option>
			<option value="miss_tennis">{localize('miss_tennis', $lang)}</option>
			<option value="tennis_hero">{localize('tennis_hero', $lang)}</option>
		</select>
		
		<input type="submit" name="new" value="OK" /><br /><br />
	</form>
{/if}

{if (isset($titles) and ($titles|@count > 0))}

	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		{foreach $titles as $title}
			<tr valign="top" align="left">
				<td width="120px">
					<img class="profile-image-mini" src="{$title->photo_url}" />
					<p><a href="/profile/view/{$title->player_id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize($title->name, $lang)}</a></p><br />
				</td>
				<td>
					
					{if (isset($title->medals) and ($title->medals|@count > 0))}
						{foreach $title->medals as $medal}
							<img style="display: inline-block; height: 100px; margin: 5px; cursor: pointer" alt="{localize($medal->tournament, $lang)} - {localize($medal->title, $lang)}{if (isset($user) and ($user->permissions > 2))} id:{$medal->id}{/if}" title="{localize($medal->tournament, $lang)} - {localize($medal->title, $lang)}" src="{$medal->picture}" />
						{/foreach}
					{/if}
					<br />
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