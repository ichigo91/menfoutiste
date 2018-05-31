<?php
if(isset($_POST['nom'])){
	if(isset($_FILES['image'])){ 
	        $fichier = basename($_FILES['image']['name']);
	        if(move_uploaded_file($_FILES['image']['tmp_name'], "images/maps/" . $fichier)){
	            echo 'Upload effectué avec succès !';
	        }
	        else{
	            echo 'Echec de l\'upload !';
	        }
	}

	$req = $bdd->prepare("INSERT INTO maps VALUES(NULL,:nom,DEFAULT,:image)");	
	$req->execute(array(
		'nom' => $_POST['nom'],
		'image' => $_FILES['image']['name']
	));
	echo '<script language="Javascript">
           <!--
           		document.location.replace("/");
           // -->
     </script>';
}
?>

<h1>Ajouter une map</h1>
<form action="#" method="post" enctype="multipart/form-data">
    <label>Nom : </label><input type="text" name="nom"><br><br>
    <label>Image : </label><input type="file" name="image"><br><br>
    <input type="submit" value="Ajouter" class="button">
</form>