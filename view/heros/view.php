<div class="page-header text-center">
	<h1><?php echo $heros->nom; ?></h1>
</div>
<br>
<div class="row align-items-center">
    <div class="col">
<img src="<?php echo Router::webroot('img/heros/'.$heros->id.'/'.$heros->img_min); ?>" height="128">
	</div>
	<div class="col">
			<h4>ATTAQUE</h4>
		Dégâts de l'attaque : <span id="dps"><?php echo $heros->caracteristiques['dps']; ?></span><br>
		Attaques par seconde : <?php echo $heros->caracteristiques['aps']; ?><br>
		Portée de l'attaque : <?php echo $heros->caracteristiques['range']; ?><br><br>
			<h4>CAPACITÉS</h4>
		Mana : <span id="mana"><?php echo $heros->caracteristiques['mana']; ?></span><br>
		Régénération / sec. : <span id="regen_mana"><?php echo $heros->caracteristiques['rmana']; ?></span><br>
	</div>
	<div class="col">
			<h4>DÉFENSE</h4>
		Points de vie : <span id="lp"><?php echo $heros->caracteristiques['lp']; ?></span><br>
		Régénération / sec. : <span id="regen_lp"><?php echo $heros->caracteristiques['rlp']; ?></span><br>
		Armure anti-sort : <?php echo $heros->caracteristiques['aas']; ?><br>
		Armure physique : <?php echo $heros->caracteristiques['ap']; ?><br><br>
			<h4>UTILITAIRES</h4>
		Vitesse déplacement : <?php echo $heros->caracteristiques['speed']; ?>%
	</div>	
</div>
<div class="row justify-content-md-center align-items-center">
	<div class="col-6">
		<label for="lvl">Niveau : <span id="showlvl"></span></label>
		<input type="range" class="custom-range" min="1" max="30" value="1" id="lvl">
		<div id="spell" class="container">
		</div>
	</div>
</div>
<br><br>
<div class="row justify-content-md-center">
	<div class="col-md-5">
		<div class="d-flex justify-content-around">
<?php
	echo $this->Talent->spell('a',$heros->A,$heros->id);
	echo $this->Talent->spell('z',$heros->Z,$heros->id);
	echo $this->Talent->spell('e',$heros->E,$heros->id);
?>
<a href="#" id="R" onclick="event.preventDefault()" data-toggle="modal" data-target="#modal-R" class="talent">
<img id="R" src="<?php echo Router::webroot('img/theme/nochoice.png'); ?>" height="64" width="64" class="stalent"></a><!--<img id="toucheR" class="touche" src="<?php echo Router::webroot('img/theme/r.png'); ?>">-->
<?php
	echo $this->Talent->spell('d',$heros->D,$heros->id);
?>
		</div>
	</div>
</div>
<div id="spell">
<?php
	$autres = unserialize($heros->autres);
?>
<div>
	<span class="spellt"><?php echo $autres[0]; ?></span>
</div>
<?php
	for($i=1;$i< count($autres);$i++) {
		echo $this->Talent->spell($autres[$i]['touche'],serialize($autres[$i]),$heros->id);
	}
?>
</div>
<br>
<div class="row justify-content-md-left vertical-align"  style="background: url(<?php echo Router::webroot('img/heros/'.$heros->id.'/'.$heros->img); ?>) no-repeat right;">
    <div class="col-md-2"></div>
	<div class="col-md-5">
<?php
	echo $this->Talent->talents(array(
			'lvl' => 1,
			'id' => $heros->id,
			'talents' => $heros->talents1
		));
	echo $this->Talent->talents(array(
			'lvl' => 4,
			'id' => $heros->id,
			'talents' => $heros->talents4
		));
	echo $this->Talent->talents(array(
			'lvl' => 7,
			'id' => $heros->id,
			'talents' => $heros->talents7
		));
	echo $this->Talent->talents(array(
			'lvl' => 10,
			'id' => $heros->id,
			'talents' => $heros->talents10
		));
	echo $this->Talent->talents(array(
			'lvl' => 13,
			'id' => $heros->id,
			'talents' => $heros->talents13
		));
	echo $this->Talent->talents(array(
			'lvl' => 16,
			'id' => $heros->id,
			'talents' => $heros->talents16
		));
	echo $this->Talent->talents(array(
			'lvl' => 20,
			'id' => $heros->id,
			'talents' => $heros->talents20
		));
?>
</div></div>
<div id="builds">
	<table class="table table-striped">
		<thead>
			<tr>
				<th scope="col">Héros</th>
				<th scope="col">Type de build</th>
				<th scope="col">niv 1</th>
				<th scope="col">niv 4</th>
				<th scope="col">niv 7</th>
				<th scope="col">niv 10</th>
				<th scope="col">niv 13</th>
				<th scope="col">niv 16</th>
				<th scope="col">niv 20</th>
				<th scope="col">Ajouté par</th>
				<th scope="col">A jour</th>
				<th scope="col"></th>
				<th scope="col"></th>
			</tr>
		</thead>
<?php 
	foreach($builds as $k=>$v): 
	$class = array(array('blue','bleuclair','red','violet','white'),array('blue_i','bleuclair_i','red_i','violet_i','white_i'));
?>
			<?php
			$i = 0;
				if(isset($_SESSION['prefs'][0])&&($_SESSION['prefs'][0]>1)){
					if($v->solo == 1 || $v->sol == 1){
						$classe = $v->role.' solo';
					}else{
						$classe = $v->role;
					}
				}else{
					$classe = $v->classe;
				}
				echo '<tr class="'.$class[$i%2][$v->classe].' '.$classe.'" onclick="redirect('.$v->id_build.')" style="cursor: pointer;">';
				echo '<td>'.$v->nom.'</td>';
				echo '<td>'.$v->type.'</td>';
				echo $this->Talent->talent(1,$v->talents1,$i,$v->id,$v->talent1);
				echo $this->Talent->talent(4,$v->talents4,$i,$v->id,$v->talent4);
				echo $this->Talent->talent(7,$v->talents7,$i,$v->id,$v->talent7);
				echo $this->Talent->talent(10,$v->talents10,$i,$v->id,$v->talent10);
				echo $this->Talent->talent(13,$v->talents13,$i,$v->id,$v->talent13);
				echo $this->Talent->talent(16,$v->talents16,$i,$v->id,$v->talent16);
				echo $this->Talent->talent(20,$v->talents20,$i,$v->id,$v->talent20);
				echo '<td>'.$users[$v->id_user-1]->login.'</td>';
				if(in_array($v->id, unserialize($maj->heros_modif))){
					if(strtotime($v->lastup_h) < strtotime($maj->date_maj)){
						$ajour = False;
					}
					else if(strtotime($v->lastup) < strtotime($v->lastup_h)){
						$ajour = False;
					}else{
						$ajour = True;
					}
				}else if(strtotime($v->lastup) < strtotime($v->lastup_h)){
					$ajour = False;
				}else{
					$ajour = True;
				}
				echo '<td>';
				if($ajour){
					echo '<span class="oi oi-check h2" aria-hidden="true" style="color:green"></span>';
				}else{
					echo '<span class="oi oi-x h2" aria-hidden="true" style="color:red"></span>';
				}
				echo '</td><td>';
				if($user->id == $v->id_user){
					echo '<a href="/builds/user_edit/'.$heros->id.'/'.$v->id_build.'"><span class="oi oi-pencil h2" aria-hidden="true"></span></a>';
				}
				echo '</td>';
				echo '<td>';
				if($user->id == $v->id_user){
					echo '<a onclick="return confirm(\'Voulez vous vraiement supprimer ce build ?\');" href="'.Router::url('/builds/user_delete/'.$v->id_build).'"><span class="oi oi-trash h2" aria-hidden="true" style="color:red"></span></a>';
				}
				echo '</td></tr>';
				$i++;
		?>
<?php endforeach ?>
</table>
</div><br>
<?php echo $this->Pagination->pagination($this->request->page,$page); ?><br>
<div class="container">
	<div class="row align-items-center">
	  <div class="col-sm text-right">
	    <a class="btn btn-primary" href="<?php echo Router::url('builds/user_edit/'.$heros->id); ?>" role="button">Ajouter un build</a>
	  </div>
	  <div class="col-sm text-left">
	    <a class="btn btn-primary" href="<?php echo Router::url('heros/user_edit/'.$heros->id); ?>" role="button">Modifier le héros</a>
	  </div>
	</div>
</div>
<script type="text/javascript">
	function captureEvent(e,m) {
    	e.stopPropagation();
    	$("#modal-"+m).modal();
	}
	function redirect(id){
		document.location="/builds/"+id;
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