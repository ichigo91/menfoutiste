<div class="page-header text-center">
	<h1>Ajouter un build</h1>
</div>
<div class="d-flex justify-content-around flex-wrap" style="text-decoration: none">
  <?php
    foreach($heros as $k=>$v): 
  ?>
    <a href="<?php echo Router::url('builds/user_edit/'.$v->id); ?>"><div id="img">
      <img src="<?php echo Router::webroot('img/heros/'.$v->id.'/'.$v->img_min); ?>" height="128" width="90" class="select"><br><span id="nompick"><?php echo $v->nom; ?></span>
    </div></a>
  <?php
    endforeach;
  ?>
</div>