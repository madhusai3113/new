<html>
	<head>
		<title>My first PHP website</title>
	</head>
	<?php
	session_start(); //starts the session
	if($_SESSION['username']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	$user = $_SESSION['username']; //assigns user value
	$id_exists = false;
	?>
	<body>
		<h2>Home Page</h2>
		<p>Hello <?php Print "$user"?>!</p> <!--Displays user's name-->
		<a href="logout.php">Click here to logout</a><br/><br/>
		<a href="home.php">Return to Home page</a>
		<h2 align="center">Currently Selected</h2>
		<table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>Details</th>
				<th>Post Time</th>
				<th>Edit Time</th>
				<th>Public Post</th>
			</tr>
			<?php
				if(!empty($_GET['id']))
				{
					$id = $_GET['id'];
					$_SESSION['id'] = $id;
					$id_exists = true;
					mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
					mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
					$query = mysql_query("Select * from contacts Where id='$id'"); // SQL Query
					$count = mysql_num_rows($query);
					if($count > 0)
					{
						while($row = mysql_fetch_array($query))
						{
							Print "<tr>";
								Print '<td align="center">'. $row['id'] . "</td>";
								Print '<td align="center">'. $row['name'] . "</td>";
								
								Print '<td align="center">'. $row['phone']. "</td>";
							Print "</tr>";
						}
					}
					else
					{
						$id_exists = false;
					}
				}
			?>
		</table>
		<br/>
		<?php
		if($id_exists)
		{
		Print '
		<form action="edit.php" method="POST">
			Enter new name: <input type="text" name="name"/><br/>
			`new phone:<input type="tel" name="phone"/>
			<input type="submit" value="Update"/>
		</form>
		';
		}
		else
		{
			Print '<h2 align="center">There is no data to be edited.</h2>';
		}
		?>
	</body>
</html>

<?php
	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
		mysql_select_db("first_db") or die("Cannot connect to database"); //Connect to database
		$name = mysql_real_escape_string($_POST['name']);
        $phone = mysql_real_escape_string($_POST['phone']);
		
		
		mysql_query("UPDATE contacts SET name='$name',phone='$phone' ") ;
		header("location: home.php");
	}
?>