<?php

	require 'connect.php';
	
	$email = mysqli_real_escape_string($db_found, $_POST['email']);
	$fname = mysqli_real_escape_string($db_found, $_POST['fname']);
	$lname = mysqli_real_escape_string($db_found, $_POST['lname']);
	$student_id = mysqli_real_escape_string($db_found, $_POST['student_id']);
	$grade = mysqli_real_escape_string($db_found, $_POST['grade']);
	$pword = mysqli_real_escape_string($db_found, $_POST['pword']);
	
	$SQL = "SELECT * FROM tbl_users WHERE email='" . $email . "'";
	$query = mysqli_query($db_found, $SQL);	
	$row = mysqli_fetch_assoc($query);
	
	if($db_found){
		if($row != null){
			print("That email has already been registered!");
		}else{
			$SQL = "SELECT * FROM tbl_users WHERE student_id='" . $student_id . "'";
			$query = mysqli_query($db_found, $SQL);	
			$row = mysqli_fetch_assoc($query);
			
			if($row != null){
				print("That student number has already been registered!");
			}else{
				
				$pword = password_hash($_POST['pword'], PASSWORD_DEFAULT);
				$SQL = "INSERT INTO tbl_users (firstname, lastname, grade, password, email, student_id) 
						VALUES ('$fname', '$lname', '$grade', '$pword', '$email', '$student_id');";
				$query = mysqli_query($db_found, $SQL);
				
				if($query){
					print("success");	
				}
				else{
					print("Sorry, could not insert data into database");
				}
			}
		}
	}else{
		print("Could not connect to database!");
	}		
?>