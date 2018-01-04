<?php
	session_start();
	include 'connect.php';
		
	$event_name = mysqli_real_escape_string($db_found, $_POST['event_name']);
	$event_desc = mysqli_real_escape_string($db_found, $_POST['event_desc']);
	$coordinator = $_POST['coordinated'];
	$hours = mysqli_real_escape_string($db_found, $_POST['hours']);
	$minutes = mysqli_real_escape_string($db_found, $_POST['minutes']);
	$date = $_POST['date'];
	$student_id = $_SESSION['student_id'];

	if($db_found) {
		$SQL = "INSERT INTO tbl_log (student_id, event, description, hours, minutes, coordinator, date) 
				VALUES ('$student_id', '$event_name', '$event_desc', '$hours', '$minutes', '$coordinator', '$date')";
			
		$result = mysqli_query($db_found, $SQL);
		
		if($result){
			print "success";	
		}
		else{
			print "failure";
		}
	}
?>