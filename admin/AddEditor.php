
<?php

	if(isset($_COOKIE['abc'])) {

	}
	else
	{
		header("location: login.php");
	}
?>

<h3>welcome to CricLive EditPanel</h3>
<?php
    error_reporting(0);
	if($_POST['status'] == 'n')
	{
		echo "Please give a valid Name";
	}
    else if($_POST['status'] == 'e')
	{
		echo "Please give a valid Email";
	}

    else if($_POST['status'] == 'g')
	{
		echo "Please select a Gender";
	}
    else if($_POST['status'] == 'd')
	{
		echo "Please give a valid Date";
	}
    else if($_POST['status'] == 'b')
	{
		echo "Please select a Blood Group";
	}
    else if($_POST['status'] == 's')
	{
		echo "Please select at least one Degree";
	}
?>


<fieldset>
    
	<form method="post" action="regCheck.php">
		<br/>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text">
					<abbr title="hint: sample@example.com"><b>i</b></abbr>
				</td>
				<td></td>
			</tr>				
			<tr><td colspan="4"><hr/></td></tr>
			
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Gender</legend>    
						<input name="gender" type="radio">Male
						<input name="gender" type="radio">Female
						<input name="gender" type="radio">Other
					</fieldset>
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td colspan="3">
					<fieldset>
						<legend>Date of Birth</legend>    
						<input type="text" size="2" name="day"/>/
						<input type="text" size="2" name="month"/>/
						<input type="text" size="4" name="year"/>
						<font size="2"><i>(dd/mm/yyyy)</i></font>
					</fieldset>
				</td>
				<td></td>
			</tr>
            
		</table>
		<hr/>
		<input type="submit" value="Submit">
		<input type="reset">
	</form>
</fieldset>