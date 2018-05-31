<?php
	if(!isset($_GET['id'])){
?>
<a href="/synergies_heros"><div id="img">'
<img src="images/theme/heros.png" width="84.6%" class="select"><br><span id="nompick">Héros</span>
</div></a>
<a href="/maps"><div id="img">'
<img src="images/theme/maps.jpg" width="90%" class="select"><br><span id="nompick">Maps</span>
</div></a>
<?php
	}
	else{
		$reponse = $bdd->query('SELECT id, nom, image, synergies FROM maps WHERE id="'.$_GET['id'].'"');
		$donnees = $reponse->fetch();
?>
<h1>Héros forts sur <?php echo $donnees['nom']; ?></h1>
<?php
	$reponse2 = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
	while ($donnees2 = $reponse2->fetch()){
		if($donnees['synergies'][$donnees2['id']-1] == '1'){
				echo '<a href="/heros-'.$donnees2['id'].'"><div id="img">';
				echo '<img src="images/'.$donnees2['id'].'/'.$donnees2['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees2['nom'].'</span>';
				echo '</div></a>';
		}
	}
?>
<br><br><a href="/edit_synergies_map-<?php echo $donnees['id']; ?>" class="button">Modifier les héros</a>
<?php
	}
?>