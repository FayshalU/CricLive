<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: login.html");
	}else{}
    
    $user = $_SESSION['log'];
    
    //echo $user;

     $conn = mysqli_connect('localhost', 'root', '', 'criclive');

//        if(!$conn)
//        {
//            echo "DB Error: ".mysqli_connect_error();
//        }
//        else
//        {
//            echo "Success <br/>";
//        }
        
        $sql= "SELECT * from user where id='".$user."'";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            //echo $row['name'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['password'] = $row['password'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['country'] = $row['country'];
            $_SESSION['date'] = $row['date'];
            
            
        }
        
        //echo $_SESSION['name'];

        mysqli_close($conn);

?>
