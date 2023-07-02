<?php
include("dataconnection.php");

$query = "SELECT vehicle_plate, entry_time FROM entry_record ORDER BY entry_time DESC";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Error executing the query: ' . mysqli_error($con));
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
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h2 style="text-align:center;">Entry Record</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <!-- <div class="table-x-scrollbar"> -->
                  <table class="table table-bordered text-center">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>Car Plate</td>
                      <td>Entry Time</td>
                    </tr>
                    <tr>
                    <?php
                      while ($row = mysqli_fetch_assoc($result)){
                    ?>
                      <td><?php echo $row["vehicle_plate"]; ?></td>
                      <td><?php echo $row["entry_time"]; ?></td>
                    </tr>
                    <?php
                      }
                      mysqli_free_result($result);
                      mysqli_close($con);
                    ?>
                  </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
