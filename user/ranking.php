<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'getInfo.php';
    }

    $ser = 0;
    
    $conn1 = mysqli_connect('localhost', 'root', '', 'criclive');
    $sql1 = "SELECT * FROM rank";
    $result1 = mysqli_query($conn1, $sql1);
    $count = mysqli_num_rows($result1);

    function serial($id){
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

        $sql = "SELECT @a:=@a+1 serial_number, points,user_id FROM rank, (SELECT @a:= 0) AS a ORDER BY `points` DESC";

        $result = mysqli_query($conn, $sql);
        //echo mysqli_num_rows($result);
        
        $count = mysqli_num_rows($result);
        while($row = mysqli_fetch_assoc($result)){
            //echo $row['serial_number']." ".$row['points']."<br>";
            
            if($row['user_id'] == $id){
                return $row['serial_number'];
            }
            
        }
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
  
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>
    <table width="100%"id="headerstyle" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    
    <table id="mainframe"width="100%" height="640px">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="user.php">Timeline</a></li>
                               <br> <li><a href="myTeam.php"> My Team</a></li>
                                <li><a href="#"> My Ranking</a></li>
                                <li><a href="poll.php"> Current Polls </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%" valign="top">
                <table  width="100%" border="1px">
                    <tr>
                        <td>
                            <div>
                              <center><h3>Rankings</h3></center>
                            </div>
                              <table width="100%">
                                <thead>
                                <tr>
                                    <th><center>#</center></th>
                                    <th><center>ID</center></th>
                                    <th><center>Name</center></th>
                                    <th><center>Country</center></th>
                                    <th><center>Points</center></th>
                                </tr>
                                </thead>
                                
                                <?php
                                  
                                    $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                                    $sql= "SELECT * FROM `rank` ORDER BY `points` DESC";

                                    $result = mysqli_query($conn, $sql);
                                    //echo mysqli_num_rows($result);
                                    $i = 0;
                                    $pos = serial($_SESSION['id']);
                                    if($_GET['se']!=""){
                                        
                                        $ser = $_GET['se'];
                                        //echo $ser;
                                        while($row = mysqli_fetch_assoc($result)){
                                            //echo serial($row['user_id']);
                                            if($i<10 && (serial($row['user_id'])>=$ser)){
                                                //echo $row['user_id'];
                                                $str = 'userProfile.php?id='. $row['user_id'];
                                                
                                                if($row['user_id'] == $_SESSION['id']){
                                ?>
                                                 <tr style="outline: thin solid; color:blue;">
                                                  <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                    <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                    <td><center><?=$row['name']?></center></td>
                                                  <td><center><?=$row['country']?></center></td>
                                                  <td><center><?=$row['points']?></center></td>
                                                </tr>   

                                    <?php
                                                //echo $count;
                                                continue;
                                            }
                                    ?>

                                            <tr>
                                              <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                <td><center><?=$row['name']?></center></td>
                                              <td><center><?=$row['country']?></center></td>
                                              <td><center><?=$row['points']?></center></td>
                                            </tr>


                                    <?php
                                    
                                            $i++;
                                            }else{
                                                //break;
                                            }
                                        }
                                        
                                    }
                                    else if($count>10 && ($count-$pos<10)){
                                        $ser = $count-10;
                                        while($row = mysqli_fetch_assoc($result)){
                                            if($i<10 && (serial($row['user_id'])>=$ser)){
                                                
                                                $str = 'userProfile.php?id='. $row['user_id'];
                                                
                                                if($row['user_id'] == $_SESSION['id']){
                                ?>
                                                 <tr style="outline: thin solid; color:blue;">
                                                  <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                    <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                    <td><center><?=$row['name']?></center></td>
                                                  <td><center><?=$row['country']?></center></td>
                                                  <td><center><?=$row['points']?></center></td>
                                                </tr>   

                                    <?php
                                                //echo $count;
                                                continue;
                                            }
                                    ?>

                                            <tr>
                                              <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                <td><center><?=$row['name']?></center></td>
                                              <td><center><?=$row['country']?></center></td>
                                              <td><center><?=$row['points']?></center></td>
                                            </tr>


                                    <?php
                                    
                                            $i++;
                                            }else{
                                                //break;
                                            }
                                        }
                                  
                                  
                                    }
                                    else if($count>10){
                                        
                                        $ser = serial($_SESSION['id']);
                                        while($row = mysqli_fetch_assoc($result)){
                                            if($i<10 && (serial($row['user_id'])>=$ser)){
                                                
                                                $str = 'userProfile.php?id='. $row['user_id'];
                                                
                                                if($row['user_id'] == $_SESSION['id']){
                                ?>
                                                 <tr style="outline: thin solid; color:blue;">
                                                  <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                    <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                    <td><center><?=$row['name']?></center></td>
                                                  <td><center><?=$row['country']?></center></td>
                                                  <td><center><?=$row['points']?></center></td>
                                                </tr>   

                                    <?php
                                                //echo $count;
                                                continue;
                                            }
                                    ?>

                                            <tr>
                                              <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                <td><center><?=$row['name']?></center></td>
                                              <td><center><?=$row['country']?></center></td>
                                              <td><center><?=$row['points']?></center></td>
                                            </tr>


                                    <?php
                                    
                                            $i++;
                                            }else{
                                                //break;
                                            }
                                        }
                                        
                                    }
                                    else{
                                        
                                        while($row = mysqli_fetch_assoc($result)){
                                            if($i<10){
                                                
                                                $str = 'userProfile.php?id='. $row['user_id'];
                                                
                                                if($row['user_id'] == $_SESSION['id']){
                                ?>
                                                 <tr style="outline: thin solid; color:blue;">
                                                  <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                    <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                    <td><center><?=$row['name']?></center></td>
                                                  <td><center><?=$row['country']?></center></td>
                                                  <td><center><?=$row['points']?></center></td>
                                                </tr>   

                                    <?php
                                                //echo $count;
                                                continue;
                                            }
                                    ?>

                                            <tr>
                                              <td><center><?php echo serial($row['user_id']) ?></center></td>
                                                <td><center><a href='<?=$str?>'><?=$row['user_id']?></a></center></td>
                                                <td><center><?=$row['name']?></center></td>
                                              <td><center><?=$row['country']?></center></td>
                                              <td><center><?=$row['points']?></center></td>
                                            </tr>


                                    <?php
                                    
                                            $i++;
                                            }else{
                                                //break;
                                            }
                                        }
                                    }
                                  
                                    mysqli_close($conn);
                                ?>
                                  
                                  
                            </table>
                            <br>
                            <center>
                                <input type="button" id="prev" value="Prev" onclick="prevbtn()">
                                <input type="button" id="next" value="Next" onclick="nextbtn()">
                            </center>
                        </td>
                    </tr>
                   
                </table>
            </td>
        </tr>
    </table>
   
    <?php include 'footer.php';?>
    
    <script>
        var count = <?php echo $count; ?>;
        console.log(count);
        if(count<11){
            document.getElementById("next").style.display = 'none';   
            document.getElementById("prev").style.display = 'none';   
        }else{
            document.getElementById("next").style.display = 'block';   
            document.getElementById("prev").style.display = 'block';   
        }
        
        function prevbtn(){
            var ser = <?php echo $ser; ?>-10;
            
            if(ser<0){
                location.replace('ranking.php?se=0');
            }
            else{
                location.replace('ranking.php?se='+ser);
            }
        }
        
        function nextbtn(){
            var ser = <?php echo $ser; ?>+10;
            
            if(ser+10 > count){
                var temp = count-10
                location.replace('ranking.php?se='+temp);
            }
            else{
                location.replace('ranking.php?se='+ser);
            }
        }
        
    </script>
    
</body>
</html>
