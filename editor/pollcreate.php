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
	<title>poll create</title>
</head>
<body background="3.jpg">
<form method="post" action="pollcheack.php">


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
		   <h3>Enter Poll Quistion</h3><br/><br/>
		   
		   <textarea type="text" name="text1" ></textarea><br/>
		  
           <br/><br/><br/><h3>Select 1st Option<br/><br/>

          <textarea type="text" name="text2" ></textarea><br/>

            <br/><br/><br/><h3>Select 2st Option<br/><br/>

            <textarea type="text" name="text3" ></textarea><br/>
           </br><input type='submit' value='Submit' name="submit">

	
 </form>
</body>