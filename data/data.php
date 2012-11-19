<?php
	include_once 'DAOScheduler.php';

	$firstMon = strtotime("mon jan ".date("Y"));
	$firstMonday = date('z',$firstMon);
	$today = date("z");
	$weekNumber=(int)(((int)$today-(int)$firstMonday)/7);

	$data = DAOScheduler_getSchedules($weekNumber);
	$json="[";
	$i=0;
	// print_r($data);
	foreach ($data as $key => $value) {
		$when="_".$value['day_number']."_".$value['hour_number'];
		$by = $value['username'];
		if($i++>0)
			$json.=",";
		$json.='{"by":"'.$by.'","when":"'.$when.'"}';
	}
	$json.="]";

	// print_r($data);

	echo $json; 
?>