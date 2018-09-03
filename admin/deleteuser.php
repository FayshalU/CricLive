<?php
    
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
		$sql= "delete from user where id=".$id;
		
		if(mysqli_query($conn, $sql)){
		header("location: viewuser.php?error=userdone");
		}else{
		header("location: viewuser.php?error=userblock");
		}
	
		$sql= "delete from login where id=".$id;
		
		if(mysqli_query($conn, $sql)){
			header("location: viewuser.php");
		}else{
			header("location: viewuser.php?error=true");
		}
		mysqli_close($conn);
?>