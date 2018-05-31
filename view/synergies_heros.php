<h1>Synergies entre les héros</h1>
<?php
	$reponse = $bdd->query('SELECT * FROM synergies');
	while($donnees = $reponse->fetch()){
		$reponse2 = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
		$i = 0;
		while ($donnees2 = $reponse2->fetch()){
			if($donnees['synergie'][$donnees2['id']-1] == '1'){
				echo '<a href="/heros-'.$donnees2['id'].'"><div id="img">';
				echo '<img src="images/'.$donnees2['id'].'/'.$donnees2['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees2['nom'].'</span>';
				echo '</div></a>';
				if($i < $donnees['nb_heros']-1){
					echo '<img src="images/theme/double-arrow.png" width="64">';
				}
				$i++;
			}
		}
		echo '<br>';
	}
?>
<br><br><a href="/add_synergies_heros" class="button">Ajouter des synergies</a>