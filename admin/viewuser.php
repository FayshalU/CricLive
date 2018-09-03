<?php
    session_start();
    error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
    }else{
        include 'databaseconnection.php';
    }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <link rel="stylesheet" type="text/css" href="../css/style.css">
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <script src="../js/lib/jquery-3.3.1.js"></script>
</head>
<body>
    <table width="100%" id="headerstyle" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="admin.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    
    <table id="mainframe" width="100%" height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="admin.php">Timeline</a></li>
                                <br>
                                <li><a href="AddEditor.php">AddEditor</a></li>
                                <li><a href="viewEditor.php">viewEditor</a></li>
                                <li><a href="viewUser.php">viewUser</a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>

            <td valign="top">
                <table width="100%">
                    <thead>
                        <tr>
                            <th><center>ID</center></th>
                            <th><center>Name</center></th>
                            <th><center>Country</center></th>
                            <th><center>Change</center></th>
                        </tr>
                    </thead>
                    
                    <?php
                    
                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                        $sql= "SELECT * FROM `user` ";

                        $result = mysqli_query($conn, $sql);
                        //echo mysqli_num_rows($result);
                        
                        while($row = mysqli_fetch_assoc($result)){

                    ?> 

                                    
                            <tr>
                                <td><center> <?=$row['id']?> </center></td>
                                <td><center> <?=$row['name']?> </center></td>
                                <td><center> <?=$row['country']?> </center></td>
                                
                                <td><center> <input type="button" id="<?=$row['id']?>"  value="Remove" onclick="remove(this)"> </center></td>
                            </tr>
                        
                    <?php                
                             
                            
                        }
                        
                        mysqli_close($conn);
                    
                    
                    ?>
                    
                </table>
            </td>
            
       </tr>
    </table>

    

    <script>

        function remove(obj){
            
            console.log(obj.id);
            
            location.replace('removeUser.php?id='+obj.id);
        }

    </script>

    
</body>



