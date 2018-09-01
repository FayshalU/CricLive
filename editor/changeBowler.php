<?php
	session_start();
	error_reporting(0);

    //echo "300";

   // $run = $_GET['run'];
    $player = $_GET['name'];
    $country = $_GET['country'];
    $id = $_GET['id'];

    if( $id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $playerNum1 = null;
        $playerNum2 = null;

        $sql= "SELECT * from country where team_id='".$country."'";
        
        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result))
        {
            for($i=1; $i<12; $i++){
                if($row['player'.$i] == $player){
                    $playerNum1 = 'player'.$i;
                    break;
                }
            }
            
        }
        
        $sql2= "SELECT * from bowling where id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $score = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            
            $playerNum2 = $row2['bowler1'];
            $score = $row2[$playerNum1];
            
        }
        
        if($score == ""){
            $score = "0.0-0-0";
        }
        
        $sql3= "UPDATE bowling SET ".$playerNum1."='".$score."', bowler1='".$playerNum1."',bowler2='".$playerNum2."' WHERE id='".$id."'";
        
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

