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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="container" style="padding-top:60px;">
			<?php echo $this->Session->flash(); ?>
				<div class="page-header">
					<h1 style="margin-bottom:40px"><?php echo isset($title_for_view)?$title_for_view:''; ?></h1>
				</div><br>
			<?php echo $content_for_layout; ?>
			<?php echo $this->Session->delFlash(); ?>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script>
		$(".alert").alert('closed')
	</script>
	<script>
		$(document).ready(function(){
    		$('[data-toggle="tooltip"]').tooltip(); 
		});
	</script>
</html>