
<?php
    session_start();
    error_reporting(0);
    $valid = "";

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
        
        $sql= "SELECT * from `login` where id='".$_POST['luser']."'";
        
        //echo $_POST['luser'];
        //echo $sql;
        
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result))
        {
            //echo $row['password'];
            if($row['password'] == $_POST['lpass'])
            {
                //echo $row['password'];
                //echo $row['type'];
                
                if($row['type'] == "user"){
                    //echo $row['type'];
                    $valid = "user";    
                }
                else if($row['type'] == "admin"){
                    //echo $row['type'];
                    $valid = "admin";    
                }
                else if($row['type'] == "editor"){
                    //echo $row['type'];
                    $valid = "editor";    
                }
                else{
                    
                }
                
                $_SESSION['log'] = $_POST['luser'];
                
                include 'getInfo.php';
                
                if($_POST['remember']=="on")
                {
				    setcookie("rem", $_POST['luser'], time()+3600,'/');
                }else{
                    
                }
                
                
                //setcookie('log', 'valid', time()+3600,'/');
            }
            //echo $row['id'];
        }
        
        mysqli_close($conn);

        if($valid == "user"){
            echo "<script> location.replace('user/user.php'); </script>";
        }
        else if($valid == "admin"){
            echo "<script> location.replace('admin/admin.php'); </script>";
        }
        else if($valid == "editor"){
            echo "<script> location.replace('editor/editor.php'); </script>";
        }
        else{
            echo "<script> location.replace('login.html?error=e'); </script>";
        }
        
        
    }else{
        echo "<script> location.replace('login.html'); </script>";
    }

?>