<?php
$reponse2 = $bdd->query('SELECT picks FROM meta ORDER BY id DESC LIMIT 1');
$donnees2 = $reponse2->fetch();
if(isset($_POST['1'])){
	$picks = $donnees2['picks'];
	for ($i=0; $i < count($_POST); $i++) { 
		$picks[$i] = $_POST[$i+1];
	}
	$req = $bdd->prepare("INSERT INTO meta VALUES(NULL, :picks, :d)");	
	$req->execute(array(
		'picks' => $picks,
		'd' => date("Y-m-d H:i:s")
	));
	$_SESSION['info'][0] = 1;
	$_SESSION['info'][1] = 'La méta a bien été modifiée';
		echo '<script language="Javascript">
       <!--
       		document.location.replace("/meta");
       // -->
		</script>';
}
?>
<form action="#" method="post">
<table>
<tr>
	<td>Héros</td>
	<td>Ajouter à la méta</td>
	<td>Retirer de la méta</td>
</tr>
<?php
	$reponse = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
	while ($donnees = $reponse->fetch()){
		echo'<tr>';
		echo '<td>';
		echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="1" ';
		if($donnees2['picks'][$donnees['id']-1] == 1){
			echo 'checked';
		}
		echo '/>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="0" ';
		if($donnees2['picks'][$donnees['id']-1] == 0){
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