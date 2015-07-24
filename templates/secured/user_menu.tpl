{*Smarty*}
{if (isset($user) and ($user != null))}
	<div class="user-sidebar round">
		<ul>
			<li>
				<a href="/conversation/list{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('my_messages', $lang)}{if ($new_messages_count > 0)} ({$new_messages_count}){/if}</a>
			</li>
			<li>
				<a href="/contact/following/{$user->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('my_contacts', $lang)}</a>
				<ul>
					<li><a href="/contact/followers/{$user->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('followers', $lang)}{if (isset($followers_count) and is_numeric($followers_count))} ({$followers_count}){/if}</a></li>
					<li><a href="/contact/following/{$user->id}{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('followings', $lang)}{if (isset($followings_count) and is_numeric($followings_count))} ({$followings_count}){/if}</a></li>
				</ul>
			</li>
			<li>
				<a href="/match/auction{if ($lang != $default_language)}?lang={$lang}{/if}"><span class="red"><b>new!</b></span> {localize('match_auction', $lang)} </a> 
			</li>
			{if (true)}
				<li>
					<a href="/conversation/view/5{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('report_match_result', $lang)}</a>
				</li>
			{else}
				<li>
					<a href="/match/random{if ($lang != $default_language)}?lang={$lang}{/if}"><span class="red"><b>new!</b></span> {localize('random_match', $lang)} </a> 
				</li>
			{/if}
			<li>
				<a href="/match/my{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('my_matches', $lang)}</a>
				<ul>
					<li><a href="/match/my/unaccepted{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('unaccepted', $lang)}{if ($unaccepted_matches_count > 0)} ({$unaccepted_matches_count}){/if}</a></li>
					<li><a href="/match/my/denied{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('denied', $lang)}{if ($denied_matches_count > 0)} ({$denied_matches_count}){/if}</a></li>
					<li><a href="/match/my/ready_to_play{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('ready_to_play', $lang)}{if ($ready_to_play_matches_count > 0)} ({$ready_to_play_matches_count}){/if}</a></li>
					<li><a href="/match/my/to_be_continued{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('to_be_continued', $lang)}{if ($to_be_continued_matches_count > 0)} ({$to_be_continued_matches_count}){/if}</a></li>
					<li><a href="/match/my/finished{if ($lang != $default_language)}?lang={$lang}{/if}">{localize('finished', $lang)}{if ($finished_matches_count > 0)} ({$finished_matches_count}){/if}</a></li>
				</ul>
			</li>
		</ul>
	</div><br />
{/if}