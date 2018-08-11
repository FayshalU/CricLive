<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: login.html");
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
            <td width="10%" style="color:green;"><a href="#"><center>Live Score</center></a></td>
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
                                <li><a href="user.php">Timeline</a></li>
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
            <td width="75%">
                <table  width="100%" border="1">
                    <tr>
                        <td><center><p style="font-size:25px;color:green;">Live</p></center></td>
                    </tr>
                    <tr>
                        <td>
                            
                            <center><p style="font-size:20px;">BAN vs AUS</p></center>
                            <center><p style="font-size:15px;">BAN 320/6 &nbsp &nbsp &nbsp &nbsp &nbsp AUS 170/5</p></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <center><p style="font-size:20px;">BAN vs AUS</p></center>
                            <center><p style="font-size:15px;">BAN 320/6 &nbsp &nbsp &nbsp &nbsp &nbsp AUS 170/5</p></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <center><p style="font-size:20px;">BAN vs AUS</p></center>
                            <center><p style="font-size:15px;">BAN 320/6 &nbsp &nbsp &nbsp &nbsp &nbsp AUS 170/5</p></center>
                        </td>
                    </tr>
                    <tr>
                        <td><center><p style="font-size:25px;color:blue;">Results</p></center></td>
                    </tr>
                    <tr>
                        <td>
                            
                            <center><p style="font-size:20px;">BAN vs AUS</p></center>
                            <center><p style="font-size:15px;">BAN 365/8 &nbsp &nbsp &nbsp &nbsp &nbsp AUS 280/10</p></center>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <center><p style="font-size:20px;">BAN vs AUS</p></center>
                            <center><p style="font-size:15px;">BAN 365/8 &nbsp &nbsp &nbsp &nbsp &nbsp AUS 280/10</p></center>
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