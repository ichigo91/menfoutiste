<?php
function debug($var){
	if(Conf::$debug>0){
		$debug = debug_backtrace();
		echo '<p>&nbsp</p><p><a href="#" onclick="$(this).parent().next(\'ol\').slideToggle(); return false;"><strong>'.$debug[0]['file'].'</strong> l.'.$debug[0]['line'].'</a></p>';
		echo '<ol style="display:none;">';
		foreach($debug as $k=>$v){
			if($k>0){
		echo '<li><strong>'.$v['file'].'</strong> l.'.$v['line'].'</li>';
			}
		}
		echo '</ol>';
		echo '<pre>';
		print_r($var);
		echo '</pre>';
	}
}

function set_obj_unserialize($obj,$ser,$options = array()){
	$uns = unserialize($ser);
	foreach ($uns as $key => $value) {
		if(isset($options['char'])){
			$key .= $options['char'];
		}
		$obj->$key = $value;
	}
}

function set_obj_unserialize_array($obj,$ser,$options = array()){
	$uns = unserialize($ser);
	$nb = count($uns);
	$nb_t = 'nb'.$options['char'];
	foreach ($uns as $key => $value) {
		foreach ($value as $k => $v) {
			$tmp = $k.'_'.$options['char'].'_'.$key;
			$obj->$tmp = $v;
		}
	}
	$obj->$nb_t = $nb;
}

function num_f($var){
	return number_format($var,2,',',' ');
}

function random($car) {
	$string = "";
	$chaine = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
	srand((double)microtime()*1000000);
	for($i=0; $i<$car; $i++) {
	$string .= $chaine[rand()%strlen($chaine)];
	}
	return $string;
}

function send_mail($sujet,$message,$destinataire){
	$headers = "From: \"expediteur moi\"<moi@domaine.com>\n";
	$headers .= "Reply-To: moi@domaine.com\n";
	$headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
	if(mail($destinataire,$sujet,$message,$headers)){
	        echo "L'email a bien été envoyé.";
	}else{
	        echo "Une erreur c'est produite lors de l'envois de l'email.";
	}

}
function miniature($img,$chemin,$nom,$mlargeur=100,$mhauteur=100){
		// On supprime l'extension du nom
		$nom = substr($nom,0,-4);
		// On récupère les dimensions de l'image
		$dimension=getimagesize($img);
		// On cré une image à partir du fichier récup
		if(substr(strtolower($img),-4)==".jpg"){$image = imagecreatefromjpeg($img); }
		else if(substr(strtolower($img),-4)==".png"){$image = imagecreatefrompng($img); }
		else if(substr(strtolower($img),-4)==".gif"){$image = imagecreatefromgif($img); }
		// L'image ne peut etre redimensionne
		else{return false; }
		
		// Création des miniatures
		// On cré une image vide de la largeur et hauteur voulue
		$miniature =imagecreatetruecolor ($mlargeur,$mhauteur); 
		// On va gérer la position et le redimensionnement de la grande image
		if($dimension[0]>($mlargeur/$mhauteur)*$dimension[1] ){ $dimY=$mhauteur; $dimX=$mhauteur*$dimension[0]/$dimension[1]; $decalX=-($dimX-$mlargeur)/2; $decalY=0;}
		if($dimension[0]<($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mlargeur*$dimension[1]/$dimension[0]; $decalY=-($dimY-$mhauteur)/2; $decalX=0;}
		if($dimension[0]==($mlargeur/$mhauteur)*$dimension[1]){ $dimX=$mlargeur; $dimY=$mhauteur; $decalX=0; $decalY=0;}
		// on modifie l'image crée en y plaçant la grande image redimensionné et décalée
		imagecopyresampled($miniature,$image,$decalX,$decalY,0,0,$dimX,$dimY,$dimension[0],$dimension[1]);
		// On sauvegarde le tout
		imagejpeg($miniature,$chemin."/".$nom.".jpg",90);
		return true;
}