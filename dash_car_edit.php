<?php
  include("dataconnection.php");
  // session_start();
  $row=null;
  if (isset($_GET['c'])){
    $id=$_GET["c"];
    $query=mysqli_query($con,"select * from car where id='$id'");
  	$row=mysqli_fetch_array($query);
    $vehicle_plate = $row["vehicle_plate"];

    $_SESSION['vehicle_plate'] = $vehicle_plate;
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
        max-height: 400px;
      }
      /* .table-x-scrollbar{
        overflow-x: scroll;
      } */
    </style>
  </head>
  <body>
    <div class="container">
      <h2>Edit</h2>
      <br>
    	<div class="row">
        <div class="table-y-scrollbar">
          <div class="col-lg-12">
            <form action="dash_car_update.php?c=<?php echo $id; ?>" method="post">
              <input type="hidden" name="vehicle_plate" value="<?php echo $row["vehicle_plate"]; ?>">
              <div class="form-group col-lg-12">
                <h5>Vehicle State:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_state"]; ?>" name="vehicle_state" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle City:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_city"]; ?>" name="vehicle_city" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Brand Model:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_brand_model"]; ?>" name="vehicle_brand_model" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Plate:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_plate"]; ?>" name="vehicle_plate_new" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Seats:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_seats"]; ?>" name="vehicle_seats" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Transmission:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_transmission"]; ?>" name="vehicle_transmission" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Rent Price:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_rent_price"]; ?>" name="vehicle_rent_price" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Price:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_price"]; ?>" name="vehicle_price" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Picture:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_pic"]; ?>" name="vehicle_pic" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle PPK:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_ppk"]; ?>" name="vehicle_ppk" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle VI:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_vi"]; ?>" name="vehicle_vi" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Vehicle Available:</h5>
                <input type="text" class="form-control" value="<?php echo $row["vehicle_available"]; ?>" name="vehicle_available" required><br>
              </div>
              <div class="form-group col-lg-12" style="text-align:center;">
                <button type="submit" class="block btn btn-success" name="submit">Update</button>
                <a href="dash_car_list.php" class="block btn btn-secondary">Back</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
