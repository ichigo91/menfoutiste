<br><input type="text" name="recherche" id="find" onkeyup="find(this.value)" value="" placeholder="Rechercher par héros"><br><br>
<div id="builds">
	<table>
		<tr class="head">
			<td>Héros</td>
			<td>Type de build</td>
			<td>niv 1</td>
			<td>niv 4</td>
			<td>niv 7</td>
			<td>niv 10</td>
			<td>niv 13</td>
			<td>niv 16</td>
			<td>niv 20</td>
			<td>Ajouté par</td>
			<td>Modifier</td>
			<td>Supprimer</td>
		</tr>
		<?php
			$class = array(array('blue','bleuclair','red','violet','white'),array('blue_i','bleuclair_i','red_i','violet_i','white_i'));
			if (isset($_GET['order'])) {
				if ($_GET['order']==1) {
					$reponse = $bdd->query('SELECT heros.id as id, build.id as id_build, build.id_user as id_user, heros.classe as classe, heros.nom as nom, build.type as type, build.comments as comments, build.1 as talent1, heros.1 as img1, build.4 as talent4, heros.4 as img4, build.7 as talent7, heros.7 as img7, build.10 as talent10, heros.10 as img10, heros.13 as img13, build.13 as talent13, heros.16 as img16, build.16 as talent16, build.20 as talent20, heros.20 as img20 FROM build INNER JOIN heros ON build.heros = heros.id ORDER BY build.id');
				}else{
					$reponse = $bdd->query('SELECT heros.id as id, build.id as id_build, build.id_user as id_user, heros.classe as classe, heros.nom as nom, build.type as type, build.comments as comments, build.1 as talent1, heros.1 as img1, build.4 as talent4, heros.4 as img4, build.7 as talent7, heros.7 as img7, build.10 as talent10, heros.10 as img10, heros.13 as img13, build.13 as talent13, heros.16 as img16, build.16 as talent16, build.20 as talent20, heros.20 as img20 FROM build INNER JOIN heros ON build.heros = heros.id ORDER BY heros.nom');
				}
			}else{
					$reponse = $bdd->query('SELECT heros.id as id, build.id as id_build, build.id_user as id_user, heros.classe as classe, heros.nom as nom, build.type as type, build.comments as comments, build.1 as talent1, heros.1 as img1, build.4 as talent4, heros.4 as img4, build.7 as talent7, heros.7 as img7, build.10 as talent10, heros.10 as img10, heros.13 as img13, build.13 as talent13, heros.16 as img16, build.16 as talent16, build.20 as talent20, heros.20 as img20 FROM build INNER JOIN heros ON build.heros = heros.id ORDER BY heros.nom');
			}
			?>
			<?php
			$i = 0;
			while($donnees = $reponse->fetch()){
				echo '<tr class="'.$class[$i%2][$donnees['classe']].'">';
				echo '<td>'.$donnees['nom'].'</td>';
				echo '<td>'.$donnees['type'].'</td>';
				$talent = unserialize($donnees['img1']);
				echo '<td><img id="1-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent1']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id,'.$i.')"></td>';
				echo '<span id="nom1-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent1']-1]['nom'].'</span>';
				echo '<div id="m1-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close1-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent1']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent1']-1]['description'].'</p></div></div>';
				$talent = unserialize($donnees['img4']);
				echo '<td><img id="4-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent4']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"></td>';
				echo '<span id="nom4-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent4']-1]['nom'].'</span>';
				echo '<div id="m4-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close4-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent4']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent4']-1]['description'].'</p></div></div>';
				$talent = unserialize($donnees['img7']);
				echo '<td><img id="7-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent7']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"></td>';
				echo '<span id="nom7-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent7']-1]['nom'].'</span>';
				echo '<div id="m7-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close7-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent7']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent7']-1]['description'].'</p></div></div>';
				$talent = unserialize($donnees['img10']);
				echo '<td><img id="10-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent10']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"></td>';
				echo '<span id="nom10-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent10']-1]['nom'].'</span>';
				echo '<div id="m10-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close10-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent10']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent10']-1]['description'].'</p></div></div>';
				$talent = unserialize($donnees['img13']);
				echo '<td><img id="13-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent13']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"></td>';
				echo '<span id="nom13-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent13']-1]['nom'].'</span>';
				echo '<div id="m13-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close13-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent13']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent13']-1]['description'].'</p></div></div>';
				$talent = unserialize($donnees['img16']);
				echo '<td><img id="16-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent16']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"></td>';
				echo '<span id="nom16-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent16']-1]['nom'].'</span>';
				echo '<div id="m16-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close16-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent16']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent16']-1]['description'].'</p></div></div>';
				$talent = unserialize($donnees['img20']);
				echo '<td><img id="20-'.$donnees['id'].'-'.$i.'" src="/images/'.$donnees['id'].'/'.$talent[$donnees['talent20']-1]['image'].'" height="40" width="40" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"></td>';
				echo '<span id="nom20-'.$donnees['id'].'-'.$i.'" class="nom" style="display:none">'.$talent[$donnees['talent20']-1]['nom'].'</span>';
				echo '<div id="m20-'.$donnees['id'].'-'.$i.'" class="modal">';
				echo '<div class="modal-content">';
	    		echo '<span id="close20-'.$donnees['id'].'-'.$i.'" class="close"></span>';
	    		echo '<h3 class="m">'.$talent[$donnees['talent20']-1]['nom'].'</h3><p class="m">'.$talent[$donnees['talent20']-1]['description'].'</p></div></div>';
				$reponse2 = $bdd->query('SELECT login FROM users WHERE id="'.$donnees['id_user'].'"');
				$donnee2 = $reponse2->fetch();
				echo '<td>'.$donnee2['login'].'</td>';
				echo '<td>';
				if($_SESSION['login'] == $donnee2['login']){
					echo '<a href="index.php?view=edit_build&id='.$donnees['id_build'].'"><img src="images/theme/edit.png"></a>';
				}
				echo '</td>';
				echo '<td>';
				if($_SESSION['login'] == $donnee2['login']){
					echo '<a href="#" id="'.$donnees['id_build'].'" onclick="deleteBuild(this.id)"><img src="images/theme/delete.png"/></a>';
				}
				echo '</tr>';
				$i++;
			}
		?>
	</table>
</div><br>
<center>Trier par : <a href="index.php?view=builds&order=0"><button>Héros</button></a><a href="index.php?view=builds&order=1"><button>Ancienneté</button></a></center>
<br>
<center>
	<a href="/add_build" class="button">Ajouter un build</a>
</center>
<script src="include/scripts/talents.js"></script>
<script src="include/scripts/builds.js"></script>
<script src="include/scripts/find.js"></script>