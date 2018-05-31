<?php
$reponse2 = $bdd->query('SELECT synergies FROM maps WHERE id="'.$_GET['id'].'"');
$donnees2 = $reponse2->fetch();
if(isset($_POST['1'])){
	$synergies = $donnees2['synergies'];
	for ($i=0; $i < count($_POST); $i++) { 
		$synergies[$i] = $_POST[$i+1];
	}
	$req = $bdd->prepare("UPDATE maps SET synergies = :synergies WHERE id = :id");	
	$req->execute(array(
		'synergies' => $synergies,
		'id' => $_GET['id']
	));
		echo '<script language="Javascript">
       <!--
       		document.location.replace("/synergies");
       // -->
		</script>';
}
?>
<form action="#" method="post">
<table>
<tr>
	<td>Héros</td>
	<td>Ajouter</td>
	<td>Retirer</td>
</tr>
<?php
	$reponse = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
	while ($donnees = $reponse->fetch()){
		echo'<tr>';
		echo '<td>';
		echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="1" ';
		if($donnees2['synergies'][$donnees['id']-1] == 1){
			echo 'checked';
		}
		echo '/>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="0" ';
		if($donnees2['synergies'][$donnees['id']-1] == 0){
			echo 'checked';
		}
		echo '/>';
		echo '</td>';
		echo'</tr>';
	}
?>
</table><br>
<input type="submit" value="Modifier" class="button">
</form>