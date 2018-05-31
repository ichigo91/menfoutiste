<?php
if(isset($_POST['nom'])){
$reponse = $bdd->query('SELECT MAX(id) as max FROM heros');
$donnees = $reponse->fetch();
mkdir("images/".($donnees['max']+1), 0777);
$dossier = "images/".($donnees['max']+1)."/";

if(isset($_FILES['img_min'])){ 
        $fichier = basename($_FILES['img_min']['name']);
        if(move_uploaded_file($_FILES['img_min']['tmp_name'], $dossier . $fichier)){
            echo 'Upload effectué avec succès !';
        }
        else{
            echo 'Echec de l\'upload !';
        }
}

$a = array('nom'=>$_POST['nomA'], 'mana'=>$_POST['manaA'], 'cd'=>$_POST['cdA'],'description'=>$_POST['descriptionA'], 'image'=>$_FILES['imgA']['name']);
if(isset($_FILES['imgA'])){ 
        $fichier = basename($_FILES['imgA']['name']);
        if(move_uploaded_file($_FILES['imgA']['tmp_name'], $dossier . $fichier)){
            echo 'Upload effectué avec succès !';
        }
        else{
            echo 'Echec de l\'upload !';
        }
}
$z = array('nom'=>$_POST['nomZ'], 'mana'=>$_POST['manaZ'], 'cd'=>$_POST['cdZ'],'description'=>$_POST['descriptionZ'], 'image'=>$_FILES['imgZ']['name']);
if(isset($_FILES['imgZ'])){ 
        $fichier = basename($_FILES['imgZ']['name']);
        if(move_uploaded_file($_FILES['imgZ']['tmp_name'], $dossier . $fichier)){
            echo 'Upload effectué avec succès !';
        }
        else{
            echo 'Echec de l\'upload !';
        }
}
$e = array('nom'=>$_POST['nomE'], 'mana'=>$_POST['manaE'], 'cd'=>$_POST['cdE'],'description'=>$_POST['descriptionE'], 'image'=>$_FILES['imgE']['name']);
if(isset($_FILES['imgE'])){ 
        $fichier = basename($_FILES['imgE']['name']);
        if(move_uploaded_file($_FILES['imgE']['tmp_name'], $dossier . $fichier)){
            echo 'Upload effectué avec succès !';
        }
        else{
            echo 'Echec de l\'upload !';
        }
}
$d = array('nom'=>$_POST['nomD'], 'mana'=>$_POST['manaD'], 'cd'=>$_POST['cdD'],'description'=>$_POST['descriptionD'], 'image'=>$_FILES['imgD']['name']);
if(isset($_FILES['imgD'])){ 
        $fichier = basename($_FILES['imgD']['name']);
        if(move_uploaded_file($_FILES['imgD']['tmp_name'], $dossier . $fichier)){
            echo 'Upload effectué avec succès !';
        }
        else{
            echo 'Echec de l\'upload !';
        }
}
$autres = array();

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

$req = $bdd->prepare("INSERT INTO heros VALUES(NULL,:nom,:classe,:carac,:img,:a,:z,:e,:d,:autres,:un,:quatre,:sept,:dix,:treize,:seize,:vingt)");
$req->execute(array(
    'nom' => $_POST['nom'],
    'classe' => $_POST['classe'],
    'carac' => '',
    'img' => $_FILES['img_min']['name'],
    'a' => serialize($a),
    'z' => serialize($z),
    'e' => serialize($e),
    'd' => serialize($d),
    'autres' => serialize($autres),
    'un' =>  serialize($un),
    'quatre' =>  serialize($quatre),
    'sept' =>  serialize($sept),
    'dix' =>  serialize($dix),
    'treize' =>  serialize($treize),
    'seize' =>  serialize($seize),
    'vingt' =>  serialize($vingt)
));
    die();
    echo '<script language="Javascript">
           <!--
                document.location.replace("index.php");
           // -->
     </script>';
}
?>
<h1>Ajouter un héros</h1>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Nom : </label><input type="text" name="nom"><br><br>
    <label>Classe : </label><select name="classe"><option value="0">Guerrier</option><option value="1">Support</option><option value="2">Assassin</option><option value="3">Spécialiste</option><option value="4">Multiclasse</option></select><br>
    <label>Image : </label><input type="file" name="img_min">
    <h2>Sorts :</h2>
    <h3>A</h3>
    <div id="A" >
        <input type="text" name="nomA" placeholder="Nom" /><input type="text" name="manaA" placeholder="Mana" /><input type="text" name="cdA" placeholder="Temps de recharge" /><label for="imgA">Image : </label><div class="up_img"><img id="outputA" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" name="imgA" id="A" onchange="loadFile(event,this.id)" /></div><textarea name="descriptionA" placeholder="Description" rows="4" cols="50"></textarea><br>
    </div>
    <h3>Z</h3>
    <div id="Z" >
        <input type="text" name="nomZ" placeholder="Nom" /><input type="text" name="manaZ" placeholder="Mana"/><input type="text" name="cdZ" placeholder="Temps de recharge" /><label for="imgZ">Image : </label><div class="up_img"><img id="outputZ" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" name="imgZ" id="Z" onchange="loadFile(event,this.id)" /></div><textarea name="descriptionZ" placeholder="Description" rows="4" cols="50"></textarea><br>
    </div>
    <h3>E</h3>
    <div id="E" >
        <input type="text" name="nomE" placeholder="Nom" /><input type="text" name="manaE" placeholder="Mana" /><input type="text" name="cdE" placeholder="Temps de recharge" /><label for="imgE">Image : </label><div class="up_img"><img id="outputE" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" name="imgE" id="E" onchange="loadFile(event,this.id)" /></div><textarea name="descriptionE" placeholder="Description" rows="4" cols="50"></textarea><br>
    </div>
    <h3>D</h3>
    <div id="D" >
        <input type="text" name="nomD" placeholder="Nom" /><input type="text" name="manaD" placeholder="Mana" /><input type="text" name="cdD" placeholder="Temps de recharge" /><label for="imgD">Image : </label><div class="up_img"><img id="outputD" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" name="imgD" id="D" onchange="loadFile(event,this.id)" /></div><textarea name="descriptionD" placeholder="Description" rows="4" cols="50"></textarea><br>
    </div>
    <h2>Talents :</h2>
    <h3>1</h3>
    <div id="1" >
        <input type="text" name="talent1[]" placeholder="Nom" /><div class="up_img"><img id="output1-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" name="img1[]" id="1-1" onchange="loadFile(event,this.id)" /></div><textarea name="description1[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb1" id="nb1" value="1"><br>
    </div>
    <button type="button" onclick="addField(1)" >+</button><button type="button" onclick="rmvField(1)" >-</button><br><br>
    <h3>4</h3>
    <div id="4" >
        <input type="text" name="talent4[]" placeholder="Nom" /><div class="up_img"><img id="output4-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" id="4-1" name="img4[]" onchange="loadFile(event,this.id)" /></div><textarea name="description4[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb4" id="nb4" value="1"><br>
    </div>
    <button type="button" onclick="addField(4)" >+</button><button type="button" onclick="rmvField(4)" >-</button><br><br>
    <h3>7</h3>
    <div id="7" >
        <input type="text" name="talent7[]" placeholder="Nom" /><div class="up_img"><img id="output7-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" id="7-1" name="img7[]" onchange="loadFile(event,this.id)" /></div><textarea name="description7[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb7" id="nb7" value="1"><br>
    </div>
    <button type="button" onclick="addField(7)" >+</button><button type="button" onclick="rmvField(7)" >-</button><br><br>
    <h3>10</h3>
    <div id="10" >
        <input type="text" name="talent10[]" placeholder="Nom" /><div class="up_img"><img id="output10-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" id="10-1" name="img10[]" onchange="loadFile(event,this.id)" /></div><textarea name="description10[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb10" id="nb10" value="1"><br>
    </div>
    <button type="button" onclick="addField(10)" >+</button><button type="button" onclick="rmvField(10)" >-</button><br><br>
    <h3>13</h3>
    <div id="13" >
        <input type="text" name="talent13[]" placeholder="Nom" /><div class="up_img"><img id="output13-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" id="13-1" name="img13[]" onchange="loadFile(event,this.id)" /></div><textarea name="description13[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb13" id="nb13" value="1"><br>
    </div>
    <button type="button" onclick="addField(13)" >+</button><button type="button" onclick="rmvField(13)" >-</button><br><br>
    <h3>16</h3>
    <div id="16" >
        <input type="text" name="talent16[]" placeholder="Nom" /><div class="up_img"><img id="output16-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" id="16-1" name="img16[]" onchange="loadFile(event,this.id)" /></div><textarea name="description16[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb16" id="nb16" value="1"><br>
    </div>
    <button type="button" onclick="addField(16)" >+</button><button type="button" onclick="rmvField(16)" >-</button><br><br>
    <h3>20</h3>
    <div id="20" >
        <input type="text" name="talent20[]" placeholder="Nom" /><div class="up_img"><img id="output20-1" src="images/theme/nochoice.png" height="64" width="64" class="talent"/><br><input type="file" id="20-1" name="img20[]" onchange="loadFile(event,this.id)" /></div><textarea name="description20[]" placeholder="Description" rows="4" cols="50"></textarea><input type="hidden" name="nb20" id="nb20" value="1"><br>
    </div>
    <button type="button" onclick="addField(20)" >+</button><button type="button" onclick="rmvField(20)" >-</button><br><br>
    <input type="submit" value="Ajouter" class="button">
</form>
<script>
  var loadFile = function(event,id) {
    var reader = new FileReader();
    reader.onload = function(){
      var output = document.getElementById('output'+id);
      output.src = reader.result;
    };
    reader.readAsDataURL(event.target.files[0]);
  };
</script>
<script type="text/javascript" >
    function addInput(name,type,pl,t,nb,div){
        if(type=="file"){
            var divimg = document.createElement("div");
            divimg.className = "up_img";
            div.appendChild(divimg);
            var img_out = document.createElement("img");
            img_out.id = "output-"+t+nb;
            img_out.width = "64";
            img_out.height = "64";
            img_out.class = "talent";
            img_out.src = "images/theme/nochoice.png";
            divimg.appendChild(img_out);
            divimg.innerHTML = '<img id="output'+t+'-'+nb+'" class="talent" height="64" width="64" src="images/theme/nochoice.png"/><br><input type="file" name="'+name+'" id="'+t+'-'+nb+'" onchange="loadFile(event,this.id)">';
        }else{
            var input = document.createElement("input");
            input.name = name;
            input.type = type;
            input.id = t+'-'+nb;
            input.placeholder = pl;
            div.appendChild(input);
        }
    }
    function addText(name,div){
        var text = document.createElement("textarea");
        text.name = name;
        text.placeholder = "Description";
        text.rows = "4";
        text.cols = "50";
        div.appendChild(text);
    }
    function addField(t) {
        var div = document.getElementById(t);
        var hid = document.getElementById('nb'+t);
        var nb = parseInt(hid.value)+1;
        addInput('talent'+t+'[]',"text","Nom",t,nb,div);
        addInput('img'+t+'[]',"file","",t,nb,div);
        addText('description'+t+'[]',div);
        hid.value = nb;
        div.appendChild(document.createElement("br"));
    }
    function rmvField(id) {
        var div = document.getElementById(id);
        var hid = document.getElementById('nb'+id);
        var x1 = div.childElementCount;
        var nb = parseInt(hid.value);
        if(x1!=5){
            div.removeChild(div.lastChild);
            div.removeChild(div.lastChild);
            div.removeChild(div.lastChild);
            div.removeChild(div.lastChild);
        }
        if(nb > 1){
            hid.value = nb-1;
        }
    }
</script>