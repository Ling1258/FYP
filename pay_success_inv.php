<?php
  include("dataconnection.php");
  session_start();

  if (isset($_SESSION['total_cost'])){
    $total_cost = $_SESSION['total_cost'];
  }

  $invoiceNumber = rand(1000, 9999); // Generate a random number between 1000 and 9999

  if (isset($_SESSION['r_r_id'])){
    $r_r_id = $_SESSION['r_r_id'];

    $sql="UPDATE rent_record SET rent_invoice = '$invoiceNumber' WHERE id = '$r_r_id'";
    $result = mysqli_query($con, $sql);
  }
?>




<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental</title>
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
<!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

    <style media="screen">
      .img{
        margin: auto;
        display: block;
      }
      .card{
        background-color: white;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 255, 0.16) 0 0 10px 0, rgba(0, 0, 255, 0.16) 0 0 0 1px;
        padding: 2%;
        margin: auto;
        display: block;
        height: auto;
        width: 700px;
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
          <ul class="navbar-nav mr-auto">
            <!-- <li class="nav-item">
              <a class="nav-link" href="index.php"> Login</a>
            </li> -->
          </ul>
        </div>
      </div>
    </nav>

    <div class="container-fluid">
      <br>
      <div class="card">
        <div class="row">
          <div class="col">
            <h2 class="text-center">Your payment have transfer successful!!</h2>
            <hr>
            <h5 class="text-center">Below is the receipt of your payment.</h5>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <?php
            echo "<h6 style='padding-left:35%;'>Invoice Number: " . $invoiceNumber . "</h6>";
            echo "<h6 style='padding-left:35%;'>Current time: " . date("H:i:s") . "</h6>";
            echo "<h6 style='padding-left:35%;'>Current date: " . date("Y-m-d") . "</h6>";
            if (isset($_SESSION['id'])) {
                $id = $_SESSION['id'];
                $sql = "SELECT vehicle_plate FROM car WHERE id = '$id'";
                $result = mysqli_query($con, $sql);

                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<h6 style='padding-left:35%;'>Vehicle Plate: " . $row["vehicle_plate"]. "</h6>";
                    }
                }
            }
            ?>
            <h6 style="padding-left:35%;">Total price: RM<?php echo $total_cost; ?></h6>
          </div>
        </div>
        <div class="row">
          <div class="col">
            <br>
            <a href="userpage.php" class="btn btn-success" style="margin:auto;display:block;">Home</a>
          </div>
        </div>
      </div>
    </div>

    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap and owlcarousel js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>

  </body>
</html>
