<?php
  include("dataconnection.php");
  // session_start();
  $row=null;
  if (isset($_GET['ID'])){
    $id=$_GET["ID"];
    $query=mysqli_query($con,"select * from register where id='$id'");
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
          <form action="dash_staff_update.php?ID=<?php echo $id; ?>" method="post">
            <div class="form-group col-lg-12">
              <h5>IC:</h5>
              <input type="text" class="form-control" value="<?php echo $row["ic"]; ?>" name="ic" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Name:</h5>
              <input type="text" class="form-control" value="<?php echo $row["name"]; ?>" name="name" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Email:</h5>
              <input type="email" class="form-control" value="<?php echo $row["email"]; ?>" name="email" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Password:</h5>
              <input type="password" class="form-control" value="<?php echo $row["password"]; ?>" name="password" pattern="[A-Za-z0-9]{8}" onclick="pass_attention()" required><br>
            </div>
            <div class="form-group col-lg-12">
              <h5>Confirm Password:</h5>
              <input type="password" class="form-control" value="<?php echo $row["confirm_pass"]; ?>" name="confirm_pass" pattern="[A-Za-z0-9]{8}" required><br>
            </div>
            <div class="form-group col-lg-12" style="text-align:center;">
              <button type="submit" class="block btn btn-success" name="submit">Update</button>
          		<a href="dash_staff_list.php" class="block btn btn-secondary">Back</a>
            </div>
        	</form>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      function pass_attention(){
        window.alert('Your password must be at least 8 characters long and contain only letters and numbers');
      }
    </script>
  </body>
</html>
