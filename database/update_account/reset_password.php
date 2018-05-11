<?php

	include '../connect.php';
	
	$id = $_GET['user_id'];
	
	if($id == ""){
		header("Location: ../../index.php");
	}

	if($db_found){
		
		$new_pass = password_hash(mysqli_real_escape_string($db_found, $_POST['new_pass']), PASSWORD_DEFAULT);

		$SQL = "UPDATE tbl_users SET password='" . $new_pass . "' WHERE ID=' hello" . $id . "';";
		
		$result = mysqli_query($db_found, $SQL);
		
		if($result){
			print "success";
			
		}else{
			print "failure";
		}
	}else{
		print "Could not connect to database";
	}
?>