<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{}
    
    $editor = $_SESSION['log'];
    

     $conn = mysqli_connect('localhost', 'root', '', 'criclive');

        
        $sql= "SELECT * from editor where id='".$editor."'";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {

            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['date'] = $row['date'];
            
            
        }
    
        mysqli_close($conn);

?>
