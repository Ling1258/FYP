<?php
// Connect to the database
// $con = mysqli_connect("192.168.43.141", "leo", "mei@pi00069","car_rental");
$con = mysqli_connect("localhost", "root", "","car_rental");
$msg = "";
// Check the connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}

 ?>
