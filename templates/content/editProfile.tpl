{*Smarty*}
{if (isset($user) and ($user != null))}
<h1>{localize('edit_profile', $lang)}</h2><br />
<form id="editForm" name="editForm" action="/profile/edit{if ($lang != $default_language)}?lang={$lang}{/if}" method="post" enctype="multipart/form-data" accept-charset="utf-8">
	{if (isset($errors))}
		{if ($errors->email != null)}
			<script type="text/javascript">alert('{$errors->email}')</script>
		{/if}
		{if ($errors->current_password != null)}
			<script type="text/javascript">alert('{$errors->current_password}')</script>
		{/if}
		{if ($errors->current_password == null and $errors->password != null)}
			<script type="text/javascript">alert('{$errors->password}')</script>
		{/if}
		{if ($errors->name != null)}
			<script type="text/javascript">alert('{$errors->name}')</script>
		{/if}
	{/if}
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('email', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="{if (isset($user))}{$user->email}{/if}" />
				{if (isset($errors))}
					{if ($errors->email != null)}
						<p><span class="red">{$errors->email}</span></p>
					{/if}
				{/if}
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> {localize('email_help', $lang)}</p>
			</td>
		</tr>
		
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('password', $lang)}</p>
			</td>
			<td width="250px">
				<input type="password" name="password" value="" />
				{if (isset($errors))}
					{if ($errors->current_password == null and $errors->password != null)}
						<p><span class="red">{$errors->password}</span></p>
					{/if}
				{/if}
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> {localize('password_help', $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('name', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="name" value="{if (isset($user))}{$user->name}{/if}" />
				{if (isset($errors))}
					{if ($errors->name != null)}
						<p><span class="red">{$errors->name}</span></p>
					{/if}
				{/if}
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> {localize('name_help', $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('birth_year', $lang)}</p>
			</td>
			<td width="250px">
				{if (isset($years) and ($years|@count > 0))}
					<select name="year">
						{foreach $years as $y}
							<option value="{$y}" {if (isset($user) and (mb_substr($user->birthday, 0, 4) == $y))}selected{/if}>{$y}</option>
						{/foreach}
					</select>
				{else}
					<input type="text" name="year" value="{if (isset($user))}{mb_substr($user->birthday, 0, 4)}{/if}" />
				{/if}
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('birth_month', $lang)}</p>
			</td>
			<td width="250px">
				{if (isset($months) and ($months|@count > 0))}
					<select name="month">
						{foreach $months as $m}
							<option value="{$m}" {if (isset($user) and (mb_substr($user->birthday, 5, 2) == $m))}selected{/if}>{$m}</option>
						{/foreach}
					</select>
				{else}
					<input type="text" name="month" value="{if (isset($user))}{mb_substr($user->birthday, 5, 2)}{/if}" />
				{/if}
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('birth_day', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="day" value="{if (isset($user))}{mb_substr($user->birthday, 8, 2)}{/if}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('phone', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="phone" value="{if (isset($user))}{$user->phone}{/if}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('city', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="city" value="{if (isset($user))}{$user->city}{/if}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('height', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="height" value="{if (isset($user))}{$user->height}{/if}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('weight', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="weight" value="{if (isset($user))}{$user->weight}{/if}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('profile_type', $lang)}</p>
			</td>
			<td width="250px">
				<select name="profile_type">
					<option value="not_specified" {if (isset($user) and ($user->profile_type == 'not_specified'))}selected{/if}></option>
					<option value="player" {if (isset($user) and ($user->profile_type == 'player'))}selected{/if}>{localize('player', $lang)}</option>
					<option value="coach" {if (isset($user) and ($user->profile_type == 'coach'))}selected{/if}>{localize('coach', $lang)}</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('level', $lang)}</p>
			</td>
			<td width="250px">
				<select name="level">
					<option value="not_specified" {if (isset($user) and ($user->level == 'not_specified'))}selected{/if}></option>
					<option value="beginner" {if (isset($user) and ($user->level == 'beginner'))}selected{/if}>{localize('beginner', $lang)}</option>
					<option value="medium" {if (isset($user) and ($user->level == 'medium'))}selected{/if}>{localize('medium', $lang)}</option>
					<option value="advanced" {if (isset($user) and ($user->level == 'advanced'))}selected{/if}>{localize('advanced', $lang)}</option>
					<option value="profi" {if (isset($user) and ($user->level == 'profi'))}selected{/if}>{localize('profi', $lang)}</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('plays', $lang)}</p>
			</td>
			<td width="250px">
				<select name="plays">
					<option value="not_specified" {if (isset($user) and ($user->plays == 'not_specified'))}selected{/if}></option>
					<option value="right_arm" {if (isset($user) and ($user->plays == 'right_arm'))}selected{/if}>{localize('right_arm', $lang)}</option>
					<option value="left_arm" {if (isset($user) and ($user->plays == 'left_arm'))}selected{/if}>{localize('left_arm', $lang)}</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('backhand', $lang)}</p>
			</td>
			<td width="250px">
				<select name="backhand">
					<option value="not_specified" {if (isset($user) and ($user->backhand == 'not_specified'))}selected{/if}></option>
					<option value="one_handed" {if (isset($user) and ($user->backhand == 'one_handed'))}selected{/if}>{localize('one_handed', $lang)}</option>
					<option value="two_handed" {if (isset($user) and ($user->backhand == 'two_handed'))}selected{/if}>{localize('two_handed', $lang)}</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('racket', $lang)}</p>
			</td>
			<td width="250px">
				<select name="racket">
					<option value="not_specified" {if (isset($user) and ($user->racket == 'not_specified'))}selected{/if}></option>
					<option value="Babolat" {if (isset($user) and ($user->racket == 'Babolat'))}selected{/if}>Babolat</option>
					<option value="Dunlop" {if (isset($user) and ($user->racket == 'Dunlop'))}selected{/if}>Dunlop</option>
					<option value="Fischer" {if (isset($user) and ($user->racket == 'Fischer'))}selected{/if}>Fischer</option>
					<option value="Head" {if (isset($user) and ($user->racket == 'Head'))}selected{/if}>Head</option>
					<option value="Prince" {if (isset($user) and ($user->racket == 'Prince'))}selected{/if}>Prince</option>
					<option value="Slazenger" {if (isset($user) and ($user->racket == 'Slazenger'))}selected{/if}>Slazenger</option>
					<option value="Wilson" {if (isset($user) and ($user->racket == 'Wilson'))}selected{/if}>Wilson</option>
					<option value="Yonex" {if (isset($user) and ($user->racket == 'Yonex'))}selected{/if}>Yonex</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<p>{localize('bio', $lang)}</p>
				<textarea name="bio" class="ckeditor">{if (isset($user))}{$user->bio}{/if}</textarea>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('photo', $lang)}</p>
			</td>
			<td width="250px">
				<input type="file" name="photo" />
				<input type="hidden" name="photo_url" value="{if (isset($user))}{$user->photo_url}{/if}" />
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('current_password', $lang)}</p>
			</td>
			<td width="250px">
				<input type="password" name="current_password" value="" />
				{if (isset($errors))}
					{if ($errors->current_password != null)}
						<p><span class="red">{$errors->current_password}</span></p>
					{/if}
				{/if}
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> {localize('current_password_help', $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="edit" value="OK" />
			</td>
		</tr>
	</table>
</form>
{else}
	<p>{localize('error', $lang)}! {localize('person_not_found', $lang)}</p><br />
{/if}