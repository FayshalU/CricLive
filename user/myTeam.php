<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'getInfo.php';
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
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
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
                                <li><a href="#">View Team</a></li>
                                <li><a href="modify.php">Change Team</a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%">
                <table  width="100%" border="1">
                    <tr>
                        <td>
                            <div>
                              <center><h3>My Squad</h3></center>
                            </div>
                              <table width="100%">
                                <?php
                                     
                                    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                                    $sql = "SELECT * FROM team where user_id='".$_SESSION['id']."'";

                                    $result = mysqli_query($conn, $sql);

                                    while($row = mysqli_fetch_assoc($result)){

                                        if(($row['player1'] == "") || ($row['player2'] == "") || ($row['player3'] == "") || ($row['player4'] == "") || ($row['player5'] == "") || ($row['player6'] == "") || ($row['player7'] == "") || ($row['player8'] == "") || ($row['player9'] == "") || ($row['player10'] == "") || ($row['player11'] == "")){
                                ?>
                                                <tr>
                                                    <td>
                                                        <center><h4>Create a team first</h4></center>
                                                    </td>
                                                </tr>
                                <?php
                                        }
                                        else{
                                ?>
                                                <thead>
                                                    <tr>
                                                        <th><center>Name</center></th>
                                                        <th><center>Country</center></th>
                                                        <th><center>Type</center></th>
                                                        <th><center>Rating</center></th>
                                                    </tr>
                                                </thead>
                                    <?php
                                            
                                                //$conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                                                $sql= "SELECT * FROM `team` WHERE user_id='".$_SESSION['id']."'";

                                                $result = mysqli_query($conn, $sql);
                                                //echo mysqli_num_rows($result);
                                                
                                                while($row = mysqli_fetch_assoc($result)){ 
                                                    
                                                    $i = 1;
                                                    
                                                    while($i<12){
                                                        
                                                        $sql2= "SELECT * FROM `player info` WHERE player_id='".$row['player'.$i]."'";

                                                        $result2 = mysqli_query($conn, $sql2);
                                                        //echo mysqli_num_rows($result);

                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                            
                                    ?>
                                                            
                                                            <tr>
                                                                <td><center> <?=$row2['name']?> </center></td>
                                                                <td><center> <?=$row2['country']?> </center></td>
                                                                <td><center> <?=$row2['category']?> </center></td>
                                                                <td><center> <?=$row2['rating']?> </center></td>
                                                                
                                                            </tr>
                                                
                                            <?php                
                                                        }
                                                        
                                                        $i++;
                                                        
                                                    }
                                                    
                                                }
                                                
                                  
                                        }

                                    }
                                     
                                    mysqli_close($conn);
                                  
                                ?>
                                
                                
                          </table>
                        </td>
                    </tr>
                   
                </table>
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
</body>
</html>
