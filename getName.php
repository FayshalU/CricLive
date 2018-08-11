
<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: login.html");
	}else{}
    
    $user = null;
    
    echo "connected";

     $conn = mysqli_connect('localhost', 'root', '', 'criclive');

//        if(!$conn)
//        {
//            echo "DB Error: ".mysqli_connect_error();
//        }
//        else
//        {
//            echo "Success <br/>";
//        }
        
        $sql= "SELECT * from `editor` where id='".$_GET['id']."'";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            $user = $row['name'];
        }
        

        mysqli_close($conn);
        
        echo $user;

?>
