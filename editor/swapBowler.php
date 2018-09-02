<?php
	session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }

    //echo "300";

   // $run = $_GET['run'];
//    $player = $_GET['player'];
    //$country = $_GET['country'];
    $id = $_GET['id'];

    if( $id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $playerNum1 = null;
        $playerNum2 = null;

        
        $sql2= "SELECT * from bowling where id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            $playerNum1 = $row2['bowler1'];
            $playerNum2 = $row2['bowler2'];
            
        }
        
        
        $sql3= "UPDATE bowling SET bowler1='".$playerNum2."',bowler2='".$playerNum1."' WHERE id='".$id."'";
        
        //echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        //echo $playerName;
        
    }

    

?>

