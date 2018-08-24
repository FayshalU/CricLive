<?php
	

	if(isset($_POST['submit'])){

		$id = $_POST['id'];
		$password = $_POST['password'];

		$isValid = "";

		if($id == "" && $password == "" ){
			header("location: login.php?status=nullvalue");
		}else{

			$myfile = fopen("user.txt", "r");
			
			while(!feof($myfile))
			{
				$data = fgets($myfile);
				$arr = explode('|', $data);
                
				if($arr[1] == $id && $arr[2] == $password){
					
					if(isset($_POST['remamber']))
					{
						setcookie("rem", "blue", time() + (86400 * 30), "/");
					}
                      
                     setcookie("abc", "blue", time() + (86400 * 30), "/");


					$isValid = "valid";
				}
			}
			
			fclose($myfile);

			if($isValid == "valid"){
				//echo "valid";
               header("location: admin.php");
			}else{
                header("location: login.php");
			}
			
			
		}

	}else{
		echo "invalid Reguest!";
	}
	
?>