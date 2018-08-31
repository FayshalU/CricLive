<?php
	session_start();
	error_reporting(0);

    //echo "300";

    $run = $_GET['run'];
//    $player = $_GET['player'];
//    $country = $_GET['country'];
    $id = $_GET['id'];

    if($run != "" && $id != ""){
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $sql2= "SELECT * from batting where id='".$id."'";
        
        $result2 = mysqli_query($conn, $sql2);
        
        $score = 0;
        $extra = 0;
        
        while($row2 = mysqli_fetch_assoc($result2))
        {
            
            $score = $row2['score'];
            $extra = $row2['extra'];
            
        }
        
        
        
        $score = $score + intval($run);
        $extra = $extra + intval($run);
        
        
        $sql3= "UPDATE `batting` SET `score`=".$score.",`extra`=".$extra." WHERE id='".$id."'";
        
        //echo $sql3;

        if(mysqli_query($conn, $sql3))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        echo $score;
        
    }

    

?>

