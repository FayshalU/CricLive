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
    
    
    //echo $_GET['date'];

    
            

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

    if(!$conn)
    {
        echo "DB Error: ".mysqli_connect_error();
    }
    else{
        echo "Success <br/>";
    }
    
    if($_GET['cmt'] != ""){
        
        $date = date("Y-m-d");
        $time = date("h:i:sa");

        $sql = $sql= "INSERT into comment values('','".$_GET['p_id']."','".$_SESSION['id']."','".$_GET['cmt']."','".$date."','".$time."')";

        //echo $sql;

        if(mysqli_query($conn, $sql))
        {
            echo "Inserted";
        }
        else{
            echo "Not Registered";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);

        

        
    }
    
    $str = 'userPost.php?id='.$_GET['p_id'];
      
    echo "<script> location.replace('$str'); </script>";
    
    

?>
