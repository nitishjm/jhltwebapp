<?php
	session_start();
	include 'check_login/check_login.php';
	include 'connect.php';
		
	$event_name = mysqli_real_escape_string($db_found, $_POST['event_name']);
	$event_desc = mysqli_real_escape_string($db_found, $_POST['event_desc']);
	$coordinator = mysqli_real_escape_string($db_found, $_POST['coordinated']);
	$hours = mysqli_real_escape_string($db_found, $_POST['hours']);
	$minutes = mysqli_real_escape_string($db_found, $_POST['minutes']);
	$date = mysqli_real_escape_string($db_found, $_POST['date']);
	$student_id = mysqli_real_escape_string($db_found, $_SESSION['student_id']);
	$entry_id = mysqli_real_escape_string($db_found, $_GET['entry_id']);

	if($db_found) {
		if($_SESSION['ID'] == 0){
			$SQL = "UPDATE tbl_log SET event='".$event_name."', description='".$event_desc."', hours='".$hours."', minutes='".$minutes."', coordinator='".$coordinator."', date='".$date."'
					WHERE student_id='".$_SESSION['searched_id']."' AND entry_id='".$entry_id."'";
		}else{
			$SQL = "UPDATE tbl_log SET event='".$event_name."', description='".$event_desc."', hours='".$hours."', minutes='".$minutes."', coordinator='".$coordinator."', date='".$date."'
					WHERE student_id='".$student_id."' AND entry_id='".$entry_id."'";
		}
			
		$result = mysqli_query($db_found, $SQL);
		
		if($result){
			print "success";	
		}
		else{
			print "failure";
		}
	}
?>