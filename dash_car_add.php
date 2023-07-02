<?php
  include("dataconnection.php");
  // session_start();

  if (isset($_POST['submit'])) {
    $vehicle_state=$_POST['vehicle_state'];
		$vehicle_city=$_POST['vehicle_city'];
    $vehicle_brand_model=$_POST['vehicle_brand_model'];
  	$vehicle_plate=$_POST['vehicle_plate'];
    $vehicle_seats=$_POST['vehicle_seats'];
    $vehicle_transmission=$_POST['vehicle_transmission'];
    $vehicle_rent_price=$_POST['vehicle_rent_price'];
    $vehicle_price=$_POST['vehicle_price'];
    if (isset($_FILES['vehicle_pic'])) {
      $vehicle_pic = $_FILES['vehicle_pic']['name'];
      $vehicle_pic_tmp = $_FILES['vehicle_pic']['tmp_name'];
      $vehicle_pic_path = 'uploads/' . $vehicle_pic;
      move_uploaded_file($vehicle_pic_tmp, $vehicle_pic_path);
    }

    if (isset($_FILES['vehicle_ppk'])) {
      $vehicle_ppk = $_FILES['vehicle_ppk']['name'];
      $vehicle_ppk_tmp = $_FILES['vehicle_ppk']['tmp_name'];
      $vehicle_ppk_path = 'uploads/' . $vehicle_ppk;
      move_uploaded_file($vehicle_ppk_tmp, $vehicle_ppk_path);
    }

    if (isset($_FILES['vehicle_vi'])) {
      $vehicle_vi = $_FILES['vehicle_vi']['name'];
      $vehicle_vi_tmp = $_FILES['vehicle_vi']['tmp_name'];
      $vehicle_vi_path = 'uploads/' . $vehicle_vi;
      move_uploaded_file($vehicle_vi_tmp, $vehicle_vi_path);
    }

    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM car WHERE vehicle_plate='{$vehicle_plate}'")) > 0) {
      $msg = "<div class='alert alert-danger'>{$vehicle_plate} - This vehicle plate has been already exists.</div>";
    } else {
      $sql = "INSERT INTO car (vehicle_state,vehicle_city,vehicle_brand_model,vehicle_plate,vehicle_seats,vehicle_transmission,vehicle_rent_price,vehicle_price,vehicle_pic,vehicle_ppk,vehicle_vi,vehicle_available)VALUES ('$vehicle_state','$vehicle_city','$vehicle_brand_model','$vehicle_plate','$vehicle_seats','$vehicle_transmission','$vehicle_rent_price','$vehicle_price','$vehicle_pic_path','$vehicle_ppk_path','$vehicle_vi_path','yes')";
      $result = mysqli_query($con, $sql);
      header("Location: dash_car_list.php");
    }
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
    <style media="screen">
      .table-y-scrollbar{
        overflow-y: scroll;
        max-height: 500px;
      }
      /* .table-x-scrollbar{
        overflow-x: scroll;
      } */
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Add Vehicle</h2>
      <br>
    	<div class="row">
        <div class="table-y-scrollbar">
          <div class="col-lg-12">
            <form action="dash_car_add.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-lg-12">
                <?php echo $msg; ?>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle State:</h5>
                <input type="text" class="form-control" value="" name="vehicle_state" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle City:</h5>
                <input type="text" class="form-control" value="" name="vehicle_city" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Brand Model:</h5>
                <input type="text" class="form-control" value="" name="vehicle_brand_model" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Plate:</h5>
                <input type="text" class="form-control" value="" name="vehicle_plate" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Seats:</h5>
                <input type="text" class="form-control" value="" name="vehicle_seats" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Transmission:</h5>
                <input type="text" class="form-control" value="" name="vehicle_transmission" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Rent Price:</h5>
                <input type="text" class="form-control" value="" name="vehicle_rent_price" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Price:</h5>
                <input type="text" class="form-control" value="" name="vehicle_price" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Picture:</h5>
                <input type="file" class="form-control" name="vehicle_pic" id="vehicle_pic" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle PPK:</h5>
                <input type="file" class="form-control" name="vehicle_ppk" id="vehicle_ppk"  required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle VI:</h5>
                <input type="file" class="form-control" name="vehicle_vi" id="vehicle_vi"  required><br>
              </div>
              <div class="form-group col-lg-12 pt-3" style="text-align:center;">
                <button type="submit" class="block btn btn-success" name="submit" value="upload">Add</button>
            		<a href="dash_car_list.php" class="block btn btn-secondary">Back</a>
              </div>
          	</form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
