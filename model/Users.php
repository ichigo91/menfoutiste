<?php
class Users extends Model{
	var $validate = array(
		'password' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez saisir un mot de passe'
		),
		'login' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez saisir un identifiant'
		),
		'email' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez saisir une adresse e-mail'
		),
		'password_val' => array(
			'rule' => 'equal',
			'a' => 'password',
			'message' => 'Les deux mots de passe saisis doivent être identiques'
		)
	);

	var $validate_login = array(
		'password' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez mettre votre mot de passe'
		),
		'login' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez mettre votre identifiant'
		)
	);

	function validates($data){
		$errors = array();
		foreach($this->validate as $k=>$v){
			if(!isset($data->$k)){
				$errors[$k] = $v['message'];
			}else{
				if($v['rule'] == 'notEmpty'){
					if(empty($data->$k)){
						$errors[$k] = $v['message'];
					}
				}elseif($v['rule'] == 'equal'){
					if($data->$k != $data->$v['a']){
						$errors[$k] = $v['message'];
					}
				}elseif($v['rule'] == 'size'){
					if(strlen($data->$k) < $v['size']){
						$errors[$k] = $v['message'];
					}
				}elseif(!preg_match('/^'.$v['rule'].'$/',$data->$k)){
					$errors[$k] = $v['message'];
				}
			}
		}
		$this->errors = $errors;
		if(isset($this->Form)){
			$this->Form->errors = $errors;
		}
		if(empty($errors)){
			return true;
		}
		return false;
	}	

	function validates_login($data){
		$errors = array();
		foreach($this->validate_login as $k=>$v){
			if(!isset($data->$k)){
				$errors[$k] = $v['message'];
			}else{
				if($v['rule'] == 'notEmpty'){
					if(empty($data->$k)){
						$errors[$k] = $v['message'];
					}
				}elseif($v['rule'] == 'equal'){
					if($data->$k != $data->$v['a']){
						$errors[$k] = $v['message'];
					}
				}elseif($v['rule'] == 'size'){
					if(strlen($data->$k) < $v['size']){
						$errors[$k] = $v['message'];
					}
				}elseif(!preg_match('/^'.$v['rule'].'$/',$data->$k)){
					$errors[$k] = $v['message'];
				}
			}
		}
		$this->errors = $errors;
		if(isset($this->Form)){
			$this->Form->errors = $errors;
		}
		if(empty($errors)){
			return true;
		}
		return false;
	}

	
}