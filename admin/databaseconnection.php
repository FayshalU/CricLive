<?php

	function DBconnection(){
		$conn= mysqli_connect('localhost', 'root', '', 'criclive');
         
		return $conn;
	}
	

?>