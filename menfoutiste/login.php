<?php
session_start();
if(isset($_SESSION['id'])){
	header('Location: /index.php?view=build');
}
if(isset($_POST['login'])){
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=hots;charset=utf8', 'root', '');
	}
	catch(Exception $e)
	{
		die('Erreur : '.$e->getMessage());
	}

	$psw = sha1($_POST['password']);
	$reponse = $bdd->query('SELECT id,login,password FROM users WHERE login="'.$_POST['login'].'"');
	$donnees = $reponse->fetch();

	if($psw == $donnees['password']){
		$_SESSION['id'] = $donnees['id'];
		$_SESSION['login'] = $_POST['login'];
		header('Location: /index.php?view=build');
	}else{
		echo 'Identifiant ou mot de passe incorrect';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Menfoutiste</title>
</head>
<body>
<center>
	<form action="#" method="post" class="identification">
		<fieldset>
			<legend>Identification</legend>
			<label for="login">Login : </label><input type="text" name="login"><br>
			<label for="password">Mot de passe : </label><input type="password" name="password"><br>
			<input type="submit" value="Se connecter">
		</fieldset>
	</form>
</center>
</body>
</html>