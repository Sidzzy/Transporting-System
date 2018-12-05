<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="user")
		header('Location: logout.php');
	$source = "";
	$destination = "";
	$result=0;
	if(isset($_POST['submit'])){

		include 'dbconnect.php';

		$source = $_POST['source'];
		$destination = $_POST['destination'];

		$sql="
		SELECT *
		FROM vehicle
		WHERE source='".$_POST['source']."' 
		AND ( destination='".$_POST['destination']."' )
		";
		//DO: make the source and destination in lower case while adding and also make it smaller while checking
		$result=$conn->query($sql);
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
				<form method="post" class="col6 boxshadow">
					<div class="form-group">
						<!-- <h2 style="text-align: center; padding-bottom: 5%;">
							Search
						</h2> -->
						<div class="row"> 
							<div class="col-sm-5">
								<input class="form-control" type="place" name="source" value="<?php echo $source ; ?>">			
								<center>
									<label>SOURCE</label>
								</center>
							</div>
							<div class="col-sm-5">
							
								<input class="form-control" type="text" name="destination" value="<?php echo $destination ; ?>">
								<center>
									<label>DESTINATION</label>
								</center>
							</div>
							<div class="col-sm-2">
								<button type="submit" name="submit" id="submit"
								class="btn btn-success ">
									Submit
								</button>
							</div>
						</div>
			    	</div>
				</form>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<div style="margin-top: 10%;" class="row">
			<div class="col-sm-2"></div>
			<div class="col-sm-8">
				<?php if($result){ ?>
					<table class="table" cellpadding="1" cellspacing="1" border="1">
					<!-- <table class="table"> -->
						<tr>
							<th>#</th>
							<th>Number</th>
							<th>Type</th>
							<th>Available<br>Seats</th>
							<th>Arrival</th>
							<th>Book</th>
						</tr>
						<?php 
							$i=1;
					    	while($row = $result->fetch_assoc()) { 
					    ?>
						    	<tr>
						    		<td><?php echo $i; ?></td>
						    		<td><?php echo $row['number']; ?></td>
						    		<td><?php echo $row['type']; ?></td>
						    		<td><?php echo $row['capacity']; ?></td>
						    		<td><?php echo $row['timing']; ?></td>
						    		<!-- <td><a target="blank" href="booknow.php?number=<?php echo $row['number']; ?>">book_now</a></td> -->

						    		<!-- DONT MAKE THIS REDIRECT THE PAGE BUT DO IT IN THE SAME PAGE ONLY -->
						    		
									<td><a href="bookvehicle.php?vnumber=<?php echo $row['number']; ?>">book_now</a></td>

						    	</tr>
					    	<?php 
					    		$i++;
					    	}	
					    	?>
					</table>
				<?php } ?>
			</div>
			<div class="col-sm-2"></div>
		</div>
	</div>
	<br><br><br><br>
	<button type="button" onClick="location.href='logout.php'">Logout</button>

</body>
</html>