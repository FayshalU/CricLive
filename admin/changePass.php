<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'getInfo.php';
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
    <table width="100%" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="user.php"><center>CricLive</center></a></td>
            <td width="10%" style="color:green;"><a href="viewScore.php"><center>Live Score</center></a></td>
            <td width="50%"></td>
            <td width="10%"><a href="profile.php"><center>Profile</center></a></td>
            <td width="10%"><a href="logout.php"><center>Log Out</center></a></td>
            
        </tr>
    </table >
    <br/>
    <table width="100%">
        <tr>
            <td  width="20%" valign="top">
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="profile.php">My info</a></li>
                                <li><a href="changeInfo.php"> Change Info </a></li>
                                <li><a href="#"> Change Password</a></li>
                                <li><a href="changePic.php"> Change Picture </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="15%"></td>
            <td width="50%">
                <fieldset>
                <form method="post" action="addPass.php" onsubmit="return checkValid()">
                <br/>
                
                <table width="100%" cellpadding="0" cellspacing="0">
                    
                    <tr>
                        <td>Current Password</td>
                        <td>:</td>
                        <td>
                            <input type="password" id="current" name="current" placeholder="Current Password" oninput="checkCurrent()" onblur="checkCurrent()" required/>
                            <span id="ecurrent" style="color:red;font-size:15px;font-family:calibri ;"></span>
                            
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                    <td>New Password</td>
                        <td>:</td>
                        <td>
                            <input type="password" class="form-control" placeholder="New Password" name="password" oninput="checkPass()" onblur="checkPass()" minlength="4" required id="password" />
                            <span id="epass" style="color:red;font-size:15px;font-family:calibri ;"></span>
                            
                        </td>
                        <td></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>

                    <tr>
                        <td>Confirm Password</td>
                        <td>:</td>
                        <td>
                            <input type="password" class="form-control" placeholder="Retype Password" name="cpass" oninput="checkCPass()" onblur="checkCPass()" minlength="4" required id="cpass" />
                            <span id="ecpass" style="color:red;font-size:15px;font-family:calibri ;"></span>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>

                </table>
                
                <div ><p id="error" style="color:red;font-size:15px;font-family:calibri;display: none;">Password is not correct</p></div>
                <div ><p id="success" style="color:green;font-size:15px;font-family:calibri;display: none;">Password is changed</p></div>
                    
                <input type="submit" value="Confirm">
            </form>
                    
                    
            </fieldset>
            </td>
            <td width="15%"></td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
        function getString(name) {
            var url = window.location.href;
            name = name.replace(/[\[\]]/g, '\\$&');
            var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
                results = regex.exec(url);
            if (!results) return null;
            if (!results[2]) return '';
            return decodeURIComponent(results[2].replace(/\+/g, ' '));
        }
        
        if (getString('msg') == 'e') {
            document.getElementById('error').style.display = 'block';
        }
        else if (getString('msg') == 's') {
            document.getElementById('success').style.display = 'block';
        }
        else {
            document.getElementById('error').style.display = 'none';
            document.getElementById('success').style.display = 'none';
        }
        
        var isValid = true;
        
        
        function checkCurrent(){
            
            var data = document.getElementById("current");
            
            if(data.value == ""){
                document.getElementById("ecurrent").innerHTML = "*This can not be empty";
                isValid = false;
            }
            else if(data.value != <?php echo json_encode($_SESSION['password']); ?>){
                isValid = false;
               document.getElementById("ecurrent").innerHTML = "*Password does not match";
            }
            else{
                document.getElementById("ecurrent").innerHTML = "";
            }
            
        }
        
        function checkPass(){
            var data = document.getElementById("password");
            if(data.value == ""){
                document.getElementById("epass").innerHTML = "*This can not be empty";
                isValid = false;
            }
            else if(data.value.length < 4){
                document.getElementById("epass").innerHTML = "*Minimum 4 characters";
                isValid = false;
            }
            else{
                document.getElementById("epass").innerHTML = "";
            }
        }
        
        function checkCPass(){
            var data = document.getElementById("cpass");
            if(data.value == ""){
                document.getElementById("ecpass").innerHTML = "*This can not be empty";
                isValid = false;
            }
            else if(data.value.length < 4){
                document.getElementById("ecpass").innerHTML = "*Minimum 4 characters";
                isValid = false;
            }
            else if(data.value != document.getElementById("password").value){
                document.getElementById("ecpass").innerHTML = "*Password does not match";
                isValid = false;
            }
            else{
                document.getElementById("ecpass").innerHTML = "";
            }
        }
        
        function checkValid(){
            
            isValid = true;
            this.checkCurrent();
            this.checkPass();
            this.CheckCPass();
            
            if(isValid){
                
                console.log("Update Complete");
                
                
                
                return true;
            }
            else{
                return false;
            }
            
        }
        
    </script>
    
</body>
</html>
