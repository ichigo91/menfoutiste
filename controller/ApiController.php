<?php
class ApiController extends Controller{

	function index($action,$id = null){
		
		$this->loadModel('Heros');
		$this->loadModel('Builds');
		$possible_url = array("get_list_heros", "get_heros", "get_list_builds", "get_builds");

		$value = "Une erreur est survenue";
		if (isset($action) && in_array($action, $possible_url)) {

			switch ($action) {

				case "get_heros": if (isset($id)) $value = $this->Heros->findFirst(array(
			'fields' => array('Heros.id as id', 'Heros.classe as classe', 'Heros.role as role','Heros.img as img','Heros.img_min as img_min', 'Heros.caracteristiques as caracteristiques','Heros.solo as solo', 'Heros.nom as nom', 'Heros.last_update as lastup_h','Heros.A as A','Heros.Z as Z','Heros.E as E','Heros.D as D','Heros.autres as autres', 'Heros.talents1 as talents1', 'Heros.talents4 as talents4', 'Heros.talents7 as talents7', 'Heros.talents10 as talents10', 'Heros.talents13 as talents13', 'Heros.talents16 as talents16', 'Heros.talents20 as talents20'),
			'conditions' => array('id'=>$id)
		));

				else $value = $this->Heros->find(array(
				'ordre' => array('champ' => 'nom','sens' => 'ASC')
			)); break; 

				case "get_builds": if (isset($id)) $value = $this->Builds->findFirst(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.role as role', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'heros.A as A','heros.Z as Z','heros.E as E','heros.D as D','heros.autres as autres', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
			'ordre' => array('champ' => 'id','sens' => 'DESC'),
			'jointure' => array('table' => 'heros', 'champs' => array('heros','id')),
			'conditions' => array('Builds.id'=>$id)
		));

				else $value = $d['builds'] = $this->Builds->find(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.role as role', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
				'ordre' => array('champ' => 'id','sens' => 'DESC'),
				'jointure' => array('table' => 'heros', 'champs' => array('heros','id'))
			));	 break; }

		}

		exit(json_encode($value));
	}

}