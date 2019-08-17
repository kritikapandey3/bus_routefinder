<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style>
		body{
			margin: 0px;
			border: 0px;
		}
		#header{
			width:100%;
			height: 250px;
			background:#34495e;
			color: white;
		}
		#sidebar{
			width: 200px;
			height: 300px;
			background:#34495e;
			color: white;
			float: left;
		}
		#data{
			height: 700px;
			font-family: sans-serif;
	        background: #2c3e50;
			color: white;
			font-family: Helvetica;
			font-size: 25px;
		}
		#adminLogo{
			background:white;
			border-radius: 50px;
		}
		ul li{
			padding:20px;
			border-bottom: 2px solid grey;
		}
		ul li:hover{
           background:black;
           color: white;
		}
		li a{
			color: white;
		}
	</style>
</head>
<body>
  <div id="header">
  	 <center><img src="admin.jpg" alt = "adminLogo" id="adminLogo">
  	 	<br><br>This is Admin Panel
  	 </center>
  </div>
  <div id="sidebar">
  	<ul>
  		<li><a href="./service/AddBus.php"> Add Bus </a></li>
  		<li><a href="./service/AddEdge.php"> Add route </a></li>
  		<li><a href="./service/AddNode.php"> Add Place</a></li>
  		<li><a href="logout.php"> Logout </a></li>
  	</ul>
  </div>
  <div id="data"><br>
  	 <center>
  	 <p>Welcome to admin panel</p>
  	 </center>
  </div>
</body>
</html>