<?php
  include("dataconnection.php");

  if (isset($_GET['p'])){
    $p_id=$_GET['p'];
  	mysqli_query($con,"delete from partnership where p_id='$p_id'");
  	header("Location: dash_partnership_list.php");
  }
?>
