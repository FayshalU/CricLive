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
                        <td>
                            <a href="#">Jonathan Burke Jr.</a>
                            <span>7:30 PM today</span>
                              <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore the hate as they create awesome
                                tools to help create filler text for everyone from bacon lovers
                                to Charlie Sheen fans.
                              </p>
                               
                            <a href="#">Like</a>
                            <a href="#" >Share</a>
                            <a href="#"><p style="text-align: right;">Comments(5)</p></a>

                              <input size="140" type="text" placeholder="Type a comment" name="comment"><br><br>
                            <div>
                              <span>
                                Maria Gonzales
                                <span>(8:03 PM Today)</span>
                              </span><br>
                              It is a long established fact that a reader will be distracted
                              by the readable content of a page when looking at its layout.
                              
                            </div>
                        </td>
                    </tr>
                    <br/> <br/>
                    <tr>
                        <td>
                            <a href="#">Jonathan Burke Jr.</a>
                            <span>7:30 PM today</span>
                              <p>
                                Lorem ipsum represents a long-held tradition for designers,
                                typographers and the like. Some people hate it and argue for
                                its demise, but others ignore the hate as they create awesome
                                tools to help create filler text for everyone from bacon lovers
                                to Charlie Sheen fans.
                              </p>
                               
                            <a href="#">Like</a>
                            <a href="#" >Share</a>
                            <a href="#"><p style="text-align: right;">Comments(5)</p></a>

                              <input size="140" type="text" placeholder="Type a comment" name="comment"><br><br>
                            <div>
                              <span>
                                Maria Gonzales
                                <span>(8:03 PM Today)</span>
                              </span><br>
                              It is a long established fact that a reader will be distracted
                              by the readable content of a page when looking at its layout.
                            </div>
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
