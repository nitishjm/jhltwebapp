<?php

	session_start();
	include '../check_login/check_login.php';
	include '../connect.php';
	
	$email = mysqli_real_escape_string($db_found, $_POST['email']);

	if($db_found){
		
		if($email == $_SESSION['email']){
			
			print "Nothing to update";
			
		}else{
			$SQL = "UPDATE tbl_users SET email='".$email."'
					WHERE ID='".$_SESSION['ID']."'";
		
			$result = mysqli_query($db_found, $SQL);
			
			if($result){
				
				$SQL = "SELECT email FROM tbl_users WHERE ID='".$_SESSION['ID']."'";
				$result = mysqli_query($db_found, $SQL);
					
				if($result){
					$row = mysqli_fetch_assoc($result); 
					$_SESSION['email'] = $row['email'];
					print "success";	
				}
				else{
					print "failure";
				}
			}
		}
	}else{	
		print "Could not find database";
	}
?>