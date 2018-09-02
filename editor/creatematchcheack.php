<?php

    session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }
	

if(isset($_POST['submit']))
    {

$tm1=$_POST['op1'];
$tm2=$_POST['op2'];
$type=$_POST['type'];
if($tm1 == null || $tm2 == null || $type == null)
{
   header("location: createnewmatch.php?pppp");
}
else{
	
      if($tm1 != $tm2)
     {
        $con=mysqli_connect('localhost','root','','criclive');
		
		$sql = "INSERT INTO play VALUES  ('','$tm1','$tm2','Live','$type')";
	

        if(mysqli_query($con,$sql))
		{
			
		header("location: createnewmatch.php?enserted");
		}
		else{
			header("location: createnewmatch.php?not enserted");		
		}
	}
	else{
		header("location: createnewmatch.php?o");
	}
		}
		}
		else
		{
			header("location: createnewmatch.php?oooo");
		}
		?> 