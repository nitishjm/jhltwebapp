<?php
	
	include 'connect.php';
	include 'check_login/check_login.php';
	
	$SQL = "SELECT * FROM tbl_log WHERE entry_id='". $entry_id ."'";
	$result = mysqli_query($db_found, $SQL);
	$row = mysqli_fetch_assoc($result);
	
	$edit = $_GET["edit"];
	$entry_id = $_GET["entry_id"];
	
	if($edit){
		$event = $_GET["event"];
		$description = $_GET["description"];
		$hours = $_GET["hours"];
		$minutes = $_GET["minutes"];
		$coordinated = $_GET["coordinated"];
		$date = $_GET["date"];
		$entry_id = $_GET["entry_id"];
	}else{
		header("Location: my_log.php");
	}
	
?>
