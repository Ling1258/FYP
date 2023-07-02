<?php
  include("dataconnection.php");

  if (isset($_GET['rr_ID'])){
    $id=$_GET['rr_ID'];

    $query = "SELECT * FROM rent_record WHERE id = $id";
    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $vehicle_plate = $row["vehicle_plate"];

      $sql1 = "update car set vehicle_available='yes' where vehicle_plate='$vehicle_plate';";
      mysqli_query($con, $sql1);

      $sql2= "update rent_record set status='done' where id='$id';";
      mysqli_query($con, $sql2);
      header("Location: dash_rent_record_list.php");
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
        <a href="dash_rent_record_list.php" class="block btn btn-secondary">Back</a>
      </div>
    </div>
  </body>
</html>
