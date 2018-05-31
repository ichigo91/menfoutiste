<?php
	if(!isset($_GET['id'])){
		include('include/select_heros.php');
	}else{

if(isset($_POST['1'])){
	$req = $bdd->prepare("INSERT INTO build VALUES(NULL,:id_user,:heros,:type,:comments,:un,:quatre,:sept,:dix,:treize,:seize,:vingt)");	
	$req->execute(array(
		'id_user' => $_SESSION['id'],
		'heros' => $_POST['id'],
		'type' => $_POST['type'],
		'comments' => $_POST['comments'],
		'un' =>  $_POST['1'],
		'quatre' =>  $_POST['4'],
		'sept' =>  $_POST['7'],
		'dix' =>  $_POST['10'],
		'treize' =>  $_POST['13'],
		'seize' =>  $_POST['16'],
		'vingt' =>  $_POST['20']
	));
	echo '<script language="Javascript">
           <!--
           		document.location.replace("/");
           // -->
     </script>';
}
?>
<center>
<?php
	$reponse = $bdd->query('SELECT * FROM heros WHERE id="'.$_GET['id'].'"');
	$donnees = $reponse->fetch();
?>
<h1><?php echo $donnees['nom']; ?></h1><br>
<form action="#" method="post">
	<span class="talent">1 </span>
	<input type="hidden" name="1" id="1" value="">
	<?php 
		$un = unserialize($donnees['1']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="1-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="1"><img id="t1-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt1-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">4 </span>
	<input type="hidden" name="4" id="4" value="">
	<?php 
		$un = unserialize($donnees['4']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="4-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="4"><img id="t4-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt4-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">7 </span>
	<input type="hidden" name="7" id="7" value="">
	<?php 
		$un = unserialize($donnees['7']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="7-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="7"><img id="t7-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt7-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">10 </span>
	<input type="hidden" name="10" id="10" value="">
	<?php 
		$un = unserialize($donnees['10']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="10-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="10"><img id="t10-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt10-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">13 </span>
	<input type="hidden" name="13" id="13" value=""><?php 
		$un = unserialize($donnees['13']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="13-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="13"><img id="t13-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt13-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">16 </span>
	<input type="hidden" name="16" id="16" value=""><?php 
		$un = unserialize($donnees['16']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="16-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="16"><img id="t16-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt16-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br>
	<span class="talent">20 </span>
	<input type="hidden" name="20" id="20" value=""><?php 
		$un = unserialize($donnees['20']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><a href="#" id="20-<?php echo $i+1; ?>" onclick="event.preventDefault();talent(this.id)" class="20"><img id="t20-<?php echo $i+1; ?>" src="/images/<?php echo $donnees['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></a><span id="nomt20-<?php echo $i+1; ?>" class="nom" style="display:none"><?php echo $un[$i]['nom']; ?></span><?php
		}
	?><br><br>
	<label>Type : </label><input type="text" name="type"><br><br>
	<label>Commentaires : </label><br><br><textarea name="comments" rows="8" cols="80"></textarea><br>
	<input type="hidden" name="id" value="<?php echo $donnees['id']; ?>"><br>
 	<input type="submit" value="Ajouter" class="button">
</form>
</center>
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
<?php
	}
?>