<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if($_POST['name'] == "" || strlen($_POST['name']) <2)
        {
            header("location:reg.php?status=n");
        }
        
        else if($_POST['email'] == "" || (strpos($_POST['email'] , "@")<1) || ((strpos($_POST['email'] , ".")) < (strpos($_POST['email'] , "@") +2))) 
        {
            header("location:reg.php?status=e");
        }
        else if(!isset($_POST['gender']))
        {
            header("location:reg.php?status=g");
        }
        else if( ((int)$_POST['day']<0 || (int)$_POST['day']>31) || ((int)$_POST['month']<1 || (int)$_POST['month']>12) || ((int)$_POST['year']<1900 || (int)$_POST['year']>2016) )
        {
            header("location:reg.php?status=d");
        }
       
       
       
    
    else{
        $name = $_POST['name'];
        $mail = $_POST['email'];
        $password = $_POST['password'];
        $gender   = $_POST['gender'];


        

            $myfile = fopen("user.txt", "a");
            $data = $name. "|". $email. "|".$password. "|". $gender."\r\n";
            fwrite($myfile, $data);   
            fclose($myfile);
            header("location: login.php");
    }
    }
?>