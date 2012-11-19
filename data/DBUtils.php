<?php
function getMySQLi(){
	$mysqli = new mysqli("localhost", "root", "root", "oelivesesh");
	if (mysqli_connect_errno()) {
	    printf("Connect failed: %s\n", mysqli_connect_error());
	    exit();
	}
	return $mysqli;
}
?>