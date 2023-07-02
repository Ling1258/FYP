<?php
	include("dataconnection.php");
  // $row=null;
  if (isset($_GET['ID'])){
    $id=$_GET['ID'];

  	$ic=$_POST['ic'];
  	$name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm_pass'];

		// if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM register WHERE ic='{$ic}'")) > 0) {
	  //   $msg = "<div class='alert alert-danger'>{$ic} - This ic has been already exists.</div>";
	  // } elseif (mysqli_num_rows(mysqli_query($con, "SELECT * FROM register WHERE email='{$email}'")) > 0) {
	  //   $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
	  // } elseif ($password!=$confirm_pass) {
	  //   $msg = "<div class='alert alert-danger'>Password not match.</div>";
	  // } else {
		// 	mysqli_query($con,"update register set ic='$ic', name='$name', email='$email', password='$password', confirm_pass='$confirm_pass' where id='$id'");
	  // 	header("Location: dash_staff_list.php");
		// }

		// Check if the ic already exists for other partnerships
    $ic_check_query = "SELECT * FROM register WHERE ic='$ic' AND id!='$id'";
		$ic_check_result = mysqli_query($con, $ic_check_query);

		if (mysqli_num_rows($ic_check_result) > 0) {
			$msg = "<div class='alert alert-danger'>$ic - This IC already exists.</div>";
		} else {
			// Check if the email address already exists for other partnerships
			$email_check_query = "SELECT * FROM register WHERE email='$email' AND id!='$id'";
			$email_check_result = mysqli_query($con, $email_check_query);

			if (mysqli_num_rows($email_check_result) > 0) {
				$msg = "<div class='alert alert-danger'>$email - This email address already exists.</div>";
			} elseif ($password!=$confirm_pass){
		    $msg = "<div class='alert alert-danger'>Password not match.</div>";
		  } else {
				mysqli_query($con, "update register set ic='$ic', name='$name', email='$email', password='$password', confirm_pass='$confirm_pass' where id='$id'");
				header("Location: dash_staff_list.php");
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
        <a href="dash_staff_list.php" class="block btn btn-secondary">Back</a>
      </div>
    </div>
  </body>
</html>
