<?php

    session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        $post_id=$_GET['post_id'];
    }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Edit Artical</title>
</head>
<body background="3.jpg">
<form method="post" action="#" enctype="multipart/form-data">


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
			  <?php
	
               $con=mysqli_connect('localhost','root','','criclive');
		       $sql = "SELECT * FROM post where post_id= $post_id";
			   $result = mysqli_query($con,$sql);
			   $row = mysqli_fetch_assoc($result)
			   
			   
					   ?><h2>Head line</h2>
		                 <textarea type="text" name="text1" > <?=$row['headline']?> </textarea><br/>
		                 <h2>Body</h2>
		                 <textarea type="text" name="text2"> <?=$row['text']?> </textarea><br/><br/>
		                 <input type="file" name="uploadfile" value="<?=$row['image']?>" style="color:red;">
		   
			             <br/><br/>
			             <input type="submit" name="submit" value="submit" style="color:blue;">
		               
	
		                 
						 
	<?php
			
			if(isset($_POST['submit']))
{
	    $head = $_POST['text1'];
		$post_id =$_GET['post_id'];
		$body = $_POST['text2'];
		$date   = date("Y/m/d");
		$time =  date("h:i:sa");
		$filedir = "upload/";
		$filepath = $filedir.$_FILES["uploadfile"]["name"];

		if($head == "" || $body == "" || $date == ""){
			echo "Somthing wrong! try again";
		}else{

			move_uploaded_file($_FILES['uploadfile']['tmp_name'], $filepath);

			$con = DBconnection();
            $iiidd =$_COOKIE['abc'];
			$sql = "UPDATE post SET headline='$head',text='$body',image ='$filepath' WHERE post_id='$post_id'";
          
			if(mysqli_query($con, $sql)){
		     header("location: articals.php");
			}else{
				header("location: uploadeditartical.php?status=error");
			}

			mysqli_close($con);
		}

	}else{
		echo "";
	}
			
			?>
			
			
  
	</center>

	</form>
</body>
</html>