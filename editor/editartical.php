<?php

 session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
       
       	 include 'databaseconnection.php'; 
    }
	$post_id=$_GET['post_id'];

?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
    <table width="100%" id="headerstyle"style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="editor.php"><center>CricLive</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
   
    <table id="mainframe" width="100%" height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                 <ul>
                                <li><a href="#">Timeline</a></li>
                                <br><li><a href="createnewmatch.php">Create match</a></li>
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
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
                    <form method="post" action="#" enctype="multipart/form-data">


	
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
				
				
            </td>
        </tr>
    </table>
    
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
