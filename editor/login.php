<?php
	include 'databaseconnection.php';
		 if(isset($_COOKIE['rem'])) {
    	header("location: editor.php");
	}else{
		echo "";
	}
	
	if(isset($_GET['status'])){
		$status = $_GET['status'];

		if($status == "invaliduser"){
			echo "Invalid username/password";
		}else if($status == "nullvalue"){
			echo "username/password can't be empty";
		} 
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
</head>
<body background="3.jpg">
<form method="post" action="logCheck.php">
<center>

	<table border="12" width="400" >
	 <tr>
		<td>
		<center>
		     <h2> <b>CricLive</b></h2><br/><br/><br/><br/><br/>
			<h3>User ID : </h3><input type="text" name="id"/><br/>
			<h3>Password  : </h3><input type="password" name="password"/><br/>
			<input type="checkbox" name="remamber">remamber me<br/><br/>
			<input type="submit" name="submit" value="login"/><br/>
			<a href="Reg.php"><h4><b>Became a user</b></h4></a><br/>
			<a href="#"><h4><b>forget passward</b></h4></a>
	</center>
	</td>
	</tr>
	</table>
	</center>
	</form>
</body>
</html>