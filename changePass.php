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
                                <li><a href="profile.php">My info</a></li>
                                <li><a href="changeInfo.php"> Change Info </a></li>
                                <li><a href="#"> Change Password</a></li>
                                <li><a href="changePic.php"> Change Picture </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="15%"></td>
            <td width="50%">
                <fieldset>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <br/>
                
                <table width="100%" cellpadding="0" cellspacing="0">
                    
                    <tr>
                        <td>Current Password</td>
                        <td>:</td>
                        <td><input type="password" placeholder="Current Password" name="cpass" minlength="4" required/>
                            <?php  
                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {
                                    if($_POST['cpass'] == "" || strlen($_POST['cpass']) <4)
                                    {
                                        echo '<i style="color:red;font-size:15px;font-family:calibri ;">* This is required(4 char min)</i> ';
                                        $isValid=false;
                                        $pass=null;
                                    }
                                    else
                                    {
                                        $pass=$_POST['cpass'];
                                    }
                                }
                            ?>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                    <td>New Password</td>
                        <td>:</td>
                        <td><input type="password" placeholder="New Password" name="npass" minlength="4" required/>
                            <?php  
                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {
                                    if($_POST['npass'] == "" || strlen($_POST['npass']) <4)
                                    {
                                        echo '<i style="color:red;font-size:15px;font-family:calibri ;">* This is required(4 char min)</i> ';
                                        $isValid=false;
                                        $pass=null;
                                    }
                                    else
                                    {
                                        $pass=$_POST['npass'];
                                    }
                                }
                            ?>
                        </td>
                        <td></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>

                    <tr>
                        <td>Confirm Password</td>
                        <td>:</td>
                        <td><input type="password" placeholder="Retype Password" name="rpass" minlength="4" required/>
                            <?php  
                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {
                                    if($_POST['rpass'] !== $pass)
                                    {
                                        echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Password does not match</i> ';
                                        $isValid=false;
                                    }

                                }
                            ?>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>

                </table>
                    
                <input type="submit" value="Confirm">
            </form>
                    
            <?php
                if($isValid && $_SERVER['REQUEST_METHOD'] == 'POST')
                {

                    $myfile = fopen("user.txt", "a");
                    $data = $_POST['name']. "|". $_POST['user']. "|". $_POST['email']."|". $_POST['password']."|". $_POST['country']."|". $_POST['date']."\r\n";
                    fwrite($myfile, $data);   
                    fclose($myfile);

                    echo '<i style="color:green;font-size:20px;font-family:calibri ;">Update Complete</i>';

                }
              ?>
                    
            </fieldset>
            </td>
            <td width="15%"></td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
</body>
</html>
