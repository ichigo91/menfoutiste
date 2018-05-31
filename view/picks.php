<?php
	$reponse2 = $bdd->query('SELECT id, login, pick FROM users ORDER BY login');
	while($donnees2 = $reponse2->fetch()){
		echo '<div id="user-'.$donnees2['id'].'" class="users">';
		echo '<h1 style="">'.$donnees2['login'].'</h1><br>';
		$reponse = $bdd->query('SELECT id,nom,img_min FROM heros ORDER BY nom');
		while ($donnees = $reponse->fetch()){
			if($donnees2['pick'][$donnees['id']-1] == '1'){
				echo '<a href="/heros-'.$donnees['id'].'"><div class="1" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else if ($donnees2['pick'][$donnees['id']-1] == '2') {
				echo '<a href="/heros-'.$donnees['id'].'"><div class="2" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
			else{
				echo '<a href="/heros-'.$donnees['id'].'"><div class="0" style="display:none" id="img">';
				echo '<img src="images/'.$donnees['id'].'/'.$donnees['img_min'].'" height="128"><br><span id="nompick">'.$donnees['nom'].'</span>';
				echo '</div></a>';
			}
		}
		echo '</div>';
	}
?>
<br><br><a href="/edit_picks" class="button">Modifier mes picks</a>
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
	
	function showSpan2(pick,id_user){
	    var users = document.getElementsByClassName('users');
	    var user = document.getElementById('user-'+id_user);
	    var lien4 = document.getElementById('lien'+4);
		var lien3 = document.getElementById('lien'+3);
	    if(pick == 0){
    		for (i = 0; i < users.length; i++) {
    		    users[i].style.display = "";
    		}
    		user.style.display = "";
    		lien4.className = "active";
			lien3.classList.remove("active");
	    }else{
    		for (i = 0; i < users.length; i++) {
    		    users[i].style.display = "none";
    		}
    		user.style.display = "";
    		lien3.className = "active";
			lien4.classList.remove("active");
	    }
	}
</script>