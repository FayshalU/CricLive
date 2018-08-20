<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'getInfo.php';
    }

    
    $serial = $_GET['id'];
    $balance = 0;

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

    $sql2 = "SELECT * FROM `team` where user_id='".$_SESSION['id']."'";
    //echo $sql2."<br>";

    $result2 = mysqli_query($conn, $sql2);
    
    $id=null;

    while($row2 = mysqli_fetch_assoc($result2)){
        
        $id = $row2[$serial];
        $balance = $row2['balance'];

    }

    $sql = "SELECT * FROM `player info` where player_id='".$id."'";
    //echo $sql."<br>";
    $result = mysqli_query($conn, $sql);
    
    $price = 0;

    while($row = mysqli_fetch_assoc($result)){
        
        $rating = $row['rating'];
        
        $price = $rating*1000;
        

    }
    //echo $price;
    $balance += $price;

    $sql3 = "UPDATE `team` SET ".$serial."='' ,balance=".$balance." WHERE user_id='".$_SESSION['id']."'";
                        
    echo $sql3;

    if(mysqli_query($conn, $sql3)){
        header('location: modify.php');
    }
    else{
        echo "Not inserted";
    }
    
    
    

?>

