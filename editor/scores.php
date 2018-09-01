<?php
	session_start();
	error_reporting(0);

//	if(!isset($_SESSION['log']))
//    {
//        header("location: ../login.html");
//	}else{
//        
//        $value = null;
//        $count = 10;
//        $conn = null;
//        
//    }
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
    <table width="100%" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    <br/>
    <table width="100%">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="1">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="#">Timeline</a></li>
                                <li><a href="myTeam.php"> My Team</a></li>
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
                <table  width="100%" border="1">
                    <tr>
                        <th><h2>Live Matches</h2></th>
                    </tr>
                    
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                        $sql= "SELECT * FROM `play` where `status`='live'";

                        $result = mysqli_query($conn, $sql);
                        //echo mysqli_num_rows($result);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){ 
                            
                            $str1 = 'updateScore.php?id='.$row['match_id'];
                            $str2 = $row['team1'];
                            $str3 = $row['team2'];
                            
                            
                    ?>
                            
                        <tr> <td>
                            <a href='<?=$str1?>'><center><h3><?=$str2."vs".$str3?></h3></center></a>
                            

                                <br><br>
                            
                            </td> </tr>
                        <?php
                                
                            //echo $row['text'];
                            $i++;
                        }
                        
                        mysqli_close($conn);
                    
                    ?>
                    
                </table>
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
