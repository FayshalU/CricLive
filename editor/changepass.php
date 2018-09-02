
<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        $isValid =true;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>change passward</title>
</head>
<body >
<form method="post" action="#">


	<table border="12" width="100%" >
	 <tr>
		<td>
	
		   <a href="editor.php"><h2> <b>CricLive</b></h2><a/>
			 </td>
			 <td colspan="2" width="50%">
			 </td>
			 <td>
			<a href="profile.php"><h2> <b>Profile</b></h2><a/>
			</td>
			<td>
			<a href="logout.php"><h2> <b>Logout</b></h2><a/>
			</td>
			</tr>
			</table>
			<br/><br/><br/><br/><br/>
<center>


<h3>Current Password     &nbsp &nbsp <input type="password" name="password"/><br/>
                             <?php  
							  if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
							  $con=mysqli_connect('localhost','root','','criclive');
		                      $sql = "SELECT * FROM reg ";
                              $result = mysqli_query($con,$sql);
			                  while($row = mysqli_fetch_assoc($result))
			                  {
				               if($row['id'] == $id)
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

 
		
		$sql = "UPDATE reg SET password= '$npassword' WHERE id='$id'";
	

        if(mysqli_query($con,$sql))
		{
			header("location: login.php");
		}
		else{
			echo "dosen no insert";
		}
		}
?>
</center>
</body>

 

