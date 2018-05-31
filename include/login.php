<?php
if(isset($_SESSION['id'])){
			echo '<script language="Javascript">
       <!--
       		document.location.replace("/");
       // -->
 </script>';
}
if(isset($_POST['login'])){
	$psw = sha1($_POST['password']);
	$reponse = $bdd->query('SELECT id,login,password FROM users WHERE login="'.$_POST['login'].'"');
	$donnees = $reponse->fetch();

	if($psw == $donnees['password']){
		$_SESSION['id'] = $donnees['id'];
		$_SESSION['login'] = $_POST['login'];
		$_SESSION['info'] = array('','');
		echo '<script language="Javascript">
       <!--
       		document.location.replace("/");
       // -->
 </script>';
	}else{
		echo '<div class="info" id="info"><span class="info_msg">Identifiant ou mot de passe incorrect</span><span class="info_close" id="info_close"><a href="#">x</a></span></div>';
	}
}
?>
<center>
	<form action="#" method="post" class="identification">
			<label>Identifiant</label><br><input type="text" name="login" class="id"><br><br>
			<label>Mot de passe</label><br><input type="password" name="password" class="id"><br><br>
			<input type="submit" value="Se connecter" class="button">
	</form>
</center>