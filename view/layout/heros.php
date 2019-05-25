<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml.lang="fr" lang="fr">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo isset($title_for_layout)?$title_for_layout:'Menfoutiste'; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
	<link href="<?php echo Router::webroot('open-iconic/font/css/open-iconic-bootstrap.css'); ?>" rel="stylesheet">
	<link href="<?php echo Router::webroot('css/style.css'); ?>" rel="stylesheet">
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
			<ul class="nav nav-tabs">
				<li class="nav-item"><a href="#" id="lienall" class="nav-link active" onclick="showSpan('all');event.preventDefault();">Tout</a></li>
				<li class="nav-item"><a href="#" id="lien0" class="nav-link" onclick="showSpan(0);event.preventDefault();">Guerrier défensifs</a></li>
				<li class="nav-item"><a href="#" id="lien1" class="nav-link" onclick="showSpan(1);event.preventDefault();">Guerrier offensifs</a></li>
				<li class="nav-item"><a href="#" id="lien2" class="nav-link" onclick="showSpan(2);event.preventDefault();">Soutiens</a></li>
				<li class="nav-item"><a href="#" id="lien3" class="nav-link" onclick="showSpan(3);event.preventDefault();">Soigneurs</a></li>
				<li class="nav-item"><a href="#" id="lien4" class="nav-link" onclick="showSpan(4);event.preventDefault();">Assassins en mêlée</a></li>
				<li class="nav-item"><a href="#" id="lien5" class="nav-link" onclick="showSpan(5);event.preventDefault();">Assassins à distance</a></li>
				<li class="nav-item"><a href="#" id="liensolo" class="nav-link" onclick="showSpan('solo');event.preventDefault();">Solo lane</a></li>
			</ul>
			<?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
			<?php echo $this->Session->delFlash(); ?>
		</div><br>
	</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script>
		$(".alert").alert('closed')
	</script>
	<script>
		$(document).ready(function(){
    		$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
	<script type="text/javascript">
		function showSpan(id){
			var all = document.getElementsByClassName('heros');
			var nav = document.getElementsByClassName('nav-link active');
			nav[0].classList.remove('active');
			var new_nav = document.getElementById('lien'+id);
			new_nav.classList.add('active');
			for (i = 0; i < all.length; i++) {
				all[i].style.display = "none";
			}
			if(Number.isInteger(id) || id == 'solo'){
				var show = document.getElementsByClassName(id);
				for (i = 0; i < show.length; i++) {
					show[i].style.display = "";
				}
			}else if(id == 'all'){
				for (i = 0; i < all.length; i++) {
					all[i].style.display = "";
				}
			}else{
				var t = id.split('-');
				var show = document.getElementsByClassName(t[0]);
				for (i = 0; i < show.length; i++) {
					show[i].style.display = "";
				}
				var show = document.getElementsByClassName(t[1]);
				for (i = 0; i < show.length; i++) {
					show[i].style.display = "";
				}
			}
		}
	</script>
	<script src="<?php echo Router::webroot('js/nav.js'); ?>"></script>
</html>