{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('random_match', $lang)}</h1><br />
{if (isset($user) and ($user != null))}
	<h3>{localize('challenge', $lang)}</h3>
	<form id="randomForm" name="randomForm" action="/match/random{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
		<table width="100%" cellspacing="5" cellpadding="5" border="0">
			<tr valign="top" align="left">
				<td width="150px" colspan="2">
					<p>{localize('match_date', $lang)}:</p>
					<div id="calendar" class="calendar"></div>
					<input type="hidden" name="date" id="date" value="{date('Y-m-d')}" />
				</td>
				<td width="150px">
					<p>{localize('match_time', $lang)}:</p>
					<select name="hour">
						{foreach $hours as $h}
							<option value="{$h}">{$h}:00</option>
						{/foreach}
					</select>
				</td>
				<td>
					<p>{localize('match_comments', $lang)}:</p>
					<textarea name="summary"></textarea>
				</td>
			</tr>
			<tr valign="center" align="left">
				<td colspan="3">
					<input type="hidden" name="challenge" value="random" />
					<input type="submit" name="new" value="{localize('challenge', $lang)}" />
				</td>
			</tr>
		</table>
	</form>
	<br /><hr /><br />
{/if}