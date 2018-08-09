
<?php
	session_start();
	error_reporting(0);

	if(isset($_SESSION['log']))
    {
        header("location: user.php");
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
            <td width="10%"><a href="index.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="login.php"><center>Sign In</center></a></td>
            <td width="10%"><a href="register.php"><center>Sign Up</center></a></td>
            
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
                                <li><a href="index.php">Timeline</a></li>
                                <li><a href="#"> Current Polls</a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%">
                <table  width="100%" border="1">
                    <center><p style="font-size:25px;color:green;">New Polls</p></center>
                    <tr>
                        <td>
                            
                            <form method="post" action="#">
                                <center><p style="font-size:20px;">Who will win today's match?</p></center>
                                <input type="submit" name="poll1" value="Bangladesh" style="height:30px;width:48%">
                                <input type="submit" name="poll2" value="Australia" style="height:30px;width:50%">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <form method="post" action="#">
                                <center><p style="font-size:20px;">Who will win today's match?</p></center>
                                <input type="submit" name="poll1" value="Bangladesh" style="height:30px;width:48%">
                                <input type="submit" name="poll2" value="Australia" style="height:30px;width:50%">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <form method="post" action="#">
                                <center><p style="font-size:20px;">Who will win today's match?</p></center>
                                <input type="submit" name="poll1" value="Bangladesh" style="height:30px;width:48%">
                                <input type="submit" name="poll2" value="Australia" style="height:30px;width:50%">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td><center><p style="font-size:25px;color:green;">Poll Results</p></center></td>
                    </tr>
                    <tr>
                        <td>
                            
                            <form method="post" action="#">
                                <center><p style="font-size:20px;">Who will win today's match?</p></center>
                                <input type="submit" name="poll1" value="Bangladesh" style="height:30px;width:48%">
                                <input type="submit" name="poll2" value="Australia" style="height:30px;width:50%">
                            </form>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            
                            <form method="post" action="#">
                                <center><p style="font-size:20px;">Who will win today's match?</p></center>
                                <input type="submit" name="poll1" value="Bangladesh" style="height:30px;width:48%">
                                <input type="submit" name="poll2" value="Australia" style="height:30px;width:50%">
                            </form>
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
