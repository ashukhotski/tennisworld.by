{*Smarty*}
<h1>{localize('conversations', $lang)}</h1><br />
{if (($user != null) and isset($conversations) and ($conversations|@count > 0))}
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		{foreach $conversations as $conversation}
			<tr valign="top" align="left">
				<td width="100px">
					<img class="profile-image-mini" style="width: 80px; max-height: 120px" src="{if ($user->id != $conversation->author)}{$conversation->author_img}{else}{$conversation->recipient_img}{/if}" />
				</td>
				<td {if ($conversation->status == 1)}bgcolor="#E5FFFF"{/if} style="padding: 4px">
					<p>{if ($user->id != $conversation->author)}<strong><a href="/profile/view/{$conversation->author}{if ($lang != $default_language)}?lang={$lang}{/if}">{$conversation->author_name}</a></strong> {if (lastVisit($conversation->author_online) < 5)}<span style="color: grey">(online)</span>{/if}{else}<strong><a href="/profile/view/{$conversation->recipient}{if ($lang != $default_language)}?lang={$lang}{/if}">{$conversation->recipient_name}</a></strong> {if (lastVisit($conversation->recipient_online) < 5)}<span style="color: grey">(online)</span>{/if}{/if}</p>
					<p>{$conversation->msg_date}</p><br />
					<p><a href="/conversation/view/{if ($user->id != $conversation->author)}{$conversation->author}{else}{$conversation->recipient}{/if}{if ($lang != $default_language)}?lang={$lang}{/if}">
						{if ($user->id == $conversation->author)}<img align="left" class="profile-image-mini" style="width: 30px; max-height: 40px; margin: 0 8px" src="{$conversation->author_img}" />{/if}
						{if (mb_strlen($conversation->body) > 140)}{mb_substr($conversation->body, 0, 140)}... {else}{$conversation->body}{/if}
					</a></p><br />
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