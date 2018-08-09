<?php
	
	session_start();
	session_destroy();

    setcookie('rem', '', time()-100, '/');
    setcookie('log', '', time()-100, '/');

	header("location: login.php");
?>