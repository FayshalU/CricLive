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
                                <li><a href="editor.php">Timeline</a></li>
                               <br> <li><a href="createnewmatch.php">Create match</a></li>
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
                    <form method="post" action="pollcheack.php">


	
			
			<center>
		   <h3>Enter Poll Quistion</h3><br/><br/>
		   
		   <textarea type="text" name="text1" ></textarea><br/>
		  
           <br/><br/><br/><h3>Select 1st Option<br/><br/>

          <textarea type="text" name="text2" ></textarea><br/>

            <br/><br/><br/><h3>Select 2st Option<br/><br/>

            <textarea type="text" name="text3" ></textarea><br/>
           </br><input type='submit' value='Submit' name="submit">

	
 </form>
				
				
            </td>
        </tr>
    </table>
  </h3></h3></center></form></table></td></tr></table>
    
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
