<div class="page-header">
	<h1><?php echo (isset($_SESSION['login']))?'Vous avez déjà un compte':'Identification'; ?></h1>
</div>
<form action="<?php echo Router::url('users/login'); ?>" method="post" class="form-group">
	<?php echo $this->Form->input('login','Identifiant'); ?>	
	<?php echo $this->Form->input('password','Mot de passe',array('type'=>'password')); ?><br>
	<button class="btn btn-primary" type="submit">Se connecter</button>
</form>

<!--<div>
	Vous n'avez pas de compte, inscrivez vous : <a href="<?php echo Router::url('users/register'); ?>"><button class="btn btn-primary">Inscription</button></a>
</div>-->