<div class="page-header text-center">
	<h1><?php echo $title; ?></h1>
</div>
<form action="<?php echo Router::url('maps/user_edit/'.$id); ?>" method="post" enctype="multipart/form-data">
	<?php echo $this->Form->input('nom','Nom : '); ?><br>
	<?php echo $this->Form->input('image','Image',array('type'=>'file-map','id'=>'image','onchange'=>'loadFile(event,this.id)','heros'=>$id)); ?><br>
<label>Description : </label><br><br><textarea name="description" id="description"><?php if(isset($maps)){echo $maps->description;} ?></textarea><br>
<h3>Héros forts sur cette map :</h3>
  <div class="d-flex justify-content-around flex-wrap" style="text-decoration: none">
    <?php
      foreach($heros as $k=>$v): 
        $style = '';
        $id = $v->id;
        $nav = $_SESSION['User']->prefs->heros;
        if(isset($nav)&&($nav>1)){
          if($v->solo == 1){
            $classe = $v->role.' solo';
          }else{
            $classe = $v->role;
          }
          if($nav == 2){
            if($v->role != 0){
              //$style = 'display:none';
            }
          }else if($nav == 3){
            if($v->role > 1){
              //$style = 'display:none';
            }
          }
        }else{
          if($v->classe != 0){
            //$style = 'display:none';
          }
          $classe = $v->classe;
        }
    ?>
      <a href="#" onclick="event.preventDefault();meta(this.id);" id="<?php echo $v->id; ?>" class="<?php echo $classe; ?>" style="<?php echo $style; ?>"><div id="img">
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" id="img<?php echo $v->id; ?>" class="heros <?php echo (isset($map->synergies->$id))?(($map->synergies->$id)?'heros-active':''):''; ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
      $value = (isset($map->synergies->$id))?(($map->synergies->$id)?1:0):0;
      echo $this->Form->input($v->id,'hidden',array('value'=>$value,'id'=>'val'.$v->id));
      endforeach;
    ?>
  </div>
<input type="submit" value="<?php echo $button; ?>">
<script type="text/javascript">
  function meta(id){
    var img = document.getElementById('img'+id);
    var input = document.getElementById('val'+id).value;
    if(input == 0){
      img.classList.add("heros-active");
      var input = document.getElementById('val'+id).value = 1;
    }else{
      var input = document.getElementById('val'+id).value = 0;
      img.classList.remove("heros-active");
    }
  }
</script>
</form>
<script src='<?php echo Router::webroot('tinymce/js/tinymce/tinymce.min.js'); ?>'></script>
<script src='<?php echo Router::webroot('js/tinymce_maps.js'); ?>'></script>