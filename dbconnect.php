<?php
error_reporting(1);
//edited
//$con=mysql_connect("localhost","root","");
//mysql_select_db("vssut",$con);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transportingsystem";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>
