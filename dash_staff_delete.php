<?php
  include("dataconnection.php");

  if (isset($_GET['ID'])){
    $id=$_GET['ID'];
  	mysqli_query($con,"delete from register where id='$id'");
  	header("Location: dash_staff_list.php");
  }
?>
