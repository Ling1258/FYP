<?php
include("dataconnection.php");
session_start();

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $recordId = $_POST['recordId'];
  $feedback = $_POST['feedback'];

  // Perform any necessary validation or processing of the feedback here

  // Update the rent_record table with the feedback
  $query = "UPDATE rent_record SET vehicle_feedback = '$feedback' WHERE id = '$recordId'";
  $result = mysqli_query($con, $query);

  if ($result) {
    // Feedback stored successfully
    header("Location: rentcar_record.php");
  } else {
    // Error storing feedback
    echo "Error storing feedback";
  }
}
?>
