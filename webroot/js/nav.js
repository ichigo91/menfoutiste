var chrono2=null;
var chrono3=null;
function toggle_down(e)
{
	clearTimeout(chrono3);
	clearTimeout(chrono2);
	chrono3=null;
	chrono2=null;
}
function toggle_open(e){
	if(chrono2 != null || chrono3 != null){
		toggle_down(e);
	}
	$('.dropdown-'+e).dropdown('toggle');
}
function toggle(e){
	$('.dropdown-'+e).dropdown('toggle');
	clearTimeout(chrono3);
	clearTimeout(chrono2);
	chrono3=null;
	chrono2=null;
}