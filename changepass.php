<?php
include("dataconnection.php");
session_start();

if (isset($_GET['reset'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM register WHERE code='{$_GET['reset']}'")) > 0) {
      $query = mysqli_query($con, "UPDATE register SET code='' WHERE code='{$_GET['reset']}'");

      if ($query) {
          $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
      } else {
          $msg = "<div class='alert alert-danger'>Verification Link do not match.</div>";
      }
    } else {
        header("Location: forgetpassword.php");
    }
}

if (isset($_SESSION['keep'])) {
  $email = $_SESSION['keep'];
  if (isset($_POST['submit'])) {
      $pass = $_POST['password'];
      $confirm_pass = $_POST['confirm_pass'];

      if ($pass === $confirm_pass) {
          $query = mysqli_query($con, "UPDATE register SET password='$pass',confirm_pass='$confirm_pass' WHERE email='$email'");

          if ($query) {
              $msg = "<div class='alert alert-success'>Change password successfully.</div>";
          }else {
             $msg = "<div class='alert alert-danger'>Change password unsuccess.</div>";
          }
      } else {
          $msg = "<div class='alert alert-danger'>Password and Confirm Password do not match.</div>";
      }

  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Car Rental</title>
<!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- css file -->
    <link rel="stylesheet" href="changepass.css">
<!-- js file -->
    <script src="signup.js" charset="utf-8"></script>
  </head>
  <body>
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color:black;">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto" href="login.php" style="font-size:40px;font-weight:bold;color:white;"><span style="color: #6E4BE7;">Jo</span>Car</a>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto" style="color:white;font-size:20px;margin-left:20px;">
              <li class="nav-item">
                <a class="nav-link" href="login.php"><i class="fa-regular fa-user"></i> Login</a>
              </li>
            </ul>
          </div> -->
        </div>
      </nav>
    </section>
    <section id="from">
      <h1 class="form-title">Change Your Password</h1>
      <div class="container">
        <div class="Cart">
          <div class="row">
            <div class="col-lg-12">
              <p style="text-align:center">Enter your new password</p>
              <?php echo $msg; ?>
              <form class="" action="changepass.php" method="post">
                <div class="form-group col-lg-12">
                  <input type="password" class="form-control" name="password" value="" placeholder="Enter New Password" pattern="[A-Za-z0-9]{8}" onclick="pass_attention()" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="password" class="form-control" name="confirm_pass" value="" placeholder="Confirm New Password" pattern="[A-Za-z0-9]{8}" required><br>
                </div>
                <div class="btn col-lg-12">
                  <button type="submit" class="block btn btn-outline-success" name="submit">Change Password</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
