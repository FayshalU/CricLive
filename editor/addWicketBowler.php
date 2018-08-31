<?php
	session_start();
	error_reporting(0);

    //echo "300";

    //$run = $_GET['run'];
//    $player = $_GET['player'];
//    $country = $_GET['country'];
    $id = $_GET['id'];

    if($id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $playerNum = null;

//        $sql= "SELECT * from country where team_id='".$country."'";
//        
//        $result = mysqli_query($conn, $sql);
//        
//        
//        
//        while($row = mysqli_fetch_assoc($result))
//        {
//            for($i=1; $i<12; $i++){
//                if($row['player'.$i] == $player){
//                    $playerNum = 'player'.$i;
//                    break;
//                }
//            }
//            
//        }
        
        $sql2= "SELECT * from bowling where id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $score = 0;
        $over1 = null;
        $data = null;
        $wicket = 0;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            $playerNum = $row2['bowler1'];

            $data = explode('-', $row2[$playerNum]);
        }
        
        $score = intval($data[1]);
        $wicket = intval($data[2]);
        $over1 = explode('.', $data[0]);
        //echo $score;
        
        $wicket++;
        $over2 = intval($over1[1]);
        $over = intval($over1[0]);
        $over2++;
        if($over2>5){
            $over++;
            $over2=0;
        }
        
        $temp = $over.".".$over2."-".$score."-".$wicket;
        
        $sql3= "UPDATE `bowling` SET ".$playerNum."='".$temp."' WHERE id='".$id."'";
        
        //echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        echo $temp;
        
    }

    

?>

