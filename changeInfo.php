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
                                <li><a href="#"> Change Info </a></li>
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
                <fieldset>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <br/>
                
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Full Name</td>
                        <td>:</td>
                        <td><input name="name" type="text" placeholder="Name" value="<?=$_POST['name']?>" minlength="2" required>
                            <?php  
                                    if($_SERVER['REQUEST_METHOD'] == 'POST')
                                    {
                                        if($_POST['name'] == "" || strlen($_POST['name']) <2 || (strpbrk($_POST['name'] , '1234567890') !== false))
                                        {
                                            echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Name</i> ';
                                            $isValid=false;
                                        }
                                    }
                                ?>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            <input name="email" type="text" placeholder="Email" value="<?=$_POST['email']?>" required>
                            <abbr title="hint: sample@example.com"><b>i</b></abbr>
                            <?php
                                if($_SERVER['REQUEST_METHOD'] == 'POST')
                                {
                                    if($_POST['email'] != "")
                                    {
                                        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                                        {
                                            echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Email</i> ';
                                            $isValid=false;
                                        }
                                    }
                                    else
                                    {
                                        echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Email</i> ';
                                        $isValid=false;
                                    }
                                }
                            ?>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>


                    <tr>
                        <td colspan="3">
                            <fieldset>
                                <legend>Date of Birth</legend>    
                                <input type="text" size="2" name="day" placeholder="DD" value="<?=$_POST['day']?>" required/>/
                                <input type="text" size="2" name="month" placeholder="MM" value="<?=$_POST['month']?>" required/>/
                                <input type="text" size="4" name="year" placeholder="YYYY" value="<?=$_POST['year']?>" required/>
                                <font size="2"><i>(dd/mm/yyyy)</i></font>
                                <?php
                                    if($_SERVER['REQUEST_METHOD'] == 'POST')
                                    {
                                        if( ((int)$_POST['day']<0 || (int)$_POST['day']>31) || ((int)$_POST['month']<1 || (int)$_POST['month']>12) || ((int)$_POST['year']<1900 || (int)$_POST['year']>2016) || !is_numeric($_POST['day']) || !is_numeric($_POST['month']) || !is_numeric($_POST['year']) )
                                        {
                                            echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Date</i> ';
                                            $isValid=false;
                                        }
                                    }
                                ?>
                            </fieldset>
                        </td>
                        <td></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td>
                            <select name="country">
                                <option value="Select" <?php if($_POST['country']=="Select") echo "selected";?> >Select</option>
                                <option value="Afghanistan" <?php if($_POST['country']=="Afghanistan") echo "selected";?> >Afghanistan</option>
                                <option value="Australia" <?php if($_POST['country']=="Australia") echo "selected";?> >Australia</option>
                                <option value="Bangladesh" <?php if($_POST['country']=="Bangladesh") echo "selected";?> >Bangladesh</option>
                                <option value="England" <?php if($_POST['country']=="England") echo "selected";?> >England</option>
                                <option value="India" <?php if($_POST['country']=="India") echo "selected";?> >India</option>
                                <option value="Ireland" <?php if($_POST['country']=="Ireland") echo "selected";?> >Ireland</option>
                                <option value="New Zealand" <?php if($_POST['country']=="New Zealand") echo "selected";?> >New Zealand</option>
                                <option value="Pakistan" <?php if($_POST['country']=="Pakistan") echo "selected";?> >Pakistan</option>
                                <option value="South Africa" <?php if($_POST['country']=="South Africa") echo "selected";?> >South Africa</option>
                                <option value="Srilanka" <?php if($_POST['country']=="Srilanka") echo "selected";?> >Srilanka</option>
                                <option value="West Indies" <?php if($_POST['country']=="West Indies") echo "selected";?> >West Indies</option>
                                <option value="Zimbabwe" <?php if($_POST['country']=="Zimbabwe") echo "selected";?> >Zimbabwe</option>
                            </select>
                            <?php
                                if($_POST['country']=="Select")
                               {
                                    echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please select a Country</i> ';
                                            $isValid=false;
                               }
                            ?>
                        </td>
                        <td></td>
                    </tr>

                </table>
                <hr/>
                    
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
