<?php

   session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';

        echo 'inside';
	
	$id = $_GET['id'];
		$conn = DBconnection();
		$sql= "delete from post where post_id=".$id;
		echo $sql;
		
		if(mysqli_query($conn, $sql)){
			header("location: editor.php");
		}else{
			header("location: editor.php?error=true");
		}
		mysqli_close($conn);
        
    }


?>