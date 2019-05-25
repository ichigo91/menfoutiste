<?php
class Request{

	public $url;	// URL appellé par l'utilisateur
	public $page = 1;
	public $prefix = false;
	public $data = false;
	public $role = -1;
	public $classe = -1;
	public $solo = -1;
	public $group = -1;
	public $name = "";
	public $user = -1;

	function __construct(){
		$this->url = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO']:'/';
		if(isset($_GET['page'])){
			if(is_numeric($_GET['page'])){
				if($_GET['page'] > 0){
					$this->page = round($_GET['page']);
				}
			}
		}
		if(isset($_GET['classe'])){
			if(is_numeric($_GET['classe'])){
				if($_GET['classe'] >= 0){
					$this->classe = round($_GET['classe']);
				}
			}
		}
		if(isset($_GET['role'])){
			if(is_numeric($_GET['role'])){
				if($_GET['role'] >= 0){
					$this->role = round($_GET['role']);
				}
			}
		}
		if(isset($_GET['solo'])){
			if(is_numeric($_GET['solo'])){
				if($_GET['solo'] >= 0){
					$this->solo = round($_GET['solo']);
				}
			}
		}
		if(isset($_GET['group'])){
			if(is_numeric($_GET['group'])){
				if($_GET['group'] >= 0){
					$this->group = round($_GET['group']);
				}
			}
		}
		if(isset($_GET['user'])){
			if(is_numeric($_GET['user'])){
				if($_GET['user'] >= 0){
					$this->user = round($_GET['user']);
				}
			}
		}
		if(isset($_GET['name'])){
			if(is_string(($_GET['name']))){
				$this->name = $_GET['name'];
			}
		}
		if(!empty($_POST)){
			$this->data = new stdClass();
			foreach($_POST as $k=>$v){
				$this->data->$k=$v;
			}
		}
	}


}
?>