<?php
function getMySQLi(){
	$mysqli = new mysqli("localhost", "root", "root", "oelivesesh");
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	return $mysqli;
}
function DAOLogin_login($user, $password){
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