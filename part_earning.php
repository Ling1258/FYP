<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])){
  $email = $_SESSION['store'];
  $query = mysqli_query($con, "SELECT * FROM partnership WHERE p_email = '$email'");
  if(mysqli_num_rows($query) > 0) {
    $row=mysqli_fetch_array($query);
    $p_v_plate_no = $row["p_v_plate_no"];
  }
}

// Fetch the vehicle price from the car table
$query_car = mysqli_query($con, "SELECT vehicle_price FROM car WHERE vehicle_plate = '$p_v_plate_no'");
$car_info = mysqli_fetch_array($query_car);
$vehicle_price = $car_info['vehicle_price'];

$query_rent = mysqli_query($con, "SELECT * FROM rent_record WHERE vehicle_plate = '$p_v_plate_no' AND status='done' AND rent_earning_pay IS NULL ORDER BY order_time DESC");

$sql = mysqli_query($con, "SELECT total_earning FROM rent_record WHERE driver_email = '$email'");
if ($sql) {
    $result = mysqli_fetch_assoc($sql);
    if ($result) {
        $total_earning = $result['total_earning'];
    } else {
        // Handle the case when no record is found for the driver email
        $total_earning = 0; // Set a default value or handle it accordingly
    }
} else {
    // Handle the case when the SQL query fails
    $total_earning = 0; // Set a default value or handle it accordingly
}


while ($rent_record = mysqli_fetch_array($query_rent)) {
  $pick_up_date = $rent_record['pick_up_date'];
  $drop_off_date = $rent_record['drop_off_date'];

  // Calculate the rent_duration based on the date difference
  $pick_up = strtotime($pick_up_date);
  $drop_off = strtotime($drop_off_date);
  $rent_duration = ($drop_off - $pick_up) / (60 * 60 * 24); // Convert to days

  $rent_earning = $vehicle_price * $rent_duration;

  // Update the rent_earning and rent_duration values in the rent_record table
  $rent_record_id = $rent_record['id'];
  mysqli_query($con, "UPDATE rent_record SET rent_earning = $rent_earning, rent_duration = $rent_duration WHERE id = $rent_record_id");

  // Add the rent_earning to the total_earning
  $total_earning += $rent_earning;

  // Update the total earning in the partnership table
  mysqli_query($con, "UPDATE partnership SET total_earning = $total_earning WHERE p_email = '$email'");
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
              <h2>Your Earning</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <div class="table-x-scrollbar">
                  <table class="table table-bordered text-center" style="min-width:max-content;">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>Date</td>
                      <td>Duration (Days)</td>
                      <td>Vehicle Price (RM)</td>
                      <td>Earning (RM)</td>
                      <td>Withdraw</td>
                      <td>Status</td>
                    </tr>
                    <?php
                      $query_rent_earning = mysqli_query($con, "SELECT order_time, rent_duration, rent_earning, rent_earning_pay, status FROM rent_record WHERE vehicle_plate = '$p_v_plate_no' ORDER BY order_time DESC");
                      while($row = mysqli_fetch_assoc($query_rent_earning)){
                    ?>
                    <tr>
                      <td><?php echo $row["order_time"]; ?></td>
                      <td><?php echo $row["rent_duration"]; ?></td>
                      <td><?php echo $vehicle_price; ?></td>
                      <td><?php echo $row["rent_earning"]; ?></td>
                      <td><?php echo $row["rent_earning_pay"]; ?></td>
                      <td><?php echo $row["status"]; ?></td>
                    </tr>
                    <?php
                      }
                    ?>
                  </table>
                  <table class="table table-bordered" style="min-width:max-content;">
                    <tr>
                      <!-- <td><b>Total Earning (RM) = </b> <?php echo $total_earning; ?> <a href="#" type="button" name="button" class="btn btn-warning" style="margin-left:52%;">Withdraw</a> <button type="button" name="button" class="btn btn-warning" style="margin-left:52%;">Withdraw</button></td> -->
                      <td><b>Total Earning (RM) = </b> <?php echo $total_earning; ?> </td>
                    </tr>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
