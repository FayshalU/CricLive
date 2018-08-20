<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}
    else{
        include 'getInfo.php';
        
        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
        $sql= "SELECT * FROM `team` WHERE user_id='".$_SESSION['id']."'";

        $result = mysqli_query($conn, $sql);
        
        while($row = mysqli_fetch_assoc($result)){
            
            $balance = $row['balance'];
        }
        
        
        
        //mysqli_close($conn);
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
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="10%"><a href="#"><center>Series</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
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
                                <li><a href="myTeam.php">View Team</a></li>
                                <li><a href="#">Change Team</a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%">
                <table  width="100%" border="1">
                    <tr>
                        <td>
                            <div>
                              <center><h3>Available Balance: $<?=$balance?> </h3></center>
                            </div>
                              
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table>
                                <tr>
                                    <td width="65%">
                                        <table width="100%">
                                            <thead>
                                                <tr>
                                                    <th><center>Name</center></th>
                                                    <th><center>Country</center></th>
                                                    <th><center>Type</center></th>
                                                    <th><center>Rating</center></th>
                                                    <th><center>Change</center></th>
                                                </tr>
                                            </thead>
                                            
                                            <?php
                                            
                                                //$conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
                                                $sql= "SELECT * FROM `team` WHERE user_id='".$_SESSION['id']."'";

                                                $result = mysqli_query($conn, $sql);
                                                //echo mysqli_num_rows($result);
                                                
                                                while($row = mysqli_fetch_assoc($result)){ 
                                                    
                                                    $i = 1;
                                                    
                                                    while($i<12){
                                                        
                                                        $sql2= "SELECT * FROM `player info` WHERE player_id='".$row['player'.$i]."'";

                                                        $result2 = mysqli_query($conn, $sql2);
                                                        //echo mysqli_num_rows($result);

                                                        while($row2 = mysqli_fetch_assoc($result2)){
                                                            
                                            ?>
                                                            
                                                            <tr>
                                                                <td><center> <?=$row2['name']?> </center></td>
                                                                <td><center> <?=$row2['country']?> </center></td>
                                                                <td><center> <?=$row2['category']?> </center></td>
                                                                <td><center> <?=$row2['rating']?> </center></td>
                                                                <td><center> <input type="button" id="<?='player'.$i?>"  value="Remove" onclick="remove(this)"> </center></td>
                                                            </tr>
                                                
                                            <?php                
                                                        }
                                                        
                                                        $i++;
                                                        
                                                    }
                                                    
                                                }
                                                
                                                mysqli_close($conn);
                                            
                                            
                                            ?>
                                            
                                            <tr>
                                                <td colspan="4">
                                                    <br><br>
                                                    <center>
                                                        <div id="a" style="color:green;">Player already added</div>
                                                        <div id="b" style="color:green;">Not enough balance</div>
                                                        <div id="c" style="color:green;">Please remove a player to add new player</div>
                                                    </center>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td colspan="4">
                                                    <br><br>
                                                    <center><input type="button" id="confirm" value="confirm" onclick="createTeam()"> </center>
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </td>

                                    <td width="10%"></td>
                                    
                                    <td>
                                        <input type="text" id="search" placeholder="Player Name" onkeyup="searchPlayer(this)">
<!--                                        <input type="button" id="searchbtn" value="Search"> -->

                                        <br>
                                        <div style='background-color: #eee; width:250px; height:350px; border: 1px solid #000; margin:2px' id="player">
                                            
                                        </div>
                                        
                                        

                                    </td>
                                </tr>
                            </table>
                        </td>
                        
                    </tr>
                    
                   
                </table>
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
        var err = <?php echo json_encode($_GET['err']); ?> ;
        
        if(err == "a"){
            document.getElementById('a').style.display = 'block';
            document.getElementById('b').style.display = 'none';
            document.getElementById('c').style.display = 'none';
        }
        else if(err == "b"){
            document.getElementById('a').style.display = 'none';
            document.getElementById('b').style.display = 'block';
            document.getElementById('c').style.display = 'none';
        }
        else if(err == "c"){
            document.getElementById('a').style.display = 'none';
            document.getElementById('b').style.display = 'none';
            document.getElementById('c').style.display = 'block';
        }
        else{
            document.getElementById('a').style.display = 'none';
            document.getElementById('b').style.display = 'none';
            document.getElementById('c').style.display = 'none';
        }
        
        function searchPlayer(obj){
            if(obj.value != ""){
                var xmlHttp = new XMLHttpRequest();

                xmlHttp.open('GET', 'searchPlayer.php?txt='+obj.value, true);
                xmlHttp.send();

                xmlHttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        if(this.responseText == ""){
                            document.getElementById('player').innerHTML = "No Result";
                        }
                        else{
                            document.getElementById('player').innerHTML=this.responseText;
                        }
                    }
                }
            }
            else{
                document.getElementById('player').innerHTML = "No Result";
            }
        }
        
        function view(obj){
            
            document.getElementById('search').value = obj.innerHTML;
            
            var xmlHttp = new XMLHttpRequest();

                xmlHttp.open('GET', 'viewInfo.php?id='+obj.id, true);
                xmlHttp.send();

                xmlHttp.onreadystatechange = function (){
                    if(this.readyState == 4 && this.status == 200){
                        if(this.responseText == ""){
                            document.getElementById('player').innerHTML = "No Result";
                        }
                        else{
                            //document.getElementById('player').innerHTML=this.responseText;
                            
                            var data = JSON.parse(this.responseText);
                            var content="";
                            
                            var price = data['Rating'] * 1000;
                            
                            content = "<div id='"+data['ID']+"' class='info' ><br/>Id: "+data['ID'] +"<br/> Name: "+data['Name'] +"<br/> Country: "+data['Country']+"<br/> Category: "+data['Category']+"<br/> Rating: "+data['Rating']+"<br/> Price: "+price+"<br/><br/></div><center><input type='button' id='add' value='ADD' onclick='createTeam()'></center>";
                             
                            document.getElementById("player").innerHTML = content;
                            
                        }
                    }
                }
        }
        
        function createTeam(){
            
            var data = document.getElementsByClassName('info')['0'];
            
            console.log(data.id);
            
            location.replace('addPlayer.php?id='+data.id);
        }
        
        function remove(obj){
            
            console.log(obj.id);
            
            location.replace('removePlayer.php?id='+obj.id);
        }
        
    </script>
    
</body>
</html>
