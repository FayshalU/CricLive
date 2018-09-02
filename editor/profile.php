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
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
    <table width="100%" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="editor.php"><center>CricLive</center></a></td>

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
                                <li><a href="createnewmatch.php">Create match</a></li>
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
								<li><a href="pollcreate.php"> Create Poll Quistans </a></li>
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
				   if($row['id'] == "adam")
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
				
				
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
