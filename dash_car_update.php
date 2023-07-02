<?php
	include("dataconnection.php");

	if (isset($_GET['c'])) {
		$id = $_GET['c'];

		$vehicle_state = $_POST['vehicle_state'];
		$vehicle_city = $_POST['vehicle_city'];
		$vehicle_brand_model = $_POST['vehicle_brand_model'];
		$vehicle_plate_new = $_POST['vehicle_plate_new'];
		$vehicle_seats = $_POST['vehicle_seats'];
		$vehicle_transmission = $_POST['vehicle_transmission'];
		$vehicle_rent_price = $_POST['vehicle_rent_price'];
		$vehicle_price = $_POST['vehicle_price'];
		$vehicle_pic = $_POST['vehicle_pic'];
		$vehicle_ppk = $_POST['vehicle_ppk'];
		$vehicle_vi = $_POST['vehicle_vi'];
		$vehicle_available = $_POST['vehicle_available'];
		$vehicle_plate = $_POST['vehicle_plate'];

		// Check if the vehicle plate already exists for other partnerships
		$check_query = "SELECT * FROM car WHERE vehicle_plate='$vehicle_plate' AND id!='$id'";
		$check_result = mysqli_query($con, $check_query);

		if (mysqli_num_rows($check_result) > 0) {
			$msg = "<div class='alert alert-danger'>$vehicle_plate - This vehicle plate already exists.</div>";
		} else {
			// Update car table
			mysqli_query($con, "UPDATE car SET vehicle_state='$vehicle_state', vehicle_city='$vehicle_city', vehicle_brand_model='$vehicle_brand_model', vehicle_plate='$vehicle_plate_new', vehicle_seats='$vehicle_seats', vehicle_transmission='$vehicle_transmission', vehicle_rent_price='$vehicle_rent_price', vehicle_price='$vehicle_price', vehicle_pic='$vehicle_pic', vehicle_ppk='$vehicle_ppk', vehicle_vi='$vehicle_vi', vehicle_available='$vehicle_available' WHERE id='$id'");

			// Update partnership table
			mysqli_query($con, "UPDATE partnership SET p_v_plate_no='$vehicle_plate_new' WHERE p_v_plate_no='$vehicle_plate'");

			// Update rent_record table
			mysqli_query($con, "UPDATE rent_record SET vehicle_plate='$vehicle_plate_new' WHERE vehicle_plate='$vehicle_plate'");

			header("Location: dash_car_list.php");
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
        <a href="dash_register_list.php" class="block btn btn-secondary">Back</a>
      </div>
    </div>
  </body>
</html>
