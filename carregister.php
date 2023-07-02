<?php
include("dataconnection.php");
session_start();

if (isset($_POST['submit'])) {
  $car_brand = $_POST['car_brand'];
  $car_model = $_POST['car_model'];
  $car_plateno = $_POST['car_plateno'];
  $car_duration = $_POST['car_duration'];
  $car_price = $_POST['car_price'];
  $car_pic = $_FILES['car_pic'];
  $car_voc = $_FILES['car_voc'];

  #file name with a random number so that similar dont get replaced
  $car_pic = rand(1000,10000)."-".$_FILES['car_pic']['name'];

  #temporary file name to store file
  $fileTmp_p = $_FILES['car_pic']['tmp_name'];

  #upload directory path
  $fileDestination_p = 'CarPic/';

  #TO move the uploaded file to specific location
  move_uploaded_file($fileTmp_p, $fileDestination_p.'/'.$car_pic);

  #file name with a random number so that similar dont get replaced
  $car_voc = rand(1000,10000).'-'.$_FILES['car_voc']['name'];

  #temporary file name to store file
  $fileTmp_c = $_FILES['car_voc']['tmp_name'];

  #upload directory path
  $fileDestination_c = 'VehicleOwnershipCertificate/';

  #TO move the uploaded file to specific location
  move_uploaded_file($fileTmp_c, $fileDestination_c.'/'.$car_voc);

  if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM carregister WHERE car_plateno='{$car_plateno}'")) > 0) {
    $msg = "<div class='alert alert-danger'>{$car_plateno} - This car plate no has been already exists.</div>";
  }
  else {
    $sql = "INSERT INTO carregister (car_brand,car_model,car_plate,car_duration,car_price,car_pic,car_voc)VALUES ('$car_brand','$car_model','$car_plateno','$car_duration','$car_price','$car_pic','$car_voc') ";
    $rs = mysqli_query($con, $sql);

    $msg = "<div class='alert alert-success'>{$car_plateno} register successfully</div>";
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- css file -->
        <link rel="stylesheet" href="carregister.css">
    <!-- icon -->
        <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>

        <style media="screen">
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
    <section id="r_car">
      <h1 class="form-title">Register car here</h1>
      <div class="container">
        <div class="Cart">
          <div class="row">
            <div class="col-lg-12">
              <?php echo $msg; ?>
              <form class="" action="carregister.php" method="post">
                <div class="form-group col-lg-12">
                  <input type="text" class="form-control" name="car_brand" value="" placeholder="Enter Car Brand" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="text" class="form-control" name="car_model" value="" placeholder="Enter Car Model" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="text" class="form-control" name="car_plateno" value="" placeholder="Enter Car Plate No" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="text" class="form-control" name="car_duration" value="" placeholder="Enter Car Duration" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="text" class="form-control" name="car_price" value="" placeholder="Enter Car Price" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="file" class="form-control" name="car_pic" value="" placeholder="Enter Car Picture" required><br>
                </div>
                <div class="form-group col-lg-12">
                  <input type="file" class="form-control" name="car_voc" value="" placeholder="Enter Perakuan Pendaftaran Kenderaan" required><br>
                </div>
                <div class="btn col-lg-12">
                  <br>
                  <button type="submit" class="block btn btn-outline-success" name="submit">Register Car</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
