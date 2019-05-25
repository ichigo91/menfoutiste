<?php
class PicksController extends Controller{

	function index(){
		// Récupérations des héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		$this->set($d);

	}

	function view($id = null){
		// Récupérations des héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		if($id === null){
			$d['user'] = $_SESSION['User'];
		}else{
			$this->loadModel('Users');
			$d['user'] = $this->Users->findFirst(array(
			'fields' => array('id','login','picks'),
			'conditions' => array('id'=>$id)
			));
			if(empty($d['user'])){
				$this->e404('Cet utilisateur n\'existe pas');
			}else{
				$d['user']->picks = unserialize($d['user']->picks);
			}
		}
		$this->set($d);

	}

	function user_edit(){
		// Récupérations des héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		$this->loadModel('Users');
		if($this->request->data){
			$picks = serialize($this->request->data);
			foreach ($this->request->data as $key => $value) {
				unset($this->request->data->$key);
			}
			$this->request->data->id = $_SESSION['User']->id;
			$this->request->data->picks = $picks;
			$this->Users->save($this->request->data,'users');
			$_SESSION['User']->picks =  unserialize($picks);
			$this->Session->setFlash('Vos picks ont bien étés modifiés','success',2);
			$this->redirect('');
		}
		$this->set($d);

	}

}