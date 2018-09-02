<?php

require 'databaseconnection.php';
    if(isset($_COOKIE['abc'])) {
    	echo "";
	}else{
		header("location: login.php");
	}
if(isset($_POST['submit']))
{
	    $head = $_POST['text1'];
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
			$sql= "INSERT into post values('','$iiidd','$head','$body', '$date','$time','$filepath')";
       
			if(mysqli_query($con, $sql)){
				header("location: editor.php");
			}else{
				header("location: addartical.php?status=error");
			}

			mysqli_close($con);
		}

	}else{
		echo "invalid Reguest!";
	}

?>
