{*Smarty*}
{if (isset($user) and ($user != null) and ($user->permissions > 2))}
	<h2>{localize('create_constants', $lang)}</h2><br />
	<form id="createConstant" name="createConstant" action="/localization{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
		<input type="hidden" name="action" value="create" />
		<p><strong>{localize('name', $lang)}:</strong> <br /><input type="text" name="id" value="" /></p>
		<p><strong>{localize('value', $lang)}:</strong></p>
		<textarea name="value"></textarea><br />
		<input type="submit" name="create" value="OK" /><br /> 
	</form>
	<br /><hr /><br />
	<h2>{localize('edit_constants', $lang)}</h2><br />
	{if (isset($constants) and ($constants|@count > 0))}
		{foreach $constants as $constant}
			<form id="editConstant-{$constant->id}-{$constant->lang}" name="editConstant-{$constant->id}-{$constant->lang}" action="/localization{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
				<input type="hidden" name="action" value="edit" />
				<input type="hidden" name="id" value="{$constant->id}" />
				<input type="hidden" name="lang" value="{$constant->lang}" />
				<p><strong>{localize('name', $lang)}:</strong> {$constant->id}</p>
				<p><strong>{localize('locale', $lang)}:</strong> {$constant->lang}</p>
				<p><strong>{localize('value', $lang)}:</strong></p>
				<textarea name="value">{$constant->value}</textarea><br />
				<input type="submit" name="edit" value="OK" /><br /> 
			</form>
			<br /><hr /><br />
		{/foreach}
	{/if}
{/if}