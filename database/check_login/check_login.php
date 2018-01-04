<?php
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true){
		header('Location: database/check_login/unlogged_user.php');
	}
?>