<div id="fb-root"></div>
<div class="page-header text-center">
	<h1><?php echo $build->nom.' - '.$build->type; ?></h1>
</div>
	<?php 
		$A = unserialize($build->A);
		$Z = unserialize($build->Z);
		$E = unserialize($build->E);
		$D = unserialize($build->D);
	?>
	<span id="nomtdA" class="nomdesc" style="display: none;"><?php echo $A['description']; ?></span>
	<span id="nomtdZ" class="nomdesc" style="display: none;"><?php echo $Z['description']; ?></span>
	<span id="nomtdE" class="nomdesc" style="display: none;"><?php echo $E['description']; ?></span>
	<span id="nomtdD" class="nomdesc" style="display: none;"><?php echo $D['description']; ?></span>
	<?php
		$autres = unserialize($build->autres);
		array_shift($autres);
		for ($i=0; $i < sizeof($autres); $i++) { 
			?><span id="nomtdautre-<?php echo $i; ?>" class="nomdesc" style="display: none;"><?php echo $autres[$i]['description']; ?></span><?php
		}
		echo $this->Talent->desc($build->talents1,1);
		echo $this->Talent->desc($build->talents4,4);
		echo $this->Talent->desc($build->talents7,7);
		echo $this->Talent->desc($build->talents10,10);
		echo $this->Talent->desc($build->talents13,13);
		echo $this->Talent->desc($build->talents16,16);
		echo $this->Talent->desc($build->talents20,20);
	?>
<br>
<div class="row justify-content-md-center">
	<div class="col-md-5">
		<?php
		echo $this->Talent->talents(array(
				'lvl' => 1,
				'id' => $build->id,
				'talents' => $build->talents1,
				'choix' => $build->talent1
			));
		echo $this->Talent->talents(array(
				'lvl' => 4,
				'id' => $build->id,
				'talents' => $build->talents4,
				'choix' => $build->talent4
			));
		echo $this->Talent->talents(array(
				'lvl' => 7,
				'id' => $build->id,
				'talents' => $build->talents7,
				'choix' => $build->talent7
			));
		echo $this->Talent->talents(array(
				'lvl' => 10,
				'id' => $build->id,
				'talents' => $build->talents10,
				'choix' => $build->talent10
			));
		echo $this->Talent->talents(array(
				'lvl' => 13,
				'id' => $build->id,
				'talents' => $build->talents13,
				'choix' => $build->talent13
			));
		echo $this->Talent->talents(array(
				'lvl' => 16,
				'id' => $build->id,
				'talents' => $build->talents16,
				'choix' => $build->talent16
			));
		echo $this->Talent->talents(array(
				'lvl' => 20,
				'id' => $build->id,
				'talents' => $build->talents20,
				'choix' => $build->talent20
			));
		?>
	</div>
</div>
	<br>
	<h3>Commentaires :</h3><br>
	<div id="build_commentaires">
	<?php
		print str_replace('&gt;','/>/g',str_replace('&lt;','/</g',$build->comments));

		?>
	</div>

<script type="text/javascript">
	function showNameComment(event,nom){
    	var span = document.getElementById('nom'+nom);
		span.style.display = "";
		l = span.offsetWidth;
		h = span.offsetHeight;
		var x = event.clientX;
		var y = event.clientY;
		span.style.left = x - l/2 + document.body.scrollLeft + 'px';
		span.style.top = y - h - 2 + (document.body.scrollTop || document.documentElement.scrollTop) + 'px';
	}
    function hideName(nom){
    	var span = document.getElementById('nom'+nom);
		span.style.display = "none";
    }
</script>
