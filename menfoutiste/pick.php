<center>
	<ul>
		<li class="nav"><a href="#" id="lien2" class="active" onclick="showSpan(2)">Héros maîtrisés</a></li>
		<li class="nav"><a href="#" id="lien1" onclick="showSpan(1)">Héros à maîtriser</a></li>
		<li class="nav"><a href="#" id="lien0" onclick="showSpan(0)">Héros non maîtrisés</a></li>
	</ul>
</center><br>
<?php
	$reponse2 = $bdd->query('SELECT login, pick FROM users');
	while($donnees2 = $reponse2->fetch()){
		echo '<div>';
		echo '<h1 style="">'.$donnees2['login'].'</h1>';
		$reponse = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
		while ($donnees = $reponse->fetch()){
			if($donnees2['pick'][$donnees['id']-1] == '1'){
				echo '<div class="1" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div>';
			}
			else if ($donnees2['pick'][$donnees['id']-1] == '2') {
				echo '<div class="2" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div>';
			}
			else{
				echo '<div class="0" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div>';
			}
		}
		echo '</div>';
	}
?>
<br><br><a href="index.php?view=edit_pick"><button>Modifier mes picks</button></a>
<script type="text/javascript">
	function showSpan(id){
		var span1 = document.getElementsByClassName(id);
		var lien1 = document.getElementById('lien'+id);
		var i;
		for (i = 0; i < span1.length; i++) {
		    span1[i].style.display = "";
		}
		if(id==0){
			var span2 = document.getElementsByClassName(1);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "none";
			}
			var span3 = document.getElementsByClassName(2);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+1);
			var lien3 = document.getElementById('lien'+2);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
		}else if(id==1){
			var span2 = document.getElementsByClassName(0);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "none";
			}
			var span3 = document.getElementsByClassName(2);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+2);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
		}else{
			var span2 = document.getElementsByClassName(0);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "none";
			}
			var span3 = document.getElementsByClassName(1);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+1);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");		
		}
	}
</script>