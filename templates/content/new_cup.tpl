{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('new_cup', $lang)}</h1><br />

{if (isset($user) and ($user->permissions > 2))}
	<form id="cupForm" name="cupForm" method="post" action="/match/new_cup{if ($lang != $default_language)}?lang={$lang}{/if}">
		<p>{localize('match_date', $lang)}:</p>
		<div id="calendar" class="calendar"></div>
		<input type="hidden" name="date" id="date" value="{date('Y-m-d')}" />
		<br />
		<label for="hour">{localize('match_time', $lang)}:</label>
		<select name="hour" id="hour">
			{foreach $hours as $h}
				<option value="{$h}">{$h}:00</option>
			{/foreach}
		</select>
		<br /><br />
		<label for="player_a">player_a:</label>
		<select name="player_a" id="player_a">
			<option selected></option>
			{foreach $profiles as $profile}
				<option value="{$profile->id}">{$profile->name}</option>
			{/foreach}
		</select>
		<br /><br />
		<label for="player_b">player_b:</label>
		<select name="player_b" id="player_b">
			<option selected></option>
			{foreach $profiles as $profile}
				<option value="{$profile->id}">{$profile->name}</option>
			{/foreach}
		</select>
		<br /><br />
		<p>{localize('match_comments', $lang)}:</p>
		<textarea class="ckeditor" name="summary" id="summary" ></textarea>
		<br />

		
		<input type="submit" name="action" value="OK" /><br /><br />
	</form>
{/if}