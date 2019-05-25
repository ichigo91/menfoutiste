<div class="accordion" id="accordionExample">
  <div class="card" style="background:none">
    <div class="card-header" id="headingOne" style="background:white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button">
          Héros maîtrisés
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <div class="d-flex justify-content-around flex-wrap" style="text-decoration: none;">
    <?php
      foreach($heros as $k=>$v): 
        $id = $v->id;
        $afficher = 0; 
        $style = '';
        if(isset($_SESSION['User']->prefs->heros)&&($_SESSION['User']->prefs->heros<2)){
          if($v->solo == 1){
            $classe = $v->role.' solo';
          }else{
            $classe = $v->role;
          }
          if($_SESSION['User']->prefs->heros == 1){
            if($v->role != 0){
              //$style = 'display:none';
            }
          }else if($_SESSION['User']->prefs->heros == 0){
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
        if(isset($user->picks->$id)){
          if($user->picks->$id == 2){
            $afficher = 1;
          }
        }
        if($afficher){
    ?>
      <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros  <?php echo $classe; ?>" style="<?php echo $style; ?>"><div id="img">
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
    }
      endforeach;
    ?>
  </div>
      </div>
    </div>
  </div>
  <div class="card" style="background:none">
    <div class="card-header" id="headingTwo" style="background:white" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button">
          Héros à maîtriser
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <div class="d-flex justify-content-around flex-wrap" style="text-decoration: none;">
    <?php
      foreach($heros as $k=>$v): 
        $id = $v->id;
        $afficher = 0; 
        $style = '';
        if(isset($_SESSION['User']->prefs->heros)&&($_SESSION['User']->prefs->heros<2)){
          if($v->solo == 1){
            $classe = $v->role.' solo';
          }else{
            $classe = $v->role;
          }
          if($_SESSION['User']->prefs->heros == 1){
            if($v->role != 0){
             // $style = 'display:none';
            }
          }else if($_SESSION['User']->prefs->heros == 0){
            if($v->role > 1){
              //$style = 'display:none';
            }
          }
        }else{
          if($v->classe != 0){
          //  $style = 'display:none';
          }
          $classe = $v->classe;
        }
        if(isset($user->picks->$id)){
          if($user->picks->$id == 1){
            $afficher = 1;
          }
        }
        if($afficher){
    ?>
      <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros  <?php echo $classe; ?>" style="<?php echo $style; ?>"><div id="img">
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
    }
      endforeach;
    ?>
  </div>
      </div>
    </div>
  </div>
</div>
<br>
<div class="row">
  <div class="col align-self-center text-center">
    <a class="btn btn-primary" href="<?php echo Router::url('picks/user_edit'); ?>" role="button">Modifier mes picks</a>
  </div>
</div>