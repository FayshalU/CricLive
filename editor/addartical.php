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
<<<<<<< HEAD
                                <li><a href="#">Timeline</a></li>
                               <br> <li><a href="createnewmatch.php">Create match</a></li>
=======
                                <li><a href="editor.php">Timeline</a></li>
                                <li><a href="createnewmatch.php">Create match</a></li>
>>>>>>> cd12985c49608fe062e08ee1822e3ce2fc042309
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="#"> Add Artical </a></li>
								<li><a href="pollcreate.php"> Create Poll</a></li>
                              </ul>
                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
			
			
			
			
			
			
            <td width="75%" valign="top">
                <table  width="100%" border="1">
                    <form method="post" action="uploadartical.php" enctype="multipart/form-data">


	
			<center>
		   <h2>Head line</h2>
		   <textarea type="text" name="text1" ></textarea><br/>
		   <h2>Body</h2>
		   <textarea type="text" name="text2" ></textarea><br/><br/>
		   <input type="file" name="uploadfile"  style="color:red;">
		   
			<br/><br/>
			<input type="submit" name="submit" value="submit" style="color:blue;">
  
	</center>

	</form>
	
	
            </td>
        </tr>
    </table>
   </td></tr></table>
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
