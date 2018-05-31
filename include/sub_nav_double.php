<ul>
	<li class="nav"><a href="#" id="lien2" class="active" onclick="showSpan(2)">Héros maîtrisés</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="#" id="lien1" onclick="showSpan(1)">Héros à maîtriser</a></li>
	<li class="separator_l"><span></span></li>
	<li class="nav"><a href="#" id="lien0" onclick="showSpan(0)">Héros non maîtrisés</a></li>
</ul>
<ul>
    <li class="nav"><a href="#" id="lien4" class="active" onclick="showSpan2(0,<?php echo $_SESSION['id']; ?>)">Tous les picks</a></li>
    <li class="separator_l"><span></span></li>
	<li class="nav"><a href="#" id="lien3" onclick="showSpan2(1,<?php echo $_SESSION['id']; ?>)">Mes picks</a></li>
</ul>