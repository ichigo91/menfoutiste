<div class="page-header text-center">
	<h1><?php echo $title; ?></h1>
</div>
<form action="<?php echo Router::url('games/user_edit/'.$id); ?>" method="post" enctype="multipart/form-data">
<?php echo $this->Form->select('joueur_1','Joueur 1',$nom_heros); ?><br>

<label>Commentaires : </label><br><br><textarea name="comments" id="comments"><?php if(isset($games)){echo $games->comments;} ?></textarea><br>
<input type="submit" value="<?php echo $button; ?>">
</form>
<script src='<?php echo Router::webroot('tinymce/js/tinymce/tinymce.min.js'); ?>'></script>
<script src='<?php echo Router::webroot('js/tinymce_maps.js'); ?>'></script>