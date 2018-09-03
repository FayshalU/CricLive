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

    $run = $_GET['run'];
//    $player = $_GET['player'];
//    $country = $_GET['country'];
    $id = $_GET['id'];

    if($run != "" && $id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $sql2= "SELECT * from batting where id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $score = 0;
        $extra = 0;
        $over1 = null;
        $playerNum = null;
        $playerScore = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            
            $score = $row2['score'];
            $extra = $row2['extra'];
            $playerNum = $row2['batsman1'];
            $over1 = explode('.', $row2['over']);
            $playerScore = explode('/', $row2[$playerNum]);
            
        }
        
        $playerR = intval($playerScore[0]);
        $playerBall = intval($playerScore[1]);
        //echo $playerScore[0];
        $playerBall++;
        
        
        $score = $score + intval($run);
        $extra = $extra + intval($run);

        $over2 = intval($over1[1]);
        $over = intval($over1[0]);
        $over2++;
        if($over2>5){
            $over++;
            $over2=0;
        }
        
        
        $sql3= "UPDATE `batting` SET ".$playerNum."='".$playerR."/".$playerBall."', `score`=".$score.",`extra`=".$extra.",`over`='".$over.".".$over2."' WHERE id='".$id."'";
        
        //echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        echo $score;
        
    }

    

?>

