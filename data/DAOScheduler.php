<?php
function DAOScheduler_insertSchedule($weekNumber, $dayNumber, $hourNumber, $who){
	include_once'DBUtils.php';
	$mysqli = getMySQLi();
	$query = "SELECT username from schedules WHERE week_number=$weekNumber AND day_number=$dayNumber AND hour_number=$hourNumber";
	$result = $mysqli->query($query);
	if($obj = $result->fetch_object()){
		//delete or not
		return;
		// echo $obj->username;
		if($obj->username==$who){
			$query = "DELETE FROM schedules WHERE week_number=? AND day_number=? AND hour_number=?";
			$stmt = $mysqli->prepare($query);
			$stmt->bind_param("iii", $weekNumber, $dayNumber, $hourNumber);
			$stmt->execute();
			$stmt->close();
		}
	}else{
		$query = "INSERT INTO schedules(week_number, day_number, hour_number, username) VALUES (?,?,?,?)";
		$stmt = $mysqli->prepare($query);
		$stmt->bind_param("iiis", $weekNumber, $dayNumber, $hourNumber,$who);
		$stmt->execute();
		$stmt->close();
	}
	$result->close();
	$mysqli->close();
}


function DAOScheduler_getSchedules($weekNumber){
	include_once'DBUtils.php';
	$mysqli = getMySQLi();

	$query = "SELECT day_number, hour_number, username FROM schedules WHERE week_number = ".$weekNumber;
	$result = $mysqli->query($query);


	while ($row = $result->fetch_array()){
        $user_arr[] = $row;
    }

	
	$result->close();
	$mysqli->close();
	return $user_arr;
}


?>