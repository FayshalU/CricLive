<?php

    error_reporting(0);

    $matchId = $_GET['id'];
    if($matchId == ""){
        header('location: api.php');
    }

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
    $sql= "SELECT * FROM `play` where `match_id`='".$matchId."'";

    $result = mysqli_query($conn, $sql);
    //echo mysqli_num_rows($result);
    
    $innings = 0;
    $team1 = null;
    $team2 = null;

    while($row = mysqli_fetch_assoc($result)){
        
        $innings = $row['innings'];
        $team1 = $row['team1'];
        $team2 = $row['team2'];
        
    }

    $bat = null;
    $ball1 = null;
    $t1 = null;
    $t2 = null;
    
    if($innings == 1){
        $bat = $matchId.'_1';
        $ball1 = $matchId.'_2';
        $t1 = $team1;
        $t2 = $team2;
    }
    else{
        $bat = $matchId.'_2';
        $ball1 = $matchId.'_1';
        $t2 = $team1;
        $t1 = $team2;
    }

    
    $sql= "SELECT * FROM `batting` where `id`='".$bat."'";

    $result = mysqli_query($conn, $sql);
    //echo mysqli_num_rows($result);

    $run = 0;
    $wicket = 0;
    $extra = 0;
    $over = null;
    
    $batsman1 = null;
    $batsman2 = null;
    $score1 = null;
    $score2 = null;

    while($row = mysqli_fetch_assoc($result)){

        $run = $row['score'];
        $wicket = $row['wicket'];
        $exrta = $row['extra'];
        $over = $row['over'];
        
        $playerNum1 = $row['batsman1'];
        $playerNum2 = $row['batsman2'];
        
        $score1 = $row[$playerNum1];
        $score2 = $row[$playerNum1];
        
        $sql1= "SELECT * FROM `country` where `team_id`='".$t1."'";

        $result1 = mysqli_query($conn, $sql1);
        //echo mysqli_num_rows($result);



        while($row1 = mysqli_fetch_assoc($result1)){

            $batsman1 = $row1[$playerNum1];
            $batsman2 = $row1[$playerNum2];

        }

    }
    
    $sql= "SELECT * FROM `bowling` where `id`='".$ball1."'";

    $result = mysqli_query($conn, $sql);
    //echo mysqli_num_rows($result);

    
    $bowler1 = null;
    $bowler2 = null;
    $data1 = null;
    $data2 = null;
    
    //echo $sql;

    while($row = mysqli_fetch_assoc($result)){

        
        $bowler1 = $row['bowler1'];
        $bowler2 = $row['bowler2'];
        
        $data1 = $row[$bowler1];
        $data2 = $row[$bowler1];
        
        $sql1= "SELECT * FROM `country` where `team_id`='".$t2."'";

        $result1 = mysqli_query($conn, $sql1);
        //echo mysqli_num_rows($result);



        while($row1 = mysqli_fetch_assoc($result1)){

            $bowler1 = $row1[$playerNum1];
            $bowler2 = $row1[$playerNum2];

        }

    }

?>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>
<body>
<pre style="word-wrap: break-word; white-space: pre-wrap;">
    {
      "team1": <?=$team1?>,
      "team2": <?=$team2?>,
      "score": <?=$run?>,
      "wicket": <?=$wicket?>,
      "extra": <?=$extra?>,
      "over": <?=$over?>,
      "batsman1": <?=$batsman1?>,
      "batsman1Score": <?=$score1?>,
      "batsman2": <?=$batsman2?>,
      "batsman2Score": <?=$score2?>,
      "bowler1": <?=$bowler1?>,
      "bowler1Stat": <?=$data1?>,
      "bowler2": <?=$bowler2?>,
      "bowler2Stat": <?=$data2?>

    }
</pre>
</body>
</html>