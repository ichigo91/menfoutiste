<?php
class Profil extends Model{
	var $validate = array(
		'password' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez mettre votre ancien mot de passe'
			),
		'password_new' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez mettre un nouveau mot de passe'
			),
		'password_new_conf' => array(
			'rule' => 'notEmpty',
			'message' => 'Vous devez confirmer votre nouveau mot de passe'
			),
		'password_new_conf' => array(
			'rule' => 'equal',
			'with' => 'password_new',
			'message' => 'Les deux mot de passes doivent être identiques'
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
					if($data->$k != $data->$v['with']){
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