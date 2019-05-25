<div class="page-header text-center">
	<h1><?php echo $heros->nom; ?></h1>
</div>
<br>
<?php
  if(isset($build)){
    $url = '/'.$build->id;
  }else{
    $url = '';
  }
?>
<form action="<?php echo Router::url('builds/user_edit/'.$heros->id.$url); ?>" method="post" class="form-horizontal">
<div class="row justify-content-md-center">
	<div class="col-md-4">
		<?php 
		$A = unserialize($heros->A);
		$Z = unserialize($heros->Z);
		$E = unserialize($heros->E);
		$D = unserialize($heros->D);
		$autres = unserialize($heros->autres);
		if(sizeof($autres)>1){
			array_shift($autres);
		}
    if(isset($build)){
      $sel = array(
        $build->talent1,
        $build->talent4,
        $build->talent7,
        $build->talent10,
        $build->talent13,
        $build->talent16,
        $build->talent20
      );
    }else{
      $sel = array('','','','','','','');
    }
		echo $this->Form->input('talent1','hidden',array('value'=>'','id'=>'1'));
		echo $this->Form->input('talent4','hidden',array('value'=>'','id'=>'4'));
		echo $this->Form->input('talent7','hidden',array('value'=>'','id'=>'7'));
		echo $this->Form->input('talent10','hidden',array('value'=>'','id'=>'10'));
		echo $this->Form->input('talent13','hidden',array('value'=>'','id'=>'13'));
		echo $this->Form->input('talent16','hidden',array('value'=>'','id'=>'16'));
		echo $this->Form->input('talent20','hidden',array('value'=>'','id'=>'20'));
		echo $this->Talent->talents(array(
				'lvl' => 1,
				'id' => $heros->id,
				'talents' => $heros->talents1,
				'select' => True,
        'value' => $sel[0]
			));
		echo $this->Talent->talents(array(
				'lvl' => 4,
				'id' => $heros->id,
				'talents' => $heros->talents4,
				'select' => True,
        'value' => $sel[1]
			));
		echo $this->Talent->talents(array(
				'lvl' => 7,
				'id' => $heros->id,
				'talents' => $heros->talents7,
				'select' => True,
        'value' => $sel[2]
			));
		echo $this->Talent->talents(array(
				'lvl' => 10,
				'id' => $heros->id,
				'talents' => $heros->talents10,
				'select' => True,
        'value' => $sel[3]
			));
		echo $this->Talent->talents(array(
				'lvl' => 13,
				'id' => $heros->id,
				'talents' => $heros->talents13,
				'select' => True,
        'value' => $sel[4]
			));
		echo $this->Talent->talents(array(
				'lvl' => 16,
				'id' => $heros->id,
				'talents' => $heros->talents16,
				'select' => True,
        'value' => $sel[5]
			));
		echo $this->Talent->talents(array(
				'lvl' => 20,
				'id' => $heros->id,
				'talents' => $heros->talents20,
				'select' => True,
        'value' => $sel[6]
			));
		?>
	</div>
</div>
	<?php echo $this->Form->input('solo','Solo lane',array('type'=>'checkbox')); ?><br>
	<?php echo $this->Form->input('type','Type : '); ?><br>
	<label>Commentaires : </label><br><br><textarea name="comments" id="comments"><?php if(isset($build)){echo $build->comments;} ?></textarea><br>
 	<input type="submit" value="<?php echo $button; ?>">
</form>
<script type="text/javascript">
	function talent(id){
		var img = document.getElementById(id);
		var input = document.getElementById(id.split("-")[0]).value = id.split("-")[1];
		var elements = document.getElementsByClassName(id.split("-")[0]);
	    for(i=0;i<elements.length;i++){
	        elements[i].classList.remove("talent-active");
	    }
		img.classList.add("talent-active");
	}
</script>
<script src='<?php echo Router::webroot('tinymce/js/tinymce/tinymce.min.js'); ?>'></script>
<script type="text/javascript">
	var id = <?php echo json_encode($heros->id); ?>;
	var A_nom = <?php echo json_encode($A['nom']); ?>;
	var A_image = <?php echo json_encode($A['image']); ?>;
	var A_desc = <?php echo json_encode($A['description']); ?>;
	var Z_nom = <?php echo json_encode($Z['nom']); ?>;
	var Z_image = <?php echo json_encode($Z['image']); ?>;
	var Z_desc = <?php echo json_encode($Z['description']); ?>;
	var E_nom = <?php echo json_encode($E['nom']); ?>;
	var E_image = <?php echo json_encode($E['image']); ?>;
	var E_desc = <?php echo json_encode($E['description']); ?>;
	var D_nom = <?php echo json_encode($D['nom']); ?>;
	var D_image = <?php echo json_encode($D['image']); ?>;
	var D_desc = <?php echo json_encode($D['description']); ?>;
	var Un = <?php echo json_encode(unserialize($heros->talents1)); ?>;
	var Quatre = <?php echo json_encode(unserialize($heros->talents4)); ?>;
	var Sept = <?php echo json_encode(unserialize($heros->talents7)); ?>;
	var Dix = <?php echo json_encode(unserialize($heros->talents10)); ?>;
	var Treize = <?php echo json_encode(unserialize($heros->talents13)); ?>;
	var Seize = <?php echo json_encode(unserialize($heros->talents16)); ?>;
	var Vingt = <?php echo json_encode(unserialize($heros->talents20)); ?>;
	var Autre = <?php echo json_encode($autres); ?>;
	var PATH = "/webroot/img/heros/";
</script>
<script src='<?php echo Router::webroot('js/tinymce_build.js'); ?>'></script>