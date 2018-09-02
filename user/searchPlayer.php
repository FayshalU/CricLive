<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}

    
    $data = $_GET['txt'];
    $matchId = $_GET['matchId'];

    $team1 = null;
    $team2 = null;
    
    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

    $sql1 = "SELECT * FROM `play` where match_id='".$matchId."'";

    $result1 = mysqli_query($conn, $sql1);

    while($row1 = mysqli_fetch_assoc($result1)){
        
        $team1 = trim(strtolower($row1['team1']));
        $team2 = trim(strtolower($row1['team2']));
        
    }
    

    //$conn = mysqli_connect('localhost', 'root', '', 'criclive');

    $sql = "SELECT * FROM `player info` where name like '%".$data."%'";

    $result = mysqli_query($conn, $sql);
    
    $info = "";

    while($row = mysqli_fetch_assoc($result)){
        
        $country1 = trim($row['country']);
        $country = strtolower($country1);
        
        //echo $team1;
        //echo $country;
        
        //echo strpos($team1, $country);
        //echo strstr($country, $team1);
        
        if ((strstr($country, $team1)) || (strstr($country, $team2))){
            
            $id = $row['player_id'];
            $name = $row['name'];

            $info .= '<div id='.$id.' onclick="view(this)">'.
                        $name
                    .'</div>';
        }
        else{}
        
        
        
    }
    
    if($info == ""){
        echo "No Result";
    }
    else{
        echo $info;    
    }
    

?>

