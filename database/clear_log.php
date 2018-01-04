<?php
	session_start();
	include 'check_login/check_login.php';
	include 'connect.php';
	
	$SQL = "DELETE FROM tbl_log WHERE student_id='". $_SESSION['student_id'] ."'";
	$result = mysqli_query($db_found, $SQL);
	
	if($result){
		header("Location: ../my_log.php");
	}
	

?>