<!-- E-wallet pay method -->
<!-- <?php
include("dataconnection.php");
session_start();

$expectedCode = "ABC123"; // The expected code for successful scanning

$qrCodeContent = "https://example.com/pay_success_ew.php?code=$expectedCode";

// Encode the content for use in the URL
$encodedContent = urlencode($qrCodeContent);

// URL for generating the QR code using the Google Charts API
$apiUrl = "https://chart.googleapis.com/chart?cht=qr&chs=300x300&chl={$encodedContent}";

if (isset($_GET['id'])){
  $id=$_GET['id'];
  $query=mysqli_query($con,"select * from car where id='$id'");
  $row=mysqli_fetch_array($query);
}

if (isset($_GET['code']) && $_GET['code'] === $expectedCode) {
    // Redirect to success page
    header("Location: pay_success.php?id=$id");
    exit();
}

?> -->

<!-- <?php
  include("dataconnection.php");

  if (isset($_GET['rent_record_id'])){
    $rent_record_id = $_GET['rent_record_id'];
    mysqli_query($con,"select * from rent_record where id='$rent_record_id'");
  	// header("Location: dash_car_list.php");
  }
?> -->




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
        width: 500px;
      }
    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color:black;">
      <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="index.php" style="font-size:40px;"><span style="color:#6E4BE7;">Jo</span>Car</a>
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
      <!-- E-wallet pay method -->
      <!-- <div class="row">
        <div class="col">
          <br>
          <h3 class="text-center">Please scan the E-Wallet QR code below. </h3>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <?php
            echo "<img src='" . $apiUrl . "' alt='QR Code' width='300' height='300' style='margin: auto;display: block;'>";
           ?>
        </div>
      </div> -->
      <br>
      <div class="card">
        <div class="row">
          <div class="col">
            <h3 class="text-center">Please Choose the Online Bank</h3>
          </div>
        </div>
        <form class="" action="pay_success_oy2.php" method="post">
          <div class="row">
            <div class="col">
              <br>
              <h6>Online Bank</h6>
              <select name="bank" class="form-control">
                <option value="Maybank2u">Maybank2u</option>
                <option value="CIMB Clicks">CIMB Clicks</option>
                <option value="Public Bank">Public Bank</option>
                <option value="RHB Now">RHB Now</option>
                <option value="Heong Leong Connect">Heong Leong Connect</option>
                <option value="Bank Islam">Bank Islam</option>
                <option value="OCBC Online">OCBC Online</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <br>
              <button type="submit" name="submit" class="btn btn-success">Continue</button>
            </div>
          </div>
        </form>
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
