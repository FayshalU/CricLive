<?php
	
include 'databaseconnection.php';

	if(isset($_POST['submit'])){

		 $id = $_POST['id'];
		$password = $_POST['password'];

		$isValid = "";

		if($id == "" && $password == "" ){
			header("location: login.php?status=nullvalue");
		}else{

		       
		        mysqli_connect();

               $con=mysqli_connect('localhost','root','','criclive');

              if(!$con)
             {
             echo "Database No connection".mysqli_connect_error();	
             }
            else
            {
	             echo "Database connection done";
            }
		       $sql = "SELECT * FROM reg";
			   $result = mysqli_query($con,$sql);
			   while($row = mysqli_fetch_assoc($result))
			   {
				   if(($row['id'] == $id) && (($row['password'] == $password)))
				   {
					   if(isset($_POST['remamber']))
					{
						setcookie("rem", $id, time() + (86400 * 30), "/");
					}
					else{}
                      
                     setcookie("abc",$id, time() + (86400 * 30), "/");

					$isValid = "valid";
					
				   }
				   else{}
				   
			   }
                
			if($isValid == "valid"){
               header("location: editor.php");
			}else{
                header("location: login.php");
			}
			
			
		}

	}
	
?>