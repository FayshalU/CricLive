<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}

    
    $id = $_GET['id'];

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

    $sql = "SELECT * FROM `player info` where player_id='".$id."'";

    $result = mysqli_query($conn, $sql);
    
    //$info = "";

    
    $row = mysqli_fetch_assoc($result);

	$data = array('ID' =>$row['player_id'],'Name' =>$row['name'],'Country' =>$row['country'],'Category' =>$row['category'],'Rating' =>$row['rating']);

//while($row = mysqli_fetch_assoc($result)){
//      
//        $id = $row['player_id'];
//        $name = $row['name'];
//        $country = $row['country'];
//        $category = $row['category'];
//        $rating = $row['rating'];
//        $price = $rating*1000;
//        
//        $info .= '<div id='.$id.' class="info" >
//                    Player ID: '.$id.'<br>
//                    Name: '.$name.'<br>
//                    Country: '.$country.'<br>
//                    Category: '.$category.'<br>
//                    Rating: '.$rating.'<br>
//                    Price: '.$price.'<br>
//                </div>
//                <center><input type="button" id="add" value="ADD" onclick="createTeam()"></center>';
//        
//        
//       
//    }
    
//    if($info == ""){
//        echo "No Result";
//    }
//    else{
//        echo $info;    
//    }

    
    $jsonData = json_encode($data);

    echo $jsonData;
    

?>

