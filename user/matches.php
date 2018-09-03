<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        
        //$value = null;
        //$count = 10;
        $conn = null;
        
    }

    $matchId = $_GET['id'];

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
    
    
    
    if($innings == 1){
        
    }

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="../js/lib/jquery-3.3.1.js"></script>
</head>
<body>
    <table width="100%" id="headerstyle" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
  
    <table id="mainframe"width="100%"height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="user.php">Timeline</a></li>
                               <br> <li><a href="myTeam.php"> My Team</a></li>
                                <li><a href="ranking.php"> My Ranking</a></li>
                                <li><a href="poll.php"> Current Polls </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%" valign="top">
                
                <input type="button" value="Live" onclick="livebtn()">
                
                <div id="live">
                    
            <?php
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
                    //echo $t2;
               ?>     
                    <h2>Batting</h2>
                        <table>
                            <tr>
                                <th>Batsman</th>
                                <th>Run</th>
                                <th>Ball</th>
                                <th>S/R</th>
                            </tr>
                    <?php
                            
                            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                            $sql= "SELECT * FROM `batting` where `id`='".$bat."'";

                            $result = mysqli_query($conn, $sql);
                            //echo mysqli_num_rows($result);



                            while($row = mysqli_fetch_assoc($result)){

                                $name = null;
                                $ball = 0;
                                $run = 0;
                                $SR = 0;
                                $playerNum = null;

                                for($i=1; $i<3; $i++){

                                    $playerNum = $row['batsman'.$i];
                                    $data = explode('/', $row[$playerNum]);
                                    $run = intval($data[0]);
                                    $ball = intval($data[1]);
                                    
                                    if($run == 0){
                                        $SR = 0;
                                    }
                                    else{
                                        $SR = round(($run/$ball) * 100,2);
                                    }
                                    


                                    $sql1= "SELECT * FROM `country` where `team_id`='".$t1."'";

                                    $result1 = mysqli_query($conn, $sql1);
                                    //echo mysqli_num_rows($result);



                                    while($row1 = mysqli_fetch_assoc($result1)){

                                        $name = $row1[$playerNum];

                                    }

                                    if($row['player'.$i] == ""){

                                        echo '<tr>
                                                <td>'.$name.'</td>
                                                <td colspan="3">Did not bat</td>

                                            </tr>';
                                        continue;
                                    }

                              ?>      


                                    <tr>
                                        <td><?=$name?></td>
                                        <td><?=$run?></td>
                                        <td><?=$ball?></td>
                                        <td ><?=$SR?></td>
                                    </tr>


                              <?php      
                                }



                            }


                    ?>

                        </table>

                        <h2>Bowling</h2>

                        <table>
                            <tr>
                                <th>Bowler</th>
                                <th>Over</th>
                                <th>Run</th>
                                <th>Wicket</th>
                                <th>Economy</th>
                            </tr>
                    <?php


                            $sql= "SELECT * FROM `bowling` where `id`='".$ball1."'";

                            $result = mysqli_query($conn, $sql);
                            //echo mysqli_num_rows($result);

                            //echo $ball1;

                            while($row = mysqli_fetch_assoc($result)){

                                $name = null;
                                $over = null;
                                $ball = 0;
                                $run = 0;
                                $wicket = 0;
                                $econ = 0;
                                $playerNum = null;

                                for($i=1; $i<3; $i++){

                                    $playerNum = $row['bowler'.$i];
                                    $data = explode('-', $row[$playerNum]);
                                    $run = intval($data[1]);
                                    $wicket = intval($data[2]);
                                    $over = $data[0];
                                    $over1 =  floatval( $over);

                                    if($over1 == 0){
                                        $econ = 0;
                                    }
                                    else{
                                        $econ = round(($run/$over1),2);
                                    }

                                    //echo $playerNum;
                                    $sql1= "SELECT * FROM `country` where `team_id`='".$t2."'";

                                    $result1 = mysqli_query($conn, $sql1);
                                    //echo mysqli_num_rows($result);



                                    while($row1 = mysqli_fetch_assoc($result1)){

                                        $name = $row1[$playerNum];

                                    }

//                                    if($row['player'.$i] == ""){
//
//    //                                    echo '<tr>
//    //                                            <td>'.$name.'</td>
//    //                                            <td colspan="3">Did not bat</td>
//    //                                            
//    //                                        </tr>';
//                                        continue;
//                                    }

                              ?>      


                                    <tr>
                                        <td><?=$name?></td>
                                        <td><?=$over?></td>
                                        <td><?=$run?></td>
                                        <td ><?=$wicket?></td>
                                        <td ><?=$econ?></td>
                                    </tr>


                              <?php      
                                }



                            }


                    ?>

                        </table>
                    
            
                    
                </div>
                
                <br>
                <br>
                
                <input type="button" value="Scorecard" onclick="scorecardbtn()">
                
                <br>
                <br>
                
                <div id="scorecard">
                    
                    <input type="button" id="<?=$team1?>" value="<?=$team1?> Innings" onclick="first()">
                    <div id="div1">
                        <h2>Batting</h2>
                        <table>
                            <tr>
                                <th>Batsman</th>
                                <th></th>
                                <th>Run</th>
                                <th>Ball</th>
                                <th>S/R</th>
                            </tr>
                    <?php

                            $batting = $matchId.'_1';
                            $bowling = $matchId.'_2';

                            $sql= "SELECT * FROM `batting` where `id`='".$batting."'";

                            $result = mysqli_query($conn, $sql);
                            //echo mysqli_num_rows($result);



                            while($row = mysqli_fetch_assoc($result)){

                                $name = null;
                                $ball = 0;
                                $run = 0;
                                $SR = 0;

                                for($i=1; $i<12; $i++){


                                    $data = explode('/', $row['player'.$i]);
                                    $run = intval($data[0]);
                                    $ball = intval($data[1]);
                                    
                                    if($run == 0){
                                        $SR = 0;
                                    }
                                    else{
                                        $SR = round(($run/$ball) * 100,2);
                                    }


                                    $sql1= "SELECT * FROM `country` where `team_id`='".$team1."'";

                                    $result1 = mysqli_query($conn, $sql1);
                                    //echo mysqli_num_rows($result);



                                    while($row1 = mysqli_fetch_assoc($result1)){

                                        $name = $row1['player'.$i];

                                    }

                                    if($row['player'.$i] == ""){

                                        echo '<tr>
                                                <td>'.$name.'</td>
                                                <td colspan="3">Did not bat</td>

                                            </tr>';
                                        continue;
                                    }
                                    
                                    $wicketName = null;
                                    
                                    $sql2= "SELECT * FROM `wicket` where `id`='".$batting."'";

                                    $result2 = mysqli_query($conn, $sql2);
                                    //echo mysqli_num_rows($result);



                                    while($row2 = mysqli_fetch_assoc($result2)){

                                        $wicketName = $row2['player'.$i];

                                    }
                                    
                                    if($wicketName == ""){
                                        
                                        $wicketName = 'Not out';
                                        
                                    }
                                    
                                    

                              ?>      


                                    <tr>
                                        <td><?=$name?></td>
                                        <td><?=$wicketName?></td>
                                        <td><?=$run?></td>
                                        <td><?=$ball?></td>
                                        <td ><?=$SR?></td>
                                    </tr>


                              <?php      
                                }



                            }


                    ?>

                        </table>

                        <h2>Bowling</h2>

                        <table>
                            <tr>
                                <th>Bowler</th>
                                <th>Over</th>
                                <th>Run</th>
                                <th>Wicket</th>
                                <th>Economy</th>
                            </tr>
                    <?php

                            $batting = $matchId.'_1';
                            $bowling = $matchId.'_2';

                            $sql= "SELECT * FROM `bowling` where `id`='".$bowling."'";

                            $result = mysqli_query($conn, $sql);
                            //echo mysqli_num_rows($result);



                            while($row = mysqli_fetch_assoc($result)){

                                $name = null;
                                $over = null;
                                $ball = 0;
                                $run = 0;
                                $wicket = 0;
                                $econ = 0;

                                for($i=1; $i<12; $i++){


                                    $data = explode('-', $row['player'.$i]);
                                    $run = intval($data[1]);
                                    $wicket = intval($data[2]);
                                    $over = $data[0];
                                    $over1 =  floatval( $over);

                                    if($over1 == 0){
                                        $econ = 0;
                                    }
                                    else{
                                        $econ = round(($run/$over1),2);
                                    }


                                    $sql1= "SELECT * FROM `country` where `team_id`='".$team2."'";

                                    $result1 = mysqli_query($conn, $sql1);
                                    //echo mysqli_num_rows($result);



                                    while($row1 = mysqli_fetch_assoc($result1)){

                                        $name = $row1['player'.$i];

                                    }

                                    if($row['player'.$i] == ""){

    //                                    echo '<tr>
    //                                            <td>'.$name.'</td>
    //                                            <td colspan="3">Did not bat</td>
    //                                            
    //                                        </tr>';
                                        continue;
                                    }

                              ?>      


                                    <tr>
                                        <td><?=$name?></td>
                                        <td><?=$over?></td>
                                        <td><?=$run?></td>
                                        <td ><?=$wicket?></td>
                                        <td ><?=$econ?></td>
                                    </tr>


                              <?php      
                                }



                            }


                    ?>

                        </table>

                    </div>
                    <br>
                    <br>
                    <input type="button" id="<?=$team2?>" value="<?=$team2?> Innings" onclick="second()">
                    <div id="div2">

                        <h2>Batting</h2>
                        <table>
                            <tr>
                                <th>Batsman</th>
                                <th></th>
                                <th>Run</th>
                                <th>Ball</th>
                                <th>S/R</th>
                            </tr>
                    <?php

                            $batt = $matchId.'_2';
                            $bowl = $matchId.'_1';

//                           $temp = $team1;
//                           $team1 = $team2;
//                           $team2 = $temp;

                            $sql= "SELECT * FROM `batting` where `id`='".$batt."'";

                            $result = mysqli_query($conn, $sql);
                            //echo mysqli_num_rows($result);



                            while($row = mysqli_fetch_assoc($result)){

                                $name = null;
                                $ball = 0;
                                $run = 0;
                                $SR = 0;

                                for($i=1; $i<12; $i++){


                                    $data = explode('/', $row['player'.$i]);
                                    $run = intval($data[0]);
                                    $ball = intval($data[1]);
                                    
                                    if($run == 0){
                                        $SR = 0;
                                    }
                                    else{
                                        $SR = round(($run/$ball) * 100,2);
                                    }


                                    $sql1= "SELECT * FROM `country` where `team_id`='".$team2."'";

                                    $result1 = mysqli_query($conn, $sql1);
                                    //echo mysqli_num_rows($result);



                                    while($row1 = mysqli_fetch_assoc($result1)){

                                        $name = $row1['player'.$i];

                                    }

                                    if($row['player'.$i] == ""){

                                        echo '<tr>
                                                <td>'.$name.'</td>
                                                <td colspan="3">Did not bat</td>

                                            </tr>';
                                        continue;
                                    }
                                    
                                    $wicketName = null;
                                    
                                    $sql2= "SELECT * FROM `wicket` where `id`='".$batt."'";

                                    $result2 = mysqli_query($conn, $sql2);
                                    //echo mysqli_num_rows($result);



                                    while($row2 = mysqli_fetch_assoc($result2)){

                                        $wicketName = $row2['player'.$i];

                                    }
                                    
                                    if($wicketName == ""){
                                        
                                        $wicketName = 'Not out';
                                        
                                    }

                              ?>      


                                    <tr>
                                        <td><?=$name?></td>
                                        <td><?=$wicketName?></td>
                                        <td><?=$run?></td>
                                        <td><?=$ball?></td>
                                        <td ><?=$SR?></td>
                                    </tr>


                              <?php      
                                }



                            }


                    ?>

                        </table>

                        <h2>Bowling</h2>

                        <table>
                            <tr>
                                <th>Bowler</th>
                                <th>Over</th>
                                <th>Run</th>
                                <th>Wicket</th>
                                <th>Economy</th>
                            </tr>
                    <?php

//                            $batting = $matchId.'_2';
//                            $bowling = $matchId.'_1';

                            $sql= "SELECT * FROM `bowling` where `id`='".$bowl."'";

                            $result = mysqli_query($conn, $sql);
                            //echo mysqli_num_rows($result);



                            while($row = mysqli_fetch_assoc($result)){

                                $name = null;
                                $over = null;
                                $ball = 0;
                                $run = 0;
                                $wicket = 0;
                                $econ = 0;

                                for($i=1; $i<12; $i++){


                                    $data = explode('-', $row['player'.$i]);
                                    $run = intval($data[1]);
                                    $wicket = intval($data[2]);
                                    $over = $data[0];
                                    $over1 =  floatval( $over);

                                    if($over1 == 0){
                                        $econ = 0;
                                    }
                                    else{
                                        $econ = round(($run/$over1),2);
                                    }


                                    $sql1= "SELECT * FROM `country` where `team_id`='".$team1."'";

                                    $result1 = mysqli_query($conn, $sql1);
                                    //echo mysqli_num_rows($result);



                                    while($row1 = mysqli_fetch_assoc($result1)){

                                        $name = $row1['player'.$i];

                                    }

                                    if($row['player'.$i] == ""){

    //                                    echo '<tr>
    //                                            <td>'.$name.'</td>
    //                                            <td colspan="3">Did not bat</td>
    //                                            
    //                                        </tr>';
                                        continue;
                                    }

                              ?>      


                                    <tr>
                                        <td><?=$name?></td>
                                        <td><?=$over?></td>
                                        <td><?=$run?></td>
                                        <td ><?=$wicket?></td>
                                        <td ><?=$econ?></td>
                                    </tr>


                              <?php      
                                }



                            }


                    ?>

                        </table>

                    </div>
                    
                </div>
                
                
            </td>
        </tr>
    </table>
   
    <?php include 'footer.php';?>
    
    <script>
        
        var myVar = null;
        
        $(document).ready(function(){
            
            myVar = setInterval(myTimer, 3000);
            

           $("#div2").hide();
            $("#scorecard").hide();

        });
        
        function myTimer(){
        
            console.log("ABC");
            
            //window.clearInterval(myVar);
            
            
            
            $.get("getLive.php?id=<?=$matchId?>&in=<?=$innings?>&t1=<?=$team1?>&t2=<?=$team2?>", function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                if(status == "success"){
                    $("#live").html(data);
                }
            });
            
            $.get("getDiv.php?bat=<?=$batting?>&ball=<?=$bowling?>&t1=<?=$team1?>&t2=<?=$team2?>", function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                if(status == "success"){
                    $("#div1").html(data);
                }
            });
            
            $.get("getDiv.php?bat=<?=$batt?>&ball=<?=$bowl?>&t1=<?=$team2?>&t2=<?=$team1?>", function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                if(status == "success"){
                    $("#div2").html(data);
                }
            });
            
            
                      
                
            
        }
        
        function first(){
            if($("#div1").is(":visible")){
                $("#div1").hide();
            }
            else{
                $("#div1").show();
            }
        }
        
        function second(){
            if($("#div2").is(":visible")){
                $("#div2").hide();
            }
            else{
                $("#div2").show();
            }
        }
        
        function livebtn(){
            
            $("#live").show();
            $("#scorecard").hide();
            
        }
        
        function scorecardbtn(){
            
            $("#scorecard").show();
            $("#live").hide();
            
        }
        
    </script>
    
</body>
</html>
