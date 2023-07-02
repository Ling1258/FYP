<?php
include("dataconnection.php");
session_start();

$query = "select * from car ORDER BY id DESC";
$result = mysqli_query($con,$query);
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
      .table-x-scrollbar{
        overflow-x: scroll;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h2 style="text-align:center;">Vehicle List</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <div class="table-x-scrollbar">
                  <table class="table table-bordered text-center" style="min-width:max-content;">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>Vehicle State</td>
                      <td>Vehicle City</td>
                      <td>Vehicle Brand Model</td>
                      <td>Vehicle Plate</td>
                      <td>Vehicle Seats</td>
                      <td>Vehicle Transmission</td>
                      <td>Vehicle Rent Price</td>
                      <td>Vehicle Price</td>
                      <td>Vehicle Picture</td>
                      <td>Vehicle PPK</td>
                      <td>Vehicle VI</td>
                      <td>Vehicle Available</td>
                      <td>Edit</td>
                      <td>Delete</td>
                    </tr>
                    <tr>
                    <?php
                      while($row = mysqli_fetch_assoc($result)){
                        $vehicle_pic = $row['vehicle_pic'];
                        $vehicle_ppk = $row['vehicle_ppk'];
                        $vehicle_vi = $row['vehicle_vi'];
                    ?>
                      <td><?php echo $row["vehicle_state"]; ?></td>
                      <td><?php echo $row["vehicle_city"]; ?></td>
                      <td><?php echo $row["vehicle_brand_model"]; ?></td>
                      <td><?php echo $row["vehicle_plate"]; ?></td>
                      <td><?php echo $row["vehicle_seats"]; ?></td>
                      <td><?php echo $row["vehicle_transmission"]; ?></td>
                      <td><?php echo $row["vehicle_rent_price"]; ?></td>
                      <td><?php echo $row["vehicle_price"]; ?></td>
                      <td><img src="<?php echo $vehicle_pic; ?>" height="100" width="100"></td>
                      <td><img src="<?php echo $vehicle_ppk; ?>" height="100" width="100"></td>
                      <td><img src="<?php echo $vehicle_vi; ?>" height="100" width="100"></td>
                      <td><?php echo $row["vehicle_available"]; ?></td>
                      <td> <a href="dash_car_edit.php?c=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a> </td>
                      <td> <a href="dash_car_delete.php?c=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a> </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="text-center pb-3">
              <a href="dash_car_add.php" class="btn btn-primary">Add Vehicle</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <?php

     ?> -->
  </body>
</html>
