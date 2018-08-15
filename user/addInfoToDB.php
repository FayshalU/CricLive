<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'getInfo.php';
    }
    //echo $_SESSION['name'];
    
    
    echo $_GET['date'];

    if($_GET['name'] != null){
        
        if($_GET['name'] == "" || strlen($_GET['name']) <2 || (strpbrk($_GET['name'] , '1234567890') !== false)){
            echo "<script> location.replace('changeInfo.php'); </script>";
            
        }else{
            
            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

            if(!$conn)
            {
                echo "DB Error: ".mysqli_connect_error();
            }
            else{
                echo "Success <br/>";
            }

            $sql = $sql= "UPDATE `user` SET `name`='".$_GET['name']."' where id='".$_SESSION['id']."'";
            
            echo $sql;
            
            if(mysqli_query($conn, $sql))
            {
                echo "Inserted";
            }
            else
                echo "Not Registered";

            mysqli_close($conn);

            echo "<script> location.replace('changeInfo.php'); </script>";

            
        }
    }
    else if($_GET['email'] != null){
        
        if(!filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
        {
            echo "<script> location.replace('changeInfo.php'); </script>";
            
        }else{
            
            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

            if(!$conn)
            {
                echo "DB Error: ".mysqli_connect_error();
            }
            else{
                echo "Success <br/>";
            }

            $sql = $sql= "UPDATE `user` SET `email`='".$_GET['email']."' where id='".$_SESSION['id']."'";
            
            echo $sql;
            
            if(mysqli_query($conn, $sql))
            {
                echo "Inserted";
            }
            else
                echo "Not Registered";

            mysqli_close($conn);

            echo "<script> location.replace('changeInfo.php'); </script>";

            
        }
    }

    else if($_GET['date'] != null){
        
        $datearr = explode("/",$_GET['date']);
        
        $day = $datearr[0];
        $month = $datearr[1];
        $year = $datearr[2];
        
        if( ((int)$day<0 || (int)$day>31) || ((int)$month<1 || (int)$month>12) || ((int)$year<1900 || (int)$year>2018) || !is_numeric($day) || !is_numeric($month) || !is_numeric($year) )
        {
            echo "<script> location.replace('changeInfo.php'); </script>";
            
        }else{
            
            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

            if(!$conn)
            {
                echo "DB Error: ".mysqli_connect_error();
            }
            else{
                echo "Success <br/>";
            }

            $sql = $sql= "UPDATE `user` SET `date`='".$_GET['date']."' where id='".$_SESSION['id']."'";
            
            echo $sql;
            
            if(mysqli_query($conn, $sql))
            {
                echo "Inserted";
            }
            else
                echo "Not Registered";

            mysqli_close($conn);

            echo "<script> location.replace('changeInfo.php'); </script>";

            
        }
    }

    else if($_GET['country'] != null){
        
        if($_GET['country']=="Select")
       {
            
            echo "<script> location.replace('changeInfo.php'); </script>";
            
       }else{
            
            
            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

            if(!$conn)
            {
                echo "DB Error: ".mysqli_connect_error();
            }
            else{
                echo "Success <br/>";
            }

            $sql = $sql= "UPDATE `user` SET `country`='".$_GET['country']."' where id='".$_SESSION['id']."'";
            
            echo $sql;
            
            if(mysqli_query($conn, $sql))
            {
                echo "Inserted";
            }
            else
                echo "Not Registered";

            mysqli_close($conn);

            echo "<script> location.replace('changeInfo.php'); </script>";

            
        }
    }

    else{
        echo "<script> location.replace('changeInfo.php'); </script>";
    }

    

?>
