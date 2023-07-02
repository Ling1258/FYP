<?php
include("dataconnection.php");
session_start();

if (isset($_POST['submit'])){
  $state=$_POST['state'];
  $city=$_POST['city'];
  $pick_up_date=$_POST['pick_up_date'];
  $drop_off_date=$_POST['drop_off_date'];
  $pick_up_time=$_POST['pick_up_time'];
  $drop_off_time=$_POST['drop_off_time'];

  $start = strtotime($pick_up_date.' '.$pick_up_time);
  $end = strtotime($drop_off_date.' '.$drop_off_time);

  // echo   $start;
  // echo time();

  if ($start >= $end) {
    $msg = "<div class='alert alert-danger'>Invalid duration. Please select valid pick-up and drop-off dates.</div>";
    header("Location: userpage.php?msg=".urlencode($msg)); // Redirect with message
    exit(); // Terminate the script after redirection
  } else if ($start === $end) {
    $msg = "<div class='alert alert-danger'>Invalid duration. Please select valid pick-up and drop-off dates.</div>";
    header("Location: userpage.php?msg=".urlencode($msg)); // Redirect with message
    exit(); // Terminate the script after redirection
  } else if ($start <= time()) { // Check if start date is in the past
    $msg = "<div class='alert alert-danger'>Invalid start date. Please select a future date.</div>";
    header("Location: userpage.php?msg=".urlencode($msg)); // Redirect with message
    exit(); // Terminate the script after redirection
  }

  $_SESSION['state'] = $state;
  $_SESSION['city'] = $city;
  $_SESSION['pick_up_date'] = $pick_up_date;
  $_SESSION['drop_off_date'] = $drop_off_date;
  $_SESSION['pick_up_time'] = $pick_up_time;
  $_SESSION['drop_off_time'] = $drop_off_time;

  $sql = "SELECT * FROM car WHERE vehicle_state='$state' AND vehicle_city='$city' AND vehicle_available='yes'";
  $result = mysqli_query($con,$sql);

}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
<!-- bootstrap and owlcarousel css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
        crossorigin="anonymous" />
<!-- css file -->
    <link rel="stylesheet" href="style.css">
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
    <style media="screen">
      h2{
        padding: 2%;
      }
      i{
        padding-left: 5%;
        padding-bottom: 5%;
      }
      a{
        color:#6E4BE7;
      }
      .card-list{
      background-color: white;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 255, 0.16) 0 10px 36px 0, rgba(0, 0, 255, 0.16) 0 0 0 1px;
      padding: 2%;
      margin: 2%;
      height: auto;
      width: auto;
      /* text-align: center; */
    }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color:black;">
      <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="userpage.php" style="font-size:40px;"><span style="color:#6E4BE7;">Jo</span>Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span id="btn-hamburger" class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
          </ul> -->
          <!-- <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="login.php"><i class="fa-regular fa-user"></i> Login</a>
            </li>
          </ul> -->
        </div>
      </div>
    </nav>

    <div class="container">
      <!-- <div class="row mt-3 mb-2">
        <div class="col-lg-2">
          <a href="searchbar_in.php" class="block btn btn-secondary">Back</a>
        </div>
      </div> -->
      <div class="row">
        <?php if (mysqli_num_rows($result) > 0) {
          while($row = mysqli_fetch_assoc($result)){
        ?>
        <div class="col-lg-6">
          <div class="card-list">
            <div class="row">
              <div class="col-lg-6">
                <img style="width:200px;height:200px;display: block;margin:auto;" src="<?php echo $row["vehicle_pic"]; ?>">
              </div>
              <div class="col-lg-6">
                <h3 class="pt-2 pb-3"><?php echo $row["vehicle_brand_model"]; ?></h3>
                <div class="row">
                  <div class="col-lg-12">
                    <p><i class="fa-solid fa-car"></i> <?php echo $row["vehicle_plate"]; ?></p>
                  </div>
                  <div class="col-lg-12">
                    <p><i class="fa-solid fa-user"></i> <?php echo $row["vehicle_seats"]; ?></p>
                  </div>
                  <div class="col-lg-12">
                    <p><i class="fa-solid fa-code-branch"></i> <?php echo $row["vehicle_transmission"]; ?></p>
                  </div>
                  <div class="col-lg-12">
                    <a href="payment.php?pay=<?php echo $row["id"]; ?>" class="btn btn-success btn-block" ><b>MYR <?php echo $row["vehicle_rent_price"]; ?></b></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php } } else {
                echo "<h2 class='text-center'>Sorry! No such search of result!!</h2>";
              }
      ?>
      </div>
    </div>

    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap and owlcarousel js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>

  </body>
</html>
