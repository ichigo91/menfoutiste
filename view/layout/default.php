<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml.lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo isset($title_for_layout)?$title_for_layout:'Menfoutiste'; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="<?php echo Router::webroot('open-iconic/font/css/open-iconic-bootstrap.css'); ?>" rel="stylesheet">
	<link href="<?php echo Router::webroot('css/style.css'); ?>" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<?php
		if($this->request->controller == "picks"){
			echo '<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">';
		}
	?>
	</head>
	<body>
		<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand" href="<?php echo Router::url(''); ?>">Menfoutiste</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto">
					<li class="nav-item dropdown <?php echo ($this->request->controller == 'builds')?'active':''; ?>" onmouseenter="toggle_open('builds');" onmouseleave="chrono2=setTimeout('toggle(\'builds\')', '500')">
						<a class="nav-link dropdown-toggle dropdown-builds" href="<?php echo Router::url('builds'); ?>" onclick="location.href = '/builds'" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Builds</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php
								foreach ($_SESSION['Users'] as $k=>$v) {
									echo '<a class="dropdown-item" href="'.Router::url('builds?user='.$v->id).'">'.$v->login.'</a>';
								}
							?>
        				</div>
					</li>
					<li class="nav-item <?php echo ($this->request->controller == 'heros')?'active':''; ?>"><a class="nav-link" href="<?php echo Router::url('heros'); ?>">Héros</a></li>
					<li class="nav-item <?php echo ($this->request->controller == 'meta')?'active':''; ?>"><a class="nav-link" href="<?php echo Router::url('meta'); ?>">Méta</a></li>
					<li class="nav-item dropdown <?php echo ($this->request->controller == 'picks')?'active':''; ?>" onmouseenter="toggle_open('picks');" onmouseleave="chrono3=setTimeout('toggle(\'picks\')', '500')">
						<a class="nav-link dropdown-toggle dropdown-picks" href="<?php echo Router::url('picks'); ?>" onclick="location.href = '/picks'" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Picks</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdown">
							<?php
								foreach ($_SESSION['Users'] as $k=>$v) {
									echo '<a class="dropdown-item" href="'.Router::url('picks/view/'.$v->id).'">'.$v->login.'</a>';
								}
							?>
        				</div>
					</li>
					<li class="nav-item <?php echo ($this->request->controller == 'maps')?'active':''; ?>"><a class="nav-link" href="<?php echo Router::url('maps'); ?>">Maps</a></li>
					<li class="nav-item <?php echo ($this->request->controller == 'twitch')?'active':''; ?>"><a class="nav-link" href="<?php echo Router::url('twitch'); ?>">Twitch</a></li>
					<?php if(isset($_SESSION['User'])) { ?>
					<li class="nav-item <?php echo ($this->request->controller == 'profil')?'active':''; ?>"><a class="nav-link" href="<?php echo Router::url('profil'); ?>"><span class="oi oi-person" title="person" aria-hidden="true"></span> Mon compte</a></li>
					<li class="nav-item"><a class="nav-link" href="<?php echo Router::url('users/logout'); ?>"><span class="oi oi-account-logout" title="accout-logout" aria-hidden="true"></span> Déconnexion</a></li>
					<?php }else{ ?>
					<li class="nav-item"><a class="nav-link" href="<?php echo Router::url('users/login'); ?>">Connexion</a></li>
					<?php } ?>
				</ul>
			</div>
		</nav>
		<div class="container" style="padding-top:80px;">
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
			<?php echo $this->Session->delFlash(); ?>
		</div><br>
	</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <?php 
    	if($this->request->controller == 'picks'){
    ?>
    <!--<script src="//code.jquery.com/jquery-1.12.4.js"></script>-->
  	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  	<?php
  		}
  	?>
	<script>
		$(".alert").alert('closed')
	</script>
	<script>
		$(document).ready(function(){
    		$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	<script src="<?php echo Router::webroot('js/nav.js'); ?>"></script>
</html>