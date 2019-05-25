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
var chrono=null;
function down()
{
if (chrono!=null)
{
 clearTimeout(chrono);
  chrono=null;
}
}
function find(){
	var fin = document.getElementById('find').value;
	if(fin.length == 0){
		document.getElementById('builds').style = "display:block";
		document.getElementById('request').style = "display:none";
	}else{
		var xhr = getXMLHttpRequest();
		var r = encodeURIComponent(fin);
		var id = window.location.pathname.split('-')[1];
		xhr.open("GET", "/builds/find?name="+r, true);
		xhr.onreadystatechange = function() {
			if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
				document.getElementById('builds').style = "display:none";
				document.getElementById('request').style = "display:block";
				document.getElementById('request').innerHTML = "";
				console.log(xhr.responseText);
				document.getElementById('request_tmp').innerHTML = xhr.responseText;
				document.getElementById('request').innerHTML = document.getElementById('request_tab').outerHTML;
				document.getElementById('request_tmp').innerHTML = "";
			}
		};

		xhr.send(null);
	}
}