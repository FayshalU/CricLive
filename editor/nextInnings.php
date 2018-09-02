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

    if($id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        
        
        $sql3= "UPDATE `play` SET innings=2 WHERE match_id='".$id."'";
        
        //echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        $sql2= "UPDATE `batting` SET player1='0/0', player2='0/0', batsman1='player1', batsman2='player2' WHERE id='".$id."_2'";
        
        //echo $sql2;

        if(mysqli_query($conn, $sql2))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        $bowler1 = null;
        $bowler2 = null;
        
        $sql= "SELECT * from bowling where id='".$id."_1'";
        
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result))
        {
            $bowler1 = $row['bowler1'];
            $bowler2 = $row['bowler2'];
            
        }
        
        $sql4= "UPDATE `bowling` SET ".$bowler1."='0.0-0-0', ".$bowler2."='0.0-0-0' WHERE id='".$id."_1'";
        
        echo $sql4;

        if(mysqli_query($conn, $sql4))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        header('location: updateScore.php?id='.$id);
        
    }

    

?>

