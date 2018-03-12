<?php
$reponse2 = $bdd->query('SELECT pick FROM users WHERE id="'.$_SESSION['id'].'"');
$donnees2 = $reponse2->fetch();
if(isset($_POST['1'])){
	$pick = $donnees2['pick'];
	for ($i=0; $i < count($_POST); $i++) { 
		$pick[$i] = $_POST[$i+1];
	}
	$req = $bdd->prepare("UPDATE users SET pick = :pick WHERE id = :id");	
	$req->execute(array(
		'pick' => $pick,
		'id' => $_SESSION['id'],
	));
		echo '<script language="Javascript">
       <!--
       		document.location.replace("index.php?view=pick");
       // -->
		</script>';
}
?>
<form action="#" method="post">
<table>
<tr>
	<td>Héros</td>
	<td>Maîtrisé</td>
	<td>A maîtriser</td>
	<td>Non maîtrisé</td>
</tr>
<?php
	$reponse = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
	while ($donnees = $reponse->fetch()){
		echo'<tr>';
		echo '<td>';
		echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="2" ';
		if($donnees2['pick'][$donnees['id']-1] == 2){
			echo 'checked';
		}
		echo '/>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="1" ';
		if($donnees2['pick'][$donnees['id']-1] == 1){
			echo 'checked';
		}
		echo '/>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="0" ';
		if($donnees2['pick'][$donnees['id']-1] == 0){
			echo 'checked';
		}
		echo '/>';
		echo '</td>';
		echo'</tr>';
	}
?>
</table><br>
<input type="submit" value="Modifier">
</form>