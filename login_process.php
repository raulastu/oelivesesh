<?php
	$userName = $_POST['username'];
	$password = $_POST['password'];
	include_once 'data/DAOLogin.php';
	if(DAOLogin_login($userName,$password)){
		session_start();
		$_SESSION['user']=$userName;
		header("Location: index.php");
	}else{
		header("Location: login.php");
	}
?>