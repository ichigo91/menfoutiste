<form action="<?php echo Router::url('picks/user_edit'); ?>" method="post">
  <h2 style="color:brown">Héros non travaillés</h2>
  <div class="d-flex justify-content-around flex-wrap connectedSortable" style="text-decoration: none; border: dashed brown 4px; min-height: 160px;" id="sortable0">
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
        if(isset($_SESSION['User']->picks->$id)){
          if($_SESSION['User']->picks->$id == 1 || $_SESSION['User']->picks->$id == 2){
            $afficher = 0;
          }
        }
        if($afficher){
    ?>
      <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros ui-state-default <?php echo $classe; ?>" style="<?php echo $style; ?>" id="<?php echo $v->id; ?>"><div id="img">
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
      echo $this->Form->input($v->id,'hidden',array('value'=>0,'id'=>'val'.$v->id));
      }
      endforeach;
    ?>
  </div>
  <br>
  <h2 style="color:silver">Héros à maîtriser</h2>
  <div class="d-flex justify-content-around flex-wrap connectedSortable" style="text-decoration: none; border: dashed silver 4px; min-height: 160px;" id="sortable1">
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
             // $style = 'display:none';
            }
          }
        }else{
          if($v->classe != 0){
            // $style = 'display:none';
          }
          $classe = $v->classe;
        }
        if(isset($_SESSION['User']->picks->$id)){
          if($_SESSION['User']->picks->$id == 1){
            $afficher = 1;
          }
        }
        if($afficher){
    ?>
      <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros ui-state-default <?php echo $classe; ?>" style="<?php echo $style; ?>" id="<?php echo $v->id; ?>"><div id="img">
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
      echo $this->Form->input($v->id,'hidden',array('value'=>1,'id'=>'val'.$v->id));
      }
      endforeach;
    ?>
  </div>
  <br>
  <h2 style="color:gold">Héros maîtrisés</h2>
  <div class="d-flex justify-content-around flex-wrap connectedSortable" style="text-decoration: none; border: dashed gold 4px; min-height: 160px;" id="sortable2">
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
              // $style = 'display:none';
            }
          }
        }else{
          if($v->classe != 0){
            // $style = 'display:none';
          }
          $classe = $v->classe;
        }
        if(isset($_SESSION['User']->picks->$id)){
          if($_SESSION['User']->picks->$id == 2){
            $afficher = 1;
          }
        }
        if($afficher){
    ?>
      <a href="<?php echo Router::url('heros/'.$v->id); ?>" class="heros ui-state-default <?php echo $classe; ?>" style="<?php echo $style; ?>" id="<?php echo $v->id; ?>"><div id="img">
        <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
      </div></a>
    <?php
      echo $this->Form->input($v->id,'hidden',array('value'=>2,'id'=>'val'.$v->id));
      }
      endforeach;
    ?>
  </div><br>
  <input type="submit" value="Modifier mes picks">
</form>
<script src="//code.jquery.com/jquery-1.12.4.js"></script>
<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
  $( function() {
    $( "#sortable0, #sortable1, #sortable2").sortable({
      connectWith: ".connectedSortable",
      receive: function( event, ui ) {
        var id = ui.item.context.id;
        var heros = document.getElementById('val'+id);
        var div_id = this.id.split('sortable')[1];
        heros.value=div_id;
      }
    }).disableSelection();
  } );
</script>