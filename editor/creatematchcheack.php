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
        $con=mysqli_connect('localhost', 'root', '', 'criclive');
          
		$sql = "INSERT INTO play VALUES  ('','".$tm1."','".$tm2."','live',1,'".$type."')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		//header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
          
          $id = null;
          
          $sql= "SELECT * FROM `play` where `team1`='".$tm1."' AND `team2`='".$tm2."' AND `status`='live'";

            $result = mysqli_query($con, $sql);

            while($row = mysqli_fetch_assoc($result)){

                $id = $row['match_id'];

            }
          echo $sql;
          echo $id;
          
          $sql = "INSERT INTO `batting`(`id`, `player1`, `player2`,`over`, `batsman1`, `batsman2`) VALUES ('".$id."_1','0/0','0/0','0.0','player1','player2')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		//header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
          
          $sql = "INSERT INTO `batting`(`id`,`over`, `batsman1`, `batsman2`) VALUES ('".$id."_2','0.0','player1','player2')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		//header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
          
          $sql = "INSERT INTO `bowling`(`id`, `player9`, `player10`, `bowler1`, `bowler2`) VALUES ('".$id."_1','0.0-0-0','0.0-0-0','player9','player10')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		//header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
          
          $sql = "INSERT INTO `bowling`(`id`, `player9`, `player10`, `bowler1`, `bowler2`) VALUES ('".$id."_2','0.0-0-0','0.0-0-0','player9','player10')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		//header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
          
          $sql = "INSERT INTO `wicket`(`id`) VALUES ('".$id."_1')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		//header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
          
          $sql = "INSERT INTO `wicket`(`id`) VALUES ('".$id."_2')";
	   
          echo $sql;

        if(mysqli_query($con,$sql))
		{
			
		header("location: createnewmatch.php");
		}
		else{
            echo 'Not inserted';
			//header("location: createnewmatch.php?not enserted");		
		}
	}
	else{
		header('location: createnewmatch.php?e=error');
	}
}
}
    else
    {
        header("location: createnewmatch.php");
    }

?> 