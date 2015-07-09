<?php
	
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'first_db';
	$connection= mysqli_connect($server,$username,$password,$database);
	if(!$connection){
		die("connection failed");
	}


?>