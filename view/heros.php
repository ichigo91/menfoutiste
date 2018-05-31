<?php
	if(!isset($_GET['id'])){
		include('include/select_heros.php');
?>
<br><br><a href="/add_heros" class="button">Ajouter un héros</a>
<?php
	}else{
?>
<?php
	$reponse = $bdd->query('SELECT * FROM heros WHERE id="'.$_GET['id'].'"');
	$donnees = $reponse->fetch();
	$carac = unserialize($donnees['caracteristiques']);
?>
<h1><?php echo $donnees['nom']; ?></h1><br>
<img src="images/<?php echo $donnees['id'].'/'.$donnees['img_min']; ?>" height="128">
<div id="carac">
	<div>
			<h4>ATTAQUE</h4>
		Dégâts de l'attaque : <span id="dps"><?php echo $carac['dps']; ?></span><br>
		Attaques par seconde : <?php echo $carac['aps']; ?><br>
		Portée de l'attaque : <?php echo $carac['range']; ?><br><br>
			<h4>CAPACITÉS</h4>
		Mana : <span id="mana"><?php echo $carac['mana']; ?></span><br>
		Régénération / sec. : <span id="regen_mana"><?php echo $carac['rmana']; ?></span><br>
	</div>
	<div>
			<h4>DÉFENSE</h4>
		Points de vie : <span id="lp"><?php echo $carac['lp']; ?></span><br>
		Régénération / sec. : <span id="regen_lp"><?php echo $carac['rlp']; ?></span><br>
		Armure anti-sort : <?php echo $carac['aas']; ?><br>
		Armure physique : <?php echo $carac['ap']; ?><br><br>
			<h4>UTILITAIRES</h4>
		Vitesse déplacement : <?php echo $carac['speed']; ?>%
	</div>	
</div><br>
<div class="slidecontainer">
  <input type="range" min="1" max="30" value="1" class="slider" id="lvl">
  <p>Niveau : <span id="showlvl"></span></p>
</div>
<br><br>
<div id="spell">
<?php
	$A = unserialize($donnees['A']);
?>
<div>
<div class="img"><img id="A" src="/images/<?php if($A['nom'] != ""){echo $donnees['id']."/".$A['image'];} else{echo "theme/nochoice.png";} ?>" height="80" width="70" class="stalent"><img id="A" class="cadre" src="/images/theme/cadre.png" onmouseover="this.src='/images/theme/cadre_h.png';showName(event,this.id);document.getElementById('toucheA').src='/images/theme/a_h.png'" onmouseout="this.src='/images/theme/cadre.png';hideName(this.id);document.getElementById('toucheA').src='/images/theme/a.png'" onclick="showDesc(this.id)"></div><span id="nomA" class="nom" style="display:none"><?php echo $A['nom']; ?></span>
<span class="spellt"><img id="toucheA" class="touche" src="/images/theme/a.png"></span>
	<div id="mA" class="modal">';
		<div class="modal-content">
    	<span id="closeA" class="close"></span>
    	<h3 class="m"><?php echo $A['nom']; ?></h3><?php if($A['mana']!=''){ echo '<p class="spell-mana">Mana : '.$A['mana'].'</p>'; } ?><?php if($A['cd']!=''){ echo '<p class="spell-cd">Temps de recharge : '.$A['cd'].' secondes</p>'; } ?><p class="m"><?php echo $A['description']; ?></p></div>
    </div>
</div>
<?php
	$Z = unserialize($donnees['Z']);
?>
<div>
<div class="img"><img id="Z" src="/images/<?php if($Z['nom'] != ""){echo $donnees['id']."/".$Z['image'];} else{echo "theme/nochoice.png";} ?>" height="80" width="70" class="stalent"><img id="Z" class="cadre" src="/images/theme/cadre.png" onmouseover="this.src='/images/theme/cadre_h.png';showName(event,this.id);document.getElementById('toucheZ').src='/images/theme/z_h.png'" onmouseout="this.src='/images/theme/cadre.png';hideName(this.id);document.getElementById('toucheZ').src='/images/theme/z.png'" onclick="showDesc(this.id)"></div><span id="nomZ" class="nom" style="display:none"><?php echo $Z['nom']; ?></span>
<span class="spellt"><img id="toucheZ" class="touche" src="/images/theme/z.png"></span>
	<div id="mZ" class="modal">';
		<div class="modal-content">
    	<span id="closeZ" class="close"></span>
    	<h3 class="m"><?php echo $Z['nom']; ?></h3><?php if($Z['mana']!=''){ echo '<p class="spell-mana">Mana : '.$Z['mana'].'</p>'; } ?><?php if($Z['cd']!=''){ echo '<p class="spell-cd">Temps de recharge : '.$Z['cd'].' secondes</p>'; } ?><p class="m"><?php echo $Z['description']; ?></p></div>
    </div>
</div>
<div>
<?php
	$E = unserialize($donnees['E']);
?>
<div class="img"><img id="E" src="/images/<?php if($E['nom'] != ""){echo $donnees['id']."/".$E['image'];} else{echo "theme/nochoice.png";} ?>" height="80" width="70" class="stalent"><img id="E" class="cadre" src="/images/theme/cadre.png" onmouseover="this.src='/images/theme/cadre_h.png';showName(event,this.id);document.getElementById('toucheE').src='/images/theme/e_h.png'" onmouseout="this.src='/images/theme/cadre.png';hideName(this.id);document.getElementById('toucheE').src='/images/theme/e.png'" onclick="showDesc(this.id)"></div><span id="nomE" class="nom" style="display:none"><?php echo $E['nom']; ?></span>
<span class="spellt"><img id="toucheE" class="touche" src="/images/theme/e.png"></span>
	<div id="mE" class="modal">';
		<div class="modal-content">
    	<span id="closeE" class="close"></span>
    	<h3 class="m"><?php echo $E['nom']; ?></h3><?php if($E['mana']!=''){ echo '<p class="spell-mana">Mana : '.$E['mana'].'</p>'; } ?><?php if($E['cd']!=''){ echo '<p class="spell-cd">Temps de recharge : '.$E['cd'].' secondes</p>'; } ?><p class="m"><?php echo $E['description']; ?></p></div>
    </div>
</div>
<div>
<div class="img"><img id="R" src="/images/theme/nochoice.png" height="80" width="70" class="stalent"><img id="R" class="cadre" src="/images/theme/cadre_ult.png" onmouseover="this.src='/images/theme/cadre_ult_h.png';document.getElementById('toucheR').src='/images/theme/r_h.png'" onmouseout="this.src='/images/theme/cadre_ult.png';document.getElementById('toucheR').src='/images/theme/r.png'" onclick="showDesc(this.id)"></div>
<span class="spellt"><img id="toucheR" class="touche" src="/images/theme/r.png"></span>
</div>
<div>
<?php
	$D = unserialize($donnees['D']);
?>
<div class="img"><img id="D" src="/images/<?php echo $donnees['id']."/".$D['image']; ?>" height="80" width="70" class="stalent"><img id="D" class="cadre" src="/images/theme/cadre.png" onmouseover="this.src='/images/theme/cadre_h.png';showName(event,this.id)" onmouseout="this.src='/images/theme/cadre.png';hideName(this.id)" onclick="showDesc(this.id)"></div><span id="nomD" class="nom" style="display:none"><?php echo $D['nom']; ?></span>
	<div id="mD" class="modal">';
		<div class="modal-content">
    	<span id="closeD" class="close"></span>
    	<h3 class="m"><?php echo $D['nom']; ?></h3><p style="color:white">Trait</p><?php if($D['mana']!=''){ echo '<p class="spell-mana">Mana : '.$D['mana'].'</p>'; } ?><?php if($D['cd']!=''){ echo '<p class="spell-cd">Temps de recharge : '.$D['cd'].' secondes</p>'; } ?><p class="m"><?php echo $D['description']; ?></p></div>
    </div>
</div>
</div>
<div id="spell">
<?php
	$autres = unserialize($donnees['autres']);
?>
<div>
	<span class="spellt"><?php echo $autres[0]; ?></span>
</div>
<?php
	for($i=1;$i< count($autres);$i++) {
?>
<div>
<img id="autres-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$autres[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nomautres-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $autres[$i]['nom']; ?></span>
	<div id="mautres-<?php echo $i; ?>" class="modal">';
		<div class="modal-content">
    	<span id="closeautres-<?php echo $i; ?>" class="close"></span>
    	<h3 class="m"><?php echo $autres[$i]['nom']; ?></h3><?php if($D['mana']!=''){ echo '<p class="spell-mana">Mana : '.$autres[$i]['mana'].'</p>'; } ?><?php if($autres[$i]['cd']!=''){ echo '<p class="spell-cd">Temps de recharge : '.$autres[$i]['cd'].' secondes</p>'; } ?><p class="m"><?php echo $autres[$i]['description']; ?></p></div>
    </div>
<br>
<span class="spellt"><?php echo $autres[$i]['touche']; ?></span>
</div>
<?php
	}
?>
</div>

<br>
<span class="talent">1 </span>
<?php 
	$un = unserialize($donnees['1']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="1-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom1-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m1-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close1-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br>
<span class="talent">4 </span>
<?php 
	$un = unserialize($donnees['4']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="4-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom4-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m4-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close4-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br>
<span class="talent">7 </span>
<?php 
	$un = unserialize($donnees['7']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="7-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom7-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m7-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close7-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br>
<span class="talent">10 </span>
<?php 
	$un = unserialize($donnees['10']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="10-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom10-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m10-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close10-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br>
<span class="talent">13 </span>
<?php 
	$un = unserialize($donnees['13']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="13-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom13-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m13-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close13-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br>
<span class="talent">16 </span>
<?php 
	$un = unserialize($donnees['16']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="16-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom16-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m16-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close16-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br>
<span class="talent">20 </span>
<?php 
	$un = unserialize($donnees['20']);
	for ($i=0; $i < sizeof($un); $i++) { 
		?><img id="20-<?php echo $i; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)" onclick="showDesc(this.id)"><span id="nom20-<?php echo $i; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m20-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close20-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
	}
?><br><br>
<h2>Builds de <?php echo $donnees['nom']; ?></h2><br>
<div id="builds">
	<table>
		<tr class="head">
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
			$class = array(array('blue','bleuclair','red','violet',''),array('blue_i','bleuclair_i','red_i','violet_i',''));
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
			        function deleteBuild(id){
			        	var r = confirm("Voulez-vous vraiment supprimer ce build ?");
			        	if(r){
			        		document.location.replace("delete_build.php?id="+id);
			        	}else{

			        	}
			        }
				</script>
			<?php
			$i = 0;
			while($donnees = $reponse->fetch()){
				if($donnees['id'] == $_GET['id']){
				echo '<tr class="'.$class[$i%2][$donnees['classe']].'">';
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
			}
		?>
	</table>
</div><br>
<center><a href="/add_build-<?php echo $_GET['id']; ?>" class="button">Ajouter un build</a><br><a href="/edit_heros-<?php echo $_GET['id']; ?>" class="button">Modifier le héros</a></center>
<script type="text/javascript">
	function showDesc(id){
					var modal = document.getElementById('m'+id);
					var span = document.getElementById("close"+id);
					modal.style.display = "block";
					span.onclick = function() {
						modal.style.display = "none";
					}
					window.onclick = function(event) {
						if (event.target == modal) {
							modal.style.display = "none";
						}
					}
	}
    function showName(event,nom){
    	var span = document.getElementById('nom'+nom);
		span.style.display = "";
		l = span.offsetWidth;
		var x = event.clientX;
		var y = event.clientY;
		span.style.left = x - l/2 + document.body.scrollLeft + 'px';
		span.style.top = y - 20 - 10 + (document.body.scrollTop || document.documentElement.scrollTop) + 'px';
	}
    function hideName(nom){
    	var span = document.getElementById('nom'+nom);
		span.style.display = "none";
    }
</script>
<script>
var slider = document.getElementById("lvl");
var output = document.getElementById("showlvl");
output.innerHTML = slider.value;
var dpsout = document.getElementById("dps");
var dps = parseInt(dpsout.innerHTML);
var manaout = document.getElementById("mana");
var mana = parseInt(manaout.innerHTML);
var regenmanaout = document.getElementById("regen_mana");
var regenmana = parseFloat(regenmanaout.innerHTML);
var lpout = document.getElementById("lp");
var lp = parseInt(lpout.innerHTML);
var regenlpout = document.getElementById("regen_lp");
var regenlp = parseFloat(regenlpout.innerHTML);

function precisionRound(number, precision) {
	var factor = Math.pow(10, precision);
	return Math.round(number * factor) / factor;
}

slider.oninput = function() {
	output.innerHTML = this.value;
	dpsout.innerHTML = Math.round(dps*((1.04)**(this.value-1)));
	if(mana > 100){
		manaout.innerHTML = mana + (this.value-1)*10;
		regenmanaout.innerHTML = precisionRound(regenmana + (this.value-1)*0.10,2);
	}
	lpout.innerHTML = Math.round(lp*((1.04)**(this.value-1)));
	regenlpout.innerHTML = precisionRound(regenlp*((1.04)**(this.value-1)),2);
}
</script>
<?php
	}
?>