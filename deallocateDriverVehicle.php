<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="tsp")
		header('Location: logout.php');

	include 'dbconnect.php';

	$sql1="
		SELECT *
		FROM driver 
		WHERE username='".$_POST['driver_username']."' 
		AND ( working_under='".$_SESSION['id']."' )
	";
	// with md5() not working 
	$sql2="
		SELECT *
		FROM vehicle 
		WHERE number='".$_POST['vehicle_number']."' 
		AND ( tspid='".$_SESSION['id']."' )
	";
	$result1=$conn->query($sql1);
	$result2=$conn->query($sql2);
	//print_r($result);
	if ($result1->num_rows > 0 && $result2->num_rows > 0) {
		echo "<script>alert('Logined Successfully')</script>";
		$sql=
            " DELETE driver_vehicle
            WHERE driver_id = '".$_POST['driver_username']."' AND 
            ( vehicle_id = '".$_POST['vehicle_number']."' )";

        if(mysqli_query($conn,$sql)){
            echo "<script>alert('Successfully Successfully Deallocated')</script>";
            echo "<script>self.location='tspprofile.php';</script>";
        }
        else{
        	echo "<script>alert('Sorry cannot remove now!')</script>";
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
		<div style="margin: 10%;" class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">
				<form method="post" class="col6 boxshadow">
					<div class="form-group">
						<h2 style="text-align: center; padding-bottom: 5%;">
							Deallocate Driver-Vehicle
						</h2>

						<label>Driver Username</label>
						<input class="form-control" type="text" id="driver_username" name="driver_username">
						<br>
						<label>Vehicle Number</label>
						<input class="form-control" type="text" id="vehicle_number" name="vehicle_number">
						<br>
					</div>
					<div style="text-align: center; padding-top: 3%; padding-bottom: 10%; " class="form-group">
						<button style="width: 40%;"
						type="submit" name="submit" id="submit" class="btn btn-success">
							Submit
						</button>
					</div>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<button type="button" onClick="location.href='logout.php'">Logout</button>
	</div>
</body>
</html>