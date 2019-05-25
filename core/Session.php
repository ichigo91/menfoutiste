<?php
class Session{

	public function __construct(){
		if(!isset($_SESSION)){
			session_start();
		}
	}

	public function setFlash($message,$type = 'success',$affichage = 1){
		$_SESSION['flash'] = array(
			'message' => $message,
			'type' => $type,
			'affichage' => $affichage
			);
	}

	public function flash(){
		if(isset($_SESSION['flash']['message'])){
			$html = '<div class="alert alert-'.$_SESSION['flash']['type'].'" role="alert"><button type="button" class="close" data-dismiss="alert">&times;</button>'.$_SESSION['flash']['message'].'</div>';	
			return $html;
		}
	}

	public function delFlash(){
		if(isset($_SESSION['flash']['message'])){
			if($_SESSION['flash']['affichage'] == 1){
				$_SESSION['flash'] = array();
			}else{
				$_SESSION['flash']['affichage']--;
			}
		}
	}

	public function write($key,$value){
		$_SESSION[$key] = $value;
	}

	public function read($key = null){
		if($key){
			if(isset($_SESSION[$key])){
				return $_SESSION[$key];
			}else{
				return false;
			}
		}else{
			return $_SESSION;
		}
	}

	public function isLogged(){
		return isset($_SESSION['User']->rang);
	}

	public function user($key){
		if($this->read('User')){
			if(isset($this->read('User')->$key)){
				return $this->read('User')->$key;
			}else{
				return false;
			}
		}
		return false;
	}
}
?>