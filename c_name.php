<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])) {
    $email = $_SESSION['store'];
    if (isset($_POST['submit'])) {
        $new_name = $_POST['new_name'];

        $query = mysqli_query($con, "UPDATE register SET name='$new_name' WHERE email='$email'");

        if ($query) {
            $msg = "<div class='alert alert-success'>Update name successfully.</div>";
        }else {
           $msg = "<div class='alert alert-danger'>Update name unsuccess.</div>";
        }

      }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js" integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js" integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ" crossorigin="anonymous"></script>

    <style media="screen">
      h1{
        margin-bottom: 5%;
      }
    </style>

  </head>
  <body>
    <div class="container">
      <h1>Update New Name</h1>
      <?php echo $msg; ?>
      <form class="" action="c_name.php" method="post">
        <div class="form-group col-lg-12">
          <input type="text" class="form-control" name="new_name" value="" placeholder="Enter Your New Name" required><br>
        </div>
        <div class="btn col-lg-12">
          <button type="submit" class="btn btn-outline-dark" name="submit">Change</button>
        </div>
      </form>
    </div>
  </body>
</html>
