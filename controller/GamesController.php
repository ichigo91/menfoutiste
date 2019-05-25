<?php
class GamesController extends Controller{

	function index(){
		// Récupérations des games

		$this->loadModel('Games');
		$d['games'] = $this->Games->find(array(
			'ordre' => array('champ' => 'id','sens' => 'ASC')
		));
		if(empty($d['games'])){
			$this->e404('Il n\'y a pas encore de games enregistrées');
		}
		$this->set($d);
	}

	function view($id){
		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		$this->loadModel('Maps');
		$d['map'] = $this->Maps->findFirst(array(
			'conditions' => array('id'=>$id)
		));
		if(empty($d['map'])){
			$this->e404('Cette map n\'existe pas');
		}
		$d['map']->synergies = unserialize($d['map']->synergies);
		$this->set($d);
	}

	function user_edit($id = null){
		// Récupérations des héros
		$this->loadModel('Maps');
		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		$d['nom_heros'] = array();
		foreach ($d['heros'] as $key) {
			array_push($d['nom_heros'],$key->nom);
		}
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		if($id === null){
			$d['title'] = 'Ajouter une game';
			$d['button'] = 'Ajouter';
			$d['nb'] = array(1,1,1,1,1,1,1,0);
			$id = $this->Maps->findFirst(array('ordre' => array('champ' => 'id','sens' => 'DESC')))->id;
			$id += 1;
		}else{
			$d['map'] = $this->Maps->findFirst(array(
				'conditions' => array('id'=>$id)
			));
			$d['title'] = 'Modifier '.$d['map']->nom;
			$d['button'] = 'Modifier';
		}

		if($this->request->data){
			if(!empty($_FILES['image']['name'])){
				$dir = WEBROOT.DS.'img'.DS.'maps'.DS;
				$this->request->data->img = $_FILES['image']['name'];
        		$fichier = basename($_FILES['image']['name']);
        		if(move_uploaded_file($_FILES['image']['tmp_name'], $dir.$fichier)){
            		echo 'Upload effectué avec succès !';
        		}
        		else{
            		echo 'Echec de l\'upload !';
        		}
			}else{
				$this->request->data->image = $this->request->data->previmage;
			}
			unset($this->request->data->previmage);
			$nom = $this->request->data->nom;
			unset($this->request->data->nom);
			$description = $this->request->data->description;
			unset($this->request->data->description);
			unset($this->request->data->image);
			$synergies = $this->request->data;
			unset($this->request->data);
			$this->request->data->nom = $nom;
			$this->request->data->description = $description;
			$this->request->data->synergies = serialize($synergies);
			if(isset($id)){
				$this->request->data->id = $id;
			}
			$this->Maps->save($this->request->data);
			$this->Session->setFlash('La game a bien été modifiée','success',2);
			$this->redirect('');
		}
		if($id){
			$this->request->data = $d['map'];
			$d['map']->synergies = unserialize($d['map']->synergies);
		}
		$d['id'] = $id;
		$this->set($d);
	}

}