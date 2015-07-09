<?php 
	include 'config.php';
	session_start();
	if(isset($_POST['username'])){
		/*$username = mysql_real_escape_string($_POST['username']);
		$password = mysql_real_escape_string($_POST['password']);
		$repassword = mysql_real_escape_string($_POST['confirm_password']);*/
		$username = $_POST['username'];
		$password =  $_POST['password'];
		$repassword = $_POST['confirm_password'];
		$phone=$_POST['phone'];
		$fullname=$_POST['fullname'];
	    if($password == $repassword){
		    $query = mysqli_query($connection,"SELECT * FROM users WHERE username= '".$username."' and password = '".$password."';"); //Query the users table
			$res = mysqli_num_rows($query);
			if(!$res){
				$insert = mysqli_query($connection,"INSERT INTO users (`username`, `password`,`phone`,`fullname`) VALUES ('".$username."','".$password."','".$phone."','".$fullname."');"); //Inserts the value to table users
				if($insert){
					Print '<script>alert("Successfully Registered!");</script>'; // Prompts the user
					$_SESSION['username'] = $username;
					header('location: home.php');
				}else{
					echo '<script>alert("failed to register!");</script>';
				}
			}
		}else{
			echo "<script>alert('passwords do not match');</script>";
		}
	}
?>





<html>
	<head>
		<title>My first PHP website</title>
		
		
		<style>  
		
		
			body{
		margin:0;
padding:0;
background-image:url('y1.jpg');
background-repeat:no-repeat;
background-size:100%;
overflow: hidden;
			
			
		}
		
		h2{text-align : center;
	        color:white;	
			font-size:50px;
			top:0%;
		position:relative;
		font-family:tahoma;
		}
		.wel{
			text-align:center;
			
			
			background-color:black;
			position:fixed;
			top:0px;
			width:100%;
			height:100px;
			
			opacity:0.8;
			
		}
		form{
			position:absolute;
			top:20%; 
			left:32%;
			color:#32007D;
			font-size:25px;
			
		}
		
		
		input[type=submit] {padding:5px 170px; background:#00476B; border:0 none;color:white;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; }
		
		</style>

    

		
		
		
		
		
	
	
		
		
	</head>
	
	<body>
	
		<div class="wel"><h2>Registration Page</h2></div>
		<a href="index.php" style="position:absolute; bottom:10%; left:45%; font-size:40px; color:white; text-decoration:none;  font-family:Coronetscript, cursive; background-image:url('wood.jpg');
			border-radius:20px;"> &nbspback&nbsp</a><br/><br/>
		<form action="register.php" method="post"   style="font-family:Coronetscript, cursive;">
		    Enter Fullname : <input type="text" name="fullname" required="required" style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/> <br/><br>
			Enter Username: <input type="text" name="username" required="required"  style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/> <br/><br>
			Enter Password : <input type="password" id="password" name="password" required="required"  style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; " /> <br/><br>
		    Retype Password: <input type="password" name="confirm_password" id="confirm_password" onchange="check()"  required="required" style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/><br><br> 
            Enter  phone no: <input type="tel" name="phone" required="required"  style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/> <br/><br>
			<br/><br>
			<input type="submit" value="Register" style="position:relative;left:0%;font-size:30px;font-family:Coronetscript, cursive;"/>
		</form>
	</body>
</html>

