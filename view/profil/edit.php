<?php $title_for_view = 'Modifier mes informations'; ?>
<form action="<?php echo Router::url('profil/edit'); ?>" method="post">
	<div class="form-row">
		<?php echo $this->Form->input('login','Identifiant',array('type'=>'disabled')); ?>
		<?php echo $this->Form->input('email','Adresse e-mail',array('type'=>'disabled')); ?>
		<?php echo $this->Form->input('password','Ancien mot de passe',array('type'=>'password')); ?>
		<?php echo $this->Form->input('password_new','Nouveau mot de passe',array('type'=>'password')); ?>
		<?php echo $this->Form->input('password_new_conf','Confirmez le nouveau mot de passe',array('type'=>'password')); ?>
	</div><br>
	<button class="btn btn-primary" type="submit">Modifier</button>
</form>