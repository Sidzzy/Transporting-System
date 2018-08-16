<?php
	session_start();
	$type=$_GET['type'];
	$_SESSION['type']=$type;
	if(isset($_POST['submit'])){

		include 'dbconnect.php';

		if($_GET['type']=="user"){
			$sql="
			SELECT *
			FROM user
			WHERE username='".$_POST['username']."' 
			AND ( password='".$_POST['password']."' )
			";
			// with md5() not working 
			$result=$conn->query($sql);
			//print_r($result);
			if ($result->num_rows > 0) {
				if(isset($_POST['remember'])){
					echo "<script>alert('".$_POST['remember']."')</script>";
					setcookie('username',$_POST['username'],time()+60*60*60*7);
					setcookie('password',$_POST['password'],time()+60*60*60*7);
				}
				// echo "<script>alert('".$_GET['type']."')</script>";
				$row = $result->fetch_assoc();
				// session_start();
				$_SESSION['id']=$row['username'];
				header('Location: userprofile.php');
				// echo "<script>self.location='userprofile.php';</script>";
				// echo "<script>alert('Logined Successfully')</script>";
			}
			else {
				// echo "Invalid username or password";
				echo "<script>alert('Invalid username or password')</script>";
			}
		}
		else if($_GET['type']=="driver"){
			$sql="
			SELECT *
			FROM driver
			WHERE username = '".$_POST['username']."' 
			AND ( password='".$_POST['password']."' )
			";
			// with md5() not working 
			$result=$conn->query($sql);
			//print_r($result);
			if ($result->num_rows > 0) {
				if(isset($_POST['remember'])){
					echo "<script>alert('".$_POST['remember']."')</script>";
					setcookie('username',$_POST['username'],time()+60*60*60*7);
					setcookie('password',$_POST['password'],time()+60*60*60*7);
				}
				// echo "<script>alert('".$_GET['type']."')</script>";
				$row = $result->fetch_assoc();
				// session_start();
				$_SESSION['id']=$row['username'];
				header('Location: driverprofile.php');
				// echo "<script>self.location='userprofile.php';</script>";
				// echo "<script>alert('Logined Successfully')</script>";
			}
			else {
				// echo "Invalid username or password";
				echo "<script>alert('Invalid username or password')</script>";
			}
		}
		else{
			//tsp
			$sql="
			SELECT *
			FROM tsp
			WHERE username='".$_POST['username']."' 
			AND ( password='".$_POST['password']."' )
			";
			// with md5() not working 
			$result=$conn->query($sql);
			//print_r($result);
			if ($result->num_rows > 0) {
				if(isset($_POST['remember'])){
					echo "<script>alert('".$_POST['remember']."')</script>";
					setcookie('username',$_POST['username'],time()+60*60*60*7);
					setcookie('password',$_POST['password'],time()+60*60*60*7);
				}
				// echo "<script>alert('".$_GET['type']."')</script>";
				$row = $result->fetch_assoc();
				// session_start();
				$_SESSION['id']=$row['username'];
				header('Location: tspprofile.php');
				// echo "<script>self.location='userprofile.php';</script>";
				// echo "<script>alert('Logined Successfully')</script>";
			}
			else {
				// echo "Invalid username or password";
				echo "<script>alert('Invalid username or password')</script>";
			}
		}
	}
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		include 'includefiles.php';
	?>
</head>
<body>
		<div class="container-fluid" style="display: block; padding: 0; ">    
            <div style="" class="row content">
                <div class="col-lg-2 col-sm-2">
                </div>
                <div style="padding: 0px;" class="col-lg-8 col-sm-8 ">
                    <div class="col-lg-3 col-sm-2" style=""></div>
                    <div class="col-lg-6 col-sm-8">
                        
                        <!-- BOXSHADOW NOT WORKING #CORRECT_IT -->
                        
                        <form style="margin-top: 20%; padding-top: 15%;" method="post" class="col6 boxshadow">
							<div class="form-group">
								<h2 style="text-align: center; padding-bottom: 5%;">
									<?php echo strtoupper($_GET['type']);?> LOGIN</h2>

								<label>username:</label>
								<span class="error">*</span>
								<input class="form-control" type="text" id="username" name="username">
								<br>
								<label>password:</label>
								<span class="error">*</span>
								<input class="form-control" type="password" id="password" name="password">
								<br>
								<input type="checkbox" name="remember" value="1"> <label>Remember Me</label>
								<h5><a href="Forgotpassword.php">Forget pasword?</a></h5>
								<?php if($_GET['type']!="driver"){ ?>
								<h5><a href="signup.php?type=<?php echo $type;?>">Not Sign-up yet?</a></h5>
								<?php }?>
								<!-- also make single sign-up page for all types with the help of type variable -->
							</div>
							<div style="text-align: center; padding-top: 3%; padding-bottom: 10%; " class="form-group">
								<button style="width: 40%;"
								type="submit" name="submit" id="submit" class="btn btn-success">
									Submit
								</button>
							</div>

						</form>
	      	        </div>
		            <div class="col-lg-3 col-sm-2" style=""></div>
	    	        </div>
                <div class="col-lg-2 col-sm-2">
                </div>
            </div>
        </div>
</body>
</html>

<?php
	if(isset($_COOKIE['username']) and isset($_COOKIE['password'])){
		$name=$_COOKIE['username'];
		$pass=$_COOKIE['password'];	
		echo "<script>
			obj_name=document.getElementById('username');
			obj_name.value='$name';
			obj_pass=document.getElementById('password');
			obj_pass.value='$pass';
			document.getElementById('submit').click();
		</script>
		";
	}
?>
<!-- <script type="text/javascript">
		$name=$_COOKIE['username'];
		$pass=$_COOKIE['password'];
		var obj_name=document.getElementById("username");
		obj_name.value="<?php echo $name ?>";
		var obj_pass=document.getElementById("password");
		obj_pass.value="<?php echo $pass ?>";
		document.getElementById("submit").click();
</script> -->