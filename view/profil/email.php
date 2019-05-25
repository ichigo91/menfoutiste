<?php $title_for_view = 'Ajouter une adresse e-mail'; ?>
<form action="<?php echo Router::url('profil/email'); ?>" method="post">
	<div class="form-row">
		<?php echo $this->Form->input('email','Adresse e-mail'); ?>
	</div><br>
	<button class="btn btn-primary" type="submit">Ajouter</button>
</form>