<?php
	include("dataconnection.php");
  // $row=null;
  if (isset($_GET['rr_ID'])){
    $id=$_GET['rr_ID'];

    $pick_up_state=$_POST['pick_up_state'];
    $pick_up_city=$_POST['pick_up_city'];
    $pick_up_time=$_POST['pick_up_time'];
    $drop_off_time=$_POST['drop_off_time'];
    $pick_up_date=$_POST['pick_up_date'];
    $drop_off_date=$_POST['drop_off_date'];
    // $vehicle_plate=$_POST['vehicle_plate']; vehicle_plate='$vehicle_plate',
    $driver_name=$_POST['driver_name'];
    $driver_email=$_POST['driver_email'];
		$driver_new_email=$_POST['driver_new_email'];
    $driver_phone=$_POST['driver_phone'];
    $cardholder_name=$_POST['cardholder_name'];
    $card_number=$_POST['card_number'];
    $expiration_date=$_POST['expiration_date'];
    $cvc=$_POST['cvc'];
    $status=$_POST['status'];
    $total_cost=$_POST['total_cost'];

		// Check if the ic already exists for other partnerships
    // $check_query = "SELECT * FROM car WHERE vehicle_available='no' AND vehicle_plate!='$vehicle_plate'";
		// $check_result = mysqli_query($con, $check_query);
    //
		// if (mysqli_num_rows($check_result) > 0) {
		// 	$msg = "<div class='alert alert-danger'>$vehicle_plate - This vehicle already rented.</div>";
		// } else {
				mysqli_query($con, "update rent_record set pick_up_state='$pick_up_state',pick_up_city='$pick_up_city',pick_up_time='$pick_up_time', drop_off_time='$drop_off_time', pick_up_date='$pick_up_date', drop_off_date='$drop_off_date', driver_name='$driver_name', driver_email='$driver_new_email',driver_phone='$driver_phone',cardholder_name='$cardholder_name',card_number='$card_number',expiration_date='$expiration_date',cvc='$cvc',status='$status',total_cost='$total_cost' where id='$id'");
				mysqli_query($con, "UPDATE rent_record SET driver_email='$driver_new_email' WHERE driver_email='$driver_email'");
				mysqli_query($con, "UPDATE partnership SET p_email='$driver_new_email' WHERE p_email='$driver_email'");
				mysqli_query($con, "UPDATE register SET email='$driver_new_email' WHERE email='$driver_email'");
				header("Location: dash_rent_record_list.php");
		// }
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
        <a href="dash_rent_record_list.php" class="block btn btn-secondary">Back</a>
      </div>
    </div>
  </body>
</html>
