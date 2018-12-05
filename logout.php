<?php
	session_start();
	session_destroy();
	if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
		setcookie('username',$_POST['username'],time()-1);
		setcookie('password',$_POST['password'],time()-1);
	}
	echo "<script>self.location='index.php';</script>";
?>