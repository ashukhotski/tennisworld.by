{*Smarty*}
<h1>Welcome</h1>
<div class="left">
	{if (isset($user) && ($user != null))}
		<p>Hello, {$user->name}!</p>
	{else}
		<p>You're not authorized!</p>
	{/if}
	<br />
</div>