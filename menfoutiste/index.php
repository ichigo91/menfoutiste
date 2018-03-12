<?php
	include("include/db.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Menfoutiste - Build</title>
</head>
<body>
<?php
	include("include/nav.php");
?>
<center>
<section>
<?php
if(!empty($_GET["view"])){
    if(file_exists($_GET["view"].".php"))
        include_once($_GET["view"].".php");
    else{
		include_once("404.php");
	}
}else{
    include_once("build.php");
}
?>
</section>
</center>
</body>
</html>