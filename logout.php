<?php
session_start();
if(isset($_SESSION['id'])){
	unset($_SESSION['id']);
	unset($_SESSION['login']);
}
session_destroy();
header('Location: /');
?>