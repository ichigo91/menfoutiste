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
if(isset($_POST['nom'])){
$reponse = $bdd->query('SELECT MAX(id) as max FROM heros');
$donnees = $reponse->fetch();
mkdir("images/".($donnees['max']+1), 0777);
$dossier = "images/".($donnees['max']+1)."/";

$un = array();
foreach ($_POST['talent1'] as $key => $value) {
	array_push($un, array('nom' => $_POST['talent1'][$key], 'description' => $_POST['description1'][$key], 'image' => $_FILES['img1']['name'][$key]));
	if(isset($_FILES['img1'])){ 
    	$fichier = basename($_FILES['img1']['name'][$key]);
    	if(move_uploaded_file($_FILES['img1']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$quatre = array();
foreach ($_POST['talent4'] as $key => $value) {
	array_push($quatre, array('nom' => $_POST['talent4'][$key], 'description' => $_POST['description4'][$key], 'image' => $_FILES['img4']['name'][$key]));
	if(isset($_FILES['img4'])){ 
    	$fichier = basename($_FILES['img4']['name'][$key]);
    	if(move_uploaded_file($_FILES['img4']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$sept = array();
foreach ($_POST['talent7'] as $key => $value) {
	array_push($sept, array('nom' => $_POST['talent7'][$key], 'description' => $_POST['description7'][$key], 'image' => $_FILES['img7']['name'][$key]));
	if(isset($_FILES['img7'])){ 
    	$fichier = basename($_FILES['img7']['name'][$key]);
    	if(move_uploaded_file($_FILES['img7']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$dix = array();
foreach ($_POST['talent10'] as $key => $value) {
	array_push($dix, array('nom' => $_POST['talent10'][$key], 'description' => $_POST['description10'][$key], 'image' => $_FILES['img10']['name'][$key]));
	if(isset($_FILES['img10'])){ 
    	$fichier = basename($_FILES['img10']['name'][$key]);
    	if(move_uploaded_file($_FILES['img10']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$treize = array();
foreach ($_POST['talent13'] as $key => $value) {
	array_push($treize, array('nom' => $_POST['talent13'][$key], 'description' => $_POST['description13'][$key], 'image' => $_FILES['img13']['name'][$key]));
	if(isset($_FILES['img13'])){ 
    	$fichier = basename($_FILES['img13']['name'][$key]);
    	if(move_uploaded_file($_FILES['img13']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$seize = array();
foreach ($_POST['talent16'] as $key => $value) {
	array_push($seize, array('nom' => $_POST['talent16'][$key], 'description' => $_POST['description16'][$key], 'image' => $_FILES['img16']['name'][$key]));
	if(isset($_FILES['img16'])){ 
    	$fichier = basename($_FILES['img16']['name'][$key]);
    	if(move_uploaded_file($_FILES['img16']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$vingt = array();
foreach ($_POST['talent20'] as $key => $value) {
	array_push($vingt, array('nom' => $_POST['talent20'][$key], 'description' => $_POST['description20'][$key], 'image' => $_FILES['img20']['name'][$key]));
	if(isset($_FILES['img20'])){ 
    	$fichier = basename($_FILES['img20']['name'][$key]);
    	if(move_uploaded_file($_FILES['img20']['tmp_name'][$key], $dossier . $fichier)){
        	echo 'Upload effectué avec succès !';
    	}
    	else{
        	echo 'Echec de l\'upload !';
    	}
	}
}

$req = $bdd->prepare("INSERT INTO heros VALUES(NULL,:nom,:classe,:un,:quatre,:sept,:dix,:treize,:seize,:vingt)");
$req->execute(array(
	'nom' => $_POST['nom'],
	'classe' => $_POST['classe'],
	'un' =>  serialize($un),
	'quatre' =>  serialize($quatre),
	'sept' =>  serialize($sept),
	'dix' =>  serialize($dix),
	'treize' =>  serialize($treize),
	'seize' =>  serialize($seize),
	'vingt' =>  serialize($vingt)
));
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<link rel="stylesheet" href="style.css" />
<title>Menfoutiste - Ajouter un héros</title>
    <script type="text/javascript" >

    </script>
</head>
<body>
<?php
	include("include/nav.php");
?>
<center>
<section>
<center>
<h1>Ajouter un héros</h1>
<form action="#" method="post" enctype="multipart/form-data">
	<label>Nom : </label><input type="text" name="nom"><br><br>
	<label>Classe : </label><select name="classe"><option value="0">Guerrier</option><option value="1">Support</option><option value="2">Assassin</option><option value="3">Spécialiste</option><option value="4">Multiclasse</option></select><br><br>
	<label>1</label><br>
	<div id="1" >
        <input type="text" name="talent1[]"/><input type="file" name="img1[]" /><textarea name="description1[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div1 = document.getElementById('1');
        function addInput1(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div1.appendChild(input);
        }
        function addText1(name){
            var text = document.createElement("textarea");
            text.name = name;
            div1.appendChild(text);
        }
        function addField1() {
            addInput1("talent1[]","text");
            addInput1("img1[]","file");
            addText1("description1[]");
            div1.appendChild(document.createElement("br"));
        }
        function rmvField1() {
        	var x1 = div1.childElementCount;
        	if(x1!=4){
	            div1.removeChild(div1.lastChild);
	            div1.removeChild(div1.lastChild);
	            div1.removeChild(div1.lastChild);
	            div1.removeChild(div1.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField1()" >+</button><button type="button" onclick="rmvField1()" >-</button><br><br>
    <label>4</label><br>
	<div id="4" >
        <input type="text" name="talent4[]"/><input type="file" name="img4[]" /><textarea name="description4[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div4 = document.getElementById('4');
        function addInput4(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div4.appendChild(input);
        }
        function addText4(name){
            var text = document.createElement("textarea");
            text.name = name;
            div4.appendChild(text);
        }
        function addField4() {
            addInput4("talent4[]","text");
            addInput4("img4[]","file");
            addText4("description4[]");
            div4.appendChild(document.createElement("br"));
        }
        function rmvField4() {
        	var x4 = div4.childElementCount;
        	if(x4!=4){
	            div4.removeChild(div4.lastChild);
	            div4.removeChild(div4.lastChild);
	            div4.removeChild(div4.lastChild);
	            div4.removeChild(div4.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField4()" >+</button><button type="button" onclick="rmvField4()" >-</button><br><br>
   <label>7</label><br>
	<div id="7" >
        <input type="text" name="talent7[]"/><input type="file" name="img7[]" /><textarea name="description7[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div7 = document.getElementById('7');
        function addInput7(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div7.appendChild(input);
        }
        function addText7(name){
            var text = document.createElement("textarea");
            text.name = name;
            div7.appendChild(text);
        }
        function addField7() {
            addInput7("talent7[]","text");
            addInput7("img7[]","file");
            addText7("description7[]");
            div7.appendChild(document.createElement("br"));
        }
        function rmvField7() {
        	var x7 = div7.childElementCount;
        	if(x7!=4){
	            div7.removeChild(div7.lastChild);
	            div7.removeChild(div7.lastChild);
	            div7.removeChild(div7.lastChild);
	            div7.removeChild(div7.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField7()" >+</button><button type="button" onclick="rmvField7()" >-</button><br><br>
    <label>10</label><br>
	<div id="10" >
        <input type="text" name="talent10[]"/><input type="file" name="img10[]" /><textarea name="description10[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div10 = document.getElementById('10');
        function addInput10(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div10.appendChild(input);
        }
        function addText10(name){
            var text = document.createElement("textarea");
            text.name = name;
            div10.appendChild(text);
        }
        function addField10() {
            addInput10("talent10[]","text");
            addInput10("img10[]","file");
            addText10("description10[]");
            div10.appendChild(document.createElement("br"));
        }
        function rmvField10() {
        	var x10 = div10.childElementCount;
        	if(x10!=4){
	            div10.removeChild(div10.lastChild);
	            div10.removeChild(div10.lastChild);
	            div10.removeChild(div10.lastChild);
	            div10.removeChild(div10.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField10()" >+</button><button type="button" onclick="rmvField10()" >-</button><br><br>
    <label>13</label><br>
	<div id="13" >
        <input type="text" name="talent13[]"/><input type="file" name="img13[]" /><textarea name="description13[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div13 = document.getElementById('13');
        function addInput13(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div13.appendChild(input);
        }
        function addText13(name){
            var text = document.createElement("textarea");
            text.name = name;
            div13.appendChild(text);
        }
        function addField13() {
            addInput13("talent13[]","text");
            addInput13("img13[]","file");
            addText13("description13[]");
            div13.appendChild(document.createElement("br"));
        }
        function rmvField13() {
        	var x13 = div13.childElementCount;
        	if(x13!=4){
	            div13.removeChild(div13.lastChild);
	            div13.removeChild(div13.lastChild);
	            div13.removeChild(div13.lastChild);
	            div13.removeChild(div13.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField13()" >+</button><button type="button" onclick="rmvField13()" >-</button><br><br>
    <label>16</label><br>
	<div id="16" >
        <input type="text" name="talent16[]"/><input type="file" name="img16[]" /><textarea name="description16[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div16 = document.getElementById('16');
        function addInput16(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div16.appendChild(input);
        }
        function addText16(name){
            var text = document.createElement("textarea");
            text.name = name;
            div16.appendChild(text);
        }
        function addField16() {
            addInput16("talent16[]","text");
            addInput16("img16[]","file");
            addText16("description16[]");
            div16.appendChild(document.createElement("br"));
        }
        function rmvField16() {
        	var x16 = div16.childElementCount;
        	if(x16!=4){
	            div16.removeChild(div16.lastChild);
	            div16.removeChild(div16.lastChild);
	            div16.removeChild(div16.lastChild);
	            div16.removeChild(div16.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField16()" >+</button><button type="button" onclick="rmvField16()" >-</button><br><br>
    <label>20</label><br>
	<div id="20" >
        <input type="text" name="talent20[]"/><input type="file" name="img20[]" /><textarea name="description20[]"></textarea><br>
    </div>
    <script type="text/javascript" >
    	var div20 = document.getElementById('20');
        function addInput20(name,type){
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            div20.appendChild(input);
        }
        function addText20(name){
            var text = document.createElement("textarea");
            text.name = name;
            div20.appendChild(text);
        }
        function addField20() {
            addInput20("talent20[]","text");
            addInput20("img20[]","file");
            addText20("description20[]");
            div20.appendChild(document.createElement("br"));
        }
        function rmvField20() {
        	var x20 = div20.childElementCount;
        	if(x20!=4){
	            div20.removeChild(div20.lastChild);
	            div20.removeChild(div20.lastChild);
	            div20.removeChild(div20.lastChild);
	            div20.removeChild(div20.lastChild);
	        }
        }
    </script>
    <button type="button" onclick="addField20()" >+</button><button type="button" onclick="rmvField20()" >-</button><br><br>
 	<input type="submit" value="Ajouter">
</form>
</center>
</section>
</center>
<br><br>
</body>
</html>