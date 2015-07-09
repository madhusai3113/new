<?php
	session_start(); //starts the session
 	include 'config.php';
	
	if(!$_SESSION['username']){ //checks if user is logged in
		header('location: index.php');
	}
 
	$user = $_SESSION['username']; //assigns user value
 
	if(isset($_POST)){
		$name = $_POST['name'];
		$phone = $_POST['phone'];	
		$sql = "INSERT INTO contacts (name, phone) VALUES ('$name',  '$phone')";
		if ($connection->query($sql) === TRUE) {
		   header('location: thankyou.php');
		} else {
		    echo "Error: " . $sql . "<br>" .mysqli_errno();
		}
		//echo "<script>location.reload()</script>";
	}
	$connection->close();
?>
	
	



<html>
	<head>
		<title>My first PHP website</title>
		
		<style>

body{margin:0px;
}
		
	@-webkit-keyframes explosion {
  from {
    width: 0;
    opacity: 0;
  }
  33% {
    width: 0;
    opacity: 0;
  }
  34% {
    width: 10px;
    opacity: 1.0;
  }
  40% {
    width: 80px;
    opacity: 1.0;
  }
  to {
    width: 90px;
    opacity: 0;
  }
}

@-moz-keyframes explosion {
  from {
    width: 0;
    opacity: 0;
  }
  33% {
    width: 0;
    opacity: 0;
  }
  34% {
    width: 10px;
    opacity: 1.0;
  }
  40% {
    width: 80px;
    opacity: 1.0;
  }
  to {
    width: 90px;
    opacity: 0;
  }
}

#stage {
	margin:0px;
  position: absolute;
  height: 100%;
  width:100%;
  background: #000 url(bg.jpg);
  background-image: -webkit-linear-gradient(bottom, ,  100px, rgba(0,0,0,1) 100px, rgba(0,0,0,0) 300px), url(bg.jpg);
  background-image: -moz-linear-gradient(bottom, ,  100px, rgba(0,0,0,1) 100px, rgba(0,0,0,0) 300px), url(bg.jpg);
  background-image: -o-linear-gradient(bottom, ,  100px, rgba(0,0,0,1) 100px, rgba(0,0,0,0) 300px), url(bg.jpg);
  background-image: -ms-linear-gradient(bottom, ,  100px, rgba(0,0,0,1) 100px, rgba(0,0,0,0) 300px), url(bg.jpg);
  background-image: linear-gradient(bottom, , 100px, rgba(0,0,0,1) 100px, rgba(0,0,0,0) 300px), url(bg.jpg);
  background-repeat:no-repeat;
  background-size:100%;
overflow: hidden;

}

.launcher {
  position: absolute;
  -webkit-animation-duration: 4s;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-duration: 4s;
  -moz-animation-iteration-count: infinite;
  background: red;
  border-bottom: 3px solid yellow;
}

.launcher div {
  position: absolute;
  opacity: 0;
  -webkit-animation-name: explosion;
  -webkit-animation-duration: 4s;
  -webkit-animation-iteration-count: infinite;
  -moz-animation-name: explosion;
  -moz-animation-duration: 4s;
  -moz-animation-iteration-count: infinite;
  left: 3px;
  top: 3px;
  width: 10px;
  height: 4px;
  border-right: 4px solid yellow;
  border-radius: 2px;
  -webkit-transform-origin: 0 0;
  -moz-transform-origin: 0 0;
}	


h2{
	text-align:center;
	color:white;
	font-family:Coronetscript, cursive;
	font-size:50px;
}
		 p{
	text-align:center;
	color:white;
	font-family:Coronetscript, cursive;
	font-size:30px;
}               
table{color:white;}

button{
	position:fixed;
	top:2%;
	right:10%;
	background-image:url('but.gif');
	height:47px;
	width:113px;
	background-repeat:no-repeat;
	cursor:pointer;
  border-right:12px;
border-height: 0px;
image-position:center;
border-bottom:10px;

}        
form{color:white;}
		</style>                                      
	</head> 
	<body>
		
		
		
		<div id="stage">
		<p>Hello <?php Print "$user"?>!</p> <br>
	    <p>my contacs<p>
         
		 
		 <table border="1px" width="100%">
			<tr>
				<th>Id</th>
				<th>NAME</th>
				
				
				
				
				<th>Phone</th>
			</tr>
			<?php
				mysql_connect("localhost", "root","") or die(mysql_error()); //Connect to server
				mysql_select_db("first_db") or die("Cannot connect to database"); //connect to database
				$query = mysql_query("Select * from contacts"); // SQL Query
				while($row = mysql_fetch_array($query))
				{
					Print "<tr>";
						Print '<td align="center">'. $row['id'] . "</td>";
						Print '<td align="center">'. $row['name'] . "</td>";
						Print '<td align="center">'. $row['phone']. "</td>";
						Print '<td align="center"><a href="edit.php?id='. $row['id'] .'">edit</a> </td>';
						Print '<td align="center"><a href="#" onclick="myFunction('.$row['id'].')">delete</a> </td>';
					Print "</tr>";
				}
			?>
		 
		 
		 
		 
		 
		 
		 
		 
		<form action="home.php" method="post">
		 name:
<input type="text" name="name" required="required">
&nbsp
phone:
<input type="tel" name="phone" required="required">&nbsp
<input type="submit" value="Add" >
		</form>
		<a href="logout.php" ><button> </button></a>
         
		</div>
		<script type="text/javascript" >
		
		
		document.addEventListener("DOMContentLoaded", function() {
  var num_launchers = 12;
  var num_flares = 20;
  var flare_colours = ['red', 'aqua', 'violet', 'yellow', 'lightgreen', 'white', 'blue'];
  var cssIdx = document.styleSheets.length - 1;

  function myRandom(from, to)
  {
    return from + Math.floor(Math.random() * (to-from));
  }

  var keyframes_template = "from { left: LEFTFROM%; top: 380px; width: 6px; height: 12px; }\n"
      + "33% { left: LEFTTOP%; top: TOPTOPpx; width: 0; height: 0; }\n"
      + " to { left: LEFTEND%; top: BOTBOTpx; width: 0; height: 0; }";

  for(var i=0; i < num_launchers; i++) {
    leftfrom = myRandom(15, 85);
    lefttop = myRandom(30, 70);
    toptop = myRandom(20, 200);
    leftend = lefttop + (lefttop-leftfrom)/2;
    botbot = toptop + 100;

    csscode = keyframes_template;
    csscode = csscode.replace(/LEFTFROM/, leftfrom);
    csscode = csscode.replace(/LEFTTOP/, lefttop);
    csscode = csscode.replace(/TOPTOP/, toptop);
    csscode = csscode.replace(/LEFTEND/, leftend);
    csscode = csscode.replace(/BOTBOT/, botbot);

    try { 
      csscode2 = "@-webkit-keyframes flight_" + i + " {\n" + csscode + "\n}";
      document.styleSheets[cssIdx].insertRule(csscode2, 0);
    } catch(e) { }

    try { 
      csscode2 = "@-moz-keyframes flight_" + i + " {\n" + csscode + "\n}";
      document.styleSheets[cssIdx].insertRule(csscode2, 0);
    } catch(e) { }
  }

  for(var i=0; i < num_launchers; i++) {
    var rand = myRandom(0, flare_colours.length - 1);
    var rand_colour = flare_colours[rand];
    var launch_delay = myRandom(0,100) / 10;

    csscode = ".launcher:nth-child(" + num_launchers + "n+" + i + ") {\n"
      + "  -webkit-animation-name: flight_" + i + ";\n"
      + "  -webkit-animation-delay: " + launch_delay + "s;\n"
      + "  -moz-animation-name: flight_" + i + ";\n"
      + "  -moz-animation-delay: " + launch_delay + "s;\n"
      + "}";
    document.styleSheets[cssIdx].insertRule(csscode, 0);

    csscode = ".launcher:nth-child(" + num_launchers + "n+" + i + ") div {"
      + "  border-color: " + rand_colour + ";\n"
      + "  -webkit-animation-delay: " + launch_delay + "s;\n"
      + "  -moz-animation-delay: " + launch_delay + "s;\n"
      + "}";
    document.styleSheets[cssIdx].insertRule(csscode, 0);
  }

  for(var i=0; i < num_flares; i++) {
    csscode = ".launcher div:nth-child(" + num_flares + "n+" + i + ") {\n"
	+ "  -webkit-transform: rotate(" + (i * 360/num_flares) + "deg);\n"
	+ "  -moz-transform: rotate(" + (i * 360/num_flares) + "deg);\n"
	+ "}";
    document.styleSheets[cssIdx].insertRule(csscode, 0);
  }

  for(var i=0; i < num_launchers; i++) {
    var newdiv = document.createElement("div");
    newdiv.className = "launcher";
    for(var j=0; j < num_flares; j++) {
      newdiv.appendChild(document.createElement("div"));
    }
    document.getElementById("stage").appendChild(newdiv);
  }
}, false);
		
		
		
		
		</script>
	</body>
</html>
