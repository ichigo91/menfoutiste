<?php
$reponse = $bdd->query('SELECT * FROM build WHERE id="'.$_GET['id'].'"');
$donnees = $reponse->fetch();
$reponse2 = $bdd->query('SELECT * FROM heros WHERE id="'.$donnees['heros'].'"');
$donnees2 = $reponse2->fetch();
?>
<h1><?php echo $donnees2['nom']; ?> : Build <?php echo $donnees['type']; ?></h1><br>
	<span class="talent">1 </span>
	<?php 
		$un = unserialize($donnees2['1']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="1-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="1 <?php if($donnees['1'] == $i+1){echo "active";} ?>"><img id="1-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nom1-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><div id="m1-<?php echo $i; ?>" class="modal">
			<div class="modal-content">
    		<span id="close1-<?php echo $i; ?>" class="close"></span>
    		<h3 class="m"><?php echo $un[$i]['nom']; ?></h3><p class="m"><?php echo $un[$i]['description']; ?></p></div></div><?php
		}
	?><br>
	<span class="talent">4 </span>
	<?php 
		$un = unserialize($donnees2['4']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="4-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="4 <?php if($donnees['4'] == $i+1){echo "active";} ?>"><img id="t4-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt4-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">7 </span>
	<?php 
		$un = unserialize($donnees2['7']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="7-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="7 <?php if($donnees['7'] == $i+1){echo "active";} ?>"><img id="t7-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt7-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">10 </span>
	<?php 
		$un = unserialize($donnees2 ['10']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="10-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="10 <?php if($donnees['10'] == $i+1){echo "active";} ?>"><img id="t10-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt10-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">13 </span>
	<?php 
		$un = unserialize($donnees2['13']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="13-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="13 <?php if($donnees['13'] == $i+1){echo "active";} ?>"><img id="t13-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt13-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">16 </span>
	<?php 
		$un = unserialize($donnees2['16']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="16-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="16 <?php if($donnees['16'] == $i+1){echo "active";} ?>"><img id="t16-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt16-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">20 </span>
	<?php 
		$un = unserialize($donnees2['20']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="20-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="20 <?php if($donnees['20'] == $i+1){echo "active";} ?>"><img id="t20-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt20-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br><br>
	<h3>Commentaires :</h3><p><?php echo $donnees['comments']; ?></p>
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