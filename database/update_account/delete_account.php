<?php

	session_start();
	include '../check_login/check_login.php';
	include '../connect.php';
	
	$current_pass = mysqli_real_escape_string($db_found, $_POST['current_pass']);

	if($db_found){
		
		$SQL = "SELECT password FROM tbl_users WHERE ID='" . $_SESSION['ID'] . "'";
		$result = mysqli_query($db_found, $SQL);
			
		if($result){
				
			$row = mysqli_fetch_assoc($result); 
			$pass_hashed = $row['password'];
		
			if(password_verify($current_pass, $pass_hashed)){
					
					$SQL = "DELETE FROM tbl_users WHERE ID='" . $_SESSION['ID'] . "'";
					$result = mysqli_query($db_found, $SQL);
					
					print "success";
					
			}else{
				print "That is not your current password! Please try again.";
			}
		}
	}else{
		print "Could not connect to database";
	}	
		
?>