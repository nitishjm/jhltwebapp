<?php
	include 'connect.php';
		
	$email = mysqli_real_escape_string($db_found, $_POST['email']);
	$pword = mysqli_real_escape_string($db_found, $_POST['pword']);

	if($db_found) {
		
		$SQL = "SELECT * FROM tbl_users WHERE email='" . $email . "'";
		$query = mysqli_query($db_found, $SQL);	
		
		if($query){
			
			$row = mysqli_fetch_assoc($query); 
			
			if($row > 0){
				
				$pass_hashed = $row['password'];
			
				if(password_verify($pword, $pass_hashed)){		
					session_start();
					$_SESSION['fname'] = $row['firstname'];
					$_SESSION['lname'] = $row['lastname'];
					$_SESSION['ID'] = $row['ID'];
					$_SESSION['student_id'] = $row['student_id'];
					$_SESSION['isLoggedIn'] = true;
					$_SESSION['email'] = $row['email'];
					print "success";
				}else{
					print("Sorry, that password is incorrect");
				}
			}else{
				print("Sorry, that email is incorrect");
			}
		}else{
			print("Sorry, could not connect to database");
		}
	}
?>