<?php
include("dataconnection.php");

if (isset($_POST['feedback'])) {
  $feedback = $_POST['feedback'];
  $id = $_POST['rentcar_id'];

  // Update the vehicle_feedback column in the rent_record table
  $query = "UPDATE rent_record SET vehicle_feedback = '$feedback' WHERE id = '$id'";
  $result = mysqli_query($con, $query);

  if ($result) {
    header("Location: rentcar_record.php");
  } else {
    echo "Error submitting feedback: " . mysqli_error($con);
  }
}
?>
