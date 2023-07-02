<?php
include("dataconnection.php");

if (isset($_GET['p'])){
  $p_id = $_GET['p'];
  mysqli_query($con, "UPDATE partnership SET total_earning='' WHERE p_id='$p_id'");
  $sql = mysqli_query($con, "SELECT p_v_plate_no FROM partnership WHERE p_id='$p_id'");
  $result = mysqli_fetch_assoc($sql); // Fetch the actual result
  $p_v_plate_no = $result['p_v_plate_no']; // Access the value from the result array
  if ($result) {
    mysqli_query($con, "UPDATE rent_record SET rent_earning_pay='yes', total_earning='0' WHERE vehicle_plate='$p_v_plate_no' AND status='done'");
    header("Location: dash_partnership_list.php");
  }
}
?>
