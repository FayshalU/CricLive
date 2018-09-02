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
<form method="post" action="creatematchcheack.php">


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
		  
           <br/><br/><br/><h3>Select 1st Team<br/><br/>

		   <?php
		  		 mysqli_connect();

               $con=mysqli_connect('localhost','root','','criclive');?>

            <select name ="op1">
             <?php
		       $sql = "SELECT name FROM country";
			   $result = mysqli_query($con,$sql);
			   while($row = mysqli_fetch_assoc($result))
			   {

				   
					   ?><h2 >
                        <option name="op1" value="<?=$row['name']?>"><?php echo $row['name'];?></option>
		               
		                <?php
				   }
		?>
		 </select>
		<h3><br/><br/><br/>Select 2nd Option<br/><br/>

			<select name="op2">
<?php
			  $sql = "SELECT name FROM country";
			   $result = mysqli_query($con,$sql);
			   while($row = mysqli_fetch_assoc($result))
			   {
				   
					   ?><h2 >
                        <option  value="<?=$row['name']?>"><?php echo $row['name'];?></option>
		               
		                <?php
				   }
		?>
          </select>
		   <br/><br/><br/><h3>Match Type<br/><br/>

		   	 <select name="type">
             <option value="T-20">T-20</option>
            <option value="One-day">One-day</option>
            <option value="test">test</option>
</select> 

       </br> </br><input type='submit' value='Submit' name="submit">
     

 </form>
</body>