<?php
$reponse = $bdd->query('SELECT * FROM build WHERE id="'.$_GET['id'].'"');
$donnees = $reponse->fetch();
if($donnees['id_user'] != $_SESSION['id']){
	echo '<script language="Javascript">
           <!--
           		alert("C\'est pas bien de vouloir modifier le build des autres !!!");
           		setTimeout(document.location.replace("/"), 3000);
           // -->
     </script>';
}else{
	if(isset($_POST['1'])){
		$req = $bdd->prepare("UPDATE build SET type = :type, comments = :comments, `1` = :un, `4` = :quatre, `7` = :sept, `10` = :dix, `13` = :treize, `16` = :seize, `20` =:vingt WHERE id = :id");	
		$req->execute(array(
			'type' => $_POST['type'],
			'comments' => $_POST['comments'],
			'un' =>  $_POST['1'],
			'quatre' =>  $_POST['4'],
			'sept' =>  $_POST['7'],
			'dix' =>  $_POST['10'],
			'treize' =>  $_POST['13'],
			'seize' =>  $_POST['16'],
			'vingt' =>  $_POST['20'],
			'id' => $_POST['id']
		));
			echo '<script language="Javascript">
           <!--
           		document.location.replace("/");
           // -->
     </script>';
	}
}
$reponse2 = $bdd->query('SELECT * FROM heros WHERE id="'.$donnees['heros'].'"');
$donnees2 = $reponse2->fetch();
?>
<h1><?php echo $donnees2['nom']; ?></h1><br>
<form action="#" method="post">
	<span class="talent">1 </span>
	<input type="hidden" name="1" id="1" value="<?php echo $donnees['1']; ?>">
	<?php 
		$un = unserialize($donnees2['1']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="1-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="1 <?php if($donnees['1'] == $i+1){echo "active";} ?>"><img id="t1-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt1-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">4 </span>
	<input type="hidden" name="4" id="4" value="<?php echo $donnees['4']; ?>">
	<?php 
		$un = unserialize($donnees2['4']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="4-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="4 <?php if($donnees['4'] == $i+1){echo "active";} ?>"><img id="t4-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt4-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">7 </span>
	<input type="hidden" name="7" id="7" value="<?php echo $donnees['7']; ?>">
	<?php 
		$un = unserialize($donnees2['7']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="7-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="7 <?php if($donnees['7'] == $i+1){echo "active";} ?>"><img id="t7-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt7-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">10 </span>
	<input type="hidden" name="10" id="10" value="<?php echo $donnees['10']; ?>">
	<?php 
		$un = unserialize($donnees2 ['10']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="10-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="10 <?php if($donnees['10'] == $i+1){echo "active";} ?>"><img id="t10-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt10-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">13 </span>
	<input type="hidden" name="13" id="13" value="<?php echo $donnees['13']; ?>"><?php 
		$un = unserialize($donnees2['13']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="13-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="13 <?php if($donnees['13'] == $i+1){echo "active";} ?>"><img id="t13-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt13-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">16 </span>
	<input type="hidden" name="16" id="16" value="<?php echo $donnees['16']; ?>"><?php 
		$un = unserialize($donnees2['16']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="16-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="16 <?php if($donnees['16'] == $i+1){echo "active";} ?>"><img id="t16-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt16-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">20 </span>
	<input type="hidden" name="20" id="20" value="<?php echo $donnees['20']; ?>"><?php 
		$un = unserialize($donnees2['20']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="20-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="20 <?php if($donnees['20'] == $i+1){echo "active";} ?>"><img id="t20-<?php echo $i+1; ?>" src="/images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt20-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br><br>
	<label>Type : </label><input type="text" name="type" value="<?php echo $donnees['type']; ?>"><br><br>
	<label>Commentaires : </label><br><br><textarea name="comments" rows="8" cols="80"><?php echo $donnees['comments']; ?></textarea><br>
	<input type="hidden" name="id" value="<?php echo $donnees['id']; ?>"><br>
 	<input type="submit" value="Modifier" class="button">
</form>
<script type="text/javascript">
	function talent(id){
		var img = document.getElementById(id);
		var input = document.getElementById(id.split("-")[0]).value = id.split("-")[1];
		var elements = document.getElementsByClassName(id.split("-")[0]);
	    for(i=0;i<elements.length;i++){
	        elements[i].classList.remove("active");
	    }
		img.classList.add("active");
	}
</script>
<script type="text/javascript">
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