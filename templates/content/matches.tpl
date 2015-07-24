{*Smarty*}
{if (isset($request_uri) && ($request_uri == '/match/cup'))}
	<h1>{localize('matl_project', $lang)} | {localize('cup', $lang)}</h1><br />
{else}
	<h1>{localize('matl_project', $lang)} | {localize('matches', $lang)}</h1>
	{if (isset($request_uri) && (mb_strpos($request_uri, 'match/list') != false))}<a href="/match/list{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('all', $lang)}</a> | <a href="/match/list/finished{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('finished', $lang)}</a> | <a href="/match/list/to_be_continued{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('to_be_continued', $lang)}</a> | <a href="/match/list/ready_to_play{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('ready_to_play', $lang)}</a><br />{/if}
	{if (isset($request_uri) && (mb_strpos($request_uri, 'match/my') != false))}<a href="/match/my{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('all', $lang)}</a> | <a href="/match/my/finished{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('finished', $lang)}</a> | <a href="/match/my/to_be_continued{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('to_be_continued', $lang)}</a> | <a href="/match/my/ready_to_play{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('ready_to_play', $lang)}</a><br />{/if}
	<br />
{/if}
{if (isset($matches) and ($matches|@count > 0))}
	
		{foreach $matches as $match}
		<table width="100%" cellspacing="2" cellpadding="2" border="1" class="matches">
			<tr valign="center">
				<td colspan="7" class="preview">
					<p><a href="/match/view/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{mb_substr($match->match_date, 0, 16)}</a></p>
				</td>
			</tr>
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/{$match->player_a}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_a_name}</a></strong> {if ($match->status == 'finished')}{if (($match->set_1_a > $match->set_1_b and ($match->set_2_a > $match->set_2_b or $match->set_3_a > $match->set_3_b)) or ($match->set_2_a > $match->set_2_b and ($match->set_1_a > $match->set_1_b or $match->set_3_a > $match->set_3_b)))}<img height="30px" align="right" alt="win" src="/theme/img/yes.png" />{else}<img height="30px" align="right" alt="lose" src="/theme/img/no.png" />{/if}{/if}</p>
				</td>
				<td class="score">
					<p>{if ($match->set_1_a > 0 or $match->set_1_b > 0)}{$match->set_1_a}{else}-{/if}</p>
				</td>
				<td class="score">
					<p>{if ($match->set_2_a > 0 or $match->set_2_b > 0)}{$match->set_2_a}{else}-{/if}</p>
				</td>
				<td class="score">
					<p>{if ($match->set_3_a > 0 or $match->set_3_b > 0)}{$match->set_3_a}{else}-{/if}</p>
				</td>
				<td rowspan="2" class="status ">
					<p><a href="/match/view/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}"><span class="red"><b>{localize($match->status, $lang)}</b></span></a></p>
				</td>
				{if (1 == 2)}
					<td rowspan="2" class="view">
						<p><a href="/match/view/{$match->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('view', $lang)}</a></p>
					</td>
				{/if}
			</tr>
			<tr valign="center" align="center">
				<td class="player">
					<p><strong><a href="/profile/view/{$match->player_b}{if ($lang != $default_language)}?lang={$lang}{/if}">{$match->player_b_name}</a></strong> {if ($match->status == 'finished')}{if (($match->set_1_a > $match->set_1_b and ($match->set_2_a > $match->set_2_b or $match->set_3_a > $match->set_3_b)) or ($match->set_2_a > $match->set_2_b and ($match->set_1_a > $match->set_1_b or $match->set_3_a > $match->set_3_b)))}<img height="30px" align="right" alt="lose" src="/theme/img/no.png" />{else}<img height="30px" align="right" alt="win" src="/theme/img/yes.png" />{/if}{/if}</p>
				</td>
				<td class="score">
					<p>{if ($match->set_1_a > 0 or $match->set_1_b > 0)}{$match->set_1_b}{else}-{/if}</p>
				</td>
				<td class="score">
					<p>{if ($match->set_2_a > 0 or $match->set_2_b > 0)}{$match->set_2_b}{else}-{/if}</p>
				</td>
				<td class="score">
					<p>{if ($match->set_3_a > 0 or $match->set_3_b > 0)}{$match->set_3_b}{else}-{/if}</p>
				</td>
			</tr>
		</table>
		<br />
		{/foreach}
	
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}