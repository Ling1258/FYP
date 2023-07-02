<?php
include("dataconnection.php");
session_start();

$query = "SELECT * FROM register WHERE user_type = 'staff' ORDER BY id DESC";
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
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h2 style="text-align:center;">Staff List</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <table class="table table-bordered text-center">
                  <tr style="text-align:center;color:white;background-color:black;">
                    <td>IC</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Password</td>
                    <td>Edit</td>
                    <td>Delete</td>
                  </tr>
                  <tr>
                  <?php
                    while($row = mysqli_fetch_assoc($result)){
                  ?>
                    <td><?php echo $row["ic"]; ?></td>
                    <td><?php echo $row["name"]; ?></td>
                    <td><?php echo $row["email"]; ?></td>
                    <td><?php echo $row["password"]; ?></td>
                    <td> <a href="dash_staff_edit.php?ID=<?php echo $row["id"]; ?>" class="btn btn-info">Edit</a> </td>
                    <td> <a href="dash_staff_delete.php?ID=<?php echo $row["id"]; ?>" class="btn btn-danger">Delete</a> </td>
                  </tr>
                  <?php
                    }
                  ?>
                </table>
              </div>
            </div>
            <div class="text-center pb-3">
              <a href="dash_staff_add.php" class="btn btn-primary">Add Staff</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <?php

     ?> -->
  </body>
</html>
