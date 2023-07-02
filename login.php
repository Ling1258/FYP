<?php
include("dataconnection.php");
session_start();

if (isset($_GET['verification'])) {
    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM register WHERE code='{$_GET['verification']}'")) > 0) {
        $query = mysqli_query($con, "UPDATE register SET code='' WHERE code='{$_GET['verification']}'");

        if ($query) {
            $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
        } else {
            $msg = "<div class='alert alert-danger'>Verification Link does not match.</div>";
        }
    } else {
        header("Location: login.php");
    }
}

if (isset($_POST['submit'])) {
    // Get the submitted email and password
    $email = $_POST['email'];
    $pass = $_POST['password'];

    // Check if the submitted email exists in the table
    $emailQuery = "SELECT * FROM register WHERE email='$email'";
    $emailResult = mysqli_query($con, $emailQuery);

    if (mysqli_num_rows($emailResult) === 1) {
        // Check if the submitted email and password match a record in the database
        $sql = "SELECT * FROM register WHERE email='$email' AND password='$pass'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);

            if (empty($row['code'])) {
                $_SESSION['store'] = $email;
                // set session variables based on user type
                if ($row['user_type'] == "user") {
                    header("Location: userpage.php"); // redirect to ? page
                } else if ($row['user_type'] == "admin") {
                    header("Location: adminpage.php"); // redirect to ? page
                } else if ($row['user_type'] == "staff") {
                    header("Location: staffpage.php"); // redirect to ? page
                }
            } else {
                $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
            }
        } else {
            $msg = "<div class='alert alert-danger'>Email or password is incorrect</div>";
        }
    } else {
        $msg = "<div class='alert alert-danger'>Email is not yet registered</div>";
    }

    // Close the database connection
    mysqli_close($con);
}
?>



<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Car Rental</title>
<!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
    crossorigin="anonymous"></script>
<!-- css file -->
    <!-- <link rel="stylesheet" href="login.css"> -->
<!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>

    <style media="screen">
    .navbar-brand{
      font-weight: bold;
    }
    .nav-link{
      color: #fff;
      font-size: 20px;
      margin-left: 20px;
    }
    .Cart{
      background-color: white;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 255, 0.16) 0 10px 36px 0, rgba(0, 0, 255, 0.16) 0 0 0 1px;
      padding: 3% 5%;
      margin: 0% 20% 5% 20%;
      text-align: center;
    }
     .form-title{
      text-align: center;
      padding-top: 5%;
      padding-bottom: 2%;
    }
      .block{
      display: block;
      width: 100%;
      border: none;
      background-color: #BFB4E3;
      padding: 14px 28px;
      cursor: pointer;
      text-align: center;
      color: black;
    }
    </style>
  </head>
  <body>
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color:black;">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto" href="index.php" style="font-size:40px;font-weight:bold;color:white;"><span style="color: #6E4BE7;">Jo</span>Car</a>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="index.html" style="color:white;font-size:20px;margin-left:20px;">Home</a>
              </li>
            </ul>
          </div> -->
        </div>
      </nav>
    </section>
    <section id="form">
      <h1 class="form-title">Login</h1>
      <div class="container">
        <div class="Cart">
          <div class="row">
            <div class="col-lg-12">
              <p style="text-align:center">Login with your email and password</p>
              <?php echo $msg; ?>
              <form class="" action="login.php" method="post">
                <div class="form-group col-lg-12">
                  <input type="email" class="form-control" name="email" value="" placeholder="Enter Your Email" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="password" class="form-control" name="password" value="" placeholder="Enter Your Password" required><br>
                </div>
                <div class="col-lg-12" style="text-align:left;">
                  <a href="forgetpassword.php">Forgot Password?</a>
                </div>
                <div class="btn col-lg-12">
                  <br>
                  <button type="submit" class="block btn btn-outline-success" name="submit">Login</button>
                </div>
              </form>
              <div class="col-lg-12">
                <p style="text-align:center">Create an Account!! <a href="signup.php">Signup</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
