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
        
        
        
        $sql3= "UPDATE `play` SET status='finish' WHERE match_id='".$id."'";
        
        echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        $sql2= "SELECT * from batting where id='".$id."_1'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $player1 = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            for($i=1; $i<12; $i++){
                
                $temp = intval(explode('/', $row2['player'.$i])[0]);
                
                if($temp >= 100){
                    $player1[$i-1] = 100;
                }
                else if($temp >= 50){
                    $player1[$i-1] = 50;
                }
                else if($temp >= 30){
                    $player1[$i-1] = 30;
                }
                else if($temp >= 20){
                    $player1[$i-1] = 20;
                }
                else{
                    $player1[$i-1] = 0;
                }
                
                
                //echo $player.$i
            }
        }
        
        //print_r($player1);
        
        $sql2= "SELECT * from batting where id='".$id."_2'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $player2 = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            for($i=1; $i<12; $i++){
                
                $temp = intval(explode('/', $row2['player'.$i])[0]);
                
                if($temp >= 100){
                    $player2[$i-1] = 100;
                }
                else if($temp >= 50){
                    $player2[$i-1] = 50;
                }
                else if($temp >= 30){
                    $player2[$i-1] = 30;
                }
                else if($temp >= 20){
                    $player2[$i-1] = 20;
                }
                else{
                    $player2[$i-1] = 0;
                }
                
                
                //echo $player.$i
            }
        }
        
        //print_r($player2);
        
        $sql2= "SELECT * from bowling where id='".$id."_1'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $bowler1 = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            for($i=1; $i<12; $i++){
                
                $temp = intval(explode('-', $row2['player'.$i])[2]);
                
                $bowler1[$i-1] = $temp*30;
                
                
                //echo $player.$i
            }
        }
        
        //print_r($bowler1);
        
        $sql2= "SELECT * from bowling where id='".$id."_2'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $bowler2 = null;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            for($i=1; $i<12; $i++){
                
                $temp = intval(explode('-', $row2['player'.$i])[2]);
                
                $bowler2[$i-1] = $temp*30;
                
                
                //echo $player.$i
            }
        }
        
        //print_r($bowler2);
        
        $team1 = null;
        $team2 = null;
        
        $sql2= "SELECT * from play where match_id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);

        while($row2 = mysqli_fetch_assoc($result2))
        {
            $team1 = $row2['team1'];
            $team2 = $row2['team2'];
        }
        
        
        $sql2= "SELECT * from country where team_id='".$team1."'";
        
        $result2 = mysqli_query($conn, $sql2);

        while($row2 = mysqli_fetch_assoc($result2))
        {
            
            for($i=1; $i<12; $i++){
            
                $name = $row2['player'.$i];
                
                $player = null;
            
                //$sql3= "SELECT * from `player info` where name like '%".$name."%'";
                $sql3= "SELECT * from `player info` where name='".$name."'";
        
                $result3 = mysqli_query($conn, $sql3);

                while($row3 = mysqli_fetch_assoc($result3))
                {
                    $player = $row3['player_id'];
                    //echo $row3['player_id'];
                }
                
//                echo $name;
                //echo $player."<br>";
                
                $sql4= "SELECT * from `team` where match_id='".$id."'";
        
                $result4 = mysqli_query($conn, $sql4);

                while($row4 = mysqli_fetch_assoc($result4))
                {
                    for($x=1; $x<5; $x++){
                        if($row4['player'.$x] == $player){
                            
                            //echo $row4['player'.$x].'<br>';
                            
                            $user = $row4['user_id'];
                            
                            $sql5= "SELECT * from `rank` where user_id='".$user."'";
        
                            $result5 = mysqli_query($conn, $sql5);
                            
                            $points = 0;

                            while($row5 = mysqli_fetch_assoc($result5))
                            {
                                $points = intval($row5['points']);
                            }
                            
                            $points = $points + $player1[$i-1] + $bowler1[$i-1];
                            
                            $sql6= "UPDATE `rank` SET points=".$points." WHERE user_id='".$user."'";
        
                            //echo $sql;

                            if(mysqli_query($conn, $sql6))
                            {
                                //echo "Inserted";
                            }
                            else{
                                //echo "Not Registered";
                                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                        }
                    }
                }
            
            }
        }
        
        
        $sql2= "SELECT * from country where team_id='".$team2."'";
        
        $result2 = mysqli_query($conn, $sql2);

        while($row2 = mysqli_fetch_assoc($result2))
        {
            
            for($i=1; $i<12; $i++){
            
                $name = $row2['player'.$i];
                
                $player = null;
            
                //$sql3= "SELECT * from `player info` where name like '%".$name."%'";
                $sql3= "SELECT * from `player info` where name='".$name."'";
        
                $result3 = mysqli_query($conn, $sql3);

                while($row3 = mysqli_fetch_assoc($result3))
                {
                    $player = $row3['player_id'];
                    //echo $row3['player_id'];
                }
                
//                echo $name;
//                echo $player."<br>";
                
                $sql4= "SELECT * from `team` where match_id='".$id."'";
        
                $result4 = mysqli_query($conn, $sql4);

                while($row4 = mysqli_fetch_assoc($result4))
                {
                    
                    for($x=1; $x<5; $x++){
                        
                        //echo $row4['player'.$x].'<br>';
                        if($row4['player'.$x] == $player){
                            
                            //echo $row4['user_id'].'<br>';
                            
                            $user = $row4['user_id'];
                            
                            $sql5= "SELECT * from `rank` where user_id='".$user."'";
        
                            $result5 = mysqli_query($conn, $sql5);
                            
                            $points = 0;

                            while($row5 = mysqli_fetch_assoc($result5))
                            {
                                $points = intval($row5['points']);
                            }
                            
                            $points = $points + $player2[$i-1] + $bowler2[$i-1];
                            
                            //echo $bowler2[$i-1];
                            
                            $sql6= "UPDATE `rank` SET points=".$points." WHERE user_id='".$user."'";
        
                            //echo $sql;

                            if(mysqli_query($conn, $sql6))
                            {
                                //echo "Inserted";
                            }
                            else{
                                //echo "Not Registered";
                                //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                            
                        }
                    }
                }
            
            }
        }
        
        
        
        
        
        header('location: scores.php');
        
    }

    

?>

