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
    <table width="100%"id="headerstyle" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
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
                                <li><a href="admin.php">Timeline</a></li>
                               <br> <li><a href="AddEditor.php"> Add Editor</a></li>
                                <li><a href="vieweditor.php"> View Editor</a></li>
                                <li><a href="viewuser.php"> View User </a></li>
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
                        //$i = 0;
                        while($row = mysqli_fetch_assoc($result)){ 
                            
                            $innings = $row['innings'];
                            
                            $str1 = 'matches.php?id='.$row['match_id'];
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
            </td>
        </tr>
    </table>
   
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
