<?php
  include("dataconnection.php");
  session_start();

  $state = $_SESSION['state'];
  $city = $_SESSION['city'];
  $pick_up_date = $_SESSION['pick_up_date'];
  $drop_off_date = $_SESSION['drop_off_date'];
  $pick_up_time = $_SESSION['pick_up_time'];
  $drop_off_time = $_SESSION['drop_off_time'];

  if (isset($_GET['pay'])){
    $id=$_GET['pay'];
    $query=mysqli_query($con,"select * from car where id='$id'");
  	$row=mysqli_fetch_array($query);

    $price = $row['vehicle_rent_price'];
    $duration = calculateDuration($pick_up_date, $drop_off_date);

    // Calculate the total cost based on the duration and price
    $total_cost = $duration * $price;
  }

  function calculateDuration($start_date, $end_date) {
    $start = strtotime($start_date);
    $end = strtotime($end_date);
    $duration = ($end - $start) / (60 * 60 * 24); // Convert to days
    return $duration;
  }

  $_SESSION['total_cost'] = $total_cost;
  $_SESSION['id'] = $id;
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <!-- bootstrap and owlcarousel css link -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
            integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
            crossorigin="anonymous" />
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
            integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw=="
            crossorigin="anonymous" />
    <!-- css file -->
        <link rel="stylesheet" href="style.css">
    <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

    <style media="screen">
      h2{
        padding: 2%;
      }
      body{
        background-color: #F2F2F2;
      }
      i{
        padding-left: 5%;
        padding-bottom: 5%;
      }
      a{
        color:#6E4BE7;
      }
      .card-list2{
      background-color: white;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 255, 0.1) 0 0 0 0, rgba(0, 0, 255, 0.1) 0 0 0 1px;
      padding: 2%;
      margin: 2%;
      height: 95%;
      width: auto;
      padding-top: 13%;
      }
      .card-list{
      background-color: white;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 255, 0.1) 0 0 0 0, rgba(0, 0, 255, 0.1) 0 0 0 1px;
      padding: 2%;
      margin: 2%;
      height: auto;
      width: auto;
      }
      .pay{
        background-color: #F2F2F2;
      }
      .btn{
        text-align: center;
      }
      .table-y-scrollbar{
        overflow-y: scroll;
        max-height: 600px;
      }
      /* .table-x-scrollbar{
        overflow-x: scroll;
      } */
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color:black;">
      <div class="container-fluid">
        <a class="navbar-brand mx-auto" href="userpage.php" style="font-size:40px;"><span style="color:#6E4BE7;">Jo</span>Car</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span id="btn-hamburger" class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
          <!-- <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link">Checkout <span class="sr-only">(current)</span></a>
            </li> -->
          </ul>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">
      <section id="confirm_order">
        <!-- <div class="table-y-scrollbar"> -->
          <!-- <div class="table-x-scrollbar"> -->
            <!-- <div class="row mt-3 mb-2">
              <div class="col-lg-2">
                <a href="index.php" class="block btn btn-secondary">Back</a>
              </div>
            </div> -->
            <div class="row">
              <div class="col-lg-6">
                <br>
                <h1>Checkout</h1>
                <p>Confirmation your order details:</p>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="card-list2">
                  <div class="row">
                    <div class="col-lg-6">
                      <img style="width:200px;height:200px;display: block;margin:auto;" src="<?php echo $row["vehicle_pic"]; ?>">
                    </div>
                    <div class="col-lg-6">
                      <h5 class="pt-2 pb-3"><?php echo $row["vehicle_brand_model"]; ?></h5>
                      <div class="row">
                        <div class="col-lg-12">
                          <p><i class="fa-solid fa-car"></i> <?php echo $row["vehicle_plate"]; ?></p>
                        </div>
                        <div class="col-lg-12">
                          <p><i class="fa-solid fa-user"></i> <?php echo $row["vehicle_seats"]; ?></p>
                        </div>
                        <div class="col-lg-12">
                          <p><i class="fa-solid fa-code-branch"></i> <?php echo $row["vehicle_transmission"]; ?></p>
                        </div>
                        <div class="col-lg-12">
                          <p><i class="fa-solid fa-dollar-sign"></i> <b>MYR <?php echo $row["vehicle_rent_price"]; ?></b></p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card-list p-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <form class="" action="payment_update.php" method="post">
                        <div class="form-group col-lg-12">
                          <h5>Main Driver's Details</h5>
                        </div>
                        <div class="form-group col-lg-12">
                          <br><p>Name:</p>
                          <input type="text" class="form-control" value="" name="driver_name" required><br>
                        </div>
                        <div class="form-group col-lg-12">
                          <p>Email:</p>
                          <input type="email" class="form-control" value="" name="driver_email" required><br>
                        </div>
                        <div class="form-group col-lg-12">
                          <p>Contact Number:</p>
                          <input type="text" class="form-control" value="" name="driver_phone" required><br>
                        </div>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="card-list p-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <h5>Location:</h5>
                    </div>
                    <div class="col-lg-6">
                      State: <br> <?php echo " $state"; ?>
                    </div>
                    <div class="col-lg-6">
                      City: <br> <?php echo " $city"; ?>
                    </div>
                    <div class="col-lg-12">
                     <br>  <h5>Date:</h5>
                    </div>
                    <div class="col-lg-6">
                      Pick-up Date: <br> <?php echo " $pick_up_date"; ?>
                    </div>
                    <div class="col-lg-6">
                      Drop-off Date: <br> <?php echo " $drop_off_date"; ?>
                    </div>
                    <div class="col-lg-12">
                      <br> <h5>Time:</h5>
                    </div>
                    <div class="col-lg-6">
                      Pick-up Time: <br> <?php echo " $pick_up_time"; ?>
                    </div>
                    <div class="col-lg-6">
                      Drop-off Time: <br> <?php echo " $drop_off_time"; ?>
                    </div>
                  </div>
                  <br>
                  <div class="row">
                    <div class="col-lg-12">
                      <div class="pay p-5">
                        <h4>Car price breakdown:</h4><br>
                        <div class="row">
                          <div class="col text-left">
                            <p>Car hire charge: </p>
                          </div>
                          <div class="col text-right">
                            RM <?php echo "$price"; ?>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-left">
                            <p>The duration rented: </p>
                          </div>
                          <div class="col text-right">
                            <?php echo "$duration"; ?> days
                          </div>
                        </div>
                        <div class="row">
                          <div class="col text-left">
                            <h6>Total Price: </h6>
                          </div>
                          <div class="col text-right">
                            <h6>RM <?php echo "$total_cost"; ?></h6>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="card-list p-4">
                  <div class="row">
                    <div class="col-lg-12">
                      <!-- <form class="" action="payment_update.php" method="post"> -->
                        <div class="form-group col-lg-12">
                          <h5>Payment</h5>
                          <p><span style="color:#6E4BE7;">If you want to pay with cash, please click the button below.</span></p>
                        </div>
                        <div class="form-group col-lg-12">
                          <br><p>Cardholder's Name:</p>
                          <input type="text" class="form-control" value="" name="cardholder_name"><br>
                        </div>
                        <div class="form-group col-lg-12">
                          <p>Card Number:</p>
                          <input type="text" class="form-control" value="" name="card_number"><br>
                        </div>
                        <div class="form-group col-lg-12">
                          <p>Expiration Date:</p>
                          <input type="date" class="form-control" value="" name="expiration_date"><br>
                        </div>
                        <div class="form-group col-lg-12">
                          <p>CVC:</p>
                          <input type="text" class="form-control" value="" name="cvc"><br>
                        </div>
                      <!-- </form> -->
                    </div>
                  </div>
                </div>
                <div class="col-lg-12 btn p-3">
                  <!-- <form class="" action="payment_update.php" method="post"> -->
                    <button type="submit" name="submit" style="padding:4% 3%;margin:0 2% 0 0;font-size:15px;" class="btn btn-success btn-lg">Book Now with Cash</button>
                    <button type="submit" name="ssubmit" style="padding:4% 3%;margin:0 0 0 2%;font-size:15px;" class="btn btn-success btn-lg">Book Now with Credit/Debit Pay</button>
                  </form>
                </div>
              </div>
              <!-- </div> -->
              <!-- </div> -->
            </div>
          </div>
        </div>
      </section>
    </div>

    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

  </body>
</html>
