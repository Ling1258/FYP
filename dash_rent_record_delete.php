<?php
  include("dataconnection.php");

  if (isset($_GET['rr_ID'])){
    $id=$_GET['rr_ID'];
  	mysqli_query($con,"delete from rent_record where id='$id'");
  	header("Location: dash_rent_record_list.php");
  }
?>
