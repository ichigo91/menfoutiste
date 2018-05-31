<?php
	$reponse = $bdd->query('SELECT id,nom,img_min,classe FROM heros ORDER BY classe, nom');
	while ($donnees = $reponse->fetch()){
			if($donnees['classe'] == '0'){
				echo '<a href="/'.$_GET['view'].'-'.$donnees['id'].'"><div class="0" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees['classe'] == '1') {
				echo '<a href="/'.$_GET['view'].'-'.$donnees['id'].'"><div class="1" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees['classe'] == '2') {
				echo '<a href="/'.$_GET['view'].'-'.$donnees['id'].'"><div class="2" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees['classe'] == '3') {
				echo '<a href="/'.$_GET['view'].'-'.$donnees['id'].'"><div class="3" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"  class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else{
				echo '<a href="/'.$_GET['view'].'-'.$donnees['id'].'"><div class="4" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128" class="select"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';			    
			}
	}
?>
<script type="text/javascript">
	function showSpan(id){
		var span1 = document.getElementsByClassName(id);
		var lien1 = document.getElementById('lien'+id);
		var multi = document.getElementsByClassName(4);
		var i;
		for (i = 0; i < span1.length; i++) {
		    span1[i].style.display = "";
		}
		for (i = 0; i < multi.length; i++) {
		    multi[i].style.display = "";
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
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
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
		    for (i = 0; i < multi.length; i++) {
			    multi[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+2);
			var lien4 = document.getElementById('lien'+3);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
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
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");
		}else{
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
			for (i = 0; i < multi.length; i++) {
			    multi[i].style.display = "none";
			}
			var lien2 = document.getElementById('lien'+0);
			var lien3 = document.getElementById('lien'+1);
			var lien4 = document.getElementById('lien'+2);
			lien1.className = "active";
			lien2.classList.remove("active");
			lien3.classList.remove("active");
			lien4.classList.remove("active");	
		}
	}
</script>