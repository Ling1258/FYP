<?php
include("dataconnection.php");
session_start();

$query = "select * from partnership ORDER BY p_id DESC";
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
      /* .table-x-scrollbar{
        overflow-x: scroll;
      } */
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h2 style="text-align:center;">Partnership List</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <!-- <div class="table-x-scrollbar"> -->
                  <table class="table table-bordered text-center">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>IC</td>
                      <td>Name</td>
                      <td>Phone</td>
                      <td>Email</td>
                      <td>Bank</td>
                      <td>Bank Acc</td>
                      <td>Vehicle Plate No</td>
                      <td>Total Earning</td>
                      <td>Edit</td>
                      <td>Delete</td>
                      <td>Paid</td>
                    </tr>
                    <tr>
                    <?php
                      while($row = mysqli_fetch_assoc($result)){
                    ?>
                      <td><?php echo $row["p_ic"]; ?></td>
                      <td><?php echo $row["p_name"]; ?></td>
                      <td><?php echo $row["p_phone"]; ?></td>
                      <td><?php echo $row["p_email"]; ?></td>
                      <td><?php echo $row["p_bank"]; ?></td>
                      <td><?php echo $row["p_acc"]; ?></td>
                      <td><?php echo $row["p_v_plate_no"]; ?></td>
                      <td><?php echo $row["total_earning"]; ?></td>
                      <td> <a href="dash_partnership_edit.php?p=<?php echo $row["p_id"]; ?>" class="btn btn-info">Edit</a> </td>
                      <td> <a href="dash_partnership_delete.php?p=<?php echo $row["p_id"]; ?>" class="btn btn-danger">Delete</a> </td>
                      <td> <a href="dash_partnership_pay.php?p=<?php echo $row["p_id"]; ?>" class="btn btn-success">Paid</a> </td>
                    </tr>
                    <?php
                      }
                    ?>
                  </table>
                <!-- </div> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
