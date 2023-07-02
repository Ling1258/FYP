<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])) {
    $email = $_SESSION['store'];
    if (isset($_POST['submit'])) {
        $new_pass = $_POST['new_pass'];
        $new_c_pass = $_POST['new_c_pass'];

        if($new_pass === $new_c_pass){
          $query = mysqli_query($con, "UPDATE register SET password='$new_pass',confirm_pass='$new_c_pass' WHERE email='$email'");

          if ($query) {
              echo "<script>alert('Update password successfully. Please login again.');</script>";
              echo "<script>parent.location.href = 'login.php';</script>";
              exit; // Optional: Exit the script to prevent further execution
          }else {
             $msg = "<div class='alert alert-danger'>Update password unsuccess.</div>";
          }
        } else {
            $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
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
      <h1>Update New Password</h1>
      <?php echo $msg; ?>
      <form class="" action="c_pass.php" method="post">
        <div class="form-group col-lg-12">
          <input type="password" class="form-control" name="new_pass" value="" placeholder="Enter New Password" pattern="[A-Za-z0-9]{8}" onclick="pass_attention()" required><br>
        </div>
        <div class="form-group col-lg-12">
          <input type="password" class="form-control" name="new_c_pass" value="" placeholder="Confirm New Password" pattern="[A-Za-z0-9]{8}" required><br>
        </div>
        <div class="btn col-lg-12">
          <button type="submit" class="btn btn-outline-dark" name="submit">Change</button>
        </div>
      </form>
    </div>

    <script type="text/javascript">
    function pass_attention(){
      window.alert('Your password must be at least 8 characters long and contain only letters and numbers');
    }
    </script>
  </body>
</html>
