<?php
include 'databaseconnection.php';

    if(isset($_COOKIE['abc'])) {
    	echo "";
	}else{
		header("location: login.php");
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