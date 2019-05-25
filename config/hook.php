<?php
if(!$this->Session->isLogged() && $this->request->controller != 'users'){
	$this->layout = 'login';
	$this->redirect('users');
}
if($this->request->prefix == 'admin'){
	$this->layout = 'admin';
	if(!$this->Session->isLogged() || $this->Session->user('rang') != 0){
		$this->redirect('users');
	}
}
if($this->request->controller == 'profil'){
	$this->layout = 'user';
	if(!$this->Session->isLogged() || $this->Session->user('rang') != 1){
		$this->layout = 'login';
		$this->redirect('users');
	}
}
if($this->request->controller == 'builds' && $this->request->action == 'index'){
	$this->layout = 'builds';
}
if(($this->request->controller == 'heros'||$this->request->controller == 'meta')&&($this->request->action == 'index')){
	$this->layout = 'heros';
}
if($this->request->controller == 'users'){
	$this->layout = 'login';
}