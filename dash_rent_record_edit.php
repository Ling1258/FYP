<?php
  include("dataconnection.php");
  // session_start();
  $row=null;
  if (isset($_GET['rr_ID'])){
    $id=$_GET["rr_ID"];
    $query=mysqli_query($con,"select * from rent_record where id='$id'");
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
      <h2>Edit</h2>
      <br>
    	<div class="row">
        <div class="table-y-scrollbar">
          <div class="col-lg-12">
            <form action="dash_rent_record_update.php?rr_ID=<?php echo $id; ?>" method="post">
              <input type="hidden" name="driver_email" value="<?php echo $row["driver_email"]; ?>">
              <div class="form-group col-lg-12">
                <h5>Pick-up-State:</h5>
                <input type="text" class="form-control" value="<?php echo $row["pick_up_state"]; ?>" name="pick_up_state" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Pick-up-City:</h5>
                <input type="text" class="form-control" value="<?php echo $row["pick_up_city"]; ?>" name="pick_up_city" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Pick-up-Time:</h5>
                <input type="time" class="form-control" value="<?php echo $row["pick_up_time"]; ?>" name="pick_up_time" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Drop-off-Time:</h5>
                <input type="time" class="form-control" value="<?php echo $row["drop_off_time"]; ?>" name="drop_off_time" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Pick-up-Date:</h5>
                <input type="date" class="form-control" value="<?php echo $row["pick_up_date"]; ?>" name="pick_up_date" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Drop-off-Date:</h5>
                <input type="date" class="form-control" value="<?php echo $row["drop_off_date"]; ?>" name="drop_off_date" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Driver Name:</h5>
                <input type="text" class="form-control" value="<?php echo $row["driver_name"]; ?>" name="driver_name" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Driver Email:</h5>
                <input type="email" class="form-control" value="<?php echo $row["driver_email"]; ?>" name="driver_new_email" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Driver Phone:</h5>
                <input type="text" class="form-control" value="<?php echo $row["driver_phone"]; ?>" name="driver_phone" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Cardholder Name:</h5>
                <input type="text" class="form-control" value="<?php echo $row["cardholder_name"]; ?>" name="cardholder_name" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Card Number:</h5>
                <input type="text" class="form-control" value="<?php echo $row["card_number"]; ?>" name="card_number" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Expiration Date:</h5>
                <input type="text" class="form-control" value="<?php echo $row["expiration_date"]; ?>" name="expiration_date" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>CVC:</h5>
                <input type="text" class="form-control" value="<?php echo $row["cvc"]; ?>" name="cvc" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Status:</h5>
                <input type="text" class="form-control" value="<?php echo $row["status"]; ?>" name="status" required><br>
              </div>
              <div class="form-group col-lg-12">
                <h5>Total Price:</h5>
                <input type="text" class="form-control" value="<?php echo $row["total_cost"]; ?>" name="total_cost" required><br>
              </div>
              <div class="form-group col-lg-12" style="text-align:center;">
                <button type="submit" class="block btn btn-success" name="submit">Update</button>
            		<a href="dash_rent_record_list.php" class="block btn btn-secondary">Back</a>
              </div>
          	</form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
