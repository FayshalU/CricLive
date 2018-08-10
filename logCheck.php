
<?php
    session_start();
    error_reporting(0);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

//        if(!$conn)
//        {
//            echo "DB Error: ".mysqli_connect_error();
//        }
//        else
//        {
//            echo "Success <br/>";
//        }
        
        $sql= "SELECT * from user";

        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            if($row['id'] == $_POST['luser'] && $row['password'] == $_POST['lpass'])
            {
                if($_POST['remember']=="on")
                {
				    setcookie("rem", "valid", time()+3600,'/');
                }
                
                $_SESSION['log'] = $_POST['luser'];
                
                include 'getInfo.php';
                
                //setcookie('log', 'valid', time()+3600,'/');
                
                $valid = "valid";
            }
        }
        
        mysqli_close($conn);

        if($valid == "valid"){
            echo "<script> location.replace('user.php'); </script>";
        }else{
            echo "<script> location.replace('login.html?error=e'); </script>";
        }
        
        
    }else{
        echo "<script> location.replace('login.html'); </script>";
    }

?>