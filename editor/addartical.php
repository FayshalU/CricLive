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
	<title>Add Artical</title>
</head>
<body background="3.jpg">
<form method="post" action="uploadartical.php" enctype="multipart/form-data">


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
		   <h2>Head line</h2>
		   <textarea type="text" name="text1" ></textarea><br/>
		   <h2>Body</h2>
		   <textarea type="text" name="text2" ></textarea><br/><br/>
		   <input type="file" name="uploadfile"  style="color:red;">
		   
			<br/><br/>
			<input type="submit" name="submit" value="submit" style="color:blue;">
  
	</center>
<a href="editor.php"><h3> <b>Back</b></h3><a/><br/><br/><br/>
	</form>
</body>
</html>