
<?php

	if(isset($_COOKIE['abc'])) {

	}
	else
	{
		header("location: login.php");
	}
?>

<table border="1" width="100%" bgcolor="yellow">
                 
                    <td width="200"><center><a href="LiveScore.php">LiveScore</a></center></td>
                    <td width="200"><center><a href="Series.php">Series</a></center></td>
                    <td width="200"><center><a href="Country.php">Country</a></center></td>
                    <td width="200"><center><a href="Blogs.php">Blogs</a></center></td>
                
            </table>