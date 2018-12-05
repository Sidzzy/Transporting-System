<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="user")
		header('Location: logout.php');
	$vnumber = $_GET['vnumber'];
	// $result=0;

	include 'dbconnect.php';

	$sql="
	SELECT *
	FROM driver_vehicle
	WHERE vehicle_id='".$vnumber."'
	";
	// echo $sql;
	$result=$conn->query($sql);
	// print_r($result);
	if($result){
		$sql1="
		SELECT *
		FROM vehicle
		WHERE number='".$vnumber."'
		";	
		$row = $result->fetch_assoc();
		$sql2="
		SELECT *
		FROM driver
		WHERE username='".$row['driver_id']."'
		";
		$result1=$conn->query($sql1);
		$result2=$conn->query($sql2);
		$row1 = $result1->fetch_assoc();
		$row2 = $result2->fetch_assoc();
	}
	if (isset($_POST['seatrequest'])) {
		$sql = "INSERT INTO requests VALUES
            ('','".$_SESSION['id']."','1','".$row['driver_id']."')
          	";			
   		if(mysqli_query($conn,$sql)){
   			echo "<script>alert('Request sent to the driver u will be notified soon.')</script>";
            // echo "<script>self.location='tspprofile.php?type=tsp';</script>";
   		}
   		else{
   			echo "<script>alert('Cannot send request at this moment.')</script>";
   		}
	}
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
				<ul class="list-group">
					<li class="list-group-item"><em>Driver Name: <?php echo $row2['name']; ?></em></li>
					<li class="list-group-item"><em>Vehicle Number: <?php echo $row1['number']; ?></em></li>
					<li class="list-group-item"><em>Contact Driver: <?php echo $row2['number']; ?></em></li>
					<li class="list-group-item"><em>Cost: <?php echo $row['cost']; ?></em></li>
 <!-- MUST ADD DRIVER: CONTACT NUMBER AND PUBLIC VEHICLE REACH TIME IN DB  -->
				</ul>
				<form method="post"> 
					<button type="submit" name="seatrequest" id="seatrequest" class="btn btn-lg btn-success">
						Request for seat
					</button>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
	</div>
	<br><br><br><br>
	<button type="button" onClick="location.href='logout.php'">Logout</button>

</body>
</html>