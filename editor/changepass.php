<?php

 session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }
$isValid =true;
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
    <table width="100%" id="headerstyle"style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="editor.php"><center>CricLive</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
  
    <table id="mainframe" width="100%" height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                              <ul>
                                <li><a href="#">Timeline</a></li>
                                <br><li><a href="createnewmatch.php">Create match</a></li>
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
								<li><a href="pollcreate.php"> Create Poll </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
			
			
			
			
			
			
            <td width="75%" valign="top">
                <table  width="100%" border="1">
                    <form method="post" action="#">



<center>


<h3>Current Password     &nbsp &nbsp <input type="password" name="password"/><br/>
                             <?php  
							  if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
							  $con=mysqli_connect('localhost','root','','criclive');
		                      $sql = "SELECT * FROM editor ";
                              $result = mysqli_query($con,$sql);
			                  while($row = mysqli_fetch_assoc($result))
			                  {
				               if($row['id'] == $_COOKIE['abc'])
				              {
                                if($_POST['password'] == "" || strlen($_POST['password']) <2 || ( $row['password'] != $_POST['password']))
                                {
                                    echo '<i font-size:10px">* Please give a valid Password</i> ';
                                    $isValid=false;
                                }
								else{}
                            }
							  }
							}
                           ?>
<h3>New Password        &nbsp &nbsp &nbsp &nbsp &nbsp <input type="password" name="npassword"/><br/>
                           <?php  
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if($_POST['password'] == "" || strlen($_POST['password']) <2)
                                {
                                    echo '<i font-size:10px">* Please give a valid Password</i> ';
                                    $isValid=false;
                                }
                            }
                           ?>
<h3>Confirm Password     &nbsp &nbsp <input type="password" name="cpassword"/><br/><br/>
                            <?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if($_POST['cpassword'] == "" || strlen($_POST['cpassword']) <2 || ($_POST['npassword'] != $_POST['cpassword']))
                                {
                                    echo '<i font-size:10px">* Password does not mathch</i> ';
                                    $isValid=false;
                                }
                            }
							?>
<input type="submit" name="submit" value="Submit"/>


<?php
    if($isValid == true && $_SERVER['REQUEST_METHOD'] == 'POST')
    {
		
		$id = $_COOKIE['abc'];
		$password = $_POST['password'];
		$npassword = $_POST['npassword'];
		$cpassword = $_POST['cpassword'];
		


        $con=mysqli_connect('localhost','root','','criclive');

 
		
		$sql = "UPDATE editor SET password= '$npassword' WHERE id='$id'";
	

        if(mysqli_query($con,$sql))
		{
			header("location: profile.php");
		}
		else{
			echo "dosen no insert";
		}
		}
?>
				
				
				
            </td>
        </tr>
    </table>
    
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>


