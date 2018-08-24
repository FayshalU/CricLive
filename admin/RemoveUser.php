<?php

	if(isset($_COOKIE['abc'])) {

	}
	else
	{
		header("location: login.php");
	}
?>

<!DOCTYPE html>
<html>
<body>

<table border="1" align="center" width="10%">
	<tr>
		<td>aaa</td><td><button type="button" onclick="alert('Removed')">Remove!</button>
		</td>
	</tr>
	<tr>
		<td>bbb</td><td><button type="button" onclick="alert('Removed')">Remove!</button>
		</td>
	</tr>
	<tr>
		<td>ccc</td><td><button type="button" onclick="alert('Removed')">Remove!</button>
		</td>
	</tr>
	
	<tr>
		<td>ddd</td><td><button type="button" onclick="alert('Removed')">Remove!</button>
		</td>
	</tr>


</table>

 
</body>
</html>