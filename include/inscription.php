<?php
if(isset($_SESSION['id'])){
			echo '<script language="Javascript">
       <!--
       		document.location.replace("/");
       // -->
 </script>';
}
if(isset($_POST['login'])){
	if($_POST['key'] == )
	$reponse = $bdd->query('SELECT id,login,password FROM users WHERE login="'.$_POST['login'].'"');
	$donnees = $reponse->fetch();
	if(!empty($donnees)){
		echo "erreur";
	}
	else{
		if($_POST['password']==$_POST['password2']){
			$psw = sha1($_POST['password']);

			$req = $bdd->prepare("INSERT INTO users VALUES(NULL,:login,:psw,DEFAULT)");	
			$req->execute(array(
				'login' => $_POST['login'],
				'psw' => $psw
			));


			$reponse = $bdd->query('SELECT id,login,password FROM users WHERE login="'.$_POST['login'].'"');
			$donnees = $reponse->fetch();

			$_SESSION['id'] = $donnees['id'];
			$_SESSION['login'] = $_POST['login'];
			echo '<script language="Javascript">
			       <!--
			       		document.location.replace("/");
			       // -->
				</script>';
		}else{
			echo "mots de passe differents";
		}
	}
}
?>
<center>
	<form action="#" method="post">
		<fieldset>
			<legend>Inscription</legend>
			<label>Login : </label><input type="text" name="login"><br>
			<label>Mot de passe : </label><input type="password" name="password"><br>
			<label>Comfirmer le mot de passe : </label><input type="password" name="password2"><br>
			<label>Clé de sécurité : </label><input type="text" name="key"><br>
			<input type="submit" value="Se connecter">
		</fieldset>
	</form>
</center>
Ajouter une key et un key timeout