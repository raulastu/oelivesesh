<?php
session_start();
$user = $_SESSION['user'];

$when = $_GET['when'];
// $when = "_1_12";

$a = explode("_", substr($when, 1));
$dayNumber = $a[0];
$hourNumber = $a[1];

$firstMon = strtotime("mon jan ".date("Y"));
$firstMonday = date('z',$firstMon);
$today = date("z");
$weekNumber=(int)(((int)$today-(int)$firstMonday)/7);

include_once 'DAOScheduler.php';
DAOScheduler_insertSchedule($weekNumber,$dayNumber,$hourNumber,$user);
include_once 'data.php';
?>