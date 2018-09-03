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
                

<td valign="top">
<center>
<a href="../index.php"><b>Cric</b>LIVE</a>
    <br/> <br/>
  
<fieldset style="width:50%" >
    <legend><b>REGISTRATION</b></legend>
    <form name="register" action="regCheck.php" onsubmit="return checkInfo()" method="post" valign="top">
        <br/>
        <table width="100%" cellpadding="0" cellspacing="0" >
            <tr>
                <td>Full Name</td>
                <td>:</td>
                <td>
                    <input name="name" type="text" placeholder="Name" value="" id="name" oninput="checkName()" onblur="checkName()" minlength="2" required />
                    <span id="ename" style="color:red;font-size:15px;font-family:calibri ;"></span>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td>
                    <input name="email" type="text" placeholder="Email" value="" oninput="checkEmail()" onblur="checkEmail()" required id="email">
                    <abbr title="hint: sample@example.com"><b>i</b></abbr>
                    <span id="eemail" style="color:red;font-size:15px;font-family:calibri ;"></span>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>User Id</td>
                <td>:</td>
                <td>
                    <input name="userName" type="text" placeholder="User Id" value="" oninput="checkUser()" onblur="checkUser()" required id="userName">
                    <span id="euser" style="color:red;font-size:15px;font-family:calibri ;"></span>
                </td>
                <td></td>
            </tr>       
            <tr><td colspan="4"><hr/></td></tr>
            
            <tr>
                <td>Password</td>
                <td>:</td>
                <td>
                    <input type="password" class="form-control" placeholder="Password" name="password" oninput="checkPass()" onblur="checkPass()" minlength="4" required id="password" />
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
            

            <tr>
                <td colspan="3">
                    <fieldset>
                        <legend>Date of Birth</legend>    
                        <input type="text" size="2" name="day" placeholder="DD" value="" oninput="checkDay()" onblur="checkDay()" required id="day" />/
                        <input type="text" size="2" name="month" placeholder="MM" value="" oninput="checkMonth()" onblur="checkMonth()" required id="month" />/
                        <input type="text" size="4" name="year" placeholder="YYYY" value="" oninput="checkYear()" onblur="checkYear()" required id="year" />
                        <font size="2"><i>(dd/mm/yyyy)</i></font>
                        <span id="edate" style="color:red;font-size:15px;font-family:calibri ;"></span>
                    </fieldset>
                </td>
                <td></td>
            </tr>
            <tr><td colspan="4"><hr/></td></tr>
            <tr>
                <td>Country</td>
                <td>:</td>
                <td>
                    <select name="country" id="country" onblur="checkCounty()" onchange="checkCounty()">
                        <option value="Select" >Select</option>
                        <option value="Afghanistan" >Afghanistan</option>
                        <option value="Australia" >Australia</option>
                        <option value="Bangladesh" >Bangladesh</option>
                        <option value="England" >England</option>
                        <option value="India" >India</option>
                        <option value="Ireland" >Ireland</option>
                        <option value="New Zealand" >New Zealand</option>
                        <option value="Pakistan" >Pakistan</option>
                        <option value="South Africa" >South Africa</option>
                        <option value="Srilanka" >Srilanka</option>
                        <option value="West Indies" >West Indies</option>
                        <option value="Zimbabwe" >Zimbabwe</option>
                    </select>
                    <span id="ecountry" style="color:red;font-size:15px;font-family:calibri ;"></span>
                </td>
                <td></td>
            </tr>
                    
        </table>
        <hr/>
        
        <input type="submit" value="Register">
    </form>
</fieldset>
</center></td>
    <script>
        var isValid = true;
        function checkName(){
            
            var re = /^[A-Za-z]+$/;
            console.log("Hello");
            //document.getElementById("ename").innerHTML = "*This can not be empty";
            var data = document.getElementById("name");
            if(data.value == ""){
                document.getElementById("ename").innerHTML = "*This can not be empty";
                isValid = false;
            }
            else if(data.value.length < 2){
                document.getElementById("ename").innerHTML = "*Minimum 2 characters";
                isValid = false;
            }
            else if(!re.test(data.value)){
                document.getElementById("ename").innerHTML = "*Can not contain numbers or special characters";
                isValid = false;
            }
            else{
                document.getElementById("ename").innerHTML = "";
            }
        }
        function checkEmail(){
            var re = /\S+@\S+\.\S+/;
            var data = document.getElementById("email");
            if(data.value == ""){
                document.getElementById("eemail").innerHTML = "*This can not be empty";
                isValid = false;
            }
            else if(!re.test(data.value)){
                document.getElementById("eemail").innerHTML = "*Give a valid email";
                isValid = false;
            }
            else{
                document.getElementById("eemail").innerHTML = "";
            }
        }
        function checkUser(){
            var data = document.getElementById("userName");
            if(data.value == ""){
                document.getElementById("euser").innerHTML = "*This can not be empty";
                isValid = false;
            }
            else{
                document.getElementById("euser").innerHTML = "";
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
        function checkDay(){
            var data = document.getElementById("day");
            if(data.value == ""){
                document.getElementById("edate").innerHTML = "*Day can not be empty";
                isValid = false;
            }
            else if(data.value.match(/^[0-9]+$/) == null){
                document.getElementById("edate").innerHTML = "*Day can not contain characters";
                isValid = false;
            }
            else{
                if(parseInt(data.value)<1 || parseInt(data.value)>31){
                    document.getElementById("edate").innerHTML = "*Day can be (1-31)";
                    isValid = false;
                }
                else{
                    document.getElementById("edate").innerHTML = "";
                }
                
            }
        }
        function checkMonth(){
            var data = document.getElementById("month");
            if(data.value == ""){
                document.getElementById("edate").innerHTML = "*Month can not be empty";
                isValid = false;
            }
            else if(data.value.match(/^[0-9]+$/) == null){
                document.getElementById("edate").innerHTML = "*Month can not contain characters";
                isValid = false;
            }
            else{
                if(parseInt(data.value)<1 || parseInt(data.value)>12){
                    document.getElementById("edate").innerHTML = "*Month can be (1-12)";
                    isValid = false;
                }
                else{
                    document.getElementById("edate").innerHTML = "";
                }
                
            }
        }
        function checkYear(){
            var data = document.getElementById("year");
            if(data.value == ""){
                document.getElementById("edate").innerHTML = "*Year can not be empty";
                isValid = false;
            }
            else if(data.value.match(/^[0-9]+$/) == null){
                document.getElementById("edate").innerHTML = "*Year can not contain characters";
                isValid = false;
            }
            else{
                if(parseInt(data.value)<1900 || parseInt(data.value)>2018){
                    document.getElementById("edate").innerHTML = "*Year can be (1900-2018)";
                    isValid = false;
                }
                else{
                    document.getElementById("edate").innerHTML = "";
                }
                
            }
        }
        function checkCounty(){
            var data = document.getElementById("country");
            if(data.value == "Select"){
                isValid = false;
                document.getElementById("ecountry").innerHTML = "*Country is required";
            }
            else{
                document.getElementById("ecountry").innerHTML = "";
            }
        }
        function checkInfo(){
            
            isValid = true;
            this.checkName();
            this.checkEmail();
            this.checkUser();
            this.checkPass();
            this.checkCPass();
            this.checkDay();
            this.checkMonth();
            this.checkYear();
            this.checkCounty();
            
            if(isValid){
                
                console.log("Registration Complete");
                
                //document.forms["register"].submit();

                //this.setCookie('reg','valid',365);
                
                //window.location.href = "regCheck.php";
                
                return true;
            }
            else{
                return false;
            }
        }
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires="+d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }
        
    </script>


            </td>
            
        </tr>

    </table>

    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>