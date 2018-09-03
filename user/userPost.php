<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
        
	}else{
        
        $id = $_GET['id'];
        if($id == ""){
            header("location: user.php");
        }
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
    
    <table id="mainframe"width="100%" height="640px">
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
                <table  width="100%" border="1">
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                        $sql= "SELECT * FROM `post` where post_id='".$id."'";

                        $result = mysqli_query($conn, $sql);
                        //echo mysqli_num_rows($result);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){ 
                            
                            $str = 'editorProfile.php?id='. $row['user_id'];
                            
                            $sql2= "SELECT * from `editor` where id='".$row['user_id']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            $name=null;
                            while($row2 = mysqli_fetch_assoc($result2))
                            {
                                $name = $row2['name'];
                            }
                            
                            $comment = null;
                            
                            $sql5= "SELECT * from `comment` where post_id='".$id."'";
                            $result5 = mysqli_query($conn, $sql5);
                            $comment = mysqli_num_rows($result5);
                            
                            //echo $name;
                            echo "<tr> <td>";
                            
                    ?>
                            
                        
                            <center><h3><?=$row['headline']?></h3></center>
                            <a href='<?=$str?>' > <?=$name?> </a>
                            <span>(<?=$row['date']?>)</span>
                              <p>
                                <?=$row['text']?>
                              </p>

                            <a href="#" >Share</a>
                            <p style="text-align: right;">Comments(<?=$comment?>)</p>

                            <input size="123" type="text" placeholder="Type a comment" name="comment" id="comment">
                            <input type="button" value="Comment" onclick="commentbtn()">
                            
                            <br><br>
                            
                            
                            <?php 
                                
                                $sql3= "SELECT * FROM `comment` where `post_id`='".$id."' ORDER BY `date`";

                                $result3 = mysqli_query($conn, $sql3);
                                //echo mysqli_num_rows($result);
                                while($row3 = mysqli_fetch_assoc($result3)){ 

                                    $str2 = 'userProfile.php?id='. $row3['user_id'];

                                    $sql4= "SELECT * from `user` where id='".$row3['user_id']."'";
                                    $result4 = mysqli_query($conn, $sql4);
                                    $name2=null;
                                    while($row4 = mysqli_fetch_assoc($result4))
                                    {
                                        $name2 = $row4['name'];
                                    }
                                
                            ?>
                            
                            <div>
                              <span>
                                <a href='<?=$str2?>' > <?=$name2?> </a>
                                <span>(<?=$row3['date']?>)</span>
                              </span><br>
                                
                              <?=$row3['text']?>
                              
                            </div>
                            <br/><br/>
                            
                        <?php
                                }
                            echo "</td> </tr>";
                            //echo $row['text'];
                            $i++;
                        }
                        
                        mysqli_close($conn);
                    
                    ?>
                </table>
            </td>
        </tr>
    </table>
    
    <?php include 'footer.php';?>
    
    <script>
        function commentbtn(){
            console.log("inside");
            var data = document.getElementById('comment');
            if(data.value != ""){
                window.location = "addComment.php?p_id="+<?php echo json_encode($_GET['id']); ?> + "&cmt="+data.value;
            }
        }
    </script>
    
</body>
</html>
