<?php  
	session_start();
	if(!$_SESSION['id'] || $_SESSION['type']!="driver")
		header('Location: logout.php');
	else{
		echo "hello Driver";
		// $sql="
		// 	SELECT *
		// 	FROM driver
		// 	WHERE username = '".$_POST['username']."' 
		// 	";
			// What if username of user or tsp is same with driver then 
			// header('Location: logout.php');
		// $result=$conn->query($sql);
		// //print_r($result);
		// if ($result->num_rows <= 0){
		// 	header('Location: logout.php');		
		// }
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>User's Profile</title>
</head>
<body>
	<h1>Hii</h1>
	<button type="button" onClick="location.href='logout.php'">Logout</button>
</body>
</html>