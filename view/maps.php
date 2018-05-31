<?php
	$reponse = $bdd->query('SELECT id, nom, image FROM maps ORDER BY id');
	while ($donnees = $reponse->fetch()){
		echo '<a href="/synergies-'.$donnees['id'].'"><div id="img">';
		echo '<img src="images/maps/'.$donnees['image'].'" height="128" class="select"><br><span id="nommap">'.$donnees['nom'].'</span>';
		echo '</div></a>';
	}
?><br><br>
<a href="/add_map" class="button">Ajouter une map</a>