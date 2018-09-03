<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>
    
<body>
        <table  width="100%" border="1">
            <tr>
                <th><h2>Live Matches</h2></th>
            </tr>

            <?php
                $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                $sql= "SELECT * FROM `play` where `status`='live'";

                $result = mysqli_query($conn, $sql);
                //echo mysqli_num_rows($result);
                //$i = 0;
                while($row = mysqli_fetch_assoc($result)){ 

                    $innings = $row['innings'];

                    $str1 = 'getAPI.php?id='.$row['match_id'];
                    $str2 = $row['team1'];
                    $str3 = $row['team2'];

                    $score1 = null;
                    $score2 = null;

                    $sql1= "SELECT * FROM `batting` where `id`='".$row['match_id']."_1'";
                    $result1 = mysqli_query($conn, $sql1);
                    //echo mysqli_num_rows($result);

                    while($row1 = mysqli_fetch_assoc($result1)){

                        $score1 = $row1['score']."/".$row1['wicket'];
                    }

                    $sql2= "SELECT * FROM `batting` where `id`='".$row['match_id']."_2'";
                    $result2 = mysqli_query($conn, $sql2);
                    //echo mysqli_num_rows($result);

                    while($row2 = mysqli_fetch_assoc($result2)){

                        $score2 = $row2['score']."/".$row2['wicket'];
                    }

                    if($innings == 2){

                        $need = $score1-$score2;
                        $wicket = 10 - $row2['wicket'];
                ?>        

                        <tr> <td>
                        <a href='<?=$str1?>'><center><h3><?=$str2."vs".$str3?></h3></center></a>
                        <center><p style="font-size:15px;"><?=$str2?> <?=$score1?> &nbsp &nbsp &nbsp &nbsp &nbsp <?=$str3?> <?=$score2?></p></center>
                            <center><p style="font-size:15px;"><?=$str3?> need <?=$need?> run to win with <?=$wicket?> wickets remaining</p></center>

                            <br><br>

                        </td> </tr>

               <?php

                    continue;

                    }

            ?>

                <tr> <td>
                    <a href='<?=$str1?>'><center><h3><?=$str2."vs".$str3?></h3></center></a>
                    <center><p style="font-size:15px;"><?=$str2?> <?=$score1?> &nbsp &nbsp &nbsp &nbsp &nbsp <?=$score2?> <?=$str3?></p></center>

                        <br><br>

                    </td> </tr>
                <?php

                    //echo $row['text'];
                    //$i++;
                }

                mysqli_close($conn);

            ?>

        </table>
</body>
    
</html>

