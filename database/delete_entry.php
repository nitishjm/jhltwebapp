<?php
	session_start();
	include 'check_login/check_login.php';
	include 'connect.php';

	$entry_id = $_GET['entry_id'];

	if($db_found) {

		$SQL = "DELETE FROM tbl_log WHERE entry_id='".$entry_id."'";	
		$result = mysqli_query($db_found, $SQL);
		
		if($result){
			header("Location: ../my_log.php");	
		}
		else{
			print "failure";
		}
	}
?>