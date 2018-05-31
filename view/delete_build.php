<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: /');
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
           		alert("C\'est pas bien de vouloir supprimer le build des autres !!!");
           		setTimeout(document.location.replace("build.php"), 3000);
           // -->
     </script>';
}else{
	$req = $bdd->exec('DELETE FROM build WHERE id="'.$_GET['id'].'"');
	header('Location: /');
}
?>