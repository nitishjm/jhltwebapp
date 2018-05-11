<?php
	include 'connect.php';
	
	$email = mysqli_real_escape_string($db_found, $_POST['email']);
	
	$SQL = "SELECT firstname, email FROM tbl_users WHERE email='".$email."'";
	$result = mysqli_query($db_found, $SQL);
	
	if(mysqli_num_rows($result) == 0){
		echo "Sorry, that email does not exist";
	}else{
		$row = mysqli_fetch_assoc($result);
		
		$encrypt = md5($row['email']);
		$time = time();
		
		$to = $email;
		$subject = "Reset password";
		
		$message = "<h2>Hi ".$row['firstname'].",</h2>";
		$message .= "<p>We got a request to reset your password for your JHLT account. Click <a href='localhost/JHLT2/reset_password.php?encrypt=".$encrypt."&time=".$time."'>here</a> to reset it now.</p>";
		$message .= "<p>This link will expire in 15 minutes. If you ignore this message, your password wont be changed.</p>";
		
		$header = "From: JHLT\r\n";
		$header .= "MIME-Version: 1.0\r\n";
		$header .= "Content-type: text/html; charset=iso-8859-1\r\n";
		
		$send = mail($to, $subject, $message, $header);
		
		if($send){
			echo "success";
		}else{
			echo "Sorry there was an error";
		}
	}
		
	
?>