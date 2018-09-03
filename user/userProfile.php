<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}
    
    $user = $_GET['id'];
    $name = null;
    $email = null;
    $dob = null;
    $country = null;
    $post = null;
    
    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

//        if(!$conn)
//        {
//            echo "DB Error: ".mysqli_connect_error();
//        }
//        else
//        {
//            echo "Success <br/>";
//        }

    $sql= "SELECT * from `user` where id='".$user."'";

    //echo $_POST['luser'];
    //echo $sql;

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($result))
    {
        $name = $row['name'];
        $email = $row['email'];
        $dob = $row['date'];
        $country = $row['country'];
    }
    
//    $sql= "SELECT * from `post` where user_id='".$user."'";
//
//    //echo $_POST['luser'];
//    //echo $sql;
//
//    $result = mysqli_query($conn, $sql);
//
//    $post =  mysqli_num_rows($result);
    
    mysqli_close($conn);

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
</head>
<body>
    <table width="100%"id="headerstyle" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    
    <table id="mainframe"width="100%"height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="#">Timeline</a></li>
                               <br> <li><a href="myTeam.php"> My Team</a></li>
                                <li><a href="ranking.php"> My Ranking</a></li>
                                <li><a href="poll.php"> Current Polls </a></li>
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
                                <p id="name"><?=$name?></p>
                            </center>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <center><p id="country"><?=$country?></p></center>
                        </td>
                    </tr>
                    <tr>
                        <td><p style="text-align: lest;">Rank</p></td>
                        <td><p style="text-align: right;" id="post">12</p></td>
                    </tr>
                    <tr>
                        <td width="50%"><p style="text-align: left;">Email</p></td>
                        <td><p style="text-align: right;" id="email"><?=$email?></p></td>
                    </tr>
                    
                    <tr>
                        <td><p style="text-align: lest;">Date Of Birth</p></td>
                        <td><p style="text-align: right;" id="date"><?=$dob?></p></td>
                    </tr>
                    
                </table>
            </td>
            <td width="15%"></td>
        </tr>
    </table>
    
    <?php include 'footer.php';?>
    
    <script>
        
//        document.getElementById("name").innerHTML = <?php echo json_encode($_SESSION['name']); ?>;
//        document.getElementById("email").innerHTML = <?php echo json_encode($_SESSION['email']); ?>;
//        document.getElementById("country").innerHTML = <?php echo json_encode($_SESSION['country']); ?>;
//        document.getElementById("date").innerHTML = <?php echo json_encode($_SESSION['date']); ?>;
        
    </script>
</body>
</html>
