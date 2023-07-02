<?php
include("dataconnection.php");
session_start();

$query = "select * from request_list ORDER BY r_id DESC";
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
        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h2 style="text-align:center;">Partnership Request List</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <div class="table-x-scrollbar">
                  <table class="table table-bordered text-center" style="min-width:max-content;">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>IC</td>
                      <td>Name</td>
                      <td>Phone</td>
                      <td>Email</td>
                      <td>Bank</td>
                      <td>Account No</td>
                      <td>Vehicle State</td>
                      <td>Vehicle City</td>
                      <td>Vehicle Brand Model</td>
                      <td>Vehicle Plate No</td>
                      <td>Vehicle Seats</td>
                      <td>Vehicle transmission</td>
                      <td>Vehicle Rental Price</td>
                      <td>Vehicle Picture</td>
                      <td>Perakuan Pendaftaran Kenderaan</td>
                      <td>Vehicle Insurance</td>
                      <td>Approve</td>
                      <td>Reject</td>
                    </tr>
                    <tr>
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                      $r_vehicle_pic = $row['r_vehicle_pic'];
                      $r_vehicle_ppk = $row['r_vehicle_ppk'];
                      $r_vehicle_vi = $row['r_vehicle_vi'];
                    ?>
                      <td><?php echo $row["r_ic"]; ?></td>
                      <td><?php echo $row["r_name"]; ?></td>
                      <td><?php echo $row["r_phone_no"]; ?></td>
                      <td><?php echo $row["r_email"]; ?></td>
                      <td><?php echo $row["r_bank"]; ?></td>
                      <td><?php echo $row["r_acc"]; ?></td>
                      <td><?php echo $row["r_state"]; ?></td>
                      <td><?php echo $row["r_city"]; ?></td>
                      <td><?php echo $row["r_vehicle_brand_model"]; ?></td>
                      <td><?php echo $row["r_vehicle_plate_no"]; ?></td>
                      <td><?php echo $row["r_vehicle_seats"]; ?></td>
                      <td><?php echo $row["r_vehicle_transmission"]; ?></td>
                      <td><?php echo $row["r_vehicle_price"]; ?></td>
                      <td><img src="<?php echo $r_vehicle_pic; ?>" height="100" width="100"></td>
                      <td><img src="<?php echo $r_vehicle_ppk; ?>" height="100" width="100"></td>
                      <td><img src="<?php echo $r_vehicle_vi; ?>" height="100" width="100"></td>
                      <td> <a href="dash_request_approach.php?r=<?php echo $row["r_id"]; ?>" class="btn btn-info">Approve</a> </td>
                      <td> <a href="dash_request_reject.php?r=<?php echo $row["r_id"]; ?>" class="btn btn-danger">Reject</a> </td>
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
