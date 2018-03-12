<?php
$reponse2 = $bdd->query('SELECT * FROM heros WHERE id="'.$_GET['id'].'"');
$donnees2 = $reponse2->fetch();
if(isset($_POST['nom1'])){
    $un = array();
    foreach (unserialize($donnees2['1']) as $key => $value) {
    	array_push($un, array('nom' => $_POST['nom1'][$key], 'description' => $_POST['text1'][$key], 'image' => $_POST['image1'][$key]));
    }
    
    $quatre = array();
    foreach (unserialize($donnees2['4']) as $key => $value) {
    	array_push($quatre, array('nom' => $_POST['nom4'][$key], 'description' => $_POST['text4'][$key], 'image' => $_POST['image4'][$key]));
    }
    
    $sept = array();
    foreach (unserialize($donnees2['7']) as $key => $value) {
    	array_push($sept, array('nom' => $_POST['nom7'][$key], 'description' => $_POST['text7'][$key], 'image' => $_POST['image7'][$key]));
    }
    
    $dix = array();
    foreach (unserialize($donnees2['10']) as $key => $value) {
    	array_push($dix, array('nom' => $_POST['nom10'][$key], 'description' => $_POST['text10'][$key], 'image' => $_POST['image10'][$key]));
    }
    
    $treize = array();
    foreach (unserialize($donnees2['13']) as $key => $value) {
    	array_push($treize, array('nom' => $_POST['nom13'][$key], 'description' => $_POST['text13'][$key], 'image' => $_POST['image13'][$key]));
    }
    
    $seize = array();
    foreach (unserialize($donnees2['16']) as $key => $value) {
    	array_push($seize, array('nom' => $_POST['nom16'][$key], 'description' => $_POST['text16'][$key], 'image' => $_POST['image16'][$key]));
    }
    
    $vingt = array();
    foreach (unserialize($donnees2['20']) as $key => $value) {
    	array_push($vingt, array('nom' => $_POST['nom20'][$key], 'description' => $_POST['text20'][$key], 'image' => $_POST['image20'][$key]));
    }
	$req = $bdd->prepare("UPDATE heros SET nom = :nom, classe = :classe,  `1` = :un, `4` = :quatre, `7` = :sept, `10` = :dix, `13` = :treize, `16` = :seize, `20` =:vingt WHERE id = :id");	
	$req->execute(array(
	    'nom' => $_POST['nom'],
		'classe' => $_POST['classe'],
		'un' =>  serialize($un),
		'quatre' =>  serialize($quatre),
		'sept' =>  serialize($sept),
		'dix' =>  serialize($dix),
		'treize' =>  serialize($treize),
		'seize' =>  serialize($seize),
		'vingt' =>  serialize($vingt),
		'id' => $_POST['id']
	));
		echo '<script language="Javascript">
       <!--
       		document.location.replace("index.php?view=build");
       // -->
 </script>';
}
?>
<h1><?php echo $donnees2['nom']; ?></h1>
<form action="#" method="post">
    <label>Nom : </label><input type="text" name="nom" value="<?php echo $donnees2['nom']; ?>"><br><br>
	<label>Classe : </label><select name="classe"><option value="0" <?php if($donnees2['classe'] == 0){ echo 'selected="selected"'; } ?>>Guerrier</option><option value="1"  <?php if($donnees2['classe'] == 1){ echo 'selected="selected"'; } ?>>Support</option><option value="2"  <?php if($donnees2['classe'] == 2){ echo 'selected="selected"'; } ?>>Assassin</option><option value="3"  <?php if($donnees2['classe'] == 3){ echo 'selected="selected"'; } ?>>Spécialiste</option><option value="4"  <?php if($donnees2['classe'] == 4){ echo 'selected="selected"'; } ?>>Multiclasse</option></select><br><br>
	<label for="1">1</label><?php 
		$un = unserialize($donnees2['1']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom1[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text1[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image1[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br>
	<label for="4">4</label><?php 
		$un = unserialize($donnees2['4']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom4[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text4[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image4[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br>
	<label for="7">7</label><?php 
		$un = unserialize($donnees2['7']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom7[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text7[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image7[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br>
	<label for="10">10</label><?php 
		$un = unserialize($donnees2['10']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom10[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text10[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image10[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br>
	<label for="13">13</label><?php 
		$un = unserialize($donnees2['13']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom13[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text13[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image13[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br>
	<label for="16">16</label><?php 
		$un = unserialize($donnees2['16']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom16[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text16[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image16[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br>
	<label for="20">20</label><?php 
		$un = unserialize($donnees2['20']);
		for ($i=0; $i < sizeof($un); $i++) { 
			?><input type="text" name="nom20[]" value="<?php echo $un[$i]['nom']; ?>"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" height="64" width="64" class="talent"><textarea name="text20[]"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image20[]" value="<?php echo $un[$i]['image']; ?>"><?php
		}
	?><br><br>
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"><br>
 	<input type="submit" value="Modifier">
</form>