<?php

		 if(isset($_COOKIE['rem'])) {
    	header("location: admin.php");
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


<html>
<head>
	<title>LOGIN</title>
</head>
<body>
<form method="post" action="logCheck.php">
<center>

	<table border="2" width="400" >
	 <tr>
		<td>
		<center>
			<h3>User ID : </h3><input type="text" name="id"/><br/>
			<h3>Password  : </h3><input type="password" name="password"/><br/>
			<input type="checkbox" name="remamber">Remember me<br/><br/>
			<input type="submit" name="submit" value="login"/><br/>
			<a href="Reg.php"><h5><b>Become a user</b></h5></a>
			<a href="#"><h5><b>Forget password</b></h5></a>
	</center>
	</td>
	</tr>
	</table>
	</center>
	</form>
</body>
</html>