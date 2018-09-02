<?php
        echo "come";
		$name = $_POST['name'];
		$id = $_POST['id'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
		$gender   = $_POST['gender'];
		$mail   = $_POST['mail'];
		$date = $_POST['day'].'/'. $_POST['month'].'/'. $_POST['year'];
		$country =  $_POST['contry'];
		

		mysqli_connect();

        $con=mysqli_connect('localhost','root','','criclive');

		
		$sql = "INSERT INTO reg VALUES  ('$id','$name','$password','$mail','$gender','$date','$country')";
	

        if(mysqli_query($con,$sql))
		{
			
			header("location: login.php");
		}
		else{
			echo "dosen no insert";
		}
		
?>