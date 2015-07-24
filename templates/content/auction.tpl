{*Smarty*}
<h1>{localize('matl_project', $lang)} | {localize('match_auction', $lang)}</h1><br />
{if (isset($user) and ($user != null))}
	<h3>{localize('challenge', $lang)}</h3>
	<form id="newAuctionForm" name="newAuctionForm" action="/match/auction{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
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
					<input type="hidden" name="action" value="new" />
					<input type="submit" name="new" value="{localize('offer_a_match', $lang)}" />
				</td>
			</tr>
		</table>
	</form>
	<br /><hr /><br />
{/if}
{if (isset($matches) and ($matches|@count > 0))}
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		{foreach $matches as $match}
			<tr valign="top">
				<td width="190px" align="left">	
					<img src="{$match->photo_url}" width="170px" border="1" style="background: #EEEEEE" />
					<p><strong><a href="/profile/view/{$match->player_a}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->name}</a></strong></p>
					<p><strong>{localize('age', $lang)}:</strong> {calculateAge($match->birthday)}</p>
					<p><strong>{localize('height', $lang)}:</strong> {$match->height} cm</p>
					<p><strong>{localize('weight', $lang)}:</strong> {$match->weight} kg</p>
					<p><strong>{localize('level', $lang)}:</strong> {localize($match->level, $lang)}</p>
					{if (lastVisit($match->online) < 5)}
						<p><span style="color: grey">online</span></p>
					{else}
						<p><span style="color: grey">{localize('last_visit', $lang)}: {if ($match->online != '0000-00-00 00:00:00')}{$match->online}{else}{localize('a_long_time_ago', $lang)}{/if}</span></p>
					{/if}
				</td>
				<td>
					<p><strong>{localize('match_date', $lang)}:</strong> {mb_substr($match->match_date, 0, 16)}</p>
					{if (!empty($match->summary))}<p><strong>{localize('match_comments', $lang)}:</strong> {$match->summary}</p>{/if}
					<br />
					{if (isset($user) and ($user != null) and ($user->id != $match->player_a))}
						<form id="bidAuctionForm-{$match->id}" name="bidAuctionForm-{$match->id}" action="/match/auction{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
							<input type="hidden" name="action" value="accept" />
							<input type="hidden" name="id" value="{$match->id}" />
							<input type="submit" name="accept" value="{localize('accept_challenge', $lang)}" />
						</form>
					{/if}
					{if (isset($user) and ($user != null) and ($user->id == $match->player_a))}
						<form id="cancelAuctionForm-{$match->id}" name="cancelAuctionForm-{$match->id}" action="/match/auction{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
							<input type="hidden" name="action" value="cancel" />
							<input type="hidden" name="id" value="{$match->id}" />
							<input type="submit" name="accept" value="{localize('cancel_match', $lang)}" />
						</form>
					{/if}
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<br /><hr /><br />
				</td>
			</tr>
		{/foreach}
	</table>
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}