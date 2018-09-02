<?php
include 'databaseconnection.php';

   session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }
	
	$id = $_GET['id'];
		$conn = DBconnection();
		$sql= "delete from post where post_id=".$id;
		
		if(mysqli_query($conn, $sql)){
			header("location: articals.php");
		}else{
			header("location: articals.php?error=true");
		}
		mysqli_close($conn);
?>