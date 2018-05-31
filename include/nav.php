<?php
    if(isset($_GET['view'])){
	    $page = explode("=",$_SERVER['QUERY_STRING'])[1];
    }
?>
<ul>
	<li class="nav"><a href="/builds" class="<?php if($page == 'builds' || $page == ''){ echo 'active'; } ?>">Builds</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="/heros" class="<?php if($page == 'heros'){ echo 'active'; } ?>">Héros</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="/meta" class="<?php if($page == 'meta'){ echo 'active'; } ?>">Meta</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="/picks" class="<?php if($page == 'picks'){ echo 'active'; } ?>">Picks</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="/synergies" class="<?php if($page == 'synergies'){ echo 'active'; } ?>">Synergies</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="/twitch" class="<?php if($page == 'twitch'){ echo 'active'; } ?>">Twitch</a></li>
	<li class="deco"><a href="logout.php">Se déconnecter</a></li>
	<li class="separator_r"><span></span></li>
	<li class="member"><span><?php echo $_SESSION['login'] ?></span></li>
</ul>