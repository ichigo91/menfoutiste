<?php
if(isset($_POST['1'])){
	$req = $bdd->prepare("INSERT INTO build VALUES(NULL,:id_user,:heros,:type,:comments,:un,:quatre,:sept,:dix,:treize,:seize,:vingt)");	
	$req->execute(array(
		'id_user' => $_SESSION['id'],
		'heros' => $_POST['id'],
		'type' => $_POST['type'],
		'comments' => $_POST['comments'],
		'un' =>  $_POST['1'],
		'quatre' =>  $_POST['4'],
		'sept' =>  $_POST['7'],
		'dix' =>  $_POST['10'],
		'treize' =>  $_POST['13'],
		'seize' =>  $_POST['16'],
		'vingt' =>  $_POST['20']
	));
	echo '<script language="Javascript">
           <!--
           		document.location.replace("index.php");
           // -->
     </script>';
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Menfoutiste - Ajouter un Build</title>
</head>
<body>
<?php
	include("include/nav.php");
?>
<center>
<section>
<center>
<?php
	$reponse = $bdd->query('SELECT * FROM heros WHERE id="'.$_GET['id'].'"');
	$donnees = $reponse->fetch();
?>
<h1><?php echo $donnees['nom']; ?></h1>
<form action="#" method="post">
	<label for="1">1</label><?php 
		$un = unserialize($donnees['1']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="1" value="<?php echo $i+1; ?>"><?php
		}
	?><br>
	<label for="4">4</label><?php 
		$un = unserialize($donnees['4']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="4" value="<?php echo $i+1; ?>"><?php
		}
	?><br>
	<label for="7">7</label><?php 
		$un = unserialize($donnees['7']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="7" value="<?php echo $i+1; ?>"><?php
		}
	?><br>
	<label for="10">10</label><?php 
		$un = unserialize($donnees['10']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="10" value="<?php echo $i+1; ?>"><?php
		}
	?><br>
	<label for="13">13</label><?php 
		$un = unserialize($donnees['13']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="13" value="<?php echo $i+1; ?>"><?php
		}
	?><br>
	<label for="16">16</label><?php 
		$un = unserialize($donnees['16']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="16" value="<?php echo $i+1; ?>"><?php
		}
	?><br>
	<label for="20">20</label><?php 
		$un = unserialize($donnees['20']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="20" value="<?php echo $i+1; ?>"><?php
		}
	?><br><br>
	<label>Type : </label><input type="text" name="type"><br><br>
	<label>Commentaires : </label><textarea name="comments"></textarea><br>
	<input type="hidden" name="id" value="<?php echo $donnees['id']; ?>"><br>
 	<input type="submit" value="Ajouter">
</form>
</center>
</section>
</center>
</body>
</html>