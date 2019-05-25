function showName(event,nom){
	var span = document.getElementById('nom'+nom);
	span.style.display = "";
	l = span.offsetWidth;
	var x = event.clientX;
	var y = event.clientY;
	span.style.left = x - l/2 + document.body.scrollLeft + 'px';
	span.style.top = y - 20 - 10 + (document.body.scrollTop || document.documentElement.scrollTop) + 'px';
}
function hideName(nom){
	var span = document.getElementById('nom'+nom);
	span.style.display = "none";
}
function showDesc(id,i){
	var modal = document.getElementById('m'+id);
	var span = document.getElementById("close"+id);
	modal.style.display = "block";
	span.onclick = function() {
		modal.style.display = "none";
	}
	window.onclick = function(event) {
		if (event.target == modal) {
			modal.style.display = "none";
		}
	}
}