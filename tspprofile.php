<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="tsp")
		header('Location: logout.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>TSP's Profile</title>
</head>
<body>
	<ul>
		<li><a href="signup.php?type=driver">Add Driver</a></li>
		<li><a href="#">Delete Driver</a></li>
		<li><a href="#">Edit Driver</a></li>
		<li><a href="addvehicle.php">Add Vehicle</a></li>
		<li><a href="#">Delete Vehicle</a></li>
		<li><a href="#">Edit Vehicle</a></li>
		<li><a href="#">Vehicle Status</a></li>
	</ul>
	<button type="button" onClick="location.href='logout.php'">Logout</button>
</body>
</html>