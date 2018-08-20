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

    $sql = "SELECT * FROM `player info` where player_id='".$id."'";

    $result = mysqli_query($conn, $sql);
    
    $price = 0;

    while($row = mysqli_fetch_assoc($result)){
        
        $id = $row['player_id'];
        
        $rating = $row['rating'];
        $price = $rating*1000;
        

    }
    
    $sql2 = "SELECT * FROM `team` where user_id='".$_SESSION['id']."'";

    $result2 = mysqli_query($conn, $sql2);
    
    $balance = 0;

    while($row1 = mysqli_fetch_assoc($result2)){
        
        if($row1['player1'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player2'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player3'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player4'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player5'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player6'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player7'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player8'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row['player9'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player10'] == $id){
            header('location: modify.php?err=a');
        }
        else if($row1['player11'] == $id){
            header('location: modify.php?err=a');
        }
        else{
            $balance = $row1['balance'];
            
            if($balance < $price){
                header('location: modify.php?err=b');
            }
            else{
                $balance -= $price;
                
                $i = 1;
                //echo $row1['player1'];
                $inserted = false;
                
                while($i<12 ){
                    
                    echo "Inside";
                    
                    $player = (string)('player'.$i);
                    
                    
                    
                    if($row1[$player] == ""){
                        $sql3 = "UPDATE `team` SET player".$i."='".$id."',balance=".$balance." WHERE user_id='".$_SESSION['id']."'";
                        
                        echo $sql3;
                        
                        if(mysqli_query($conn, $sql3)){
                            header('location: modify.php');
                            $inserted = true;
                        }
                        else{
                            echo "Not inserted";
                        }
                        break;
                    }
                    
                    $i++;
                }
                if($inserted == false){
                    header('location: modify.php?err=c');
                }
                
            }
            
        }
        

    }

    
    
    

?>

