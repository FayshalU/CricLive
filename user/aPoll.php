
<?php
	session_start();
	error_reporting(0);

	if(isset($_SESSION['log']))
    {
        header("location: user.php");
	}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CricLive - Cricket Score, News</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  
</head>
<!-- ADD THE CLASS layout-top-nav TO REMOVE THE SIDEBAR. -->
<body>
    <table width="100%" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="../index.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="../login.html"><center>Sign In</center></a></td>
            <td width="10%"><a href="register.html"><center>Sign Up</center></a></td>
            
        </tr>
    </table >
    <br/>
    <table width="100%">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="1">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="../index.php">Timeline</a></li>
                                <li><a href="#"> Current Polls</a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%">
                <table  width="100%" border="1">
                    <center><p style="font-size:25px;color:green;">New Polls</p></center>
                    <?php
                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                        $sql= "SELECT * FROM `poll`";

                        $result = mysqli_query($conn, $sql);
                        //echo mysqli_num_rows($result);
                        $i = 0;
                        while($row = mysqli_fetch_assoc($result)){ 
                            
                            echo "<tr> <td><center><p style='font-size:20px;'>".$row['heading']."</p></center>";
                            
                            $done = false;
                            
                            $value1 = $row['op1'];
                            $value2 = $row['op2'];
                            
                            
                            $sql2= "SELECT * FROM `polls` where poll_id='".$row['poll_id']."'";
                            $result2 = mysqli_query($conn, $sql2);
                            
                            while($row2 = mysqli_fetch_assoc($result2)){
                                
                                if($row2['user_id'] == $_SESSION['an']){
                                 
                                    $sql3= "SELECT * from polls where poll_id='".$row['poll_id']."'";

                                    $result3 = mysqli_query($conn, $sql3);

                                    $op1=0;
                                    $op2=0;

                                    while($row3 = mysqli_fetch_assoc($result3))
                                    {
                                        if($row3['response'] == $value1){
                                            $op1++;

                                        }
                                        else{
                                            $op2++;
                                        }
                                        //echo $row['response'];
                                    }
                                    
                                    $done = true;
                                    
                                    echo '<div style="width:100%;">
                                            <div>'.$value1." ". 100*round($op1/($op2+$op1),2).'% </div>
                                            <div style="background-color:lightblue; width:'. 100*round($op1/($op2+$op1),2).'%; height:20px;"></div>
                                            <div>'. $value2." ". 100*round($op2/($op2+$op1),2).'% </div>
                                            <div style="background-color:lightgreen; width:'. 100*round($op2/($op2+$op1),2).'%; height:20px;"</div>  
                                        </div>';
                                }
                                
                            }
                            
                            if($done){
                                
                                echo "<br><br></td> </tr>";
                                continue;
                                
                            }
                            
                            
                    ?>
                            
                        
                            <form method="post" action="#">
                                <div id="<?=$row['poll_id']?>">
                                    <input type="button" class="<?=$row['poll_id']?>" value="<?=$row['op1']?>" style="height:30px;width:48%" onclick="getVote(this)">
                                    <input type="button" class="<?=$row['poll_id']?>" value="<?=$row['op2']?>" style="height:30px;width:50%" onclick="getVote(this)">
                                </div>
                            </form>
                            

                                <br><br>
                            
                            
                        <?php
                            echo "</td> </tr>";
                            //echo $row['text'];
                            $i++;
                        }
                        
                        mysqli_close($conn);
                    
                    ?>
                </table>
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
        function getVote(obj) {
            var xmlhttp;
            console.log(obj.className );
          if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp=new XMLHttpRequest();
          } else {  // code for IE6, IE5
            xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
          }
          xmlhttp.onreadystatechange=function() {
            if (this.readyState==4 && this.status==200) {
                //console.log(this.responseText);
              document.getElementById(obj.className ).innerHTML=this.responseText;
                
            }
          }
          xmlhttp.open("GET","addPoll.php?id="+obj.className+"&vote="+obj.value,true);
          xmlhttp.send();
        }
        
    </script>
    
</body>
</html>