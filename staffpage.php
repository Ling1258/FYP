<?php
include("dataconnection.php");
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
            crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- jquery link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- css file -->
        <!-- <link rel="stylesheet" href="ownerpage.css"> -->
    <!-- icon -->
        <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
    <!-- font -->
    <!-- css -->
    <style media="screen">
      .ce-space{
        position: relative;
        overflow: hidden;
        padding-top: 56.25%;
        height: auto;
      }
      .ce-space iframe{
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
      }
    </style>
  </head>
  <body>
    <section>
      <div class="container-fluid">
        <div class="row space flex-nowrap">
          <div class="bg-dark col-auto col-md-4 col-lg-3 min-vh-100">
            <div class="bg-dark p2">
              <a class="d-flex text-decoration-none mt-1 text-align-center text-while">
                <span class="fs-4 d-none d-sm-inline" style="color:white;padding:0% 5%;padding-top:10%;">
                  <?php
                  if (isset($_SESSION['store'])) {
                      $email = $_SESSION['store'];
                      $sql = "SELECT name FROM register WHERE email = '$email'";
                      $result = mysqli_query($con, $sql);

                      if (mysqli_num_rows($result) > 0) {
                          while ($row = mysqli_fetch_assoc($result)) {
                            echo '<div class="halo">';
                            echo "<i class='fa-regular fa-user'></i><span> Hello " . $row["name"]. "</span>";
                            echo '</div>';
                          }
                      }
                  }
                  ?>
                </span>
              </a>
              <ul class="nav nav-pills flex-column mt-4">
                <li class="nav-item py-2 py-sm-0">
                  <a href="dashboard_s.php" class="nav-link text-white" target="d_frame_link">
                    <i class="fa-solid fa-gauge"></i><span class="fs-4 ms-3 d-none d-sm-inline">Dashboard</span>
                  </a>
                </li>
                <li class="nav-item py-2 py-sm-0">
                  <a href="entry_record.php" class="nav-link text-white" target="d_frame_link">
                    <i class="fa-solid fa-road-barrier"></i><span class="fs-4 ms-3 d-none d-sm-inline">Entry Record</span>
                  </a>
                </li>
                <li class="nav-item py-2 py-sm-0">
                  <a href="logout.php" class="nav-link text-white">
                    <i class="fa-solid fa-right-from-bracket"></i><span class="fs-4 ms-3 d-none d-sm-inline">Logout</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <div class="col-lg-9 col-md-8 col-10 ce-space">
            <iframe src="c_blank.html" name="d_frame_link" scrolling="no" frameborder="0"></iframe>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
