<?php
class UsersController extends Controller{

	/**
	* Login
	**/
	function login(){
		if($this->request->data){
			$data = $this->request->data;
			$this->loadModel('Users');
			if($this->Users->validates_login($this->request->data)){
				$data->password = sha1($data->password);
				$user = $this->Users->findFirst(array(
					'conditions'=>array('login' => $data->login,'password' => $data->password
				)));
				if(!empty($user)){
					$this->Session->write('User',$user);
					$users = $this->Users->find(array('fields'=>array('id','login')));
					$this->Session->write('Users',$users);
					$_SESSION['User']->picks = unserialize($_SESSION['User']->picks);
					$_SESSION['User']->prefs = unserialize($_SESSION['User']->prefs);
				}else{
					$this->Session->setFlash('Votre identifiant ou votre mot de passe est incorrect','danger');
				}
				$this->request->data->password = '';
			}else{
				$data->password = '';
				$this->Session->setFlash('Merci de corriger vos informations','danger');
			}
		}
		if($this->Session->isLogged()){
			if($_SESSION['User']->email != ""){
				if($user->hash == ''){
					$user->hash = random(32);
					$this->Users->save($user);
				}
				$this->redirect('');
			}else{
				$this->Session->setFlash('Merci de renseigner une adresse e-mail','danger');
				$this->redirect('profil/email');
			}
		}
	}

	/**
	* Logout
	**/
	function logout(){
		unset($_SESSION['User']);
		$this->Session->setFlash('Vous êtes maintenant déconnecté');
		$this->redirect('');
	}

	function register($hash){
		$this->loadModel('Users');
		if(!isset($hash)){
			$this->redirect('users');
		}else{
			$req_hash = $this->Users->findFirst(array(
					'conditions' => array('hash' => $hash)
				));
			if(empty($req_hash)){
				$this->redirect('users');
			}
		}
		$d['hash'] = $hash;
		if($this->request->data){
			if($this->Users->validates($this->request->data)){
				$mail = $this->Users->findFirst(array(
					'conditions' => array('email' => $this->request->data->email)
				));
				if(empty($mail)){
					unset($this->request->data->password_val);
					$this->request->data->rang = 1;
					$this->request->data->picks = '';
					$this->request->data->prefs = '';
					$this->request->data->hash = random(32);
					$email = $this->request->data->email;
					$this->request->data->password = sha1($this->request->data->password);
					$this->Users->save($this->request->data);

					$user = $this->Users->findFirst(array(
						'conditions'=>array('email' => $email
					)));
					if(!empty($user)){
						$this->Session->write('User',$user);
						$users = $this->Users->find(array('fields'=>array('id','login')));
						$this->Session->write('Users',$users);
						$_SESSION['User']->picks = unserialize($_SESSION['User']->picks);
						$_SESSION['User']->prefs = unserialize($_SESSION['User']->prefs);
					}else{
						$this->Session->setFlash('Un problème est survenu','danger');
					}

					$this->Session->setFlash('Bienvenue '.$this->request->data->login);
					$req_hash->hash = random(32);
					$this->Users->save($req_hash);
					$this->redirect('');
				}else{
					$this->Form->errors['mail'] = 'Cette adresse e-mail est déjà utilisée';
					$this->Session->setFlash('Merci de corriger vos informations','error');
				}
			}else{
				$this->Session->setFlash('Merci de corriger vos informations','error');
			}
		}
		$this->set($d);
	}

}