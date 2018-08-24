
<?php
error_reporting(0);
$isValid =true;
?>

<html>
<title>Registration_form
</title>
<body>
<form method="post" action="#">
<center>
        <table border="2" width="400" height="800">
           <tr ><td colspan="3" bgcolor="blue"><center><h2>Registration</h2></center></td></tr>
		  <tr>
		       <td>
			   Name :
			   </td>
                <td border="2" width="260" border="2">
				<input name="name"  type="text">
				 <?php  
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if($_POST['name'] == "" || strlen($_POST['name']) <2)
                                {
                                    echo '<i font-size:10px">* Please give a valid Name</i> ';
                                    $isValid=false;
                                }
                            }
                        ?>
			   </td>
			   <td border="3" width="40">
			   
			   </td>
		    </tr>
			
			
			 <tr>
		       <td>
			   ID :
			   </td>
                <td border="2" width="260" border="2">
				<input name="id"  type="text">
				 <?php  
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if($_POST['id'] == "" || strlen($_POST['id']) <2)
                                {
                                    echo '<i font-size:10px">* Please give a valid Name</i> ';
                                    $isValid=false;
                                }
                            }
                        ?>
			   </td>
			   <td border="3" width="40">
			   
			   </td>
		    </tr>
			
			
			<tr>
		       <td>
			   Password :
			   </td>
                <td border="2" width="260" border="2">
				<input name="password"  type="password">
				 <?php  
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if($_POST['password'] == "" || strlen($_POST['password']) <2)
                                {
                                    echo '<i font-size:10px">* Please give a valid Password</i> ';
                                    $isValid=false;
                                }
                            }
                        ?>
			   </td>
			   <td border="3" width="40">
			   
			   </td>
		    </tr>
			
			
			<tr>
		       <td>
			   Confirm Password :
			   </td>
                <td border="2" width="260" border="2">
				<input name="cpassword"  type="password">
				 <?php  
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if($_POST['cpassword'] == "" || strlen($_POST['cpassword']) <2 || ($_POST['password'] != $_POST['cpassword']))
                                {
                                    echo '<i font-size:10px">* Password does not mathch</i> ';
                                    $isValid=false;
                                }
                            }
                        ?>
			   </td>
			   <td border="3" width="40">
			   
			   </td>
		    </tr>
			
			<tr>
		       <td >
			   Email :
			   </td>
                <td border="2" width="260">
				<input name="mail"  type="text">
				<abbr title="hint: sample@example.com"><b>i</b></abbr>
			
	   </td>
			   <td border="2" width="40">
			   
			   </td>
		    </tr>
			
			
			<tr>
		       <td border="2">
			   Gender :
			   </td>
                <td border="2" width="260">
				<input name="gender"  type="radio" value="male"/>Male
				<input name="gender" type="radio" value="female"/>Female
				<input name="gender" type="radio" value="other"/>Other
				<?php  
                            if(!isset($_POST['gender']) && $_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                echo '<i font-size:10px">* This is required</i> ';
                                $isValid=false;
                            }
                        ?>
			   </td>
			   <td border="2" width="40">
			   
			   </td>
		    </tr>
			
			
			<tr>
		       <td border="2">
			   Date of Birth :
			   </td>
                <td border="2" width="260">
				<input name="day"  type="day" size="2" />
				<input name="month"  type="text" size="2">
				<input name="year" type="text" size="4">&nbsp&nbsp&nbsp (dd/mm/yyyy)
				<?php
                            if($_SERVER['REQUEST_METHOD'] == 'POST')
                            {
                                if( ((int)$_POST['day']<0 || (int)$_POST['day']>31) || ((int)$_POST['month']<1 || (int)$_POST['month']>12) || ((int)$_POST['year']<1990 || (int)$_POST['year']>2016) || !is_numeric($_POST['day']) || !is_numeric($_POST['month']) || !is_numeric($_POST['year']) )
                                {
                                    echo '<i font-size:10px">* Please give a valid Date</i> ';
                                    $isValid=false;
                                }
                            }
                        ?>
				
			   </td>
			   <td border="2" width="40">
			   
			   </td>
		    </tr>
			

				
			
			
				<tr height="50">
		       <td border="2" colspan="3">
			   
			   
			   </td>
		    </tr>
			
			   <tr height="50">
		       <td border="2" colspan="3">
			   
			    <input type='submit' value='Submit' name="submit">
                <input type="reset" value="Reset">
				<a href="login.php"><h5><b>Signin</b></h5></a><br/>
			   
			   </td>
		    </tr>
			
			
         </table>
</center>
</form>
<?php
    if($isValid == true && $_SERVER['REQUEST_METHOD'] == 'POST')
    {
		$name = $_POST['name'];
		$id = $_POST['id'];
		$password = $_POST['password'];
		$gender   = $_POST['gender'];
		$mail   = $_POST['mail'];

		

			$myfile = fopen("user.txt", "a");
			$data = $name. "|". $id. "|".$password. "|". $gender. "|". $mail."\r\n";
			fwrite($myfile, $data);   
			fclose($myfile);
            header("location: login.php");
		}

	?>
</body>
</html>