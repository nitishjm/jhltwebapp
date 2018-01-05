<?php
	if($_SESSION['ID'] == 0){
		print("<a class='nav-item nav-link' href='find_log.php'>Find log</a>");
		print("<a class='nav-item nav-link' href='my_account.php'>My Account</a>");
		print("<a class='nav-item nav-link' href='database/log_out.php'>Log out</a>");
	}else{
		print("<a class='nav-item nav-link' href='new_entry.php'>New entry</a>");
		print("<a class='nav-item nav-link' href='my_log.php'>View Hours</a>");
		print("<a class='nav-item nav-link' href='my_account.php'>My Account</a>");
		print("<a class='nav-item nav-link' href='database/log_out.php'>Log out</a>");
	}
?>