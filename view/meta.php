<?php
	$reponse2 = $bdd->query('SELECT id, picks FROM meta ORDER BY id DESC');
	$donnees2 = $reponse2->fetch();
	$reponse = $bdd->query('SELECT id,nom,img_min,classe FROM heros ORDER BY classe, nom');
	while ($donnees = $reponse->fetch()){
		if($donnees2['picks'][$donnees['id']-1] == '1'){
			if($donnees['classe'] == '0'){
				echo '<a href="/heros-'.$donnees['id'].'"><div class="0" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees['classe'] == '1') {
				echo '<a href="/heros-'.$donnees['id'].'"><div class="1" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees['classe'] == '2') {
				echo '<a href="/heros-'.$donnees['id'].'"><div class="2" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees['classe'] == '3') {
				echo '<a href="/heros-'.$donnees['id'].'"><div class="3" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"  class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else{
				echo '<a href="/heros-'.$donnees['id'].'"><div class="0 2" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';			    
			}
		}
	}
?>
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
			var span4 = document.getElementsByClassName(3);
			for (i = 0; i < span4.length; i++) {
			    span4[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+1);
			var lien3 = document.getElementById('lien'+2);
			var lien4 = document.getElementById('lien'+3);
			var lien5 = document.getElementById('lien'+4);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
			lien5.classList.remove("active");
		}else if(id==1){
			var span2 = document.getElementsByClassName(0);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "none";
			}
			var span3 = document.getElementsByClassName(2);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "none";
			}
			var span4 = document.getElementsByClassName(3);
			for (i = 0; i < span4.length; i++) {
			    span4[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+2);
			var lien4 = document.getElementById('lien'+3);
			var lien5 = document.getElementById('lien'+4);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
			lien5.classList.remove("active");
		}else if(id==2){
			var span2 = document.getElementsByClassName(0);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "none";
			}
			var span3 = document.getElementsByClassName(1);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "none";
			}
			var span4 = document.getElementsByClassName(3);
			for (i = 0; i < span4.length; i++) {
			    span4[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+1);
			var lien4 = document.getElementById('lien'+3);
			var lien5 = document.getElementById('lien'+4);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
			lien5.classList.remove("active");
		}else if(id==3){
			var span2 = document.getElementsByClassName(0);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "none";
			}
			var span3 = document.getElementsByClassName(1);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "none";
			}
			var span4 = document.getElementsByClassName(2);
			for (i = 0; i < span4.length; i++) {
			    span4[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+1);
			var lien4 = document.getElementById('lien'+2);
			var lien5 = document.getElementById('lien'+4);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
			lien5.classList.remove("active");
		}else{
			var span2 = document.getElementsByClassName(0);
			for (i = 0; i < span2.length; i++) {
			    span2[i].style.display = "";
			}
			var span3 = document.getElementsByClassName(1);
			for (i = 0; i < span3.length; i++) {
			    span3[i].style.display = "";
			}
			var span4 = document.getElementsByClassName(2);
			for (i = 0; i < span4.length; i++) {
			    span4[i].style.display = "";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+1);
			var lien4 = document.getElementById('lien'+2);
			var lien5 = document.getElementById('lien'+3);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
			lien5.classList.remove("active");
		}
	}
</script>
<center>
	<a href="/edit_meta" class="button">Modifier la méta</a>
</center>