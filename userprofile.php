<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="user")
		header('Location: logout.php');
	$result=0;
	if(isset($_POST['submit'])){

		include 'dbconnect.php';

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
	<title>User's Profile</title>
</head>
<body>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
		Source:<input type="place" name="source">
		Destination:<input type="text" name="destination"><br><br>
		<button type="submit" name="submit">
		        Submit
        </button>
	</form>
	<?php if($result){ ?>
		<table cellpadding="1" cellspacing="1" border="1">
			<tr>
				<th>Sl no</th>
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
			    		<td><a href="#">book_now</a></td>
			    	</tr>
		    	<?php 
		    		$i++;
		    	}	
		    	?>
		</table>
	<?php } ?>
	<br><br><br><br>
	<button type="button" onClick="location.href='logout.php'">Logout</button>
</body>
</html>