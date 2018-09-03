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
		$sql= "delete from editor where id=".$id;
		
		if(mysqli_query($conn, $sql)){
		
		}else{
		
		}
	
		$sql= "delete from login where id=".$id;
		
		if(mysqli_query($conn, $sql)){
			header("location: vieweditor.php");
		}else{
			header("location: vieweditor.php?error=true");
		}
		mysqli_close($conn);
?>