<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])){
  $email = $_SESSION['store'];
  $query = mysqli_query($con, "SELECT p_v_plate_no FROM partnership WHERE p_email = '$email'");
  if(mysqli_num_rows($query) > 0) {
    $row=mysqli_fetch_array($query);
    $p_v_plate_no = $row["p_v_plate_no"];
  }
}

$query_rent = mysqli_query($con, "SELECT * FROM rent_record WHERE vehicle_plate = '$p_v_plate_no' ORDER BY order_time DESC");

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
              <h2 style="text-align:center;">Rent Record List</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <div class="table-x-scrollbar">
                  <table class="table table-bordered text-center" style="min-width:max-content;">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>State</td>
                      <td>City</td>
                      <td>Pick-up-Time</td>
                      <td>Drop-off-Time</td>
                      <td>Pick-up-Date</td>
                      <td>Drop-off-Date</td>
                      <td>Vehicle Plate</td>
                      <td>Driver Name</td>
                      <td>Driver Email</td>
                      <td>Driver Phone</td>
                      <td>Status</td>
                      <td>Total Price (RM)</td>
                    </tr>
                    <tr>
                    <?php
                      while($row = mysqli_fetch_assoc($query_rent)){
                    ?>
                      <td><?php echo $row["pick_up_state"]; ?></td>
                      <td><?php echo $row["pick_up_city"]; ?></td>
                      <td><?php echo $row["pick_up_time"]; ?></td>
                      <td><?php echo $row["drop_off_time"]; ?></td>
                      <td><?php echo $row["pick_up_date"]; ?></td>
                      <td><?php echo $row["drop_off_date"]; ?></td>
                      <td><?php echo $row["vehicle_plate"]; ?></td>
                      <td><?php echo $row["driver_name"]; ?></td>
                      <td><?php echo $row["driver_email"]; ?></td>
                      <td><?php echo $row["driver_phone"]; ?></td>
                      <td><?php echo $row["status"]; ?></td>
                      <td><?php echo $row["total_cost"]; ?></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <?php

     ?> -->
  </body>
</html>
