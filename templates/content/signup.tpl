{* Smarty *}
<h2>{localize('signin', $lang)}</h2>
<a href="/signin/facebook{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('facebook', $lang)}</a> | <a href="/signin/vkontakte{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('vkontakte', $lang)}</a><br /><br />
<form id="signinForm" name="signinForm" action="/signin/tennisworld{if ($lang != $default_language)}?lang={$lang}{/if}" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('email', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="" />
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
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> {localize('password_help', $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="signin" value="OK" />
			</td>
		</tr>
	</table>
</form>
<br />
<p><strong>{localize('forgot_the_password', $lang)}</strong></p>
<form id="passwordForm" name="passwordForm" action="/signin/remind" method="post">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('email', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="" />
			</td>
			<td>
				<p><span class="red"><strong>*</strong></span> {localize('email_help', $lang)}</p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="remind" value="OK" />
			</td>
		</tr>
	</table>
</form>
<br /><hr /><br />
<h2>{localize('signup', $lang)}</h2>
<a href="/signin/facebook{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('facebook', $lang)}</a> | <a href="/signin/vkontakte{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('vkontakte', $lang)}</a><br /><br />
<form id="signupForm" name="signupForm" action="/signup/new{if ($lang != $default_language)}?lang={$lang}{/if}" method="post" enctype="multipart/form-data"  accept-charset="utf-8">
	<table width="100%" cellspacing="5" cellpadding="5" border="0">
		<tr valign="top" align="left">
			<td width="150px">
				<p>{localize('email', $lang)}</p>
			</td>
			<td width="250px">
				<input type="text" name="email" value="{if (isset($data))}{$data->email}{/if}" />
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
				<input type="text" name="name" value="{if (isset($data))}{$data->name}{/if}" />
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
							<option value="{$y}" {if (isset($data) and ($data->year == $y))}selected{/if}>{$y}</option>
						{/foreach}
					</select>
				{else}
					<input type="text" name="year" value="{if (isset($data))}{$data->year}{/if}" />
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
							<option value="{$m}" {if (isset($data) and ($data->month == $m))}selected{/if}>{$m}</option>
						{/foreach}
					</select>
				{else}
					<input type="text" name="month" value="{if (isset($data))}{$data->month}{/if}" />
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
				<input type="text" name="day" value="{if (isset($data))}{$data->day}{/if}" />
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
				<input type="text" name="phone" value="{if (isset($data))}{$data->phone}{/if}" />
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
				<input type="text" name="city" value="{if (isset($data))}{$data->city}{/if}" />
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
				<input type="text" name="height" value="{if (isset($data))}{$data->height}{/if}" />
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
				<input type="text" name="weight" value="{if (isset($data))}{$data->weight}{/if}" />
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
					<option value="not_specified"></option>
					<option value="player">{localize('player', $lang)}</option>
					<option value="coach">{localize('coach', $lang)}</option>
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
					<option value="not_specified"></option>
					<option value="beginner">{localize('beginner', $lang)}</option>
					<option value="medium">{localize('medium', $lang)}</option>
					<option value="advanced">{localize('advanced', $lang)}</option>
					<option value="profi">{localize('profi', $lang)}</option>
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
					<option value="not_specified"></option>
					<option value="right_arm">{localize('right_arm', $lang)}</option>
					<option value="left_arm">{localize('left_arm', $lang)}</option>
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
					<option value="not_specified"></option>
					<option value="one_handed">{localize('one_handed', $lang)}</option>
					<option value="two_handed">{localize('two_handed', $lang)}</option>
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
					<option value="not_specified"></option>
					<option value="Babolat">Babolat</option>
					<option value="Dunlop">Dunlop</option>
					<option value="Fischer">Fischer</option>
					<option value="Head">Head</option>
					<option value="Prince">Prince</option>
					<option value="Slazenger">Slazenger</option>
					<option value="Wilson">Wilson</option>
					<option value="Yonex">Yonex</option>
				</select>
			</td>
			<td>
				<p> </p>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<p>{localize('bio', $lang)}</p>
				<textarea name="bio" class="ckeditor">{if (isset($data))}{$data->bio}{/if}</textarea>
			</td>
		</tr>
		<tr valign="top" align="left">
			<td colspan="3">
				<input type="submit" name="signup" value="OK" />
			</td>
		</tr>
	</table>
</form>