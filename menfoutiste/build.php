<table>
	<thead>
		<caption>Builds</caption>
	</thead>
	<tr>
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
		$class = array('blue','bleuclair','red','violet','');
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
			<script type="text/javascript">
		        function showName(event,nom){
		        	var span = document.getElementById('nom'+nom);
					span.style.display = "";
					l = span.offsetWidth;
					var x = event.clientX;
					var y = event.clientY;
					span.style.left = x - l/2 + 'px';
					span.style.top = y - 20 + 'px';

		        }
		        function hideName(nom){
		        	var span = document.getElementById('nom'+nom);
					span.style.display = "none";
		        }
		        function deleteBuild(id){
		        	var r = confirm("Voulez-vous vraiment supprimer ce build ?");
		        	if(r){
		        		document.location.replace("delete_build.php?id="+id);
		        	}else{

		        	}
		        }
			</script>
		<?php
		while($donnees = $reponse->fetch()){
			echo '<tr class="'.$class[$donnees['classe']].'">';
			echo '<td>'.$donnees['nom'].'</td>';
			echo '<td>'.$donnees['type'].'</td>';
			$talent = unserialize($donnees['img1']);
			echo '<td><img id="1-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent1']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom1-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent1']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img4']);
			echo '<td><img id="4-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent4']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom4-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent4']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img7']);
			echo '<td><img id="7-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent7']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom7-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent7']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img10']);
			echo '<td><img id="10-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent10']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom10-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent10']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img13']);
			echo '<td><img id="13-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent13']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom13-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent13']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img16']);
			echo '<td><img id="16-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent16']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom16-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent16']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img20']);
			echo '<td><img id="20-'.$donnees['id'].'" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent20']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom20-'.$donnees['id'].'" class="nom" style="display:none">'.$talent[$donnees['talent20']-1]['nom'].'</span>';
			$reponse2 = $bdd->query('SELECT login FROM users WHERE id="'.$donnees['id_user'].'"');
			$donnee2 = $reponse2->fetch();
			echo '<td>'.$donnee2['login'].'</td>';
			echo '<td>';
			if($_SESSION['login'] == $donnee2['login']){
				echo '<a href="edit_build.php?id='.$donnees['id_build'].'"><img src="images/theme/edit.png"></a>';
			}
			echo '</td>';
			echo '<td>';
			if($_SESSION['login'] == $donnee2['login']){
				echo '<a href="#" id="'.$donnees['id_build'].'" onclick="deleteBuild(this.id)"><img src="images/theme/delete.png"/></a>';
			}
			echo '</td>';
			echo '</tr>';
		}
	?>
</table><br>
<center>Trier par : <a href="?order=0"><button>Héros</button></a><a href="?order=1"><button>Ancienneté</button></a></center>
<br>
<center>
	<a href="select_heros.php"><button>Ajouter un build</button></a><br>
	<a href="add_heros.php"><button>Ajouter un héros</button></a>
</center>