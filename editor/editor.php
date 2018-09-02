<?php
include 'databaseconnection.php';

   if(isset($_COOKIE['abc'])) {
    	echo "";
	}else{
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Editor</title>
</head>
<body background="3.jpg">
<form method="post" action="#">


	<table border="12" width="100%" >
	 <tr>
		<td>
	
            <a href="editor.php"><h2> <font color="SaddleBrown "> <b>CricLive</b></font></h2></a>
			 </td>
			 <td colspan="2" width="50%">
			 </td>
			 <td>
                 <a href="profile.php"><h2> <font color="SaddleBrown "> <b>Profile</b></font></h2></a>
			</td>
			<td>
                <a href="logout.php"><h2>  <font color="SaddleBrown "><b>Logout</b></font></h2></a>
			</td>
			</tr>
			</table>
			<br/><br/><br/><br/><br/>
			
			
			<center>
		   
		        <a href="createnewmatch.php"><h2> <b>Create match</b></h2></a><br/><br/><br/>
                <a  href="updateschore.php"><h2><font><b>Update Score</b></font></h2></a><br/><br/><br/>
                <a href="addartical.php"><h2> <b>Add Artical</b></h2></a><br/><br/><br/>
                <a href="articals.php"><h2> <b>Articals</b></h2></a><br/><br/><br/>
				<a href="pollcreate.php"><h2> <b>Create Poll Quistans</b></h2></a><br/><br/><br/>
				
		
		  </center>
			<br/><br/><br/><br/><br/><br/>
	

	</form>
</body>
</html>