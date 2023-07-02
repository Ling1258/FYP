<?php
  include("dataconnection.php");

  if (isset($_GET['r'])){
    $r_id=$_GET['r'];
  	mysqli_query($con,"delete from request_list where r_id='$r_id'");
  	header("Location: dash_request_list.php");
  }
?>
