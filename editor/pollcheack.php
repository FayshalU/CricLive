<?php

include 'databaseconnection.php';
    if(isset($_COOKIE['abc'])) {
    	echo "";
	}else{
		header("location: login.php");
	}

	
if(isset($_POST['submit']))
    {

$head=$_POST['text1'];
$op1=$_POST['text2'];
$op2=$_POST['text3'];
if($head == null || $op1 == null || $op2 == null)
{
   header("location: pollcreate.php?pppp");
}
else{
	

        $con=mysqli_connect('localhost','root','','criclive');
		
		$sql = "INSERT INTO poll VALUES  ('','$head','$op1','$op1')";
	

        if(mysqli_query($con,$sql))
		{
			echo "enserted";
		}
		else{
			echo "does no ensert";			
		}
		}
		}
		else
		{

			header("location: pollcreate.php?oooo");
		}
		?> 