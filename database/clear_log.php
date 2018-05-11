<?php
	session_start();
	include 'check_login/check_login.php';
	include 'connect.php';
	
	if($_SESSION['ID'] == 0){
		$SQL = "DELETE FROM tbl_log WHERE student_id='". $_SESSION['searched_id'] ."'";
		$result = mysqli_query($db_found, $SQL);
		header("Location: ../found_log.php?student_number=".$_SESSION['searched_id']);
	}else{
		$SQL = "DELETE FROM tbl_log WHERE student_id='". $_SESSION['student_id'] ."'";
		$result = mysqli_query($db_found, $SQL);
		header("Location: ../my_log.php");
	}
?>