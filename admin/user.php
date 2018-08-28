<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        
        $value = null;
        $count = 10;
        $conn = null;
        
    }
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
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                        $sql= "SELECT * FROM `post` ORDER BY `date` DESC";

                        $result = mysqli_query($conn, $sql);
                        //echo mysqli_num_rows($result);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){ 
                            
                            $str = 'editorProfile.php?id='. $row['user_id'];
                            $str3 = 'userPost.php?id='. $row['post_id'];
                            
                            $sql2= "SELECT * from `editor` where id='".$row['user_id']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $name=null;
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $name = $row2['name'];
                            }
                            
                            $comment = null;
                            
                            $sql5= "SELECT * from `comment` where post_id='".$row['post_id']."'";
                            $result5 = mysqli_query($conn, $sql5);
                            $comment = mysqli_num_rows($result5);
                            
                            //echo $name;
                            
                    ?>
                            
                        <tr> <td>
                            <a href='<?=$str3?>'><center><h3><?=$row['headline']?></h3></center></a>
                            <a href='<?=$str?>' > <?=$name?> </a>
                            <span>(<?=$row['date']?>)</span>
                              <p>
                                <?=$row['text']?>
                              </p>

                            <a href='<?=$str3?>' ><p style="text-align: right;">Comments(<?=$comment?>)</p></a>

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
