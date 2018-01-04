<?php
	define('USER_NAME', 'root');
	define('DB_NAME', 'localhost');
	define('DB_PASS', '');
	
	$database = "jhltapp";
	$db_found = new mysqli(DB_NAME, USER_NAME, DB_PASS, $database);
?>