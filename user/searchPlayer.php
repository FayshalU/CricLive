<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}

    
    $data = $_GET['txt'];

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

    $sql = "SELECT * FROM `player info` where name like '%".$data."%'";

    $result = mysqli_query($conn, $sql);
    
    $info = "";

    while($row = mysqli_fetch_assoc($result)){
        
        $id = $row['player_id'];
        $name = $row['name'];
        
        $info .= '<div id='.$id.' onclick="view(this)">'.
                    $name
                .'</div>';
        
    }
    
    if($info == ""){
        echo "No Result";
    }
    else{
        echo $info;    
    }
    

?>

