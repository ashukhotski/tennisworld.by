var req = create();

function create() {
	if (navigator.appName == "Microsoft Internet Explorer") {  
		return new ActiveXObject("Microsoft.XMLHTTP");  
	} else {  
		return new XMLHttpRequest();  
	}
}

function signin(provider) {
	if (req != null) {
		req.open('post', '/ajax.php' , true); 
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8"); 
		req.send('controller=signin&action='+provider);
		req.onreadystatechange = function() {
			if (req.readyState == 4) { 
				window.location.reload(true);
			} 
		}
	}
}

function post() {
	var message = document.getElementById('message').value;
	if ((req != null) && (message != null)) {
		req.open('post', '/ajax.php' , true); 
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8"); 
		req.send('controller=message&action=post&text='+message);
		req.onreadystatechange = function() {
			if (req.readyState == 4) { 
				window.location.reload(true);
			} 
		}
	}
}

function deleteMessage(id) {
	if ((req != null) && (message != null)) {
		req.open('post', '/ajax.php' , true); 
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8"); 
		req.send('controller=message&action=delete&id='+id);
		req.onreadystatechange = function() {
			if (req.readyState == 4) { 
				window.location.reload(true);
			} 
		}
	}
}

function refresh() {
	if (req != null) {
		req.open('post', '/ajax.php' , true); 
		req.setRequestHeader("Content-Type", "application/x-www-form-urlencoded; charset=utf-8"); 
		req.send('controller=message&action=get');
		req.onreadystatechange = function() {
			if (req.readyState == 4) { 
				if (req.status == 200 || req.status == 304) {
					response = req.responseText;
					if (response != '') { document.getElementById('messages').innerHTML = response; }
				} else { }				
			} 
		}
	}
}