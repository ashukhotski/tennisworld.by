{*Smarty*}
{if (isset($match) and ($match != null) and ($player_a != null) and ($player_b != null))}
	<h1>{localize('matl_project', $lang)} | {localize('matches', $lang)} | {$match->player_a_name} - {$match->player_b_name}</h1>
	<p>{mb_substr($match->match_date, 0, 16)}</p><br />
	{if (($match->status == 'unaccepted') and ($user != null) and ($user->id == $match->player_a))}
		<p>{localize('competitor', $lang)}: <a href="/profile/view/{$match->player_b}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_b_name}</a></p>
		<p>{localize('challenge_has_not_been_accepted_yet', $lang)}</p><br />
		{if (!empty($match->summary))}<p>{localize('match_comments', $lang)}: {$match->summary}</p><br />{/if}
		<form id="challengeForm" name="challengeForm" action="/match/cancel/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
			<input type="hidden" name="_id" value="{$match->id}" />
			<input type="submit" name="cancel" value="{localize('cancel_match', $lang)}" />
		</form>
		
	{elseif (($match->status == 'unaccepted') and ($user != null) and ($user->id == $match->player_b))}
		<p>{localize('challenge_has_not_been_accepted_yet', $lang)}</p><br />
		{if (!empty($match->summary))}<p>{localize('match_comments', $lang)}: {$match->summary}</p><br />{/if}
		<form id="challengeForm" name="challengeForm" action="/match/edit/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
			<table width="100%" cellspacing="5" cellpadding="5" border="0">
				<tr valign="center" align="left">
					<td width="170px">
						<p>{localize('competitor', $lang)}:</p>
					</td>
					<td width="270px">
						<p><a href="/profile/view/{$match->player_a}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_a_name}</a></p>
						<input type="hidden" name="playerB" value="{$match->player_a}" />
					</td>
					<td>
						<p> </p>
					</td>
				</tr>
				<tr valign="center" align="left">
					<td width="170px">
						<p>{localize('match_date', $lang)}:</p>
					</td>
					<td width="270px">
						<p>{mb_substr($match->match_date, 0, 16)}</p>
					</td>
					<td>
						<p> </p>
					</td>
				</tr>
				<tr valign="center" align="left">
					<td width="170px">
						<p>{localize('max_sets', $lang)}:</p>
					</td>
					<td width="270px">
						<select name="max_sets">
							<option value="3" {if ($match->max_sets == 3)}selected{/if}>3</option>
						</select>
					</td>
					<td>
						<p> </p>
					</td>
				</tr>
			</table>
			<select name="action">
				<option value="ready">{localize('accept_challenge', $lang)}</option>
				<option value="deny">{localize('deny_challenge', $lang)}</option>
			</select>
			<input type="hidden" name="_id" value="{$match->id}" />
			<input type="submit" name="edit" value="OK" />
		</form>
	{elseif (($match->status == 'accepted') and ($user != null) and ($user->id == $match->player_a))}
		<p>{localize('challenge_has_been_accepted_but_not_ready_to_play', $lang)}</p>
		<p>{localize('competitor', $lang)}: <a href="/profile/view/{$match->player_b}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_b_name}</a></p>
		<p>{localize('dont_forget_to_check_match_date', $lang)}</p><br />
		<form id="challengeForm" name="challengeForm" action="/match/edit/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
			<select name="action">
				<option value="ready">{localize('ready_to_play', $lang)}</option>
				<option value="deny">{localize('deny_challenge', $lang)}</option>
			</select>
			<input type="hidden" name="_id" value="{$match->id}" />
			<input type="submit" name="edit" value="OK" />
		</form>
	{elseif (($match->status == 'accepted') and ($user != null) and ($user->id == $match->player_b))}
		<p>{localize('challenge_has_been_accepted_but_not_ready_to_play', $lang)}</p>
		<p>{localize('wait_until_your_opponent_check_it', $lang)}</p>
		<p>{localize('competitor', $lang)}: <a href="/profile/view/{$match->player_a}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_a_name}</a></p><br />
		<form id="challengeForm" name="challengeForm" action="/match/edit/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
			<input type="hidden" name="action" value="deny" />
			<input type="hidden" name="_id" value="{$match->id}" />
			<input type="submit" name="edit" value="{localize('deny_challenge', $lang)}" />
		</form>
	{elseif (($match->status == 'ready_to_play') or ($match->status == 'to_be_continued') or ($match->status == 'finished') or ($match->status == 'cup'))}
		{if ($match->status == 'ready_to_play')}
			<p>{localize('match_is_ready_to_play', $lang)}</p>
			<p>{localize('waiting_for_results', $lang)}</p><br />
		{/if}
		{if ($match->status == 'to_be_continued')}
			<p>{localize('to_be_continued', $lang)}</p><br />
		{/if} 
		
		{if (!empty($match->summary))}<p>{localize('match_comments', $lang)}: {$match->summary}</p><br />{/if}
		{if (($user != null) and ($user->permissions > 0))}
			<form id="challengeForm" name="challengeForm" action="/match/edit/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
				<p>{localize('edit_general_info', $lang)}:</p>
				<table width="100%" cellspacing="5" cellpadding="5" border="0">
					<tr valign="center" align="left">
						<td width="150px" colspan="3">
							<p>{localize('match_date', $lang)}:</p>
							<div id="calendar" class="calendar"></div>
							<input type="hidden" name="date" id="date" value="{$match->match_date}" />
						</td>
					</tr>
					<tr valign="center" align="left">
						<td width="170px">
							<p>{localize('match_time', $lang)}:</p>
						</td>
						<td width="270px">
							<select name="hour">
								{foreach $hours as $h}
									<option value="{$h}" {if (mb_substr($match->match_date, 11, 2) == $h)}selected{/if}>{$h}:00</option>
								{/foreach}
							</select>
						</td>
						<td>
							<p> </p>
						</td>
					</tr>
					<tr valign="center" align="left">
						<td width="170px">
							<p>{localize('max_sets', $lang)}:</p>
						</td>
						<td width="270px">
							<select name="max_sets">
								<option value="3" {if ($match->max_sets == 3)}selected{/if}>3</option>
							</select>
						</td>
						<td>
							<p> </p>
						</td>
					</tr>
					<tr valign="center" align="left">
						<td colspan="3">
							<p>{localize('match_comments', $lang)}:</p>
							<textarea name="summary">{$match->summary}</textarea>
						</td>
					</tr>
				</table>
		{/if}
		
		<table width="100%" cellspacing="2" cellpadding="2" border="1" class="matches">
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/{$match->player_a}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_a_name}</a></strong></p>
				</td>
				<td class="score">
					{if (($user != null) and ($user->permissions > 0))}
						<input type="text" name="set_1_a" value="{$match->set_1_a}" style="width: 20px" />
					{else}
						<p>{if ($match->set_1_a > $match->set_1_b)}<strong>{/if}{($match->set_1_a > 0 or $match->set_1_b > 0) ? $match->set_1_a : '-'}{if ($match->set_1_a > $match->set_1_b)}</strong>{/if}</p>
					{/if}
				</td>
				<td class="score">
					{if (($user != null) and ($user->permissions > 0))}
						<input type="text" name="set_2_a" value="{$match->set_2_a}" style="width: 20px" />
					{else}
						<p>{if ($match->set_2_a > $match->set_2_b)}<strong>{/if}{($match->set_2_a > 0 or $match->set_2_b > 0) ? $match->set_2_a : '-'}{if ($match->set_2_a > $match->set_2_b)}</strong>{/if}</p>
					{/if}
				</td>
				<td class="score">
					{if (($user != null) and ($user->permissions > 0))}
						<input type="text" name="set_3_a" value="{$match->set_3_a}" style="width: 20px" />
					{else}
						<p>{if ($match->set_3_a > $match->set_3_b)}<strong>{/if}{($match->set_3_a > 0 or $match->set_3_b > 0) ? $match->set_3_a : '-'}{if ($match->set_3_a > $match->set_3_b)}</strong>{/if}</p>
					{/if}
				</td>
			</tr>
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/{$match->player_b}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_b_name}</a></strong></p>
				</td>
				<td class="score">
					{if (($user != null) and ($user->permissions > 0))}
						<input type="text" name="set_1_b" value="{$match->set_1_b}" style="width: 20px" />
					{else}
						<p>{if ($match->set_1_a < $match->set_1_b)}<strong>{/if}{($match->set_1_a > 0 or $match->set_1_b > 0) ? $match->set_1_b : '-'}{if ($match->set_1_a < $match->set_1_b)}<strong>{/if}</p>
					{/if}
				</td>
				<td class="score">
					{if (($user != null) and ($user->permissions > 0))}
						<input type="text" name="set_2_b" value="{$match->set_2_b}" style="width: 20px" />
					{else}
						<p>{if ($match->set_2_a < $match->set_2_b)}<strong>{/if}{($match->set_2_a > 0 or $match->set_2_b > 0) ? $match->set_2_b : '-'}{if ($match->set_2_a < $match->set_2_b)}<strong>{/if}</p>
					{/if}
				</td>
				<td class="score">
					{if (($user != null) and ($user->permissions > 0))}
						<input type="text" name="set_3_b" value="{$match->set_3_b}" style="width: 20px" />
					{else}
						<p>{if ($match->set_3_a < $match->set_3_b)}<strong>{/if}{($match->set_3_a > 0 or $match->set_3_b > 0) ? $match->set_3_b : '-'}{if ($match->set_3_a < $match->set_3_b)}<strong>{/if}</p>
					{/if}
				</td>
			</tr>	
		</table>
		<br />
		<table class="versus" width="100%" cellpadding="5" style="color: #FFFFFF">
			<tr valign="top">
				<td width="190px" align="center">
					<strong>{$player_a->name}</strong>
					<img src="{$player_a->photo_url}" width="170px" border="1" style="background: #EEEEEE" />
				</td>
				<td colspan="2" align="center">
					<h2 class="yellow">VS</h2>
					<table width="100%" border="1" style="color: #000000">
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('age', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{calculateAge($player_a->birthday)}</td>
							<td align="left">{calculateAge($player_b->birthday)}</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('height', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{$player_a->height}</td>
							<td align="left">{$player_b->height}</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('weight', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{$player_a->weight}</td>
							<td align="left">{$player_b->weight}</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('plays', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{localize($player_a->plays, $lang)}</td>
							<td align="left">{localize($player_b->plays, $lang)}</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('backhand', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{localize($player_a->backhand, $lang)}</td>
							<td align="left">{localize($player_b->backhand, $lang)}</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('racket', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{localize($player_a->racket, $lang)}</td>
							<td align="left">{localize($player_b->racket, $lang)}</td>
						</tr>
						<tr valign="top" align="center" bgcolor="#EEEEEE">
							<td colspan="2"><strong>{localize('rating', $lang)}</strong></td>
						</tr>
						<tr valign="top">
							<td align="right">{if ($player_a->progress != 0)}<b>{$player_a->position}</b><br />({$player_a->points} pts){else}-{/if}</td>
							<td align="left">{if ($player_b->progress != 0)}<b>{$player_b->position}</b><br />({$player_b->points} pts){else}-{/if}</td>
						</tr>
						{if (isset($prev_matches) and ($prev_matches|@count > 0))}
							<tr valign="top" align="center" bgcolor="#EEEEEE">
								<td colspan="2"><strong>{localize('match_history', $lang)}</strong></td>
							</tr>
							{foreach $prev_matches as $pmatch}
								<tr valign="top" align="left">
									<td colspan="2">
										{mb_substr($pmatch->match_date, 0 ,16)}:
										{$pmatch->set_1_a} - {$pmatch->set_1_b}, {$pmatch->set_2_a} - {$pmatch->set_2_b}{if ($pmatch->set_3_a > 0 or $pmatch->set_3_b > 0)}, {$pmatch->set_3_a} - {$pmatch->set_3_b}{/if}<br />
										{localize('winner', $lang)}: {if (($pmatch->set_1_a > $pmatch->set_1_b and ($pmatch->set_2_a > $pmatch->set_2_b or $pmatch->set_3_a > $pmatch->set_3_b)) or ($pmatch->set_2_a > $pmatch->set_2_b and ($pmatch->set_1_a > $pmatch->set_1_b or $pmatch->set_3_a > $pmatch->set_3_b)))}{$pmatch->player_a_name}{else}{$pmatch->player_b_name}{/if}
									</td>
								</tr>
							{/foreach}
						{/if}
					</table>
				</td>
				<td width="190px" align="center">
					<strong>{$player_b->name}</strong>
					<img src="{$player_b->photo_url}" width="170px" border="1" style="background: #EEEEEE" />
				</td>
			</tr>
		</table>
		<br />
			
		{if (($user != null) and ($user->permissions > 0))}
				<select name="action"> 
					<option value="update">{localize('finished', $lang)}</option>
					{if ($match->status != 'finished')}<option value="continue" {if ($match->status == 'to_be_continued')}selected{/if}>{localize('to_be_continued', $lang)}</option>{/if}
				</select>
				<input type="hidden" name="_id" value="{$match->id}" />
				<input type="submit" name="edit" value="OK" />
			</form><br />
			{if ($user->permissions > 3)}
				<form id="deleteForm" name="deleteForm" action="/match/cancel/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
					<input type="hidden" name="_id" value="{$match->id}" />
					<input type="submit" name="cancel" value="{localize('cancel_match', $lang)}" />
				</form>
			{/if}
		{/if}
	{elseif (($match->status == 'denied') and ($user != null))}
		<p>{localize('match_was_denied', $lang)}</p>
		{if ($match->player_a == $user->id)}
			<p>{localize('would_you_like_to_cancel_it', $lang)}</p><br />
			<form id="deleteForm" name="deleteForm" action="/match/cancel/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
				<input type="hidden" name="_id" value="{$match->id}" />
				<input type="submit" name="cancel" value="{localize('cancel_match', $lang)}" />
			</form>
		{/if}
	{else}
		...
	{/if}
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}