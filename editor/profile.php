
<?php

    session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>profile</title>
</head>
<body background="3.jpg">
<form method="post" action="#">


	<table border="2" width="100%" >
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
		  
		   
		   <?php
		  		 mysqli_connect();

               $con=mysqli_connect('localhost','root','','criclive');

              if(!$con)
             {
             echo "Database No connection".mysqli_connect_error();	
             }
            else
            {
	             echo "";
            }
		       $sql = "SELECT * FROM editor";
			   $result = mysqli_query($con,$sql);
			   while($row = mysqli_fetch_assoc($result))
			   {
				   if($row['id'] == $_COOKIE['abc'])
				   {
					   ?><h2 > <?php echo "User Name : ". $row['id']."<br/>";
		               ?><h2 ><?php echo "User ID : ". $row['name']."<br/>";
		               ?><h2 ><?php echo "Gender : ". $row['email']."<br/>"; 
					   ?><h2 ><?php echo "Country : ". $row['country']."<br/>";
					   ?><h2 ><?php echo "Date : ". $row['date']."<br/>"."<br/>";?>
		           
		               <a href="changepass.php">change password</a><?php
				   }
				   else{}
				   
			   }
			   
		   ?>
		   
  
	</center>
	</form>
</body>
</html>