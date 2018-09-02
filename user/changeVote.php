<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}
    else if($_GET['id'] != ""){
        
        include 'getInfo.php';
        
        $id = $_GET['id'];
        //$vote = $_GET['vote'];
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
        
        $value1 = null;
        $value2 = null;
        
        $sql2= "SELECT * FROM `poll` where poll_id='".$id."'";
        $result2 = mysqli_query($conn, $sql2);
        while($row1 = mysqli_fetch_assoc($result2)){ 
            
            $value1 = $row1['op1'];
            $value2 = $row1['op2'];
        }
        
        
        $sql1= "DELETE from polls where poll_id=".$id." AND user_id='".$_SESSION['id']."'";
        
        //echo $sql1;
        
        if(mysqli_query($conn, $sql1))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        

        mysqli_close($conn);
        
//        echo $op1;
//        echo $op2;
        
        echo '<input type="button" class="'.$id.'" value="'.$value1.'" style="height:30px;width:48%;" onclick="getVote(this)">
                <input type="button" class="'.$id.'" value="'.$value2.'" style="height:30px;width:50%;" onclick="getVote(this)">';

    }
    else{
        header("location: poll.php");
    }

?>

