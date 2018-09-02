<?php

include 'databaseconnection.php';
     if(isset($_COOKIE['abc'])) {
    	echo "";
	}else{
		header("location: login.php");
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Schore Update</title>
</head>
<body >
<form method="post" action="#">


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
		   
		   
		<h2>Today'S matches</h2>
		<hr></hr>
		<h3>live</h3>
		<h4>BNG VS IND</h4><br/>
		<hr></hr>
		<h3>BANGLADESH	</h3><br/><br/>
		<h4>Total
	    <h4>runs &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>wickets &nbsp: &nbsp&nbsp&nbsp <input type="text" name="wickets" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>overs &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>boll &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="bol" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>Extra &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="extra" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/><br/><br/>
		 <table border="1" width="700" height="600">
		 <tr>
		 <td><center><b>Name(Bating)</b></center>
		 </td>
		 <td><center><b>Name(Bolling)</b></center>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		  <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		  <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		<td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		<td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </tr>
		 </table><br/>
		<input type="submit" name="update" value="update">

        <hr></hr><br/><br/><br/>

        <hr></hr>
		<h3>India	</h3><br/><br/>
		<h4>Total
	    <h4>runs &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>wickets &nbsp: &nbsp&nbsp&nbsp <input type="text" name="wricats" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>overs &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>boll &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="bol" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		<h4>Extra &nbsp: &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp  <input type="text" name="extra" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/><br/><br/>
		 <table border="1" width="700" height="600">
		 <tr>
		 <td><center><b>Name(Bating)</b></center>
		 </td>
		 <td><center><b>Name(Bolling)</b></center>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		  <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		  <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		<td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		 </tr>
		 <tr>
		 <td><center><h4>Sakib  All Hasan(c)<h4/></center>runs : <input type="text" name="run" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </td>
		<td><center><h4>Sakib  All Hasan(c)<h4/></center>overs : <input type="text" name="overs" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"> &nbsp wickets : <input type="text" name="wricat" size="3">&nbsp&nbsp&nbsp <input type="submit" name="update" value="update"><br/>
		 </tr>
		 </table><br/>
		<input type="submit" name="update" value="update">
	</center>

	</form>
</body>
</html>