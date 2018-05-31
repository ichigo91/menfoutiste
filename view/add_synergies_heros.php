<?php
if(isset($_POST['1'])){
	$synergie = "00000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000000";
	$nb = 0;
	for ($i=0; $i < count($_POST); $i++) { 
		$synergie[$i] = $_POST[$i+1];
		if($_POST[$i+1]=="1"){
			$nb++;
		}
	}
	$req = $bdd->prepare("INSERT INTO synergies VALUES(NULL, :nb, :synergie, :commentaires)");	
	$req->execute(array(
		'nb' => $nb,
		'synergie' => $synergie,
		'commentaires' => $_POST['commentaires']
	));
		echo '<script language="Javascript">
       <!--
       		document.location.replace("/");
       // -->
		</script>';
}
?>
<form action="#" method="post">
<table>
<tr>
	<td>Héros</td>
	<td>Ajouter à cette synergie</td>
	<td>Retirer de cette synergie</td>
</tr>
<?php
	$reponse = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
	while ($donnees = $reponse->fetch()){
		echo'<tr>';
		echo '<td>';
		echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="1" ';
		echo '/>';
		echo '</td><td>';
		echo '<input type="radio" name="'.$donnees['id'].'" value="0" ';
		echo '/>';
		echo '</td>';
		echo '</tr>';
	}
?>
</table><br>
Commentaires :<br>
<textarea name="commentaires"></textarea>
<input type="submit" value="Ajouter" class="button">
</form>