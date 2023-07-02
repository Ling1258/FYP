<?php
  include("dataconnection.php");

  if (isset($_GET['rentcar_id'])) {
    $id = $_GET['rentcar_id'];

    // Check the status and pick-up date of the record
    $query = "SELECT * FROM rent_record WHERE id = '$id' AND status = 'reserved' AND pick_up_date > DATE_ADD(NOW(), INTERVAL 24 HOUR)";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $vehiclePlate = $row['vehicle_plate'];

      // Delete the record
      mysqli_query($con, "DELETE FROM rent_record WHERE id = '$id'");

      // Update the vehicle_available field in the car table for the corresponding vehicle_plate
      mysqli_query($con, "UPDATE car SET vehicle_available = 'yes' WHERE vehicle_plate = '$vehiclePlate'");

      echo "<script>alert('Your order has been canceled.');</script>";
      echo "<script>window.location.href = 'rentcar_record.php';</script>";
      exit;
    } else {
      // Display an alert message if the conditions are not met
      echo "<script>alert('Cannot cancel the reservation. Either the order already done or the cancellations are only allowed at least 24 hours before the pick-up date.');</script>";
      echo "<script>window.location.href = 'rentcar_record.php';</script>";
      exit;
    }
  }
?>
