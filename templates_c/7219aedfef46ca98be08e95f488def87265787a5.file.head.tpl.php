<?php /* Smarty version Smarty-3.0.8, created on 2014-04-13 19:20:49
         compiled from "templates/head.tpl" */ ?>
<?php /*%%SmartyHeaderCode:876235882534ab9618b3e05-90025465%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7219aedfef46ca98be08e95f488def87265787a5' => 
    array (
      0 => 'templates/head.tpl',
      1 => 1397405966,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '876235882534ab9618b3e05-90025465',
  'function' => 
  array (
  ),
  'has_nocache_code' => false,
)); /*/%%SmartyHeaderCode%%*/?>

<meta http-equiv="Content-Type" content="text/html;charset=utf-8"> 
<meta name="author" lang="ru" content="Alexander Shukhotski">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="keywords" lang="<?php echo $_smarty_tpl->getVariable('lang')->value;?>
" content="<?php if ((isset($_smarty_tpl->getVariable('meta',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('meta')->value->keywords;?>
<?php }else{ ?> <?php }?>">
<meta name="description" content="<?php if ((isset($_smarty_tpl->getVariable('meta',null,true,false)->value))){?><?php echo $_smarty_tpl->getVariable('meta')->value->title;?>
<?php }else{ ?> <?php }?>">
<title><?php if ((isset($_smarty_tpl->getVariable('meta',null,true,false)->value)&&($_smarty_tpl->getVariable('meta')->value->title!=''))){?><?php echo $_smarty_tpl->getVariable('meta')->value->title;?>
 | <?php }?>TENNISWORLD.by</title>
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

	<script type="text/javascript">
		/*window.onload = function() {
			Calendar.setup({
				dateField     : 'date',
				parentElement : 'calendar'
			})
		}*/
    </script>

<?php if ((isset($_smarty_tpl->getVariable('user',null,true,false)->value)&&($_smarty_tpl->getVariable('user')->value!=null))){?>
	
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
	
<?php }?>