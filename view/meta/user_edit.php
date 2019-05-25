<form action="<?php echo Router::url('meta/user_edit'); ?>" method="post">
  <div class="d-flex justify-content-around flex-wrap" style="text-decoration: none">
    <?php
      foreach($heros as $k=>$v): 
        $style = '';
        $id = $v->id;
        $nav = unserialize($_SESSION['User']->prefs);
        if(isset($nav[1])&&($nav[1]>1)){
          if($v->solo == 1){
            $classe = $v->role.' solo';
          }else{
            $classe = $v->role;
          }
          if($nav[1] == 2){
            if($v->role != 0){
              //$style = 'display:none';
            }
          }else if($nav[1] == 3){
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
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" id="img<?php echo $v->id; ?>" class="heros <?php echo (isset($meta->picks->$id))?(($meta->picks->$id)?'heros-active':''):''; ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
      $value = (isset($meta->picks->$id))?(($meta->picks->$id)?1:0):0;
      echo $this->Form->input($v->id,'hidden',array('value'=>$value,'id'=>'val'.$v->id));
      endforeach;
    ?>
  </div>
  <input type="submit" value="Modifier la méta">
</form>
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