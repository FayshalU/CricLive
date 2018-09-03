<?php
	session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }
    
    $matchid = $_GET['id'];
    $team1 = null;
    $team2 = null;
    $innings = 0;
    $batting = null;
    $bowling = null;

    $conn = mysqli_connect('localhost', 'root', '', 'criclive');
                        
    $sql= "SELECT * FROM `play` where `match_id`='".$matchid."'";

    $result = mysqli_query($conn, $sql);
    //echo mysqli_num_rows($result);
    $i = 0;
    $t1 = null;
    $t2 = null;

    while($row = mysqli_fetch_assoc($result)){ 

        $t1 = $row['team1'];
        $t2 = $row['team2'];
        $innings = $row['innings'];
    }
    
    if($innings == 2){
        
        $team1 = $t2;
        $team2 = $t1;
        $batting = $matchid."_2";
        $bowling = $matchid."_1";
    }
    else{
        
        $team1 = $t1;
        $team2 = $t2;
        $batting = $matchid."_1";
        $bowling = $matchid."_2";
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
    <table width="100%" id="headerstyle"style="color:green;" height="50px">
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
<<<<<<< HEAD
                                <li><a href="#">Timeline</a></li>
                              <br>  <li><a href="createnewmatch.php">Create match</a></li>
=======
                                <li><a href="editor.php">Timeline</a></li>
                                <li><a href="createnewmatch.php">Create match</a></li>
>>>>>>> cd12985c49608fe062e08ee1822e3ce2fc042309
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
								<li><a href="pollcreate.php"> Create Poll</a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
            <td width="75%" valign="top">
                <table>
                    <tr>
                        <th>Batting</th>
                        <td  width="10%"></td>
                        <th>Bowling</th>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                On Strike :
                                
                                <span id="player1"></span>
<!--                                <select id="player1" onchange="changeOn(this)">-->
                            <?php
//                                    $conn = mysqli_connect('localhost', 'root', '', 'criclive');
//
//                                    $sql= "SELECT * FROM `country` where team_id='".$team1."'";
//
//                                    $result = mysqli_query($conn, $sql);
//                                    //echo mysqli_num_rows($result);
//
//                                    while($row = mysqli_fetch_assoc($result)){
//
//                                        for($i=1; $i<12; $i++){
//
//                                            echo '<option value="'.$row["player".$i].'">'.$row["player".$i].'</option>';
//
//                                        }
//
//                                    }
//                                    mysqli_close($conn);
                                ?>

<!--                                </select>-->

                                <input type="button" id="swap" value="Swap" onclick="swapBatsman()">

                                <br>
                                Off Strike : 
                                
                                <span id="player2"></span>
<!--
                                <select id="player2" onchange="changeOff(this)">
                                    <?php
//                                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
//
//                                        $sql= "SELECT * FROM `country` where team_id='".$team1."'";
//
//                                        $result = mysqli_query($conn, $sql);
//                                        //echo mysqli_num_rows($result);
//
//                                        while($row = mysqli_fetch_assoc($result)){
//
//                                            for($i=1; $i<12; $i++){
//
//                                                echo '<option value="'.$row["player".$i].'">'.$row["player".$i].'</option>';
//
//                                            }
//
//                                        }
//                                        mysqli_close($conn);
                                    ?>
                                </select>
-->
                            </div>

                            <div>

                                <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                                        $sql= "SELECT * FROM `batting` where id='".$batting."'";

                                        $result = mysqli_query($conn, $sql);
                                        //echo mysqli_num_rows($result);
                                        $playerNum1 = null;
                                        $playerNum2 = null;
                                        $score = null;
                                        $wicket = null;
                                        $extra = null;
                                        $over = null;
                                        while($row = mysqli_fetch_assoc($result)){

                                            $playerNum1 = $row['batsman1'];
                                            $playerNum2 = $row['batsman2'];
                                            $pl1 = explode('/', $row[$playerNum1]);
                                            $pl2 = explode('/', $row[$playerNum2]);

                                            $score = $row['score'];
                                            $wicket = $row['wicket'];
                                            $extra = $row['extra'];
                                            $over = explode('.', $row['over']);

                                        }
                                        
                                        $over1 = $over[0];
                                        $over2 = $over[1];

                                        $sql= "SELECT * FROM `country` where team_id='".$team1."'";

                                        $result = mysqli_query($conn, $sql);
                                        //echo mysqli_num_rows($result);
                                        $playerName1 = null;
                                        $playerName2 = null;

                                        while($row = mysqli_fetch_assoc($result)){

                                            $playerName1 = $row[$playerNum1];
                                            $playerName2 = $row[$playerNum2];


                                        }



                                        mysqli_close($conn);
                                    ?>

                                <span id="on"><?=$playerName1?></span>
                                <span id="onrun"><?=$pl1[0]?></span>
                                (<span id="onball"><?=$pl1[1]?></span>)
                            </div>
                            <div>
                                <span id="off"><?=$playerName2?></span>
                                <span id="offrun"><?=$pl2[0]?></span>
                                (<span id="offball"><?=$pl2[1]?></span>)
                            </div>
                        </td>
                        <td></td>
                        <td>
                            <div>
                                On Strike :
                                <span id="bowler1"></span>
<!--
                                <select id="bowler1" onchange="changeBOn(this)">
                            <?php
//                                    $conn = mysqli_connect('localhost', 'root', '', 'criclive');
//
//                                    $sql= "SELECT * FROM `country` where team_id='".$team2."'";
//
//                                    $result = mysqli_query($conn, $sql);
//                                    //echo mysqli_num_rows($result);
//
//                                    while($row = mysqli_fetch_assoc($result)){
//
//                                        for($i=1; $i<12; $i++){
//
//                                            echo '<option value="'.$row["player".$i].'">'.$row["player".$i].'</option>';
//
//                                        }
//
//                                    }
//                                    mysqli_close($conn);
                                ?>

                                </select>
-->

                                <input type="button" id="swap" value="Swap" onclick="swapBowler()">

                                <br>
                                Off Strike :
                                <span id="bowler2"></span>
<!--
                                <select id="bowler2" onchange="changeBOff(this)">
                                    <?php
//                                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');
//
//                                        $sql= "SELECT * FROM `country` where team_id='".$team2."'";
//
//                                        $result = mysqli_query($conn, $sql);
//                                        //echo mysqli_num_rows($result);
//
//                                        while($row = mysqli_fetch_assoc($result)){
//
//                                            for($i=1; $i<12; $i++){
//
//                                                echo '<option value="'.$row["player".$i].'">'.$row["player".$i].'</option>';
//
//                                            }
//
//                                        }
//                                        mysqli_close($conn);
                                    ?>
                                </select>
-->
                            </div>

                            <div>

                                <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                                        $sql= "SELECT * FROM `bowling` where id='".$bowling."'";

                                        $result = mysqli_query($conn, $sql);
                                        //echo mysqli_num_rows($result);
                                        $bowlerNum1 = null;
                                        $bowlerNum2 = null;
                                        
                                        $over = null;
                                        while($row = mysqli_fetch_assoc($result)){

                                            $bowlerNum1 = $row['bowler1'];
                                            $bowlerNum2 = $row['bowler2'];
                                            $bl1 = $row[$bowlerNum1];
                                            $bl2 = $row[$bowlerNum2];


                                        }


                                        $sql= "SELECT * FROM `country` where team_id='".$team2."'";

                                        $result = mysqli_query($conn, $sql);
                                        //echo mysqli_num_rows($result);
                                        $bowlerName1 = null;
                                        $bowlerName2 = null;

                                        while($row = mysqli_fetch_assoc($result)){

                                            $bowlerName1 = $row[$bowlerNum1];
                                            $bowlerName2 = $row[$bowlerNum2];


                                        }



                                        mysqli_close($conn);
                                    ?>

                                <span id="b_on"><?=$bowlerName1?></span>
                                <span id="b_onscore"><?=$bl1?></span>
                                
                            </div>
                            <div>
                                <span id="b_off"><?=$bowlerName2?></span>
                                <span id="b_offscore"><?=$bl2?></span>
                                
                            </div>
                        </td>
                        
                        <td width="10%"></td>
                        
                        <td id="bowl">
                            <h2>Bowlers</h2>
                            <table>
                                <?php
                                        $conn = mysqli_connect('localhost', 'root', '', 'criclive');

                                        $sql= "SELECT * FROM `country` where team_id='".$team2."'";

                                        $result = mysqli_query($conn, $sql);
                                        //echo mysqli_num_rows($result);

                                        while($row = mysqli_fetch_assoc($result)){

                                            for($i=1; $i<12; $i++){
                                                echo "<tr><td><div onclick='choseBowler(this)'>".$row['player'.$i]."</div></td></tr>" ;
                                                

                                            }

                                        }
                                        mysqli_close($conn);
                                    ?>
                            </table>
                            <span id="b_err">Choose a different bowler</span>
                        </td>
                    </tr>
                    
                </table>
                
                
                <br>
                Score <span id="run"><?=$score?></span>/<span id="wicket"><?=$wicket?></span>
                Over <span id="over"><?=$over1?></span>.<span id="ball"><?=$over2?></span>
                Extra <span id="ext"><?=$extra?></span>
                
                <br>
                <br>
                
                <input type="button" value="6" id="6" onclick="addScore(this)">
                <input type="button" value="4" id="4" onclick="addScore(this)">
                <input type="button" value="3" id="3" onclick="addScore(this)">
                <input type="button" value="2" id="2" onclick="addScore(this)">
                <input type="button" value="1" id="1" onclick="addScore(this)">
                <input type="button" value="0" id="0" onclick="addScore(this)">
                <input type="button" value="Wicket" id="Wicket" onclick="addWicket()">
                <br>
                <br>
                Extra:
                <input type="button" value="NO" id="NO" onclick="addExtrabtn(this)">
                <input type="button" value="WD" id="WD" onclick="addExtrabtn(this)">
                <input type="text" value="" id="extra">
                <input type="button" value="Add" id="add" onclick="addExtra()">
                <span id="error">Please give a valid score</span>
                
                <br>
                <br>
                
                <input type="button" value="2nd Innings" id="2nd" onclick="next()">
                <input type="button" value="Match Finish" id="finish" onclick="finish()">
                
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
        var team1 = '<?=$team1?>';
        var team2 = '<?=$team2?>';
        var batting = '<?=$batting?>';
        var bowling = '<?=$bowling?>';
        //console.log(team1);
        var p1 = null;
        var p2 = null;
        var b1 = null;
        var b2 = null;
        
        var r = parseInt($("#run").text());
        var w = parseInt($("#wicket").text());
        var o = parseInt($("#over").text());
        var b = parseInt($("#ball").text());
        var e = parseInt($("#ext").text());
        var pr = parseInt($("#onrun").text());
        var pb = parseInt($("#onball").text());
        
        $(document).ready(function(){

           $("#error").hide();
           $("#bowl").hide();
           $("#b_err").hide();
            
            var innings = <?=$innings?>;
            //console.log(innings);
            if(innings == 2){
                $("#2nd").hide();
            }
            
            //$("#on").text($("#player1 option:first").val());
            //$('#player1').find('option:first').attr('selected', 'selected');
            p1 = '<?=$playerName1?>';
            $("#player1").text(p1);
            
            //$("#player2").val($("#player2 option:eq(1)").val());
            //$("#off").text($("#player2 option:eq(1)").val());
            //$('#player2').find('option:eq(1)').attr('selected', 'selected');
            p2 = '<?=$playerName2?>';
            $("#player2").text(p2);
            
            b1 = '<?=$bowlerName1?>';
            b2 = '<?=$bowlerName2?>';
            $("#bowler1").text(b1);
            $("#bowler2").text(b2);

        });
        
        function addScore(obj){
            
            $.get("addRun.php?id="+batting+"&run="+obj.value, function(data, status){
                //alert("Data: " + data + "\nStatus: " + status);
                if(status == "success"){
                    $("#run").text(data);
                }
            });
            
            $.get("addRunBowler.php?id="+bowling+"&run="+obj.value, function(data1, status){
                //alert("Data: " + data + "\nStatus: " + status);
                if(status == "success"){
                    $("#b_onscore").text(data1);
                }
            });
            
            
            pr = parseInt($("#onrun").text());
            pb = parseInt($("#onball").text());
            pr += parseInt(obj.value);
            pb++;
            r += parseInt(obj.value);
            b++;
            if(b>5){
                b=0;
                o++;
                swapBatsman();
                //swapBowler();
                $("#bowl").show();
                offbtn();
            }
            
            if(obj.value == 1 || obj.value == 3){
                swapBatsman();
            }
            
            $("#onrun").text(pr);
            $("#onball").text(pb);
            //$("#run").text(r);
            $("#over").text(o);
            $("#ball").text(b);
            
            
            
            
//            var xmlhttp;
//            //console.log(obj.className );
//            if (window.XMLHttpRequest) {
//            // code for IE7+, Firefox, Chrome, Opera, Safari
//                xmlhttp=new XMLHttpRequest();
//            }else {  // code for IE6, IE5
//                xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//            }
//          xmlhttp.onreadystatechange=function() {
//            if (this.readyState==4 && this.status==200) {
//                //console.log(this.responseText);
//                document.getElementById(obj.className ).innerHTML=this.responseText;
//                
//            }
//          }
//          xmlhttp.open("GET","addRun.php?value="+obj.value,true);
//          xmlhttp.send();
        }
        
        function addExtra(){
            
            var num = $("#extra").val();
            //alert(isNumeric(num));
            if(isNumeric(num)){
                
                var val = parseInt(num);
                //alert(val);
                
                $.get("addExtra.php?id="+batting+"&run="+num, function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        $("#run").text(data);
                        
                        var extra = parseInt($("#ext").text());
                        extra += val;
                        $("#ext").text(extra);
                        $("#extra").val("");
                    }
                });
                
                
                
            }
            else{
                
                $("#error").show();
                
                
            }
            
            
            
            

        }
        
        function addExtrabtn(obj){
            
            $.get("addExtra.php?id="+batting+"&run=1", function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        $("#run").text(data);

                        e++;
                        $("#ext").text(e);
                        //$("#extra").val("");
                    }
                });
            
            $.get("addExtraBowler.php?id="+bowling+"&run=1", function(data1, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        $("#b_onscore").text(data1);
                    }
                });
            

        }
        
        function isNumeric(num){
          return !isNaN(num)
        }
        
        function addWicket(){
            
            $.get("addWicket.php?id="+batting+"&country="+team1+"&name="+b1, function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        //$("#run").text(data);
                        $("#on").text(jQuery.trim(data));
                        
                        p1 = jQuery.trim(data);
                        $("#player1").text(jQuery.trim(data));
                        console.log(data);
                        pr = 0;
                        pb = 0;
                        $("#onrun").text(pr);
                        $("#onball").text(pb);
                        
                        w++;
                        $("#wicket").text(w);
                        
                        b++;
                        if(b>5){
                            b=0;
                            o++;
                            swapBatsman();
                            //swapBowler();
                            $("#bowl").show();
                            offbtn();
                        }
                        $("#over").text(o);
                        $("#ball").text(b);
                    }
                });
            
            $.get("addWicketBowler.php?id="+bowling, function(data1, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        $("#b_onscore").text(data1);
                    }
                });

        }
        
        function changeOn(obj){
            if(obj.value != p2){
                $("#on").text(obj.value);
                p1 = obj.value;
            }
            else{
                
                console.log(p1+" "+p2 )
//                $('#player1 option[selected="selected"]').removeAttr('selected');
//                
//                $("#player1 option:[value='"+ p1 +"']").attr('selected');
                
                //$('#player1').removeAttr('selected').find('option:first').attr('selected', 'selected');
                $("#player1").text(p1);
            }
            
        }
        
        function changeOff(obj){
            
            if(obj.value != p1){
                $("#off").text(obj.value);
                p2 = obj.value;
            }
            else{
                
                console.log(p1+" "+p2 )
                
                //$('#player1').removeAttr('selected').find('option:first').attr('selected', 'selected');
                $("#player2").text(p2);
            }
            

        }
        
        function changeBOn(obj){
            if(obj.value != b2){
                $("#b_on").text(obj.value);
                b1 = obj.value;
            }
            else{
                
                console.log(b1+" "+b2 )
//                $('#player1 option[selected="selected"]').removeAttr('selected');
//                
//                $("#player1 option:[value='"+ p1 +"']").attr('selected');
                
                //$('#player1').removeAttr('selected').find('option:first').attr('selected', 'selected');
                $("#bowler1").text(b1);
            }
            
        }
        
        function changeBOff(obj){
            
            if(obj.value != b1){
                $("#b_off").text(obj.value);
                b2 = obj.value;
            }
            else{
                
                //console.log(p1+" "+p2 )
                
                //$('#player1').removeAttr('selected').find('option:first').attr('selected', 'selected');
                $("#bowler2").text(b2);
            }
            

        }
        
        function swapBatsman(){
            
            $.get("swapBatsman.php?id="+batting, function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        
                        var temp = p1;
                        p1 = p2;
                        p2 = temp;
                        
                        $("#player1").text(p1);
                        $("#player2").text(p2);
                        
                        $("#on").text(p1);
                        $("#off").text(p2);
                        
                        $("#onrun").text($("#offrun").text());
                        $("#onball").text($("#offball").text());
                        
                        var pr1 = $("#offrun").text();
                        var pb1 = $("#offball").text();
                        
                        $("#offrun").text(pr);
                        $("#offball").text(pb);
                        
                        pr = pr1;
                        pb = pb1;
                    }
                });
            
        }
        
        function swapBowler(){
            
            $.get("swapBowler.php?id="+bowling, function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        
                        var temp = b1;
                        b1 = b2;
                        b2 = temp;
                        
                        $("#bowler1").text(b1);
                        $("#bowler2").text(b2);
                        
                        $("#b_on").text(b1);
                        $("#b_off").text(b2);
                        
                        temp = $("#b_onscore").text();
                        $("#b_onscore").text($("#b_offscore").text());
                        $("#b_offscore").text(temp);
                        
                        
                    }
                });
            
        }
        
        function choseBowler(obj){
            
            if(obj.innerHTML == b1){
                $("#b_err").show();
            }
            else{
                
                $.get("changeBowler.php?id="+bowling+"&name="+obj.innerHTML+"&country="+team2, function(data, status){
                    //alert("Data: " + data + "\nStatus: " + status);
                    if(status == "success"){
                        
                        var temp = obj.innerHTML;
                        
                        b2 = b1;
                        b1 = temp;
                        
                        $("#bowler1").text(b1);
                        $("#bowler2").text(b2);
                        
                        $("#b_on").text(b1);
                        $("#b_off").text(b2);
                        
                        temp = $("#b_onscore").text();
                        $("#b_onscore").text(data);
                        $("#b_offscore").text(temp);
                        
                        $("#bowl").hide();
                        $("#b_err").hide();
                        
                        onbtn();
                    }
                });
            }
            
            
            
        }
        
        function offbtn(){
            $(':button').prop('disabled', true);
        }
        
        function onbtn(){
            $(':button').prop('disabled', false);
        }
        
        function finish(){
            window.location = 'matchFinish.php?id=<?=$matchid?>';
        }
        
        function next(){
            window.location = 'nextInnings.php?id=<?=$matchid?>';
        }
        
    </script>
    
    <?php include 'footer.php';?>
</body>
</html>
