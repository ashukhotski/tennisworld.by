{*Smarty*}
<style>
	table th { padding-left: 10px; }
	table tr td { height: 20px; padding: 10px; }
</style>
<h1>{localize('matl_project', $lang)} | {localize('rating', $lang)}</h1>
<p>{if ($lang == 'be')}ад 11 студзеня 2014 года{else}от 11 января 2014 года{/if}</p><br />
{if (isset($players) and ($players|@count > 0))}
	<table width="100%" cellspacing="2" cellpadding="2" class="rating">
		<th valign="top" align="left"><strong>#</strong></th>
		<th valign="top" align="left"><strong>{localize('name', $lang)}</strong></th>
		<th valign="top" align="left"><strong>W / L</strong></th>
		<th valign="top" align="left"><strong>pts</strong></th>
		<th valign="top" align="left"><strong>+/-</strong></th>
		{foreach $players as $player}
			<tr valign="center" align="left" class="{if ($player->position == 1)}gold{elseif ($player->position == 2)}silver{elseif ($player->position == 3)}bronze{elseif ($player@last and ($player->position > 16))}last{elseif ($player@iteration % 2 == 0)}odd{else}even{/if}">
				<td>{$player->position}</td>
				<td><a href="/profile/view/{$player->id}{if ($lang != $default_language)}?lang={$lang}{/if}" {if ($player->position <= 3)}style="font-weight: bold"{/if}>{$player->name}</a></td>
				<td>{$player->win} / {$player->loose}</td>
				{if (isset($user) and ($user != null) and ($user->permissions > 2))}
					<form id="ratingForm-{$player->id}" name="ratingForm-{$player->id}" action="/rating{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
					<td>
						
						<input type="hidden" name="playerId" value="{$player->id}" />
						<input type="text" name="points" value="{$player->points}" />
								
					</td>
					<td>
						<input type="text" name="progress" style="width: 30px" value="{$player->progress}" />
						<input type="submit" name="update" value="OK" />
					</td>
					</form>
				{else}
					<td>{$player->points}</td>
					<td>{$player->progress}</td>
				{/if}
			</tr>
		{/foreach}
	</table>
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}