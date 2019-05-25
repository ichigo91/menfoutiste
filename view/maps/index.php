<div class="d-flex justify-content-around flex-wrap" style="text-decoration: none">
  <?php
    foreach($maps as $k=>$v):
  ?>
    <a href="<?php echo Router::url('maps/'.$v->id); ?>" class="maps">
      <div id="img">
        <img src="<?php echo Router::webroot('img/maps/'.$v->image); ?>" height="128" width="256"><br><span id="nommap"><?php echo $v->nom; ?></span>
      </div>
    </a>
  <?php
    endforeach;
  ?>
</div>
<br>
<div class="row">
  <div class="col align-self-center text-center">
    <a class="btn btn-primary" href="maps/user_edit" role="button">Ajouter une map</a>
  </div>
</div>