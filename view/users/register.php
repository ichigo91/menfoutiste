<div class="page-header">
	<h1>Inscription</h1>
</div>
<form action="<?php echo Router::url('users/register/'.$hash); ?>" method="post" class="form-horizontal">
	<strong class="text-warning">Les champs marqués d'un * sont obligatoires</strong><br><br>
	<?php echo $this->Form->input('login','Identifiant *'); ?>
	<?php echo $this->Form->input('email','Adresse e-mail *',array('type'=>'email')); ?>
	<?php echo $this->Form->input('password','Mot de passe *',array('type'=>'password')); ?>
	<?php echo $this->Form->input('password_val','Confirmer votre mot de passe *',array('type'=>'password')); ?>
	<div class="form-actions">
		<input type="submit" class="btn btn-primary" value="S'inscrire">
	</div>
</form>