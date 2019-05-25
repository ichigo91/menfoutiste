<?php
class MetaController extends Controller{

	function index(){
		// Récupérations des héros

		$this->loadModel('Heros');
		$d['heros'] = $this->Heros->find(array(
			'ordre' => array('champ' => 'nom','sens' => 'ASC')
		));
		if(empty($d['heros'])){
			$this->e404('Il n\'y a pas encore de héros enregistrés');
		}
		$this->loadModel('Meta');
		$d['meta'] = $this->Meta->findFirst(array(
			'ordre' => array('champ' => 'id','sens' => 'DESC')
		));
		$d['meta']->picks = unserialize($d['meta']->picks);
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

		$this->loadModel('Meta');
		$d['meta'] = $this->Meta->findFirst(array(
			'ordre' => array('champ' => 'id','sens' => 'DESC')
		));
		$d['meta']->picks = unserialize($d['meta']->picks);
		if($this->request->data){
			$picks = serialize($this->request->data);
			foreach ($this->request->data as $key => $value) {
				unset($this->request->data->$key);
			}
			$this->request->data->picks = $picks;
			$this->request->data->date_time = date("Y-m-d H:i:s");
			$this->Meta->save($this->request->data);
			$this->Session->setFlash('La méta a bien été modifiée','success',2);
			$this->redirect('');
		}
		$this->set($d);
	}

}