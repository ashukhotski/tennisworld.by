{* Smarty *}
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<head>
		{if (isset($head))}{$head}{/if}
	</head>
	<body>
		<div class="layout">
			<div class="header">
				{if (isset($header))}{$header}{/if}
			</div>
			<div class="menu">
				{if (isset($menu))}{$menu}{/if}
			</div><br clear="all" />
			<div class="content">
				<div class="left">
					{if (isset($content))}{$content}{/if}
				</div>
				<div class="right">
					<script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
					<div class="yashare-auto-init" style="text-align: right" data-yashareL10n="{$lang}" data-yashareType="none" data-yashareQuickServices="vkontakte,facebook,twitter,odnoklassniki,yaru,moimir"></div>
					{if (isset($user_menu))}{$user_menu}{/if}<p style="text-align: right"><a href="http://vk.com/liga_tennisa" target="_blank"><img width="280px" src="/theme/img/tennis_logo3_{$lang}.png" /></a></p>
					{if (isset($context))}{$context}{/if}
				</div>
				<br clear="all" /><br />
			</div>
			<br clear="all" />
			<div class="footer">
				{if (isset($footer))}{$footer}{/if}
			</div>
		</div>
	</body>
</html>