<?php

 session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }

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
			$sql = "UPDATE post SET headline='".$head."',text='".$body."',image ='".$filepath."' WHERE post_id='".$_SESSION['post_id']."'";
           // $sql =  UPDATE `post` SET `user_id`=[$iiidd],`headline`=[$head],`text`=[$body],`date`=[$date],`time`=[$time],`image`=[$filepath] WHERE $post_id;
			if(mysqli_query($con, $sql)){
				//echo "done";		
				header("location: editor.php");
			}else{
				header("location: uploadeditartical.php?status=error");
			}

			mysqli_close($con);
		}

	}else{
		echo "invalid Reguest!";
	}

?>
