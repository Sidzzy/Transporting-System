<?php
    session_start();
    $_SESSION['id']=0;
    include 'dbconnect.php';       
    // $type=$_GET['type'];
    if(isset($_POST['tspsubmit'])){
        $nameErr=$agencynameErr= $phoneErr = $addressErr = $licenceErr = $usernameErr=$passwordErr=
        $cpasswordErr="";
        if (empty($_POST["owner_name"]))
            $nameErr = "Name is required";
        if (empty($_POST["agency_name"]))
            $agencynameErr = "Agency_name is required";
        if (empty($_POST["address"]))
            $addressErr = "Address is required";
        if (empty($_POST["contact"]))
            $phoneErr = "Contact is required";
        if (empty($_POST["username"]))
            $usernameErr = "UserName is required";
        if (empty($_POST["licence"]))
            $licenceErr = "Licence is required";
        if (empty($_POST["password"]))
            $passwordErr = "Password is required";
        if (empty($_POST["cpassword"]) || strcmp($_POST["cpassword"],$_POST["password"]))
            $cpasswordErr = "Incorrect Pasword";
        $Err=$nameErr.$agencynameErr.$phoneErr.$addressErr.$usernameErr.$passwordErr.$cpasswordErr.$licenceErr;
        echo $Err;
        if(empty($Err)){
            $sql=
            "
            INSERT INTO tsp VALUES
            ('".$_POST['owner_name']."','".$_POST['agency_name']."','".$_POST['address']."','".$_POST['contact']."',
            '".$_POST['username']."','".$_POST['licence']."','".md5($_POST['password'])."')
            ";

            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Successfull Signup')</script>";
                echo "<script>self.location='login.php?type=tsp';</script>";
            }
            else{
                echo "<script>alert('The data is not inserted')</script>";
            }
        }
        else{
            echo "<script>alert('Hii! The data is not inserted')</script>";
        }
    }
    if(isset($_POST['usersubmit'])){
        $nameErr = $phoneErr = $usernameErr=$passwordErr=$cpasswordErr="";
        if (empty($_POST["name"]))
            $nameErr = "Name is required";
        if (empty($_POST["contact"]))
            $phoneErr = "Contact is required";
        if (empty($_POST["username"]))
            $usernameErr = "UserName is required";
        if (empty($_POST["password"]))
            $passwordErr = "Password is required";
        if (empty($_POST["cpassword"]) || strcmp($_POST["cpassword"],$_POST["password"]))
            $cpasswordErr = "Incorrect Pasword";
        $Err=$nameErr.$phoneErr.$usernameErr.$passwordErr.$cpasswordErr;
        echo $Err;
        if(empty($Err)){
            $sql=
            "
            INSERT INTO user VALUES
            ('".$_POST['name']."','".$_POST['contact']."','".$_POST['username']."','"
            .$_POST['password']."')";

            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Successfull Signup')</script>";
                echo "<script>self.location='login.php?type=user';</script>";
            }
            else{
                echo "<script>alert('The data is not inserted')</script>";
            }
        }
        else{
            echo "<script>alert('Hii! The data is not inserted')</script>";
        }
    }
    if(isset($_POST['driversubmit'])){
        $nameErr=$agencynameErr= $phoneErr = $addressErr = $licenceErr = $usernameErr=$passwordErr=
        $cpasswordErr="";
        if (empty($_POST["owner_name"]))
            $nameErr = "Name is required";
        if (empty($_POST["agency_name"]))
            $agencynameErr = "Agency_name is required";
        if (empty($_POST["address"]))
            $addressErr = "Address is required";
        if (empty($_POST["contact"]))
            $phoneErr = "Contact is required";
        if (empty($_POST["username"]))
            $usernameErr = "UserName is required";
        if (empty($_POST["licence"]))
            $licenceErr = "Licence is required";
        if (empty($_POST["password"]))
            $passwordErr = "Password is required";
        if (empty($_POST["cpassword"]) || strcmp($_POST["cpassword"],$_POST["password"]))
            $cpasswordErr = "Incorrect Pasword";
        $Err=$nameErr.$agencynameErr.$phoneErr.$addressErr.$usernameErr.$passwordErr.$cpasswordErr.$licenceErr;
        echo $Err;
        if(empty($Err)){
            $sql=
            "
            INSERT INTO tsp VALUES
            ('".$_POST['owner_name']."','".$_POST['agency_name']."','".$_POST['address']."','".$_POST['contact']."',
            '".$_POST['username']."','".$_POST['licence']."','".md5($_POST['password'])."')
            ";

            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Successfull Signup')</script>";
                echo "<script>self.location='login.php?type=tsp';</script>";
            }
            else{
                echo "<script>alert('The data is not inserted')</script>";
            }
        }
        else{
            echo "<script>alert('Hii! The data is not inserted')</script>";
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include 'includefiles.php';
        ?>
    </head>
    <body>

        <?php 
            $loc='';
            $learnc='xlearnc/';  //to go to xlearnc folder
            include 'navbar.php';
        ?>

        <div class="container-fluid" style="display: block; padding: 0; ">    
            <div style="height: 850px;" class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div style="padding: 0px;" class="col-sm-8">
                    <div class="col-sm-3" style="height:650px;"></div>
                    <div class="col-md-6 col6 boxshadow">
                        
                        <h2 style="text-align: center; padding-bottom: 5%; padding-top: 5%;">
                                    <?php echo strtoupper($_GET['type']);?> SIGN-UP</h2>

                        <!-- BOXSHADOW NOT WORKING #CORRECT_IT -->

                        <?php if($_GET['type']=="tsp") { ?>
                        <form  class="" method="post" 
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label>Owner Name:</label>
                                <span class="error">* <?php echo $nameErr;?></span>
                                <input class="form-control" type="text" name="owner_name">
                            </div>
                            <div class="form-group">    
                                <label>Agency Name:</label>
                                <span class="error">* <?php echo $agencynameErr;?></span>
                                <input class="form-control" type="text" name="agency_name">
                            </div>
                            <div class="form-group">
                                <label>Address:</label>
                                <span class="error">* <?php echo $addressErr;?></span><br>
                                <input class="form-control" type="text" name="address">
                            </div>
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <span class="error">* <?php echo $phoneErr;?></span>
                               <input class="form-control" type="number" name="contact">
                           </div>
                           <div class="form-group">
                                <label>User Name</label>
                                <span class="error">* <?php echo $usernameErr;?></span>
                                <input class="form-control" type="text" name="username">
                            </div>
                            <div class="form-group">
                                <label>Licence:</label>
                                <span class="error">* <?php echo $licenceErr;?></span>
                                <input class="form-control" type="text" name="licence">
                            </div>
                            <div class="form-group">
                                <label>Password:</label>
                                <span class="error">* <?php echo $passwordErr;?></span>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <span class="error">* <?php echo $cpasswordErr;?></span>
                               <input class="form-control" type="password" name="cpassword">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button 
                                type="submit" name="tspsubmit" class="btn" style="color:black; margin-bottom:5%; 
                                margin-top:2%;">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <?php } else if($_GET['type']=="user") {?>
                        <form  class="" method="post" 
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label>Name:</label>
                                <span class="error">* <?php echo $nameErr;?></span>
                                <input class="form-control" type="text" name="name">
                            </div>
                            <div class="form-group">    
                                <label>Phone:</label>
                                <span class="error">* <?php echo $phoneErr;?></span>
                                <input class="form-control" type="text" name="contact">
                            </div>
                            <div class="form-group">
                                <label>Username:</label>
                                <span class="error">* <?php echo $usernameErr;?></span>
                               <input class="form-control" type="text" name="username">
                           </div>
                           <div class="form-group">
                                <label>Password:</label>
                                <span class="error">* <?php echo $passwordErr;?></span>
                                <input class="form-control" type="password" name="password">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <span class="error">* <?php echo $cpasswordErr;?></span>
                               <input class="form-control" type="password" name="cpassword">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button 
                                type="submit" name="usersubmit" class="btn" style="color:black; margin-bottom:5%; 
                                margin-top:2%;">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <?php } else if($_GET['type']=="driver") {?>
                        <form  class="" method="post" 
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label>Name:</label>
                                <span class="error">* <?php echo $nameErr;?></span>
                                <input class="form-control" type="text" name="Name">
                            </div>
                            <div class="form-group">    
                                <label>DOB:</label>
                                <span class="error">* <?php echo $dobErr;?></span>
                                <input class="form-control" type="date" name="DOB">
                            </div>
                            <div class="form-group">
                                <label>Gender:</label>
                                <span class="error">* <?php echo $genderErr;?></span><br>
                                <label class="radio-inline"><input type="radio" name="Gender" value="Male">Male</label>
                                <label class="radio-inline"><input type="radio" name="Gender" value="Female">Female
                                <label>
                                <label class="radio-inline"><input type="radio" name="Gender" value="Other">Other
                                </label>
                            </div>
                            <div class="form-group">
                                <label>Phone Number:</label>
                                <span class="error">* <?php echo $phoneErr;?></span>
                               <input class="form-control" type="text" name="Phone">
                           </div>
                           <div class="form-group">
                                <label>Email:</label>
                                <span class="error">* <?php echo $emailErr;?></span>
                                <input class="form-control" type="text" name="Email">
                            </div>
                            <div class="form-group">
                                <label>User Nmae:</label>
                                <span class="error">* <?php echo $usernameErr;?></span>
                                <input class="form-control" type="text" name="Username">
                            </div>
                            <div class="form-group">
                                <label>PassWord:</label>
                                <span class="error">* <?php echo $passwordErr;?></span>
                                <input class="form-control" type="password" name="PassWord">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password:</label>
                                <span class="error">* <?php echo $cpasswordErr;?></span>
                               <input class="form-control" type="password" name="CPassword">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button 
                                type="submit" name="submit" class="btn" style="color:black; margin-bottom:5%; 
                                margin-top:2%;">
                                    Submit
                                </button>
                            </div>
                        </form>
                        <?php } ?>
                    </div>
                    <div class="col-sm-3" style="height:650px;"></div>
                </div>
                <div class="col-sm-2 sidenav">
                </div>
            </div>
        </div>

        <footer style="opacity: 0.3;" class="container-fluid text-center">
            <p>Footer</p> 
        </footer>
    </body>
</html>
