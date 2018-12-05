<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="tsp")
		header('Location: logout.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includefiles.php'; ?>
</head>
<body>
	<div class="container">
		<div style="margin: 10%;" class="row">
			<div class="col-12">
				<ul class="list-group">
					<li class="list-group-item"><a href="assignDriverVehicle.php">Assign Driver-Vehicle</a></li>
					<li class="list-group-item"><a href="deallocateDriverVehicle.php">Deallocate Driver-Vehicle</a></li>
					<li class="list-group-item"><a href="signup.php?type=driver">Add Driver</a></li>
					<li class="list-group-item"><a href="#">Delete Driver</a></li>
					<li class="list-group-item"><a href="#">Edit Driver</a></li>
					<li class="list-group-item"><a href="#">Driver Status</a></li>
					<li class="list-group-item"><a href="addvehicle.php">Add Vehicle</a></li>
					<li class="list-group-item"><a href="#">Delete Vehicle</a></li>
					<li class="list-group-item"><a href="#">Edit Vehicle</a></li>
					<li class="list-group-item"><a href="#">Vehicle Status</a></li>
				</ul>		
			</div>
		</div>
		<button type="button" onClick="location.href='logout.php'">Logout</button>
	</div>
</body>
</html>