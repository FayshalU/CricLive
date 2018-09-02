<?php
	include 'databaseconnection.php';
    setcookie("abc","", time() - 3600,"/");
	setcookie("rem", "", time() - 3600, "/");
	header("location: login.php");
?>