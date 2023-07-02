<?php
  include("dataconnection.php");

  if (isset($_GET['r'])){
    $r_id=$_GET['r'];

    $query = "SELECT * FROM request_list WHERE r_id = $r_id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $r_ic = $row["r_ic"];
      $r_name = $row["r_name"];
      $r_phone_no = $row["r_phone_no"];
      $r_email = $row["r_email"];
      $r_bank = $row["r_bank"];
      $r_acc = $row["r_acc"];
      $r_state = $row["r_state"];
      $r_city = $row["r_city"];
      $r_vehicle_brand_model = $row["r_vehicle_brand_model"];
      $r_vehicle_plate_no = $row["r_vehicle_plate_no"];
      $r_vehicle_seats = $row["r_vehicle_seats"];
      $r_vehicle_transmission = $row["r_vehicle_transmission"];
      $r_vehicle_price = $row["r_vehicle_price"];
      $r_vehicle_pic = $row["r_vehicle_pic"];
      $r_vehicle_ppk = $row["r_vehicle_ppk"];
      $r_vehicle_vi = $row["r_vehicle_vi"];

      // Calculate 50% of the vehicle price
      $percentage = 50;
      $additional_amount = ($percentage / 100) * $r_vehicle_price;

      // Calculate the total price
      $r_vehicle_rent_price = $r_vehicle_price + $additional_amount;

      if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM partnership WHERE p_email='{$r_email}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$r_email} - This partnership has been already exists.</div>";
      } elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM car WHERE vehicle_plate='{$r_vehicle_plate_no}'")) > 0) {
        $msg = "<div class='alert alert-danger'>{$r_vehicle_plate_no} - This car has been already exists.</div>";
      }
      else {
        // $con2 = mysqli_connect("192.168.43.141", "leo", "mei@pi00069","car_rental");
        $con2 = mysqli_connect("localhost", "root", "","car_rental");

        $sql1 = "INSERT INTO partnership (p_ic,p_name,p_phone,p_email,p_v_plate_no,p_acc,p_bank)VALUES ('$r_ic','$r_name','$r_phone_no','$r_email','$r_vehicle_plate_no','$r_acc','$r_bank');";
        mysqli_query($con2, $sql1);

        $sql2= "INSERT INTO car (vehicle_state,vehicle_city,vehicle_brand_model,vehicle_plate,vehicle_seats,vehicle_transmission,vehicle_rent_price,vehicle_price,vehicle_pic,vehicle_ppk,vehicle_vi,vehicle_available)VALUES ('$r_state','$r_city','$r_vehicle_brand_model','$r_vehicle_plate_no','$r_vehicle_seats','$r_vehicle_transmission','$r_vehicle_rent_price','$r_vehicle_price','$r_vehicle_pic','$r_vehicle_ppk','$r_vehicle_vi','yes');";
        mysqli_query($con2, $sql2);

        mysqli_close($con2);

        $deleteQuery = "DELETE FROM request_list WHERE r_id = $r_id";
        $result = mysqli_query($con, $deleteQuery);
        header("Location: dash_request_list.php");
      }
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
  </head>
  <body>
    <div class="container">
      <div class="mt-5">
        <?php echo $msg; ?>
      </div>
      <div class="">
        <a href="dash_request_list.php" class="block btn btn-secondary">Back</a>
      </div>
    </div>
  </body>
</html>
