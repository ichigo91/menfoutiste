<div class="d-flex justify-content-around flex-wrap" style="text-decoration: none">
  <?php
    foreach($heros as $k=>$v): 
      $style = '';
      if($v->solo == 1){
        $classe = $v->classe.' solo';
      }else{
        $classe = $v->classe;
      }
  ?>
    <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros <?php echo $classe; ?>" style="<?php echo $style; ?>"><div id="img">
      <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
    </div></a>
  <?php
    endforeach;
  ?>
</div>
<br>
<div class="row">
  <div class="col align-self-center text-center">
    <a class="btn btn-primary" href="heros/user_edit" role="button">Ajouter un héros</a>
  </div>
</div>