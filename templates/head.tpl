{* Smarty *}
<meta http-equiv="Content-Type" content="text/html;charset=utf-8"> 
<meta name="author" lang="ru" content="Alexander Shukhotski">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="keywords" lang="{$lang}" content="{if (isset($meta))}{$meta->keywords}{else} {/if}">
<meta name="description" content="{if (isset($meta))}{$meta->title}{else} {/if}">
<title>{if (isset($meta) and ($meta->title != ''))}{$meta->title} | {/if}TENNISWORLD.by</title>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="/js/jquery.slimscroll.min.js"></script>
<script type="text/javascript" src="/js/ajax.js"></script>
<script type="text/javascript" src="/js/prototype.js"></script>
<script type="text/javascript" src="/js/calendar.js"></script>
<script type="text/javascript" src="/js/ckeditor/ckeditor.js"></script>
<link rel="stylesheet" type="text/css" href="/theme/css/style.css?1">
<link rel="shortcut icon" type="image/x-icon" href="/theme/img/icon.ico">
<script type="text/javascript">
	try {
		CKEDITOR.config.language = 'ru';
	} catch(e) { } finally { }
</script>
{literal}
	<script type="text/javascript">
		/*window.onload = function() {
			Calendar.setup({
				dateField     : 'date',
				parentElement : 'calendar'
			})
		}*/
    </script>
{/literal}
{if (isset($user) and ($user != null))}
	{literal}
		<script type="text/javascript">
			var req = create();

			function create() {
				if (navigator.appName == "Microsoft Internet Explorer") {  
					return new ActiveXObject("Microsoft.XMLHTTP");  
				} else {  
					return new XMLHttpRequest();  
				}
			}
			
			function online() {
				if (req != null) {
					req.open('get', '/profile/ajax' , false); 
					req.send();
				}
			}
			
			function func1() {
				Calendar.setup({
					dateField     : 'date',
					parentElement : 'calendar'
				});
			}
			function func2() {
				setInterval('online()', 180000);
			}

			function addLoadEvent(func) {
			  var oldonload = window.onload;
			  if (typeof window.onload != 'function') {
				window.onload = func;
			  } else {
				window.onload = function() {
				  if (oldonload) {
					oldonload();
				  }
				  func();
				}
			  }
			}
			addLoadEvent(func1);
			addLoadEvent(func2);
			
			
			//window.onload = function() { setInterval('online()', 180000); }
		</script>
	{/literal}
{/if}