<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])) {
    $email = $_SESSION['store'];
    if (isset($_POST['submit'])) {
        $new_email = $_POST['new_email'];

        // Check if the email already exists for other partnerships
        $check_query = "SELECT * FROM register WHERE email='$new_email' AND email!='$email'";
        $check_result = mysqli_query($con, $check_query);

        if (mysqli_num_rows($check_result) > 0) {
            $msg = "<div class='alert alert-danger'>$new_email - This email already exists.</div>";
        } else {
            // Update email in the "register" table
            $update_query = "UPDATE register SET email='$new_email' WHERE email='$email'";
            $update_result = mysqli_query($con, $update_query);

            // Update email in the "partnership" table if the email exists
            $partnership_query = "UPDATE partnership SET p_email='$new_email' WHERE p_email='$email'";
            $partnership_result = mysqli_query($con, $partnership_query);

            $rent_record_query = "UPDATE rent_record SET driver_email='$new_email' WHERE driver_email='$email'";
            $rent_record_result = mysqli_query($con, $rent_record_query);

            if ($update_result && $partnership_result && $rent_record_result) {
                echo "<script>alert('Update email successfully. Please login again.');</script>";
                echo "<script>parent.location.href = 'login.php';</script>";
                exit; // Optional: Exit the script to prevent further execution
            }
             else {
                $msg = "<div class='alert alert-danger'>Update email unsuccessful.</div>";
            }
        }
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <style media="screen">
      h1{
        margin-bottom: 5%;
      }
    </style>

  </head>
  <body>
    <div class="container">
      <h1>Update New Email</h1>
      <?php echo $msg; ?>
      <form class="" action="c_email.php" method="post">
        <div class="form-group col-lg-12">
          <input type="email" class="form-control" name="new_email" value="" placeholder="Enter Your New Email" required><br>
        </div>
        <div class="btn col-lg-12">
          <button type="submit" class="btn btn-outline-dark" name="submit">Change</button>
        </div>
      </form>
    </div>
  </body>
</html>
