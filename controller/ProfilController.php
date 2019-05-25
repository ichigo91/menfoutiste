<?php
class ProfilController extends Controller{

	function index(){
		$d['user'] = $_SESSION['User'];
		if($this->request->data){
			$this->loadModel('Users');
			$prefs = serialize($this->request->data);
			foreach ($this->request->data as $key => $value) {
				unset($this->request->data->$key);
			}
			$this->request->data->id = $_SESSION['User']->id;
			$this->request->data->prefs = $prefs;
			$this->Users->save($this->request->data,'users');
			$_SESSION['User']->prefs =  unserialize($prefs);
			$this->Session->setFlash('Vos préférences ont bien étés modifiées','success',2);
			$this->redirect('profil');
		}
		$this->set($d);
	}


	//email : temporaire


	function email(){
		$this->loadModel('Users');
		if($this->request->data){
			$this->request->data->id = $_SESSION['User']->id;
			$this->Users->save($this->request->data,'users');
			$this->Session->setFlash('Votre adresse email a bien été ajoutée','success');
			$this->redirect('');
		}
	}

	function edit($page = null){
		$this->loadModel('Users');
		if($this->request->data){
			$this->request->data->login = $_SESSION['User']->login;
			$this->request->data->email = $_SESSION['User']->email;
			$this->request->data->id = $_SESSION['User']->id;
			$this->loadModel('Profil');
			if($this->Profil->validates($this->request->data)){
				$this->request->data->password = sha1($this->request->data->password_new);
				unset($this->request->data->password_bef);
				unset($this->request->data->password_new);
				unset($this->request->data->password_new_conf);
				$this->Users->save($this->request->data,'users');
				$this->Session->setFlash('Votre mot de passe a bien été modifié','success');
				$this->redirect('profil/');
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','danger');
			}
		}else{
			$this->request->data = $this->Users->findFirst(array(
			'conditions' => array('login' => $_SESSION['User']->login)
			));
			unset($this->request->data->password);
		}
	}

	function builds(){
		$perPage = 9;
		$this->loadModel('Builds');
		$this->loadModel('Heros');
		$this->loadModel('Users');
		$this->loadModel('Majs');
		//$conditions = array('online' => 1);
		$d['builds'] = $this->Builds->find(array(
			'fields' => array('heros.id as id', 'Builds.id as id_build', 'Builds.id_user as id_user', 'heros.classe as classe', 'heros.solo as solo', 'Builds.solo as sol', 'heros.nom as nom', 'Builds.type as type', 'Builds.comments as comments', 'Builds.last_update as lastup', 'heros.last_update as lastup_h', 'Builds.talent1 as talent1', 'heros.talents1 as talents1', 'Builds.talent4 as talent4', 'heros.talents4 as talents4', 'Builds.talent7 as talent7', 'heros.talents7 as talents7', 'Builds.talent10 as talent10', 'heros.talents10 as talents10', 'heros.talents13 as talents13', 'Builds.talent13 as talent13', 'heros.talents16 as talents16', 'Builds.talent16 as talent16', 'Builds.talent20 as talent20', 'heros.talents20 as talents20'),
			'ordre' => array('champ' => 'id','sens' => 'DESC'),
			'conditions' => array('id_user'=>$_SESSION['User']->id),
			'jointure' => array('table' => 'heros', 'champs' => array('heros','id')),
			'limit' => ($perPage*($this->request->page-1)).','.$perPage
		));
		$d['users'] = $this->Users->find(array(
			'fields' => array('id', 'login')
		));
		$d['total'] = $this->Builds->findCount();
		$d['page'] = ceil($d['total'] / $perPage);
		$d['maj'] = $this->Majs->findFirst(array(
			'ordre' => array('champ' => 'id','sens' => 'DESC')
		));
		$this->set($d);
		if($this->Session->isLogged()){
			$e['user'] = $_SESSION['User'];
			$this->set($e);
		}
	}

	function link(){
		$d['user'] = $_SESSION['User'];
		$this->set($d);
	}

}