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
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
    <table width="100%" style="color:green;" height="50px">
        <tr >
            <td width="10%"><a href="editor.php"><center>CricLive</center></a></td>
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
                                <li><a href="#">Timeline</a></li>
                                <li><a href="createnewmatch.php">Create match</a></li>
                                <li><a href="scores.php">Update Scores</a></li>
                                <li><a href="addartical.php"> Add Artical </a></li>
								<li><a href="pollcreate.php"> Create Poll Quistans </a></li>
                              </ul>

                            </td>
                            
                        </center>
                    </tr>
                </table>
                
            </td>
            <td  width="5%"></td>
			
			
			
			
			
			
            <td width="75%" valign="top">
                <table  width="100%" border="1">
                    <div>
			

			<input type="text" id='search' name="" >
			<input type="button"  name="" value="Search" onclick="loadData()">

		</div>
		<div id="result">
			
		</div>

	</center>

	<script type="text/javascript">
		
		function loadData(){
           
		
			var xmlHttp = new XMLHttpRequest();

			xmlHttp.open('POST', 'search.php', true);
			xmlHttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var abc = "key="+document.getElementById('search').value;
			xmlHttp.send(abc);

			xmlHttp.onreadystatechange = function(){

				if(this.readyState == 4 && this.status==200)
				{
					
					document.getElementById('result').innerHTML = this.responseText;
					//alert(this.responseText);
				}
			}

		}
        
		function abc(data){

			document.getElementById('search').value=data;
			document.getElementById('result').innerHTML="";
		}

	</script>
</body>
</html>
		 <div id=1>
		 <h3 style="background-color:DodgerBlue;">  All Post
		   <?php 
                     $con = DBconnection();
					  $iiidd =$_COOKIE['abc'];
	              $sql = "SELECT * FROM post where user_id='".$iiidd."'";
			   $result = mysqli_query($con,$sql);
			  
			   while($row = mysqli_fetch_assoc($result))
			   {
					   ?>
		                <h4 > <hr></center>
						 <?php echo "<h3>".$row['post_id']."</h3>"."<center>"."</br>"."</br>".$row['date']."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".$row['time']."<br/>"."<br/>"."<br/>".$row['headline']."<br/>"."<br/>"."<br/>"."<img src=".$row['image'].">"."<br/>";
					    ?><h4 ><?php echo  $row['text']."<br/>";?>
		               </br> <?php echo "
					   <a href='deleteartical.php?id=".$row['post_id']." '>
							<input type='button' name='delete' value='delete'/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		               <a href='editartical.php?post_id=".$row['post_id']."'>
							<input type='button' name='edit' value='edit'/> </br> </br> </tr> <hr> ";
					  
				   }

			   
					  ?>
		
				
            </td>
        </tr>
    </table>
    <br/>
    <?php include 'footer.php';?>
    
    <script>
        
    </script>
    
</body>
</html>
