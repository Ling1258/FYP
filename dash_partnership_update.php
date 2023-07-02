<?php
	include("dataconnection.php");
	// $row=null;
	if (isset($_GET['p'])){
		$p_id=$_GET['p'];

		$p_ic=$_POST['p_ic'];
		$p_name=$_POST['p_name'];
		$p_phone=$_POST['p_phone'];
		$p_email=$_POST['p_email'];
		$p_bank=$_POST['p_bank'];
		$p_acc=$_POST['p_acc'];
		$p_new_email=$_POST['p_new_email'];
		$p_v_plate_no_new=$_POST['p_v_plate_no_new'];
		$p_v_plate_no=$_POST['p_v_plate_no'];

		// Check if the ic already exists for other partnerships
		$ic_check_query = "SELECT * FROM partnership WHERE p_ic='$p_ic' AND p_id!='$p_id'";
		$ic_check_result = mysqli_query($con, $ic_check_query);

		if (mysqli_num_rows($ic_check_result) > 0) {
			$msg = "<div class='alert alert-danger'>$p_ic - This IC already exists.</div>";
		} else {
			// Check if the email address already exists for other partnerships
			$email_check_query = "SELECT * FROM partnership WHERE p_email='$p_email' AND p_id!='$p_id'";
			$email_check_result = mysqli_query($con, $email_check_query);

			if (mysqli_num_rows($email_check_result) > 0) {
				$msg = "<div class='alert alert-danger'>$p_email - This email address already exists.</div>";
			} else {
				mysqli_query($con, "UPDATE partnership SET p_ic='$p_ic', p_name='$p_name', p_phone='$p_phone', p_email='$p_new_email', p_v_plate_no='$p_v_plate_no_new', p_acc='$p_acc', p_bank='$p_bank' WHERE p_id='$p_id'");
				mysqli_query($con, "UPDATE register SET email='$p_new_email' WHERE email='$p_email'");
				mysqli_query($con, "UPDATE rent_record SET driver_email='$p_new_email' WHERE driver_email='$p_email'");

				header("Location: dash_partnership_list.php");
			}
		}

		$check_query = "SELECT * FROM partnership WHERE p_v_plate_no='$p_v_plate_no' AND p_id!='$p_id'";
		$check_result = mysqli_query($con, $check_query);

		if (mysqli_num_rows($check_result) > 0) {
			$msg = "<div class='alert alert-danger'>$vehicle_plate - This vehicle plate already exists.</div>";
		} else {
			mysqli_query($con, "UPDATE partnership SET p_ic='$p_ic', p_name='$p_name', p_phone='$p_phone', p_email='$p_new_email', p_v_plate_no='$p_v_plate_no_new', p_acc='$p_acc', p_bank='$p_bank' WHERE p_id='$p_id'");
			mysqli_query($con, "UPDATE car SET vehicle_plate='$p_v_plate_no_new' WHERE vehicle_plate='$p_v_plate_no'");
			mysqli_query($con, "UPDATE rent_record SET vehicle_plate='$p_v_plate_no_new' WHERE vehicle_plate='$p_v_plate_no'");
			header("Location: dash_partnership_list.php");
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
        <a href="dash_partnership_list.php" class="block btn btn-secondary">Back</a>
      </div>
    </div>
  </body>
</html>
