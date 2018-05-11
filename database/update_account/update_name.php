<?php

	session_start();
	include '../check_login/check_login.php';
	include '../connect.php';
	
	$fname = mysqli_real_escape_string($db_found, $_POST['fname']);
	$lname = mysqli_real_escape_string($db_found, $_POST['lname']);

	if($db_found){
		
		if($fname == $_SESSION['fname'] && $lname == $_SESSION['lname']){
			
			print "Nothing to update";
			
		}else{
			$SQL = "UPDATE tbl_users SET firstname='".$fname."', lastname='".$lname."'
					WHERE ID='".$_SESSION['ID']."'";
		
			$result = mysqli_query($db_found, $SQL);
			
			if($result){
				
				$SQL = "SELECT firstname, lastname FROM tbl_users WHERE ID='".mysqli_real_escape_string($db_found, $_SESSION['ID'])."'";
				$result = mysqli_query($db_found, $SQL);
					
				if($result){
					$row = mysqli_fetch_assoc($result); 
					$_SESSION['fname'] = $row['firstname'];
					$_SESSION['lname'] = $row['lastname'];
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