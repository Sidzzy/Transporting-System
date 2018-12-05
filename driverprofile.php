<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="driver")
		header('Location: logout.php');

	include 'dbconnect.php';
	$result = 0;
	$sql="
	SELECT *
	FROM requests
	WHERE driver_id = '".$_SESSION['id']."' 
	";
	$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html>
<head>
	<?php include 'includefiles.php'; ?>
</head>
<body>
	<div class="container">
		<div style="margin-top: 10%;" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-7">
				<h1>Requests</h1>	
				<ul class="list-group">
					<?php 
						$i=1;
				    	while($row = $result->fetch_assoc()) { 
					?>
						<li class="list-group-item"><em>Passenger Username:</em> <?php echo 
						$row['passengerusername']; ?>
						</li>
						<li class="list-group-item"><em>Required Seats:</em> <?php echo 
						$row['seats']; ?>
						</li>
					<?php $row= $result->fetch_assoc(); } ?>
				</ul>
			</div>
			<div class="col-sm-3"></div>
		</div>
	
	</div>
	<br><br><br><br>
	<button type="button" onClick="location.href='logout.php'">Logout</button>

</body>
</html>