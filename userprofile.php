<?php  
	session_start();
	if(!$_SESSION['id'])
		header('Location: logout.php');
	else
		echo "hello";
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