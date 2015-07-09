<?php
	include 'config.php';
	session_start();
	if(isset($_SESSION['username'])){
		header("location: home.php");
	}
	if(isset($_POST['username'])){
		$sql = "SELECT * FROM users WHERE username = '".$_POST['username']."' and password = '".$_POST['password']."';";
		$query = mysqli_query($connection,$sql);
		$rows = mysqli_num_rows($query);
			if($rows == 0){
				echo "<script>alert('invalid username password combination');</script>";
			}elseif($rows == 1){
				$_SESSION['username'] = $_POST['username'];
				header("Location: home.php");
			}else{
				echo "<script>alert('duplicate entry found in database');</script>";
			}
		}
?>


<html>
	<head>
		<title>My first PHP website</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("input[type=submit]").hover(function(){
        $(this).css("background-color", "#003F60");
        }, function(){
        $(this).css("background-color", "");
    });
});
</script>
		<style>  
		
		
		body{
		margin:0;
padding:0;
background-image:url('y1.jpg');
background-repeat:no-repeat;
background-size:100%;
overflow: hidden;
			
			}
		h2{
			font-size:300%;
			text-align:center;
			color:white;
			font-family:tahoma;
			background-color:black;
				width:100%;
			height:100px;
			opacity:0.8;
			
			
		}
		
		.user{
			position:absolute;
			top:30%;
			left:35%;
			font-size:150%;
			color:white;
		}
		input[type=submit] {padding:5px 150px; background:#00476B; border:0 none;color:white;
cursor:pointer;
-webkit-border-radius: 5px;
border-radius: 5px; }
		
		</style>
		</head>
	<body>
		<h2>Login Page</h2>
		<a href="index.php" style="text-decoration:none; color:white; position:fixed; left:45%;bottom:30%;font-size:200%; font-family:Coronetscript, cursive; background-image:url('wood.jpg');
			border-radius:20px; ">&nbspback&nbsp;</a><br/><br/>
<div class="user">
<form action="login.php" method="post" style="font-family:Coronetscript, cursive;">
Username: <input type="text" name="username" required="required" style="font-family:Coronetscript, cursive;border-radius:10px;font-size:17px; "/> <br/><br>
Password : <input type="password" name="password" required="required" style="font-family:Coronetscript, cursive;font-size:17px;border-radius:10px;"/> <br/> <br/>
<input type="submit" value="Login" style="position:relative;left:0%;font-size:30px;font-family:Coronetscript, cursive;"/> 
		</form>
	</body>
</html>