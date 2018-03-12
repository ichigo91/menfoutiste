<?php
	$page = explode("=",$_SERVER['QUERY_STRING'])[1];
?>
<nav>
	<ul>
		<li class="nav"><a href="index.php?view=build" class="<?php if($page == 'build'){ echo 'active'; } ?>">Build</a></li>
		<li class="nav"><a href="index.php?view=meta" class="<?php if($page == 'meta'){ echo 'active'; } ?>">Meta</a></li>
		<li class="nav"><a href="index.php?view=pick" class="<?php if($page == 'pick'){ echo 'active'; } ?>">Pick</a></li>
		<li class="nav"><a href="index.php?view=synergie" class="<?php if($page == 'synergie'){ echo 'active'; } ?>">Synergie</a></li>
		<li class="deco"><a href="logout.php">Se déconnecter</a></li>
		<li class="member"><span><?php echo $_SESSION['login'] ?></span></li>
	</ul>
</nav>