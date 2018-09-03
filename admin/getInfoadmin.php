<?php
    session_start();
    error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
    }else{}
    
    $admin = $_SESSION['log'];
    

     $conn = mysqli_connect('localhost', 'root', '', 'criclive');

        
        $sql= "SELECT * from admin where id='".$admin."'";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {

            $_SESSION['id'] = $row['id'];
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
          
            
            
        }
    
        mysqli_close($conn);

?>
