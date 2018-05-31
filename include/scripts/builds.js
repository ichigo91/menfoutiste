function deleteBuild(id){
	var r = confirm("Voulez-vous vraiment supprimer ce build ?");
	if(r){
		document.location.replace("delete_build.php?id="+id);
	}else{

	}
}