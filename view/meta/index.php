<div class="d-flex justify-content-around flex-wrap" style="text-decoration: none">
  <?php
    foreach($heros as $k=>$v):
      $id = $v->id;
      $afficher = 1;
      $style = '';
      if(isset($_SESSION['User']->prefs->heros)&&($_SESSION['User']->prefs->heros<2)){
        if($v->solo == 1){
          $classe = $v->role.' solo';
        }else{
          $classe = $v->role;
        }
      }else{
        $classe = $v->classe;
      }
    if(isset($meta->picks->$id)){
      if(!$meta->picks->$id){
        $afficher = 0;
      }
    }
    if($afficher){
  ?>
    <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros <?php echo $classe; ?>" style="<?php echo $style; ?>"><div id="img">
      <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90"><br><span id="nompick"><?php echo $v->nom; ?></span>
    </div></a>
  <?php
  }
    endforeach;
  ?>
</div>
<br>
<div class="row">
  <div class="col align-self-center text-center">
    <a class="btn btn-primary" href="meta/user_edit" role="button">Modifier la méta</a>
  </div>
</div>