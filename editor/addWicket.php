<?php
	session_start();
	error_reporting(0);

    //echo "300";

   // $run = $_GET['run'];
//    $player = $_GET['player'];
    $country = $_GET['country'];
    $id = $_GET['id'];

    if($country != "" && $id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $playerNum = null;

        
        $sql2= "SELECT * from batting where id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $wicket = 0;
        $over1 = null;
        $playerScore = null;
        $newPlayer = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            $playerNum = $row2['batsman1'];
            //echo $row2['batsman1'];
            $wicket = $row2['wicket'];
            $over1 = explode('.', $row2['over']);
            $playerScore = explode('/', $row2[$playerNum]);
            
            for($i=1; $i<12; $i++){
                if($row2['player'.$i] == ""){
                    $newPlayer = 'player'.$i;
                    break;
                }
            }
        }
        
        $playerR = intval($playerScore[0]);
        $playerBall = intval($playerScore[1]);
        //echo $newPlayer;
        //$playerR += intval($run);
        $playerBall++;
        
        $wicket++;
        $over2 = intval($over1[1]);
        $over = intval($over1[0]);
        $over2++;
        if($over2>5){
            $over++;
            $over2=0;
        }
        
        $sql3= "UPDATE `batting` SET ".$playerNum."='".$playerR."/".$playerBall."',".$newPlayer."='0/0',`wicket`=".$wicket.",`over`='".$over.".".$over2."', `batsman1`='".$newPlayer."' WHERE id='".$id."'";
        
        //echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        $sql4= "SELECT * from country where team_id='".$country."'";
        
        $result4 = mysqli_query($conn, $sql4);
        
        $playerName = null;
        
        while($row4 = mysqli_fetch_assoc($result4))
        {
            $playerName = $row4[$newPlayer];
            
        }
        
        
        echo $playerName;
        
    }

    

?>

