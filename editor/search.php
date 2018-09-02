<?php
    session_start();
	error_reporting(0);

    if(!isset($_SESSION['log']))
    {
        header("location: ../login.html");
	}else{
        include 'databaseconnection.php';
        
    }

    $data ="";
	if($_POST['key'] > 0)
	{
	$key 	= $_POST['key'];
	$id = $_COOKIE['abc'];
    mysqli_connect();
	$con = mysqli_connect('localhost', 'root', '', 'criclive');
	$sql = "select * from post where user_id like '".$id."%' and post_id like '".$key."%'";
	$result = mysqli_query($con,$sql);
	?>
	 <h3 style="background-color:DodgerBlue;"> Searched post
	 <?php
	while($row = mysqli_fetch_assoc($result)){
		
		?>
		                <h4 > <hr></br>
						 <?php echo "<center>".$row['date']."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp"."&nbsp".$row['time']."<br/>"."<br/>"."<br/>".$row['headline']."<br/>"."<br/>"."<br/>"."<img src=".$row['image'].">"."<br/>";
					    ?><h4 ><?php echo  $row['text']."<br/>";?>
		               </br><?php echo "
					   <a href='deleteartical.php?id=".$row['post_id']." '>
							<input type='button' name='delete' value='delete'/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
		               <a href='editartical.php?post_id=".$row['post_id']." '>
							<input type='button' name='edit' value='edit'/> </br> </br> </tr> <hr> ";
					  
				   }
	}
 
	else
	{
		$data = "";
	}
		echo $data;
?>