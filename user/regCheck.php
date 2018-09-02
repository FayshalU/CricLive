<?php

    error_reporting(0);
    //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Email</i> ';
    $isValid=true;
    $pass=null;
    $date=null;

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        
        if($_POST['name'] == "" || strlen($_POST['name']) <2 || (strpbrk($_POST['name'] , '1234567890') !== false)){
            $isValid=false;
        }
        else{}
        
        if($_POST['email'] != ""){
            if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Email</i> ';
                $isValid=false;
            }
        }
        else{
            $isValid=false;
        }
        
        if($_POST['userName'] == ""){
            //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* This UserId is not available</i> ';
            $isValid=false;
        }
        else{}
        
        if($_POST['password'] == "" || strlen($_POST['password']) <4){
            //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* This is required(4 char min)</i> ';
            $isValid=false;
            $pass=null;
        }
        else
        {
            $pass=$_POST['password'];
        }
        
        if($_POST['cpass'] !== $pass){
            //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Password does not match</i> ';
            $isValid=false;
        }
        else{}
        
        if( ((int)$_POST['day']<0 || (int)$_POST['day']>31) || ((int)$_POST['month']<1 || (int)$_POST['month']>12) || ((int)$_POST['year']<1900 || (int)$_POST['year']>2016) || !is_numeric($_POST['day']) || !is_numeric($_POST['month']) || !is_numeric($_POST['year']) ){
            //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please give a valid Date</i> ';
            $isValid=false;
        }
        else
        {
            $date = $_POST['day'].'/'.$_POST['month'].'/'.$_POST['year'];
        }
        
        if($_POST['country']=="Select"){
            //echo '<i style="color:red;font-size:15px;font-family:calibri ;">* Please select a Country</i> ';
                    $isValid=false;
        }
        else{}
        
        
        
        if($isValid){

    //        $myfile = fopen("user.txt", "a");
    //        $data = $_POST['name']. "|". $_POST['user']. "|". $_POST['email']."|". $_POST['password']."|". $_POST['country']."|".                 $_POST['date']."\r\n";
    //        fwrite($myfile, $data);   
    //        fclose($myfile);
    //        $_SESSION['log'] = "validuser";

            $conn = mysqli_connect('localhost', 'root', '', 'criclive');

            if(!$conn)
            {
                echo "DB Error: ".mysqli_connect_error();
            }
            else{
                echo "Success <br/>";
            }

            $sql = "INSERT into login values('".$_POST['userName']."','".$_POST['password']."','user')";

            if(mysqli_query($conn, $sql))
            {
                //echo "Inserted";
            }
            else{
                echo "Not Registered";
            }
            
            $sql2 = "INSERT into user values('".$_POST['userName']."','".$_POST['password']."','".$_POST['name']."','".$_POST['email']."','".$_POST['country']."','".$date."')";

            if(mysqli_query($conn, $sql2))
            {
                //echo "Inserted";
            }
            else{
                echo "Not Registered";
            }
            
            $zero = 0;
            
            $sql3 = "INSERT into rank values('".$_POST['userName']."','".$_POST['name']."','".$_POST['country']."',".$zero.")";

            if(mysqli_query($conn, $sql3))
            {
                //echo "Inserted";
            }
            else{
                echo "Not Registered";
            }
            
            
//            $balance = 50000;
//            $sql4 = "INSERT into team (user_id, balance) values('".$_POST['userName']."',".$balance.")";
//
//            if(mysqli_query($conn, $sql4))
//            {
//                //echo "Inserted";
//            }
//            else{
//                echo "Not Registered";
//            }
            
            

            mysqli_close($conn);

            echo "<script> location.replace('../login.html'); </script>";

        }
        else{
            echo "<script> location.replace('register.html'); </script>";  
        } 
        
    }
    else{
        echo "<script> location.replace('register.html'); </script>";  
    } 

    
  ?>