<?php
	if(!isset($_SESSION['isLoggedIn']) || $_SESSION['isLoggedIn'] != true || $_SESSION['ID'] != 0){
		header('Location: database/check_login/unlogged_admin.php');
	}
?>