function getXMLHttpRequest() {
	var xhr = null;
	
	if (window.XMLHttpRequest || window.ActiveXObject) {
		if (window.ActiveXObject) {
			try {
				xhr = new ActiveXObject("Msxml2.XMLHTTP");
			} catch(e) {
				xhr = new ActiveXObject("Microsoft.XMLHTTP");
			}
		} else {
			xhr = new XMLHttpRequest(); 
		}
	} else {
		alert("Votre navigateur ne supporte pas l'objet XMLHTTPRequest...");
		return null;
	}
	
	return xhr;
}
function find(q){
	var xhr = getXMLHttpRequest();
	var r = encodeURIComponent(q);
	var fin = document.getElementById('find');
	if(q.length == 0){
		setTimeout(fin.addEventListener('keyup', function(e) {
    		e.preventDefault();
    		xhr.abort();
		}), 400);
	}
	xhr.open("GET", "include/request.php?r="+ r, true);
	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
			document.getElementById('builds').innerHTML = "";
			document.getElementById('builds').innerHTML = xhr.responseText;
		}
	};

	xhr.send(null);
}