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
	<title>edit Artical</title>
</head>
<body>
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
			<!DOCTYPE html>
<html>
<head>
	<title>Ajax</title>
</head>
<body>

	<center>
		<div>
			<p> This is Ajax Example</p>

			<input type="text" id='search' name="" >
			<input type="button"  name="" value="Search" onclick="loadData()">

		</div>
		<div id="result">
			
		</div>

	</center>

	<script type="text/javascript">
		
		function loadData(){
           
		
			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'search.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "key="+document.getElementById('search').value;
			xmlHttp.send(abc);

			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					
					document.getElementById('result').innerHTML = this.responseText;
					//alert(this.responseText);
				}
			}

		}
        
		function abc(data){

			document.getElementById('search').value=data;
			document.getElementById('result').innerHTML="";
		}

	</script>
</body>
</html>
		 <div id=1>
		 <h3 style="background-color:DodgerBlue;">  All Post
		   <?php 
                     $con = DBconnection();
					  $iiidd =$_COOKIE['abc'];
	              $sql = "SELECT * FROM post where user_id='".$iiidd."'";
			   $result = mysqli_query($con,$sql);
			  
			   while($row = mysqli_fetch_assoc($result))
			   {
					   ?>
		                <h4 > <hr></center>
						 <?php echo "<h3>".$row['post_id']."</h3>"."<center>"."</br>"."</br>".$row['date']."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".$row['time']."<br/>"."<br/>"."<br/>".$row['headline']."<br/>"."<br/>"."<br/>"."<img src=".$row['image'].">"."<br/>";
					    ?><h4 ><?php echo  $row['text']."<br/>";?>
		               </br> <?php echo "
					   <a href='deleteartical.php?id=".$row['post_id']." '>
							<input type='button' name='delete' value='delete'/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		               <a href='editartical.php?post_id=".$row['post_id']."'>
							<input type='button' name='edit' value='edit'/> </br> </br> </tr> <hr> ";
					  
				   }

			   
					  ?>
		   <div>
		  
    </table>
	</center>
	</form>
</body>
</html>