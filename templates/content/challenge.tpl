{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('challenge', $lang)}</h1><br />
{if (isset($profile) and ($profile != null))}
<form id="challengeForm" name="challengeForm" action="/match/new/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="center" align="left">
			<td width="150px">
				<p>{localize('competitor', $lang)}:</p>
			</td>
			<td width="250px">
				<p><a href="/profile/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{$profile->name}</a></p>
				<input type="hidden" name="playerB" value="{$profile->id}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td width="150px" colspan="3">
				<p>{localize('match_date', $lang)}:</p>
				<div id="calendar" class="calendar"></div>
				<input type="hidden" name="date" id="date" value="{date('Y-m-d')}" />
			</td>
		</tr>
		<tr valign="center" align="left">
			<td width="150px">
				<p>{localize('match_time', $lang)}:</p>
			</td>
			<td width="250px">
				<select name="hour">
					{foreach $hours as $h}
						<option value="{$h}">{$h}:00</option>
					{/foreach}
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td width="150px">
				<p>{localize('max_sets', $lang)}:</p>
			</td>
			<td width="250px">
				<select name="max_sets">
					<option value="3">3</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td colspan="3">
				<p>{localize('match_comments', $lang)}:</p>
				<textarea name="summary"></textarea>
			</td>
		</tr>
		<tr valign="center" align="left">
			<td colspan="3">
				<input type="submit" name="challenge" value="OK" />
			</td>
		</tr>
	</table>
</form>
{else}
{/if}