<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: /index.php');
}
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hots;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$reponse = $bdd->query('SELECT * FROM build WHERE id="'.$_GET['id'].'"');
$donnees = $reponse->fetch();
if($donnees['id_user'] != $_SESSION['id']){
	echo '<script language="Javascript">
           <!--
           		alert("C\'est pas bien de vouloir modifier le build des autres !!!");
           		setTimeout(document.location.replace("build.php"), 3000);
           // -->
     </script>';
}else{
	if(isset($_POST['1'])){
		$req = $bdd->prepare("UPDATE build SET type = :type, comments = :comments, `1` = :un, `4` = :quatre, `7` = :sept, `10` = :dix, `13` = :treize, `16` = :seize, `20` =:vingt WHERE id = :id");	
		$req->execute(array(
			'type' => $_POST['type'],
			'comments' => $_POST['comments'],
			'un' =>  $_POST['1'],
			'quatre' =>  $_POST['4'],
			'sept' =>  $_POST['7'],
			'dix' =>  $_POST['10'],
			'treize' =>  $_POST['13'],
			'seize' =>  $_POST['16'],
			'vingt' =>  $_POST['20'],
			'id' => $_POST['id']
		));
		header('Location: /build.php');
	}
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
<?php
	$reponse2 = $bdd->query('SELECT * FROM heros WHERE id="'.$donnees['heros'].'"');
	$donnees2 = $reponse2->fetch();
?>
<h1><?php echo $donnees2['nom']; ?></h1>
<form action="#" method="post">
	<label for="1">1</label><?php 
		$un = unserialize($donnees2['1']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="1" value="<?php echo $i+1; ?>" <?php if($donnees['1'] == $i+1){echo "checked";} ?>><?php
		}
	?><br>
	<label for="4">4</label><?php 
		$un = unserialize($donnees2['4']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="4" value="<?php echo $i+1; ?>" <?php if($donnees['4'] == $i+1){echo "checked";} ?>><?php
		}
	?><br>
	<label for="7">7</label><?php 
		$un = unserialize($donnees2['7']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="7" value="<?php echo $i+1; ?>" <?php if($donnees['7'] == $i+1){echo "checked";} ?>><?php
		}
	?><br>
	<label for="10">10</label><?php 
		$un = unserialize($donnees2['10']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="10" value="<?php echo $i+1; ?>" <?php if($donnees['10'] == $i+1){echo "checked";} ?>><?php
		}
	?><br>
	<label for="13">13</label><?php 
		$un = unserialize($donnees2['13']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="13" value="<?php echo $i+1; ?>" <?php if($donnees['13'] == $i+1){echo "checked";} ?>><?php
		}
	?><br>
	<label for="16">16</label><?php 
		$un = unserialize($donnees2['16']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="16" value="<?php echo $i+1; ?>" <?php if($donnees['16'] == $i+1){echo "checked";} ?>><?php
		}
	?><br>
	<label for="20">20</label><?php 
		$un = unserialize($donnees2['20']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><input type="radio" name="20" value="<?php echo $i+1; ?>" <?php if($donnees['20'] == $i+1){echo "checked";} ?>><?php
		}
	?><br><br>
	<label>Type : </label><input type="text" name="type" value="<?php echo $donnees['type']; ?>"><br><br>
	<label>Commentaires : </label><textarea name="comments"><?php echo $donnees['comments']; ?></textarea><br>
	<input type="hidden" name="id" value="<?php echo $donnees['id']; ?>"><br>
 	<input type="submit" value="Modifier"><br><br>
</form>
</center>
</body>
</html>