<?php

	session_start();
	include '../check_login/check_login.php';
	include '../connect.php';
	
	$old_pass = mysqli_real_escape_string($db_found, $_POST['old_pass']);
	$new_pass = mysqli_real_escape_string($db_found, $_POST['new_pass']);
	$confirm_pass = mysqli_real_escape_string($db_found, $_POST['confirm_pass']);

	if($db_found){
		
		if($old_pass == $new_pass){
			
			print "Nothing to update";
			
		}else{
			$SQL = "SELECT password FROM tbl_users WHERE ID='" . $_SESSION['ID'] . "'";
			$result = mysqli_query($db_found, $SQL);
			
			if($result){
				
				$row = mysqli_fetch_assoc($result); 
				$pass_hashed = $row['password'];
				
				if(password_verify($old_pass, $pass_hashed)){
					
					$update_password = password_hash($new_pass, PASSWORD_DEFAULT);
					
					$SQL = "UPDATE tbl_users SET password='".$update_password."'
							WHERE ID='".$_SESSION['ID']."';";
							
					$result = mysqli_query($db_found, $SQL);
					
					print "success";
					
				}else{
					print "That is not your current password! Please try again.";
				}
			}
		}
	}else{
		print "Could not connect to database";
	}	
?>