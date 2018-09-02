<?php
	session_start();
	error_reporting(0);

    
    $id = $_GET['id'];

    if($id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        
        
        $sql3= "UPDATE `play` SET status='finish' WHERE match_id='".$id."'";
        
        echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        
        
        
        
        
        header('location: scores.php');
        
    }

    

?>

