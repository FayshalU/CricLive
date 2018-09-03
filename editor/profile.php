<?php
  session_start();
  error_reporting(0);

  if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
  }else{
        include 'getInfoeditor.php';
    }    
  
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
 <link rel="stylesheet" type="text/css" href="../css/style.css">

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>

<body>
    <table width="100%" id="headerstyle" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="editor.php"><center>CricLive</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    
    <table id="mainframe" width="100%" height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="editor.php">Timeline</a></li>
                                <br><li><a href="createnewmatch.php">Create match</a></li>
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
                                <li><a href="pollcreate.php"> Create Poll Quistans </a></li>
                                <li><a href="changepass.php"> Change Password</a></li>
                        
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="15%"></td>
            <td width="50%">
                <table  width="100%" border="1">
                    <tr>
                        <td colspan="2">
                            <center>
                                <img src="../image/people.png" style="height:180px;">
                                <p id="name"></p>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><p id="country"></p></center>
                        </td>
                    </tr>
                    <tr>
                        <td width="50%"><p style="text-align: left;">ID</p></td>
                        <td><p style="text-align: right;" id="id"></p></td>
                    </tr>
                    <tr>
                        <td width="50%"><p style="text-align: left;">Email</p></td>
                        <td><p style="text-align: right;" id="email"></p></td>
                    </tr>           
                    <tr>
                        <td><p style="text-align: lest;">Date Of Birth</p></td>
                        <td><p style="text-align: right;" id="date"></p></td>
                    </tr>
                    
                </table>
            </td>
            <td width="15%"></td>
        </tr>
    </table>
   
    <?php include 'footer.php';?>
    
    <script>
        
        document.getElementById("id").innerHTML = <?php echo json_encode($_SESSION['id']); ?>;
        document.getElementById("name").innerHTML = <?php echo json_encode($_SESSION['name']); ?>;
        document.getElementById("email").innerHTML = <?php echo json_encode($_SESSION['email']); ?>;
        document.getElementById("country").innerHTML = <?php echo json_encode($_SESSION['country']); ?>;
        document.getElementById("date").innerHTML = <?php echo json_encode($_SESSION['date']); ?>;
        
    </script>
    
</body>
</html>