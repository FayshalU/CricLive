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
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
    <table width="100%" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    <br/>
    <table width="100%">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="1">
                    <tr>
                        <center>
                            <td>

                                 <ul>
                                <li><a href="#">Timeline</a></li>
                                <li><a href="createnewmatch.php">Create match</a></li>
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
								<li><a href="articals.php"> Articals </a></li>
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
                 <form method="post" action="creatematchcheack.php">



			
			<center>
		  
           <br/><br/><br/><h3>Select 1st Team<br/><br/>

		   <?php
		  		 mysqli_connect();

               $con=mysqli_connect('localhost','root','','criclive');?>

            <select name ="op1">
             <?php
		       $sql = "SELECT * FROM country";
			   $result = mysqli_query($con,$sql);
			   while($row = mysqli_fetch_assoc($result))
			   {

				   
					   ?><h2 >
                        <option name="op1" value="<?=$row['team_id']?>"><?php echo $row['name'];?></option>
		               
		                <?php
				   }
		?>
		 </select>
		<h3><br/><br/><br/>Select 2nd Option<br/><br/><h3 >

			<select name="op2">
<?php
			  $sql = "SELECT * FROM country";
			   $result = mysqli_query($con,$sql);
			   while($row = mysqli_fetch_assoc($result))
			   {
				   
					   ?>
                        <option  value="<?php echo $row['team_id'];?>"><?php echo $row['name'];?></option>
		               
		                <?php
				   }
		?>
          </select>
		   <br/><br/><br/><h3>Match Type<br/><br/>

		   	 <select name="type">
             <option value="T20">T20</option>
            <option value="ODI">ODI</option>
            <option value="TEST">TEST</option>
</select> 

       </br> </br><input type='submit' value='Submit' name="submit">
     
				
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
