{*Smarty*}
{if (($user != null) and ($profile != null))}
	<a href="/conversation/list{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('back', $lang)}</a><br />
	<h1>{$profile->name} ({localize('view_conversation', $lang)})</h1>
	{if (lastVisit($profile->online) < 5)}
		<p><span style="color: grey">online</span></p>
	{else}
		<p><span style="color: grey">{localize('last_visit', $lang)}: {if ($profile->online != '0000-00-00 00:00:00')}{$profile->online}{else}{localize('a_long_time_ago', $lang)}{/if}</span></p>
	{/if}
	<br /><p>{localize('type_your_message_here', $lang)}</p>
	<form id="messageForm" name="messageForm" action="/conversation/view/{$profile->id}{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
		<textarea name="body" style="width: 100%; height: 50px; resize: none; overflow-y: scroll"></textarea><br />
		<input type="hidden" name="recipient" value="{$profile->id}" />
		<input type="submit" name="message" value="OK" />
	</form>
	<br />
	{if (isset($conversation_messages) and ($conversation_messages|@count > 0))}
		<table width="100%" cellspacing="5" cellpadding="5" border="0">
			{foreach $conversation_messages as $message}
				<tr valign="top" align="left">
					<td width="100px">
						<img class="profile-image-mini" style="width: 80px; max-height: 120px" src="{$message->author_img}" />
					</td>
					<td>
						<p><strong><a href="/profile/view/{$message->author}{if ($lang != $default_language)}?lang={$lang}{/if}">{$message->author_name}</a></strong></p>
						<p>{$message->msg_date}</p><br />
						<p>{$message->body}</p><br />
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<hr />
					</td>
				</tr>
			{/foreach}
		</table>
	{/if}
{else}
	<p>{localize('empty', $lang)}</p><br />
{/if}