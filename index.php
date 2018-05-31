<?php
	include("include/db.php");
	if(!empty($_GET["view"])){
    	if(file_exists("view/".$_GET["view"].".php")){
			$title = $_GET["view"];
		}else{
			$title = "Erreur 404";
		}
	}else{
		$title = "Builds";
	}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="/style.css" />
<title>Menfoutiste - <?php echo ucfirst($title); ?></title>
</head>
<body>
<?php
if(isset($_SESSION['id'])) {
	echo '<nav>';
	include("include/nav.php");
	if(isset($_GET['view'])){
		if((!isset($_GET['id']))&&($_GET["view"]=="heros"||$_GET["view"]=="add_build")){
			include("include/sub_nav.php");
		}elseif ($_GET["view"]=="picks") {
			include("include/sub_nav_double.php");
		}elseif ($_GET["view"]=="meta") {
			include("include/sub_nav_all.php");
		}
	}
	echo '</nav>';
?>
<center>
<section>
<div class="content">
<?php
if($_SESSION['info'][0] != 0){
	echo '<div class="info_'.$_SESSION['info'][0].'" id="info"><span class="info_msg">'.$_SESSION['info'][1].'</span><span class="info_close" id="info_close"><a href="#">x</a></span></div>';
}
if(!empty($_GET["view"])){
    if(file_exists("view/".$_GET["view"].".php"))
        include_once("view/".$_GET["view"].".php");
    else{
		include_once("view/404.php");
	}
}else{
    include_once("view/builds.php");
}
?>
<br><br>
</section>
</center>
<footer></footer>
<?php
    }else{
        include("include/login.php");
    }
?>
</body>
</html>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="include/scripts/session.js"></script>
<script type="text/javascript">
	$( document.getElementById('info_close') ).click(function () {
    	$( "#info" ).fadeOut("slow");
    	session_info();
	});
	window.setTimeout(function(){
  $( "#info" ).fadeOut("slow");
    	session_info();
}, 5000);
</script>