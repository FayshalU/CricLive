<?php
    session_start();
    error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
    }else{
        include 'getInfo.php';
    }

    
    $id = $_GET['id'];
    

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');


    $sql3 = "DELETE FROM `user` WHERE id='".$id."'";
                        
    echo $sql3;

    if(mysqli_query($conn, $sql3)){
        //header('location: viewuser.php);
    }
    else{
        echo "Not inserted";
    }

    $sql3 = "DELETE FROM `rank` WHERE user_id='".$id."'";
                        
    echo $sql3;

    if(mysqli_query($conn, $sql3)){
        //header('location: viewuser.php);
    }
    else{
        echo "Not inserted";
    }

    $sql3 = "DELETE FROM `login` WHERE id='".$id."'";
                        
    echo $sql3;

    if(mysqli_query($conn, $sql3)){
        header('location: viewuser.php');
    }
    else{
        echo "Not inserted";
    }
    
    
    

?>

