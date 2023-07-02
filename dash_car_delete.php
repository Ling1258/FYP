<?php
  include("dataconnection.php");

  if (isset($_GET['c'])){
    $id=$_GET['c'];
  	mysqli_query($con,"delete from car where id='$id'");
  	header("Location: dash_car_list.php");
  }
?>
