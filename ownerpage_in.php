<?php
  include("dataconnection.php");
  session_start();

  if (isset($_POST['submit'])) {
    $p_ic = $_POST['p_ic'];
    $p_name = $_POST['p_name'];
    $p_phoneno = $_POST['p_phoneno'];
    $p_email = $_POST['p_email'];
    $p_bank = $_POST['p_bank'];
    $p_acc = $_POST['p_acc'];
    $car_state = $_POST['car_state'];
    $car_city = $_POST['car_city'];
    $car_brand_model = $_POST['car_brand_model'];
    $car_plateno = $_POST['car_plateno'];
    $car_seats = $_POST['car_seats'];
    $car_transmission = $_POST['car_transmission'];
    $car_price = $_POST['car_price'];

    if (isset($_FILES['car_pic'])) {
      $car_pic = $_FILES['car_pic']['name'];
      $car_pic_tmp = $_FILES['car_pic']['tmp_name'];
      $car_pic_path = 'uploads/' . $car_pic;
      move_uploaded_file($car_pic_tmp, $car_pic_path);
    }

    if (isset($_FILES['car_ppk'])) {
      $car_ppk = $_FILES['car_ppk']['name'];
      $car_ppk_tmp = $_FILES['car_ppk']['tmp_name'];
      $car_ppk_path = 'uploads/' . $car_ppk;
      move_uploaded_file($car_ppk_tmp, $car_ppk_path);
    }

    if (isset($_FILES['car_vi'])) {
      $car_vi = $_FILES['car_vi']['name'];
      $car_vi_tmp = $_FILES['car_vi']['tmp_name'];
      $car_vi_path = 'uploads/' . $car_vi;
      move_uploaded_file($car_vi_tmp, $car_vi_path);
    }

    $sql = "INSERT INTO request_list (r_ic, r_name, r_phone_no, r_email,r_state,r_city,r_vehicle_brand_model, r_vehicle_plate_no, r_vehicle_seats, r_vehicle_transmission, r_vehicle_price, r_vehicle_pic, r_vehicle_ppk, r_vehicle_vi, r_acc, r_bank) VALUES ('$p_ic', '$p_name', '$p_phoneno', '$p_email', '$car_state','$car_city','$car_brand_model', '$car_plateno', '$car_seats', '$car_transmission', '$car_price', '$car_pic_path', '$car_ppk_path', '$car_vi_path','$p_acc','$p_bank')";
    $result = mysqli_query($con, $sql);
  }
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    <!-- css file -->
        <!-- <link rel="stylesheet" href="ownerpage.css"> -->
    <!-- icon -->
        <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
    <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- css -->
    <style media="screen">
    #top{
      background-image: url(opage.jpg);
      background-color: #fff;
      background-position: bottom;
      background-repeat: no-repeat;
      background-size: cover;
      color: #fff;
      overflow:hidden;
    }
    .BT{
      text-align: center;
      color: white;
      font-family: 'Bree Serif', serif;
      font-size: 100px;
      padding-top: 20%;
      padding-bottom: 8%;
    }
    .nav-link{
      color: #fff;
      font-size: 20px;
      margin-left: 20px;
    }
    .dropdown-item:hover{
      background-color: #6E4BE7;
      color: white;
    }
    .glass{
      text-align: justify;
      background: rgba(0, 0, 128, 0.2);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(6.2px);
      -webkit-backdrop-filter: blur(6.2px);
      padding: 5%;
      margin: 0% 0% 10% 0%;
    }
    .Cart{
      background-color: white;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 255, 0.16) 0 10px 36px 0, rgba(0, 0, 255, 0.16) 0 0 0 1px;
      padding: 3% 3%;
      margin: 3% 10% 10% 10%;
    }
    .form-title{
      text-align: center;
      padding-top: 5%;
      padding-bottom: 2%;
    }
    .r-space{
      margin: 5% 0 5% 0;
    }
    .c-space{
      padding: 2%;
    }
    .ce-space{
      position: relative;
      overflow: hidden;
      padding-top: 56.25%;
      height: 300px;
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
    <section id="top">
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-md-3">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto" href="index.php" style="font-size:40px;font-weight:bold;"><span style="color:#6E4BE7;">Jo</span>Car</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span id="btn-hamburger" class="navbar-toggler-icon"></span>
          </button>
          <!-- <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="MyCarMap.php">MyCarMap</a>
              </li>
            </ul>
            <ul class="navbar-nav ms-auto">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="fa-regular fa-user"></i>
                  User
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                  <li><a class="dropdown-item" href="rent_car.php">Rent Car</a></li>
                  <a class="dropdown-item" href="ownerpage.php">Partnership</a>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div> -->
        </div>
      </nav>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 BT">
            <h2 class="" style="font-size: 50px;">We can create <span style="color:#6E4BE7;">Double</span> Wins</h2>
          </div>
          <div class="col-lg-12 glass">
            <p>
              At our car rental company, JoCar don't just act as a middleman between car rental partners and customers. We are the bridge that connects car rental partners with customers, facilitating commercial transactions of car rental with efficiency and expertise.

              <br><br>Our mission is to provide seamless and hassle-free car rental services, making the process of renting a car easy and convenient for both our partners and customers. We take pride in our ability to bring value to both parties, ensuring that our partners receive a fair return on their investment while our customers get the best possible rental experience. As experts in the car rental industry, we leverage our knowledge and experience to provide exceptional service and solutions that meet the unique needs of our partners and customers. Whether it's finding the right vehicle for a specific rental period or handling the logistics of the rental process, we are committed to delivering results that exceed expectations.

              <br><br>So if you're looking for a car rental company that can provide you with the expertise and support you need to succeed in the car rental industry, look no further. We are here to help you every step of the way, from finding the right car to connecting you with the right customers.

            </p>
            <!-- <a href="carregister.php" class="btn btn-outline-light">Register Now <i class="fa-solid fa-arrow-right icon"></i></a> -->
          </div>
        </div>
      </div>
    </section>
    <section id="setting">
      <div class="container">
        <div class="row r-space">
          <div class="col-lg-12 c-space">
            <h2><span style="color:#6E4BE7;">Interested in learning more?</span></h2>
            <p>Come by our JoCar in Kuala Lumpur to learn more.</p>
          </div>
          <div class="col-lg-6 c-space">
            <div class="contact_detail">
              <h4>You can locate us at:</h4>
              <p>Address:Lot 92, Jalan Putra, Chow Kit, 50350 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</p>
              <h4>For Inquiries:</h4>
              <p>018-7672429 (Ms Beh)</p>
              <h4>Open Hours:</h4>
              <p>Mondays to Saturdays: 10am-5pm</p>
            </div>
          </div>
          <div class="col-lg-6 c-space">
            <div class="contact_map ce-space">
              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3983.725411898217!2d101.68995767381335!3d3.1668586530459364!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc483c62d31b6d%3A0x9b1487740c73fb08!2s92%2C%20Jalan%20Putra%2C%20Chow%20Kit%2C%2050350%20Kuala%20Lumpur%2C%20Wilayah%20Persekutuan%20Kuala%20Lumpur!5e0!3m2!1szh-CN!2smy!4v1681704196980!5m2!1szh-CN!2smy" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
          </div>
        </div>
        <div class="row r-space">
          <div class="col-lg-12 c-space">
            <h4>Drop your details</h4>
            <p>Fill in your personal details and information about the car you would like to get partnership with us.</p>
            <?php echo $msg; ?>
            <form class="" action="ownerpage_in.php" method="post" enctype="multipart/form-data">
              <div class="form-group col-lg-12">
                Enter Your IC: <input type="text" class="form-control" name="p_ic" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter Your Name: <input type="text" class="form-control" name="p_name" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter Your Phone No: <input type="text" class="form-control" name="p_phoneno" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter Your Email: <input type="email" class="form-control" name="p_email" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter Your Bank:
                <select name="p_bank" class="form-control">
                  <option value="Maybank2u">Maybank2u</option>
                  <option value="CIMB Clicks">CIMB Clicks</option>
                  <option value="Public Bank">Public Bank</option>
                  <option value="RHB Now">RHB Now</option>
                  <option value="Heong Leong Connect">Heong Leong Connect</option>
                  <option value="Bank Islam">Bank Islam</option>
                  <option value="OCBC Online">OCBC Online</option>
                </select><br>
              </div>
              <div class="form-group col-lg-12">
                Enter Your Bank Transfer Account No: <input type="text" class="form-control" name="p_acc" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the State: <input type="text" class="form-control" name="car_state" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the City: <input type="text" class="form-control" name="car_city" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Brand Model: <input type="text" class="form-control" name="car_brand_model" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Plate No: <input type="text" class="form-control" name="car_plateno" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Seats: <input type="text" class="form-control" name="car_seats" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Transmission: <input type="text" class="form-control" name="car_transmission" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Rental Price: <input type="text" class="form-control" name="car_price" value="" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Picture: <input type="file" class="form-control" name="car_pic" id="car_pic" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Perakuan Pendaftaran Kenderaan: <input type="file" class="form-control" name="car_ppk" id="car_ppk" required><br>
              </div>
              <div class="form-group col-lg-12">
                Enter the Vehicle Insurance: <input type="file" class="form-control" name="car_vi" id="car_vi" required><br>
              </div>
              <div class="btn col-lg-12">
                <br>
                <button type="submit" class="block btn btn-outline-dark" name="submit" value="upload">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>


    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script type="text/javascript">
      // navbar fixed-top and change color
      var nav = document.querySelector('nav');
      window.addEventListener('scroll', function () {
        if (window.pageYOffset > 100) {
          nav.classList.add('bg-dark', 'shadow');
        } else {
          nav.classList.remove('bg-dark', 'shadow');
        }
      });

      // when navbarNavDropdown(button) shown, bg change muted to dark when navbar bg is muted
      $('#navbarNavDropdown').on('show.bs.collapse hide.bs.collapse', function (e) {
        if (e.type == 'show') {
          $('.navbar').addClass('bg-dark', 'shadow');
        } else {
          if (window.pageYOffset < 100) {
            $('.navbar').removeClass('bg-dark', 'shadow');
          }
        }
      })
    </script>
  </body>
</html>
