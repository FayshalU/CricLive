<?php
	session_start();
	error_reporting(0);

	if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'getInfo.php';
    }
    //echo $_SESSION['name'];
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
    <div w3-include-html="getInfo.php"></div>
    
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
                
                <table  width="100%" border="0">
                    <tr>
                        <center>
                            <td>

                                <ul>
                                <li><a href="profile.php">My info</a></li>
                                <li><a href="#"> Change Info </a></li>
                                <li><a href="changePass.php"> Change Password</a></li>
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
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <br/>
                
                <table width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td>Full Name</td>
                        <td>:</td>
                        <td>
                            <input name="name" id="name" type="text" placeholder="Name" value="" disabled >
                            <input type="button" value="Edit" onclick="nameEdit(this)" />
                            <input id="namebtn" type="button" value="Done" onclick="changeName()" style="display:none;" />
                            <span id="ename" style="color:red;font-size:15px;font-family:calibri ;"></span>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td>Email</td>
                        <td>:</td>
                        <td>
                            <input name="email" id="email" type="text" placeholder="Email" disabled>
                            <abbr title="hint: sample@example.com"><b>i</b></abbr>
                            <input type="button" value="Edit" onclick="emailEdit(this)" />
                            <input id="emailbtn" type="button" value="Done" onclick="changeEmail()" style="display:none;" />
                            <span id="eemail" style="color:red;font-size:15px;font-family:calibri ;"></span>
                        </td>
                        <td></td>
                    </tr>		
                    <tr><td colspan="4"><hr/></td></tr>


                    <tr>
                        <td>Date of Birth</td>
                        <td>:</td>
                        <td colspan="3">      
                            <input type="text" size="2" name="day" placeholder="DD" value="" id="day" disabled />/
                            <input type="text" size="2" name="month" placeholder="MM" value="" id="month" disabled />/
                            <input type="text" size="4" name="year" placeholder="YYYY" value="" id="year" disabled />
                            <font size="2"><i>(dd/mm/yyyy)</i></font>
                            <input type="button" value="Edit" onclick="dateEdit(this)" />
                            <input id="datebtn" type="button" value="Done" onclick="changeDate()" style="display:none;" />
                            <span id="edate" style="color:red;font-size:15px;font-family:calibri ;"></span>
                        </td>
                        <td></td>
                    </tr>
                    <tr><td colspan="4"><hr/></td></tr>
                    <tr>
                        <td>Country</td>
                        <td>:</td>
                        <td>
                            <div id="country1">
                                <input name="country" id="country" type="text" placeholder="Country" disabled>
                                <input type="button" value="Edit" onclick="countryEdit()" />
                            </div>
                            
                            <div id="country2">
                                <select name="country" id="countrysel">
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
                                <input id="countrybtn" type="button" value="Done" onclick="changeCountry()" />
                                
                                <span id="ecountry" style="color:red;font-size:15px;font-family:calibri ;"></span>
                            </div>
                        </td>
                        <td></td>
                    </tr>

                </table>
                <hr/>
            </form>
                    
            <script>
                
                document.getElementById("country2").style.display = 'none';
                
                document.getElementById("name").value = <?php echo json_encode($_SESSION['name']); ?>;
                document.getElementById("email").value = <?php echo json_encode($_SESSION['email']); ?>;
                document.getElementById("country").value = <?php echo json_encode($_SESSION['country']); ?>;
                
                var date = <?php echo json_encode($_SESSION['date']); ?>;
                var datearr = date.split("/");
                document.getElementById("day").value = datearr[0];
                document.getElementById("month").value = datearr[1];
                document.getElementById("year").value = datearr[2];

                
                //document.getElementById("date").value = <?php echo json_encode($_SESSION['date']); ?>;
                
                var dateValid = true;
                
                function nameEdit(obj){
                    obj.style.display = 'none';
                    document.getElementById('namebtn').style.display = 'block';
                    document.getElementById('name').disabled = false; 
                }
                
                function changeName(){
                    var re = /^[A-Za-z]+$/;
                    console.log("Hello");
                    //document.getElementById("ename").innerHTML = "*This can not be empty";
                    var data = document.getElementById("name");
                    if(data.value == ""){
                        document.getElementById("ename").innerHTML = "*This can not be empty";
                        //isValid = false;
                    }
                    else if(data.value.length < 2){
                        document.getElementById("ename").innerHTML = "*Minimum 2 characters";
                        //isValid = false;
                    }
                    else if(!re.test(data.value)){
                        document.getElementById("ename").innerHTML = "*Can not contain numbers or special characters";
                        //isValid = false;
                    }
                    else{
                        document.getElementById("ename").innerHTML = "";
                        
                        window.location.href = "addInfoToDB.php?name="+data.value;
                        
                    }
                }
                
                function emailEdit(obj){
                    obj.style.display = 'none';
                    document.getElementById('emailbtn').style.display = 'block';
                    document.getElementById('email').disabled = false; 
                }
                
                function changeEmail(){
                    
                    var re = /\S+@\S+\.\S+/;
                    
                    var data = document.getElementById("email");
                    if(data.value == ""){
                        document.getElementById("eemail").innerHTML = "*This can not be empty";
                        //isValid = false;
                    }
                    else if(!re.test(data.value)){
                        document.getElementById("eemail").innerHTML = "*Give a valid email";
                        //isValid = false;
                    }
                    else{
                        document.getElementById("eemail").innerHTML = "";
                        
                        window.location.href = "addInfoToDB.php?email="+data.value;
                        
                    }
                }
                
                function dateEdit(obj){
                    obj.style.display = 'none';
                    document.getElementById('datebtn').style.display = 'block';
                    document.getElementById('day').disabled = false; 
                    document.getElementById('month').disabled = false; 
                    document.getElementById('year').disabled = false; 
                }
                
                function checkDay(){
                    
                    var data = document.getElementById("day");
                    if(data.value == ""){
                        document.getElementById("edate").innerHTML = "*Day can not be empty";
                        dateValid = false;
                    }
                    else if(data.value.match(/^[0-9]+$/) == null){
                        document.getElementById("edate").innerHTML = "*Day can not contain characters";
                        dateValid = false;
                    }
                    else{
                        if(parseInt(data.value)<1 || parseInt(data.value)>31){
                            document.getElementById("edate").innerHTML = "*Day can be (1-31)";
                            dateValid = false;
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
                        dateValid = false;
                    }
                    else if(data.value.match(/^[0-9]+$/) == null){
                        document.getElementById("edate").innerHTML = "*Month can not contain characters";
                        dateValid = false;
                    }
                    else{
                        if(parseInt(data.value)<1 || parseInt(data.value)>12){
                            document.getElementById("edate").innerHTML = "*Month can be (1-12)";
                            dateValid = false;
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
                        dateValid = false;
                    }
                    else if(data.value.match(/^[0-9]+$/) == null){
                        document.getElementById("edate").innerHTML = "*Year can not contain characters";
                        dateValid = false;
                    }
                    else{
                        if(parseInt(data.value)<1900 || parseInt(data.value)>2018){
                            document.getElementById("edate").innerHTML = "*Year can be (1900-2018)";
                            dateValid = false;
                        }
                        else{
                            document.getElementById("edate").innerHTML = "";
                        }

                    }
                }
                
                function changeDate(){
                    
                    dateValid = true;
                    
                    this.checkDay();
                    this.checkMonth();
                    this.checkYear();
                    
                    
                    if(dateValid){
                        
                        var date = document.getElementById("day").value+"/"+document.getElementById("month").value+"/"+document.getElementById("year").value;
                        window.location.href = "addInfoToDB.php?date="+date;
                    }
                    
                }
                
                function countryEdit(){
                    
                    document.getElementById("country1").style.display = 'none';
                    document.getElementById("country2").style.display = 'block';
                }
                
                function changeCountry(){
                    var data = document.getElementById("countrysel");
                    if(data.value == "Select"){
                        //isValid = false;
                        document.getElementById("ecountry").innerHTML = "*Country is required";
                    }
                    else{
                        document.getElementById("ecountry").innerHTML = "";
                        window.location.href = "addInfoToDB.php?country="+data.value;
                    }
                }
                
            </script>
                
            </fieldset>
            </td>
            <td width="15%"></td>
        </tr>
    </table>
   
    <?php include 'footer.php';?>
</body>
</html>
