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
        
                </table>
                
            </td>
            <td  width="5%"></td>
			
			
			
			
			
			
            <td width="75%" valign="top">
                <table  width="100%" border="1">
                    <form method="post" action="#">


	
			
			
			<center>
		   
		        <a href="createnewmatch.php"><h2> <b>Create match</b></h2></a><br/><br/><br/>
                <a  href="scores.php"><h2><font><b>Update Score</b></font></h2></a><br/><br/><br/>
                <a href="addartical.php"><h2> <b>Add Artical</b></h2></a><br/><br/><br/>
                <a href="articals.php"><h2> <b>Articals</b></h2></a><br/><br/><br/>
				<a href="pollcreate.php"><h2> <b>Create Poll Quistans</b></h2></a><br/><br/><br/>
				
		
		  </center>
			<br/><br/><br/><br/><br/><br/>
	

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
