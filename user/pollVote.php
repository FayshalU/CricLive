<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}
    else if($_GET['id'] != "" && $_GET['vote']!= ""){
        
        include 'getInfo.php';
        
        $id = $_GET['id'];
        $vote = $_GET['vote'];
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

        
        $sql= "INSERT into polls values('','".$id."','".$_SESSION['id']."','".$vote."')";

        if(mysqli_query($conn, $sql))
        {
            //echo "Inserted";
        }
        else{
            //echo "Not Registered";
            //echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        $sql2= "SELECT * FROM `poll` where poll_id='".$id."'";
        $result2 = mysqli_query($conn, $sql2);
        while($row1 = mysqli_fetch_assoc($result2)){ 
            
            $value1 = $row1['op1'];
            $value2 = $row1['op2'];
        }
        
        $op1=0;
        $op2=0;
        
        $sql1= "SELECT * from polls where poll_id='".$id."'";
        $result = mysqli_query($conn, $sql1);
        
        while($row = mysqli_fetch_assoc($result))
        {
            if($row['response'] == $value1){
                $op1++;
                
            }
            else{
                $op2++;
            }
            //echo $row['response'];
        }
        

        mysqli_close($conn);
        
//        echo $op1;
//        echo $op2;
        
        echo '<div style="width:100%;">
                    <div>'.$value1." ". 100*round($op1/($op2+$op1),2).'% </div>
                    <div style="background-color:lightblue; width:'. 100*round($op1/($op2+$op1),2).'%; height:20px;"></div>
                    <div>'. $value2." ". 100*round($op2/($op2+$op1),2).'% </div>
                    <div style="background-color:lightgreen; width:'. 100*round($op2/($op2+$op1),2).'%; height:20px;"</div>  
                </div>';

    }
    else{
        header("location: poll.php");
    }

?>

