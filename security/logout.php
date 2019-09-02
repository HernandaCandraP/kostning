<?php  
	session_start();
	session_destroy();
	session_unset();

	setcookie('login', false);

	header("Location: ../security/login.php");
	exit;
?>