<?php
function DAOLogin_login($user, $password){
	include_once'DBUtils.php';
	$mysqli = getMySQLi();

	$query = "SELECT username FROM users WHERE username = ? AND password = ?";
	$stmt = $mysqli->prepare($query);
	$stmt->bind_param("ss", $user, $password);
	$stmt->execute();

	$loggedIn=false;
	$stmt->bind_result($name);

	if($stmt->fetch()){
		$stmt->close();
		$mysqli->close();
		return $name;
	}else{
		$stmt->close();
		$mysqli->close();
		return false;
	}
}

?>