<?php
    session_start();
    if(!$_SESSION['id'] || $_SESSION['type']!="tsp")
        header('Location: logout.php');
    $numberErr= $typeErr = $capacityErr = $sourceErr = $destinationErr=$timingErr=
    $tripsErr="";
    if(isset($_POST['submit'])){
        echo "string";
        if (empty($_POST["number"]))
            $nameErr = "Vahicle number is required";
        if (empty($_POST["type"]))
            $addressErr = "Vehicle Type is required";
        if (empty($_POST["capacity"]))
            $phoneErr = "Vehicle Capacity is required";
        if (empty($_POST["source"]))
            $usernameErr = "Source is required";
        if (empty($_POST["destination"]))
            $licenceErr = "Destination is required";
        if (empty($_POST["timing"]))
            $passwordErr = "Timing is required";
        if (empty($_POST["trips"]))
            $passwordErr = "Trips is required";
        $Err=$numberErr.$typeErr.$capacityErr.$sourceErr.$destinationErr.$timingErr.
        $tripsErr;  
        echo $Err;
        if(empty($Err)){
            include 'dbconnect.php';
            $sql=
            "
            INSERT INTO vehicle VALUES
            ('".$_POST['number']."','".$_SESSION['id']."','".$_POST['type']."',
            '".$_POST['capacity']."','".$_POST['source']."','".$_POST['destination']."',
            '".$_POST['timing']."','".$_POST['trips']."')";

            if(mysqli_query($conn,$sql)){
                echo "<script>alert('Successfull Vehicle Insertion')</script>";
                // echo "<script>self.location='login.php?type=tsp';</script>";
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
        <div class="container-fluid" style="display: block; padding: 0; ">    
            <div style="height: 850px;" class="row content">
                <div class="col-sm-2 sidenav">
                </div>
                <div style="padding: 0px;" class="col-sm-8">
                    <div class="col-sm-3" style="height:650px;"></div>
                    <div class="col-md-6 col6 boxshadow">
                        
                        <h2 style="text-align: center; padding-bottom: 5%; padding-top: 5%;">
                                    ADD Vehicle</h2>

                        <!-- BOXSHADOW NOT WORKING #CORRECT_IT -->

                        <form  class="" method="post" 
                        action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                            <div class="form-group">
                                <label>Vehicle Number</label>
                                <span class="error">* <?php echo $numberErr;?></span>
                                <input class="form-control" type="text" name="number">
                            </div>
                            <div class="form-group">
                                <label>Type</label>
                                <span class="error">* <?php echo $typeErr;?></span><br>
                                <input class="form-control" type="text" name="type">
                            </div>
                            <div class="form-group">
                                <label>Capacity:</label>
                                <span class="error">* <?php echo $capacityErr;?></span>
                               <input class="form-control" type="number" name="capacity">
                           </div>
                           <div class="form-group">
                                <label>Source</label>
                                <span class="error">* <?php echo $sourceErr;?></span>
                                <input class="form-control" type="text" name="source">
                            </div>
                            <div class="form-group">
                                <label>Destination:</label>
                                <span class="error">* <?php echo $destinationErr;?></span>
                                <input class="form-control" type="text" name="destination">
                            </div>
                            <div class="form-group">
                                <label>Timing:</label>
                                <span class="error">* <?php echo $timingErr;?></span>
                                <input class="form-control" type="time" name="timing">
                            </div>
                            <div class="form-group">
                                <label>Trips:</label>
                                <span class="error">* <?php echo $tripsErr;?></span>
                               <input class="form-control" type="number" name="trips">
                            </div>
                            <div class="form-group" style="text-align: center;">
                                <button 
                                    type="submit" name="submit" class="btn" style="color:black;margin-bottom:5%; margin-top:2%;">
                                        Submit
                                </button>
                            </div>
                        </form>
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
