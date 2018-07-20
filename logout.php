<?php
	session_start();
	session_destroy();
	if(isset($_COOKIE['Username']) and isset($_COOKIE['Password'])){
		setcookie('Username',$_POST['Username'],time()-1);
		setcookie('Password',$_POST['Password'],time()-1);
	}
	echo "<script>self.location='index.php';</script>";
?>