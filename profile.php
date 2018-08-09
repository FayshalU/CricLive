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
                                <li><a href="#">My info</a></li>
                                <li><a href="changeInfo.php"> Change Info </a></li>
                                <li><a href="changePass.php"> Change Password</a></li>
                                <li><a href="changePic.php"> Change Picture </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="15%"></td>
            <td width="50%">
                <table  width="100%" border="1">
                    <tr>
                        <td colspan="2">
                            <center><p>Faysal Ahmed</p></center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><p>Bangladesh</p></center>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%"><p style="text-align: left;">Current Rank</p></td>
                        <td><p style="text-align: right;">1322</p></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: lest;">Best Rank</p></td>
                        <td><p style="text-align: right;">543</p></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: lest;">Location</p></td>
                        <td><p style="text-align: right;">Dhaka, Bangladesh</p></td>
                    </tr>
                    <tr>
                        <td><p style="text-align: lest;">Date Of Birth</p></td>
                        <td><p style="text-align: right;">21/01/2001</p></td>
                    </tr>
                    
                </table>
            </td>
            <td width="15%"></td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
</body>
</html>
