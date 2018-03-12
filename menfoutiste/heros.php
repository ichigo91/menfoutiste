<?php
session_start();
if(!isset($_SESSION['id'])) {
	header('Location: /index.php');
}
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=hots;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
$class = array('blue','bleuclair','red','violet','');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Menfoutiste - Heros</title>
</head>
<body>
<nav>
	<div id="member">
		<?php echo $_SESSION['login']; ?>
		<a href="logout.php"><button>Se déconnecter</button></a>
	</div>
	<ul>
		<li><a href="build.php" class="active">Build</a></li>
		<li><a href="meta.php">Meta</a></li>
		<li><a href="pick">Pick</a></li>
		<li><a href="synergie.php">Synergie</a></li>
	</ul>
</nav>
<table>
	<thead>
		<caption>Liste des Héros</caption>
	</thead>
	<tr>
		<td>Héros</td>
	</tr>
	<?php
		$reponse = $bdd->query('SELECT * FROM heros');
	?>
			<script type="text/javascript">
		        function showName(event,nom){
		        	var span = document.getElementById('nom'+nom);
					span.style.display = "";
					l = span.offsetWidth;
					var x = event.clientX;
					var y = event.clientY;
					span.style.left = x - l/2 + 'px';
					span.style.top = y - 20 + 'px';

		        }
		        function hideName(nom){
		        	var span = document.getElementById('nom'+nom);
					span.style.display = "none";
		        }
			</script>
		<?php
		while($donnees = $reponse->fetch()){
			echo '<tr class="'.$class[$donnees['classe']].'">';
			echo '<td>'.$donnees['nom'].'</td><br>';
			echo '<td>'.$donnees['type'].'</td><br>';
			$talent = unserialize($donnees['img1']);
			echo '<td><img id="1" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent1']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom1" class="nom" style="display:none">'.$talent[$donnees['talent1']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img4']);
			echo '<td><img id="4" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent4']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom4" class="nom" style="display:none">'.$talent[$donnees['talent4']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img7']);
			echo '<td><img id="7" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent7']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom7" class="nom" style="display:none">'.$talent[$donnees['talent7']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img10']);
			echo '<td><img id="10" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent10']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom10" class="nom" style="display:none">'.$talent[$donnees['talent10']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img13']);
			echo '<td><img id="13" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent13']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom13" class="nom" style="display:none">'.$talent[$donnees['talent13']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img16']);
			echo '<td><img id="16" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent16']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom16" class="nom" style="display:none">'.$talent[$donnees['talent16']-1]['nom'].'</span>';
			$talent = unserialize($donnees['img20']);
			echo '<td><img id="20" src="images/'.$donnees['id'].'/'.$talent[$donnees['talent20']-1]['image'].'" height="32" width="32" onmouseover="showName(event,this.id)" onmouseout="hideName(this.id)"></td>';
			echo '<span id="nom20" class="nom" style="display:none">'.$talent[$donnees['talent20']-1]['nom'].'</span>';
			echo '</tr>';
		}
	?>
</table><br>
<center>Trier par : <a href="?order=0"><button>Héros</button></a><a href="?order=1"><button>Ancienneté</button></a></center>
<br>
<center>
	<a href="select_heros.php"><button>Ajouter un build</button></a>
</center>
</body>
</html>
<a href="select_heros.php"><button>Ajouter un héros</button></a>