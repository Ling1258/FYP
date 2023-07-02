<?php
include("dataconnection.php");
session_start();

$query = "select * from rent_record ORDER BY id DESC";
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
                      <td>Cardholder Name</td>
                      <td>Card Number</td>
                      <td>Expiration Date</td>
                      <td>CVC</td>
                      <td>Status</td>
                      <td>Total Price</td>
                      <td>Order Date</td>
                      <td>Invoice Number</td>
                      <td>Return</td>
                      <td>Edit</td>
                      <td>Delete</td>
                    </tr>
                    <tr>
                    <?php
                      while($row = mysqli_fetch_assoc($result)){
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
                      <td><?php echo $row["cardholder_name"]; ?></td>
                      <td><?php echo $row["card_number"]; ?></td>
                      <td><?php echo $row["expiration_date"]; ?></td>
                      <td><?php echo $row["cvc"]; ?></td>
                      <td><?php echo $row["status"]; ?></td>
                      <td><?php echo $row["total_cost"]; ?></td>
                      <td><?php echo $row["order_time"]; ?></td>
                      <td><?php echo $row["rent_invoice"]; ?></td>
                      <td> <a href="dash_rent_record_return.php?rr_ID=<?php echo $row["id"]; ?>" class="btn btn-warning">Return</a> </td>
                      <td> <a href="dash_rent_record_edit.php?rr_ID=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a> </td>
                      <td> <a href="dash_rent_record_delete.php?rr_ID=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a> </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div>
            <div class="text-center pb-3">
              <a href="searchbar.php" class="btn btn-primary">Add New Rent Order</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <?php

     ?> -->
  </body>
</html>
