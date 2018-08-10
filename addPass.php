<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: login.html");
	}else{
        include 'getInfo.php';
    }
    //echo $_SESSION['name'];
    
    
    echo $_GET['date'];

    

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if($_POST['current'] != $_SESSION['password'])
       {
            
            echo "<script> location.replace('changePass.php?msg=e'); </script>";
            
       }
        else if($_POST['password'] != $_POST['cpass']){
            
            echo "<script> location.replace('changePass.php?msg=e'); </script>";
            
        }
        else{
            
            
            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

            if(!$conn)
            {
                echo "DB Error: ".mysqli_connect_error();
            }
            else{
                echo "Success <br/>";
            }

            $sql = $sql= "UPDATE `user` SET `password`='".$_POST['password']."' where id='".$_SESSION['id']."'";
            
            echo $sql;
            
            if(mysqli_query($conn, $sql))
            {
                echo "Inserted";
            }
            else
                echo "Not Registered";

            mysqli_close($conn);

            echo "<script> location.replace('changePass.php?msg=s'); </script>";

            
        }
    }

    else{
        echo "<script> location.replace('changePass.php'); </script>";
    }

    

?>
