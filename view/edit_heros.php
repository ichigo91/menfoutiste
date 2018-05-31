<?php
$reponse2 = $bdd->query('SELECT * FROM heros WHERE id="'.$_GET['id'].'"');
$donnees2 = $reponse2->fetch();
if(isset($_POST['nom'])){
	$dossier = "images/".$donnees2['id']."/";
	if(!empty($_FILES['imgmin']['name'])){
		$imgmin = $_FILES['imgmin']['name'];
	}else{
		$imgmin = $_POST['imagemin'];
	}
	if(!empty($_FILES['imgmin']['name'])){ 
        $fichier = basename($_FILES['imgmin']['name']);
        if(move_uploaded_file($_FILES['imgmin']['tmp_name'], $dossier . $fichier)){
            unlink($dossier . $_POST['imagemin']);
        }
	}
	if(!empty($_FILES['imgA']['name'])){
		$imgA = $_FILES['imgA']['name'];
	}else{
		$imgA = $_POST['imageA'];
	}
	$a = array('nom'=>$_POST['nomA'], 'mana'=>$_POST['manaA'], 'cd'=>$_POST['cdA'],'description'=>$_POST['textA'], 'image'=>$imgA);
	if(!empty($_FILES['imgA']['name'])){ 
        $fichier = basename($_FILES['imgA']['name']);
        if(move_uploaded_file($_FILES['imgA']['tmp_name'], $dossier . $fichier)){
            unlink($dossier . $_POST['imageA']);
        }
	}
	if(!empty($_FILES['imgZ']['name'])){
		$imgZ = $_FILES['imgZ']['name'];
	}else{
		$imgZ = $_POST['imageZ'];
	}
	$z = array('nom'=>$_POST['nomZ'], 'mana'=>$_POST['manaZ'], 'cd'=>$_POST['cdZ'],'description'=>$_POST['textZ'], 'image'=>$imgZ);
	if(!empty($_FILES['imgZ'])){ 
        $fichier = basename($_FILES['imgZ']['name']);
        if(move_uploaded_file($_FILES['imgZ']['tmp_name'], $dossier . $fichier)){
            unlink($dossier . $_POST['imageZ']);
        }
	}
	if(!empty($_FILES['imgE']['name'])){
		$imgE = $_FILES['imgE']['name'];
	}else{
		$imgE = $_POST['imageE'];
	}
	$e = array('nom'=>$_POST['nomE'], 'mana'=>$_POST['manaE'], 'cd'=>$_POST['cdE'],'description'=>$_POST['textE'], 'image'=>$imgE);
	if(!empty($_FILES['imgE']['name'])){ 
        $fichier = basename($_FILES['imgE']['name']);
        if(move_uploaded_file($_FILES['imgE']['tmp_name'], $dossier . $fichier)){
            unlink($dossier . $_POST['imageE']);
        }
	}
	if(!empty($_FILES['imgD']['name'])){
		$imgD = $_FILES['imgD']['name'];
	}else{
		$imgD = $_POST['imageD'];
	}
	$d = array('nom'=>$_POST['nomD'], 'mana'=>$_POST['manaD'], 'cd'=>$_POST['cdD'],'description'=>$_POST['textD'], 'image'=>$imgD);
	if(!empty($_FILES['imgD']['name'])){ 
        $fichier = basename($_FILES['imgD']['name']);
        if(move_uploaded_file($_FILES['imgD']['tmp_name'], $dossier . $fichier)){
            unlink($dossier . $_POST['imageD']);
        }
	}
    $autres = array();
    array_push($autres, $_POST['nomgautres']);
    foreach ($_POST['nomautres'] as $key => $value) {
    	if(!empty($_FILES['imgautres']['name'][$key])){
			$imgautres = $_FILES['imgautres']['name'][$key];
		}else{
			$imgautres = $_POST['imageautres'][$key];
		}
		if(!empty($_FILES['imgautres']['name'][$key])){
			if(!empty($_POST['imageautres'][$key])){
				unlink($dossier . $_POST['imageautres'][$key]);
			}
	        $fichier = basename($_FILES['imgautres']['name'][$key]);
	        if(move_uploaded_file($_FILES['imgautres']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($autres, array('nom' => $_POST['nomautres'][$key], 'mana'=>$_POST['manaautres'][$key], 'cd'=>$_POST['cdautres'][$key], 'description' => $_POST['textautres'][$key], 'image' => $imgautres, 'touche' => $_POST['toucheautres'][$key]));
    }
    
    $un = array();
    foreach ($_POST['nom1'] as $key => $value) {
    	if(!empty($_FILES['img1']['name'][$key])){
			$imgun = $_FILES['img1']['name'][$key];
		}else{
			$imgun = $_POST['image1'][$key];
		}
		if(!empty($_FILES['img1']['name'][$key])){
			if(!empty($_POST['image1'][$key])){
				unlink($dossier . $_POST['image1'][$key]);
			}
	        $fichier = basename($_FILES['img1']['name'][$key]);
	        if(move_uploaded_file($_FILES['img1']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($un, array('nom' => $_POST['nom1'][$key], 'description' => $_POST['text1'][$key], 'image' => $imgun));
    }

    $quatre = array();
    foreach ($_POST['nom4'] as $key => $value) {
    	if(!empty($_FILES['img4']['name'][$key])){
			$imgquatre = $_FILES['img4']['name'][$key];
		}else{
			$imgquatre = $_POST['image4'][$key];
		}
		if(!empty($_FILES['img4']['name'][$key])){
			if(!empty($_POST['image4'][$key])){
				unlink($dossier . $_POST['image4'][$key]);
			}
	        $fichier = basename($_FILES['img4']['name'][$key]);
	        if(move_uploaded_file($_FILES['img4']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($quatre, array('nom' => $_POST['nom4'][$key], 'description' => $_POST['text4'][$key], 'image' => $imgquatre));
    }
    
    $sept = array();
    foreach ($_POST['nom7'] as $key => $value) {
    	if(!empty($_FILES['img7']['name'][$key])){
			$imgsept = $_FILES['img7']['name'][$key];
		}else{
			$imgsept = $_POST['image7'][$key];
		}
		if(!empty($_FILES['img7']['name'][$key])){
			if(!empty($_POST['image7'][$key])){
				unlink($dossier . $_POST['image7'][$key]);
			}
	        $fichier = basename($_FILES['img7']['name'][$key]);
	        if(move_uploaded_file($_FILES['img7']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($sept, array('nom' => $_POST['nom7'][$key], 'description' => $_POST['text7'][$key], 'image' => $imgsept));
    }
    
    $dix = array();
    foreach ($_POST['nom10'] as $key => $value) {
    	if(!empty($_FILES['img10']['name'][$key])){
			$imgdix = $_FILES['img10']['name'][$key];
		}else{
			$imgdix = $_POST['image10'][$key];
		}
		if(!empty($_FILES['img10']['name'][$key])){
			if(!empty($_POST['image10'][$key])){
				unlink($dossier . $_POST['image10'][$key]);
			}
	        $fichier = basename($_FILES['img10']['name'][$key]);
	        if(move_uploaded_file($_FILES['img10']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($dix, array('nom' => $_POST['nom10'][$key], 'description' => $_POST['text10'][$key], 'image' => $imgdix));
    }
    
    $treize = array();
    foreach ($_POST['nom13'] as $key => $value) {
    	if(!empty($_FILES['img13']['name'][$key])){
			$imgtreize = $_FILES['img13']['name'][$key];
		}else{
			$imgtreize = $_POST['image13'][$key];
		}
		if(!empty($_FILES['img13']['name'][$key])){
			if(!empty($_POST['image13'][$key])){
				unlink($dossier . $_POST['image13'][$key]);
			}
	        $fichier = basename($_FILES['img13']['name'][$key]);
	        if(move_uploaded_file($_FILES['img13']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($treize, array('nom' => $_POST['nom13'][$key], 'description' => $_POST['text13'][$key], 'image' => $imgtreize));
    }
    
    $seize = array();
    foreach ($_POST['nom16'] as $key => $value) {
    	if(!empty($_FILES['img16']['name'][$key])){
			$imgseize = $_FILES['img16']['name'][$key];
		}else{
			$imgseize = $_POST['image16'][$key];
		}
		if(!empty($_FILES['img16']['name'][$key])){
			if(!empty($_POST['image16'][$key])){
				unlink($dossier . $_POST['image16'][$key]);
			}
	        $fichier = basename($_FILES['img16']['name'][$key]);
	        if(move_uploaded_file($_FILES['img16']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($seize, array('nom' => $_POST['nom16'][$key], 'description' => $_POST['text16'][$key], 'image' => $imgseize));
    }
    
    $vingt = array();
    foreach ($_POST['nom20'] as $key => $value) {
    	if(!empty($_FILES['img20']['name'][$key])){
			$imgvingt = $_FILES['img20']['name'][$key];
		}else{
			$imgvingt = $_POST['image20'][$key];
		}
		if(!empty($_FILES['img20']['name'][$key])){
			if(!empty($_POST['image20'][$key])){
				unlink($dossier . $_POST['image20'][$key]);
			}
	        $fichier = basename($_FILES['img20']['name'][$key]);
	        if(move_uploaded_file($_FILES['img20']['tmp_name'][$key], $dossier . $fichier)){
	        }
		}
    	array_push($vingt, array('nom' => $_POST['nom20'][$key], 'description' => $_POST['text20'][$key], 'image' => $imgvingt));
    }

    $carac = array('dps' => $_POST['dps'],'aps' => $_POST['aps'], 'range' => $_POST['range'], 'mana' => $_POST['mana'], 'rmana' => $_POST['rmana'],'lp' => $_POST['lp'],'rlp' => $_POST['rlp'], 'aas' => $_POST['aas'], 'ap' => $_POST['ap'], 'speed' => $_POST['speed']);
	$req = $bdd->prepare("UPDATE heros SET nom = :nom, classe = :classe, caracteristiques = :carac, img_min = :img, A = :A, Z = :Z, E = :E, D = :D, autres = :autres,  `1` = :un, `4` = :quatre, `7` = :sept, `10` = :dix, `13` = :treize, `16` = :seize, `20` =:vingt WHERE id = :id");	
	$req->execute(array(
	    'nom' => $_POST['nom'],
		'classe' => $_POST['classe'],
		'carac' => serialize($carac),
		'img' => $imgmin,
		'A' => serialize($a),
		'Z' => serialize($z),
		'E' => serialize($e),
		'D' => serialize($d),
		'autres' => serialize($autres),
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
       		document.location.replace("/");
       // -->
 </script>';
}
?>
<h1><?php echo $donnees2['nom']; ?></h1>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Nom : </label><input type="text" name="nom" value="<?php echo $donnees2['nom']; ?>"><br><br>
	<label>Classe : </label><select name="classe"><option value="0" <?php if($donnees2['classe'] == 0){ echo 'selected="selected"'; } ?>>Guerrier</option><option value="1"  <?php if($donnees2['classe'] == 1){ echo 'selected="selected"'; } ?>>Support</option><option value="2"  <?php if($donnees2['classe'] == 2){ echo 'selected="selected"'; } ?>>Assassin</option><option value="3"  <?php if($donnees2['classe'] == 3){ echo 'selected="selected"'; } ?>>Spécialiste</option><option value="4"  <?php if($donnees2['classe'] == 4){ echo 'selected="selected"'; } ?>>Multiclasse</option></select><br><br>
	<label>Image : </label><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$donnees2['img_min']; ?>" id="outputmin" height="128"><br><input type="file" id="min" name="imgmin" onchange="loadFile(event,this.id)" /></div><input type="hidden" name="imagemin" value="<?php echo $donnees2['img_min']; ?>">
	<h3>Caractéristiques</h3>
	<?php
		$carac = unserialize($donnees2['caracteristiques']);
	?>
	<input type="number" name="dps">
	<input type="number" name="aps" step="0.01">
	<input type="number" name="range" step="0.01">
	<input type="number" name="mana">
	<input type="number" name="rmana" step="0.01">
	<input type="number" name="lp">
	<input type="number" name="rlp" step="0.01">
	<input type="number" name="aas">
	<input type="number" name="ap">
	<input type="number" name="speed">
	<h3>A</h3><?php 
		$A = unserialize($donnees2['A']);
		?><input type="text" name="nomA" value="<?php echo $A['nom']; ?>" placeholder="Nom"><input type="text" name="manaA" value="<?php echo $A['mana']; ?>" placeholder="Mana"><input type="text" name="cdA" value="<?php echo $A['cd']; ?>" placeholder="Temps de recharge"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$A['image']; ?>" id="outputA" height="64" width="64" class="talent"><br><input type="file" id="A" name="imgA" onchange="loadFile(event,this.id)" /></div><textarea name="textA" rows="4" cols="50" placeholder="Description"><?php echo $A['description']; ?></textarea><input type="hidden" name="imageA" value="<?php echo $A['image']; ?>"><br>
	<h3>Z</h3><?php 
		$Z = unserialize($donnees2['Z']);
		?><input type="text" name="nomZ" value="<?php echo $Z['nom']; ?>" placeholder="Nom"><input type="text" name="manaZ" value="<?php echo $Z['mana']; ?>" placeholder="Mana"><input type="text" name="cdZ" value="<?php echo $Z['cd']; ?>" placeholder="Temps de recharge"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$Z['image']; ?>" id="outputZ" height="64" width="64" class="talent"><br><input type="file" id="Z" name="imgZ" onchange="loadFile(event,this.id)" /></div><textarea name="textZ" rows="4" cols="50" placeholder="Description"><?php echo $Z['description']; ?></textarea><input type="hidden" name="imageZ" value="<?php echo $Z['image']; ?>"><br>
	<h3>E</h3><?php 
		$E = unserialize($donnees2['E']);
		?><input type="text" name="nomE" value="<?php echo $E['nom']; ?>" placeholder="Nom"><input type="text" name="manaE" value="<?php echo $E['mana']; ?>" placeholder="Mana"><input type="text" name="cdE" value="<?php echo $E['cd']; ?>" placeholder="Temps de recharge"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$E['image']; ?>" id="outputE" height="64" width="64" class="talent"><br><input type="file" id="E" name="imgE" onchange="loadFile(event,this.id)" /></div><textarea name="textE" rows="4" cols="50" placeholder="Description"><?php echo $E['description']; ?></textarea><input type="hidden" name="imageE" value="<?php echo $E['image']; ?>"><br>
	<h3>D</h3><?php 
		$D = unserialize($donnees2['D']);
		?><input type="text" name="nomD" value="<?php echo $D['nom']; ?>" placeholder="Nom"><input type="text" name="manaD" value="<?php echo $D['mana']; ?>" placeholder="Mana"><input type="text" name="cdD" value="<?php echo $D['cd']; ?>" placeholder="Temps de recharge"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$D['image']; ?>" id="outputD" height="64" width="64" class="talent"><br><input type="file" id="D" name="imgD" onchange="loadFile(event,this.id)" /></div><textarea name="textD" rows="4" cols="50" placeholder="Description"><?php echo $D['description']; ?></textarea><input type="hidden" name="imageD" value="<?php echo $D['image']; ?>"><br>
	<h3>Autres</h3>
	<div id="autres">
		<?php 
			$un = unserialize($donnees2['autres']);
		?>
			<input type="text" name="nomgautres" value="<?php echo $un[0]; ?>" placeholder="Nom"><br>
		<?php
			for ($i=1; $i < sizeof($un); $i++) { 
				?><span id="tautres-<?php echo $i+1; ?>"><input type="text" name="nomautres[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><input type="text" name="manaautres[]" value="<?php echo $un[$i]['mana']; ?>" placeholder="Mana"><input type="text" name="cdautres[]" value="<?php echo $un[$i]['cd']; ?>" placeholder="Temps de recharge"><input type="text" name="toucheautres[]" value="<?php echo $un[$i]['touche']; ?>" placeholder="Touche"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="outputautres-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="autres-<?php echo $i+1; ?>" name="imgautres[]" onchange="loadFile(event,this.id)" /></div><textarea name="textautres[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="imageautres[]" value="<?php echo $un[$i]['image']; ?>"><a id="autres-<?php echo $i+1; ?>" onclick="rmvField(this,'autres')"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?><br>
	</div>
	<button type="button" onclick="addField('autres')" >+</button>
	<input type="hidden" id="nbautres" name="nbautres" value="<?php echo sizeof($un); ?>">
	<h3>1</h3>
	<div id="1">
		<?php 
			$un = unserialize($donnees2['1']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t1-<?php echo $i+1; ?>"><input type="text" name="nom1[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output1-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="1-<?php echo $i+1; ?>" name="img1[]" onchange="loadFile(event,this.id)" /></div><textarea name="text1[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image1[]" value="<?php echo $un[$i]['image']; ?>"><a id="1-<?php echo $i+1; ?>" onclick="rmvField(this,1)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(1)" >+</button>
	<input type="hidden" id="nb1" name="nb1" value="<?php echo sizeof($un); ?>">
	<h3>4</h3>
	<div id="4">
		<?php 
			$un = unserialize($donnees2['4']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t4-<?php echo $i+1; ?>"><input type="text" name="nom4[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output4-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="4-<?php echo $i+1; ?>" name="img4[]" onchange="loadFile(event,this.id)" /></div><textarea name="text4[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image4[]" value="<?php echo $un[$i]['image']; ?>"><a id="4-<?php echo $i+1; ?>" onclick="rmvField(this,4)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(4)" >+</button>
	<input type="hidden" id="nb4" name="nb4" value="<?php echo sizeof($un); ?>">
	<h3>7</h3>
	<div id="7">
		<?php 
			$un = unserialize($donnees2['7']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t7-<?php echo $i+1; ?>"><input type="text" name="nom7[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output7-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="7-<?php echo $i+1; ?>" name="img7[]" onchange="loadFile(event,this.id)" /></div><textarea name="text7[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image7[]" value="<?php echo $un[$i]['image']; ?>"><a id="7-<?php echo $i+1; ?>" onclick="rmvField(this)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(7)" >+</button>
	<input type="hidden" id="nb7" name="nb7" value="<?php echo sizeof($un); ?>">
	<h3>10</h3>
	<div id="10">
		<?php 
			$un = unserialize($donnees2['10']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t10-<?php echo $i+1; ?>"><input type="text" name="nom10[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output10-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="10-<?php echo $i+1; ?>" name="img10[]" onchange="loadFile(event,this.id)" /></div><textarea name="text10[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image10[]" value="<?php echo $un[$i]['image']; ?>"><a id="10-<?php echo $i+1; ?>" onclick="rmvField(this)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(10)" >+</button>
	<input type="hidden" id="nb10" name="nb10" value="<?php echo sizeof($un); ?>">
	<h3>13</h3>
	<div id="13">
		<?php 
			$un = unserialize($donnees2['13']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t13-<?php echo $i+1; ?>"><input type="text" name="nom13[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output13-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="13-<?php echo $i+1; ?>" name="img13[]" onchange="loadFile(event,this.id)" /></div><textarea name="text13[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image13[]" value="<?php echo $un[$i]['image']; ?>"><a id="13-<?php echo $i+1; ?>" onclick="rmvField(this)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(13)" >+</button>
	<input type="hidden" id="nb13" name="nb13" value="<?php echo sizeof($un); ?>">	
	<h3>16</h3>
	<div id="16">
		<?php 
			$un = unserialize($donnees2['16']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t16-<?php echo $i+1; ?>"><input type="text" name="nom16[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output16-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="16-<?php echo $i+1; ?>" name="img16[]" onchange="loadFile(event,this.id)" /></div><textarea name="text16[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image16[]" value="<?php echo $un[$i]['image']; ?>"><a id="16-<?php echo $i+1; ?>" onclick="rmvField(this)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(16)" >+</button>
	<input type="hidden" id="nb16" name="nb16" value="<?php echo sizeof($un); ?>">
	<h3>20</h3>
	<div id="20">
		<?php 
			$un = unserialize($donnees2['20']);
			for ($i=0; $i < sizeof($un); $i++) { 
				?><span id="t20-<?php echo $i+1; ?>"><input type="text" name="nom20[]" value="<?php echo $un[$i]['nom']; ?>" placeholder="Nom"><div class="up_img"><img src="images/<?php echo $donnees2['id']."/".$un[$i]['image']; ?>" id="output20-<?php echo $i+1; ?>" height="64" width="64" class="talent"><br><input type="file" id="20-<?php echo $i+1; ?>" name="img20[]" onchange="loadFile(event,this.id)" /></div><textarea name="text20[]" rows="4" cols="50" placeholder="Description"><?php echo $un[$i]['description']; ?></textarea><input type="hidden" name="image20[]" value="<?php echo $un[$i]['image']; ?>"><a id="20-<?php echo $i+1; ?>" onclick="rmvField(this)"><img src="images/theme/delete.png"/></a><br></span><?php
			}
		?>
	</div><br>
	<button type="button" onclick="addField(20)" >+</button>
	<input type="hidden" id="nb20" name="nb20" value="<?php echo sizeof($un); ?>">
	<br><br>
	<input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"><br>
 	<input type="submit" value="Modifier" class="button">
</form>
<script type="text/javascript">
	function rmvField(a,id) {
		var span = a.parentNode;
		span.remove();
		var hid = document.getElementById('nb'+id);
        var nb = parseInt(hid.value);
        hid.value = nb-1;
    }
    function addField(t) {
        var div = document.getElementById(t);
        var hid = document.getElementById('nb'+t);
        var nb = parseInt(hid.value)+1;
        div.insertAdjacentHTML('beforeend','<span id="t'+t+'-'+nb+'">');
        var span = document.getElementById('t'+t+'-'+nb);
        addInput('nom'+t+'[]',"text","Nom",t,nb,span);
        if(t == 'autres'){
        	addInput('mana'+t+'[]',"text","Mana",t,nb,span);
        	addInput('cd'+t+'[]',"text","Temps de recharge",t,nb,span);
        	addInput('touche'+t+'[]',"text","Touche",t,nb,span);
        }
        addInput('img'+t+'[]',"file","",t,nb,span);
        addText('text'+t+'[]',span);
        span.insertAdjacentHTML('beforeend','<a id="'+t+'-'+nb+'" onclick="rmvField(this,'+t+')"><img src="images/theme/delete.png"/></a><br>');
        hid.value = nb;
    }
    function addInput(name,type,pl,t,nb,div){
        if(type=="file"){
            var divimg = document.createElement("div");
            divimg.className = "up_img";
            div.appendChild(divimg);
            var img_out = document.createElement("img");
            img_out.id = "output-"+t+nb;
            img_out.width = "64";
            img_out.height = "64";
            img_out.class = "talent";
            img_out.src = "images/theme/nochoice.png";
            divimg.appendChild(img_out);
            divimg.innerHTML = '<img id="output'+t+'-'+nb+'" class="talent" height="64" width="64" src="images/theme/nochoice.png"/><br><input type="file" name="'+name+'" id="'+t+'-'+nb+'" onchange="loadFile(event,this.id)">';
        }else{
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            input.id = t+'-'+nb;
            input.placeholder = pl;
            div.appendChild(input);
        }
    }
    function addText(name,div){
        var text = document.createElement("textarea");
        text.name = name;
        text.placeholder = "Description";
        text.rows = "4";
        text.cols = "50";
        div.appendChild(text);
    }
</script>
<script>
  var loadFile = function(event,id) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output'+id);
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>