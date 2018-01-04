<?php

	session_start();
	include '../check_login/check_login.php';
	include '../connect.php';
	
	$student_number = mysqli_real_escape_string($db_found, $_POST['student_number']);

	if($db_found){
		
		if($student_number == $_SESSION['student_id']){
			
			print "Nothing to update";
			
		}else{
			$SQL = "UPDATE tbl_users SET student_id='".$student_number."'
					WHERE ID='".$_SESSION['ID']."';";
		
			$result = mysqli_query($db_found, $SQL);
			
			if($result){
				
				$SQL = "SELECT student_id FROM tbl_users WHERE ID='".$_SESSION['ID']."'";
				$result = mysqli_query($db_found, $SQL);
					
				if($result){
					$row = mysqli_fetch_assoc($result); 
					$_SESSION['student_id'] = $row['student_id'];
					print "success";	
				}
				else{
					print "failure1";
				}
			}else{
				print "failure2";
			}
		}
	}else{	
		print "Could not find database";
	}
?>