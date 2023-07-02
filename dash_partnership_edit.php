<?php
  include("dataconnection.php");
  // session_start();
  $row=null;
  if (isset($_GET['p'])){
    $p_id=$_GET["p"];
    $query=mysqli_query($con,"select * from partnership where p_id='$p_id'");
  	$row=mysqli_fetch_array($query);
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
      <h2>Edit</h2>
      <br>
    	<div class="row">
        <div class="col-lg-12">
          <form action="dash_partnership_update.php?p=<?php echo $p_id; ?>" method="post">
            <input type="hidden" name="p_v_plate_no" value="<?php echo $row["p_v_plate_no"]; ?>">
            <input type="hidden" name="p_email" value="<?php echo $row["p_email"]; ?>">
            <!-- <input type="hidden" name="p_email" value="<?php echo $p_email; ?>"> -->
            <div class="form-group col-lg-12">
              <h5>IC:</h5>
              <input type="text" class="form-control" value="<?php echo $row["p_ic"]; ?>" name="p_ic" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Name:</h5>
              <input type="text" class="form-control" value="<?php echo $row["p_name"]; ?>" name="p_name" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Phone:</h5>
              <input type="text" class="form-control" value="<?php echo $row["p_phone"]; ?>" name="p_phone" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Email:</h5>
              <input type="email" class="form-control" value="<?php echo $row["p_email"]; ?>" name="p_new_email" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Bank:</h5>
              <input type="text" class="form-control" value="<?php echo $row["p_bank"]; ?>" name="p_bank" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Bank Acc:</h5>
              <input type="text" class="form-control" value="<?php echo $row["p_acc"]; ?>" name="p_acc" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Vehicle Plate No:</h5>
              <input type="text" class="form-control" value="<?php echo $row["p_v_plate_no"]; ?>" name="p_v_plate_no_new" required><br>
            </div>
            <div class="form-group col-lg-12" style="text-align:center;">
              <button type="submit" class="block btn btn-success" name="submit">Update</button>
          		<a href="dash_partnership_list.php" class="block btn btn-secondary">Back</a>
            </div>
        	</form>
        </div>
      </div>
    </div>
  </body>
</html>
