<?php
class BuildsController extends Controller{

	function index(){
		$perPage = 9;
		$this->loadModel('Builds');
		$this->loadModel('Heros');
		$this->loadModel('Users');
		$this->loadModel('Majs');
		if($this->request->role != -1){
			$conditions = array('role' => $this->request->role);
		}
		if($this->request->classe != -1){
			$conditions = array('classe' => $this->request->classe);
		}
		if($this->request->group != -1){
			$conditions = 'role BETWEEN '.(2*$this->request->group).' AND '.((2*$this->request->group)+1);
		}
		if($this->request->solo != -1){
			$conditions = array('heros.solo' => 1, 'Builds.solo' => 1);
		}
		if($this->request->user != -1){
			$conditions = array('Builds.id_user' => $this->request->user);
		}
		if(isset($conditions)){
			$d['builds'] = $this->Builds->find(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
				'ordre' => array('champ' => 'id','sens' => 'DESC'),
				'conditions' => $conditions,
				'jointure' => array('table' => 'heros', 'champs' => array('heros','id'))
			));
		}else{
			$d['builds'] = $this->Builds->find(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
				'ordre' => array('champ' => 'id','sens' => 'DESC'),
				'jointure' => array('table' => 'heros', 'champs' => array('heros','id'))
			));	
		}
		$d['users'] = $this->Users->find(array(
			'fields' => array('id', 'login')
		));
		$d['total'] = $this->Builds->findCount();
		//$d['page'] = ceil($d['total'] / $perPage);
		$d['maj'] = $this->Majs->findFirst(array(
			'ordre' => array('champ' => 'id','sens' => 'DESC')
		));
		$this->set($d);
		if($this->Session->isLogged()){
			$e['user'] = $_SESSION['User'];
			$this->set($e);
		}
	}

	function view($id){
		// Récupération du build

		$this->loadModel('Builds');
		$d['build'] = $this->Builds->findFirst(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'heros.A as A','heros.Z as Z','heros.E as E','heros.D as D','heros.autres as autres', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
			'ordre' => array('champ' => 'id','sens' => 'DESC'),
			'jointure' => array('table' => 'heros', 'champs' => array('heros','id')),
			'conditions' => array('Builds.id'=>$id)
		));
		if(empty($d['build'])){
			$this->e404('Ce build n\'existe pas');
		}else{
			//Commentaires
		}

		// Ajout d'un commentaire
		/*
		$this->loadModel('Commentaires');
		if($this->request->data){
			if($this->Commentaires->validates($this->request->data) && $this->request->data->code == $this->request->data->code_v){
				$this->request->data->date = date('Y-m-d h:i:s');
				unset($this->request->data->code);
				unset($this->request->data->code_v);
				$this->request->data->id_tableau = $id;
				$this->Commentaires->save($this->request->data);
				unset($_SESSION['galerie']);
				$this->Session->setFlash('Votre commentaire a bien été ajouté','success',2);
				$this->redirect('galerie/'.$id);
			}else{
				$this->Session->setFlash('Merci de corriger vos erreures','error');
			}
		}*/

		$this->set($d);
	}

	function find(){
		$this->loadModel('Builds');
		$this->loadModel('Heros');
		$this->loadModel('Users');
		$this->loadModel('Majs');
		$d['builds'] = $this->Builds->find(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
				'ordre' => array('champ' => 'id','sens' => 'DESC'),
				'jointure' => array('table' => 'heros', 'champs' => array('heros','id')),
				'conditions' => 'heros.nom like \''.$this->request->name.'%\''
			));	
		$d['users'] = $this->Users->find(array(
			'fields' => array('id', 'login')
		));
		$d['maj'] = $this->Majs->findFirst(array(
			'ordre' => array('champ' => 'id','sens' => 'DESC')
		));
		$this->set($d);
		if($this->Session->isLogged()){
			$e['user'] = $_SESSION['User'];
			$this->set($e);
		}
	}

	function user_index(){
		// Récupérations des héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'fields' => array('Heros.id as id', 'Heros.classe as classe', 'Heros.img_min as img_min', 'Heros.caracteristiques as caracteristiques','Heros.solo as solo', 'Heros.nom as nom', 'Heros.last_update as lastup_h','Heros.A as A','Heros.Z as Z','Heros.E as E','Heros.D as D','Heros.autres as autres', 'Heros.talents1 as talents1', 'Heros.talents4 as talents4', 'Heros.talents7 as talents7', 'Heros.talents10 as talents10', 'Heros.talents13 as talents13', 'Heros.talents16 as talents16', 'Heros.talents20 as talents20'),
			'ordre' => array('champ' => 'nom','sens' => 'DESC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		$this->set($d);
	}

	function user_edit($id,$id_build = null){
		// Récupération du héros
		$this->loadModel('Heros');
		$this->loadModel('Builds');
		$d['heros'] = $this->Heros->findFirst(array(
			'fields' => array('Heros.id as id', 'Heros.classe as classe', 'Heros.img_min as img_min', 'Heros.caracteristiques as caracteristiques','Heros.solo as solo', 'Heros.nom as nom', 'Heros.last_update as lastup_h','Heros.A as A','Heros.Z as Z','Heros.E as E','Heros.D as D','Heros.autres as autres', 'Heros.talents1 as talents1', 'Heros.talents4 as talents4', 'Heros.talents7 as talents7', 'Heros.talents10 as talents10', 'Heros.talents13 as talents13', 'Heros.talents16 as talents16', 'Heros.talents20 as talents20'),
			'conditions' => array('id'=>$id)
		));
		if(empty($d['heros'])){
			$this->e404('Ce héros n\'existe pas');
		}else{
			$d['heros']->caracteristiques = unserialize($d['heros']->caracteristiques);
			if($id_build === null){
				$d['button'] = 'Ajouter';
			}else{
				$d['build'] = $this->Builds->findFirst(array(
					'conditions' => array('id'=>$id_build,'heros'=>$id)
				));
				$d['button'] = 'Modifier';
			}
			//Commentaires
		}
		if($this->request->data){
			$this->request->data->last_update = date("Y-m-d H:i:s");
			$this->request->data->id_user = $_SESSION['User']->id;
			$this->request->data->heros = $id;
			if($id_build){
				$this->request->data->id = $id_build;
			}
			$this->Builds->save($this->request->data);
			$this->Session->setFlash('Le build a bien été ajouté','success',2);
			$this->redirect('');
		}
		if($id_build){
			$this->request->data = $d['build'];
		}
		$this->set($d);
	}

	function user_delete($id){
		$this->loadModel('Builds');
		$this->Builds->delete($id);
		$this->Session->setFlash('Le build a bien été supprimé','success');
		$this->redirect('');
	}
}