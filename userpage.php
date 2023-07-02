<?php
include("dataconnection.php");
session_start();
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Car Rental</title>
<!-- bootstrap and owlcarousel css link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
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
<!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
<!-- font -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <style media="screen">
      .dropdown-item:hover{
        background-color: #6E4BE7;
        color: white;
      }
    </style>
  </head>

  <body>
    <section id="top">
      <!-- navbar -->
      <nav class="navbar navbar-expand-lg navbar-dark fixed-top p-md-3">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto" href="userpage.php" style="font-size:40px;font-weight:bold;"><span style="color:#6E4BE7;">Jo</span>Car</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span id="btn-hamburger" class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link" href="#search">Search</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#cars">Cars</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#about">About Us</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#contact">Contact</a>
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
                  <li><a class="dropdown-item" href="rentcar_record.php">Car Rental Record</a></li>
                  <li><a class="dropdown-item" href="ownerpage_user.php">Partnership</a></li>
                  <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!-- title & search bar -->
      <div class="container">
        <div class="row">
          <div class="col-lg-12 BT">
            <h2 class="" style="font-size: 50px;">Welcome to Budget-Friendly <span style="color:#6E4BE7;">Car Rental</span> in Malaysia</h2>
          </div>
          <div class="" id="search">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-12 glass">
                <h4 style="color:white"><span style="color:#6E4BE7;">Jo</span>Car<i> make your journey more enjoyable and economical</i></h4>
                <p style="color:white">Let start your journey with us!!</p>
                <?php
                  // Check if message exists in the URL
                  if(isset($_GET['msg'])){
                    $message = urldecode($_GET['msg']);
                    echo $message;
                  }
                ?>

                <form class="" action="searchpage.php" method="post">
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control" name="state" value="" placeholder="Pick-up State" required>
                    </div>
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control" name="city" value="" placeholder="Pick-up City" required>
                    </div>
                  </div>
                  <div class="row">
                    <div style="margin:1% 0% 1% 0%" class="col-lg-12">

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control" name="pick_up_date" value="" placeholder="Pick-up Date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    </div>
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control" name="pick_up_time" value="" placeholder="Pick-up Time" onfocus="(this.type='time')" onblur="(this.type='text')" required>
                    </div>
                  </div>
                  <div class="row">
                    <div style="margin:1% 0% 1% 0%" class="col-lg-12">

                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control" name="drop_off_date" value="" placeholder="Drop-off Date" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                    </div>
                    <div class="form-group col-lg-6">
                      <input type="text" class="form-control" name="drop_off_time" value="" placeholder="Drop-off Time" onfocus="(this.type='time')" onblur="(this.type='text')" required>
                    </div>
                  </div>
                  <div class="row">
                    <div style="margin:1% 0% 1% 0%" class="col-lg-12">

                    </div>
                  </div>
                  <div class="row">
                    <div class="btn col-lg-12">
                      <br>
                      <button type="submit" class="btn btn-outline-light btn-lg" name="submit">Search Car</button>
                      <!-- <a href="searchpage.php" class="btn btn-outline-dark btn-lg">Search Car</a> -->
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- car section -->
    <section id="cars">
      <br>
      <br>
      <div class="container">
        <div class="tt-center">
          <h1>Choose Your <span style="color:#6E4BE7;">Ideal</span> Car</h1>
          <p>
            At our car rental company, JoCar offer a wide range of vehicles to choose from, giving you the freedom to rent the perfect car for your needs and preferences，to suit every taste and budget. We are providing our customers with high-quality vehicles that are reliable, safe, and well-maintained. So whether you're renting a car for business or pleasure, you can trust us to provide you with a car that meets your needs and exceeds your expectations.
            <br><br>The following are the car brands we will provide to choose from:
          </p>
        </div>
        <div class="row">
          <div class="col-lg-12 center">
            <div class="owl-carousel owl-theme">
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand1.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>BMW</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand2.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Honda</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand3.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Toyota</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand4.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Audi</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand5.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Hyundai</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand6.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Mazda</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand7.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Mercedes</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand8.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Perdua</h4>
                        </div>
                    </div>
                </div>
              </div>
              <div class="item">
                <div class="card border shadow">
                    <img src="carbrand\carbrand9.jpg" alt="" class="card-img-top">
                    <div class="card-body">
                        <div class="card-title text-center">
                            <h4>Proton</h4>
                        </div>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about us section-->
    <section id="about">
      <br>
      <br>
      <div class="container">
        <div class="tt-center">
          <h1>What <span style="color:#6E4BE7;">Jo</span>Car Do?</h1>
          <ol style="text-align:justify;">
            <li>
              At our car rental company, the goal of JoCar is to provide customers with the peace journey and to allow customers to rent the ideal car with the lowest possible consumption to complete the customer's car rental trip.
            </li>
            <li>
              At our car rental company, JoCar are not just a middleman, but rather the bridge that connects car rental partners with customers, facilitating commercial transactions of car rental with efficiency and expertise.
            </li>
          </ol>
          <div class="row">
            <div class="col-lg-6 p-space">
              <img class="picsize" src="carduser.jpg" alt="">
            </div>
            <div class="col-lg-6 t-space">
              <h2>Car Rental <span style="color:#6E4BE7;">Customer</span></h2>
              <p>As a car rental customer, you can enjoy the journey with peace.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 e-space">
              <h4>Customer Guarantee</h4>
              <p>As a car rental company, JoCar understand that our customers want peace of mind when renting a car. That's why we offer a car rental guarantee to all of our customers. Our car rental guarantee provides additional coverage beyond the security deposit, which means that our customers can rent a car with confidence, knowing that they are fully protected against unexpected costs or damages. <br><br>

              We offer different types of guarantees, including collision damage waiver (CDW), personal accident insurance (PAI), and personal effects coverage (PEC), to ensure that our customers have the coverage they need. Our CDW covers damages to the rental car, while our PAI covers medical expenses in the event of an accident. Our PEC covers any loss or damage to personal items that are stolen from the rental car. However, it is important to note that car rental guarantees do not cover reckless driving or intentional damage to the rental car. <br><br>

              At our car rental company, JoCar believe in transparency and honesty. That's why we encourage our customers to read the terms and conditions of our car rental guarantee before signing up for it. This way, our customers can fully understand what is covered and what is not, and can make an informed decision about whether or not they want to purchase the guarantee. Overall, our car rental guarantee is designed to provide our customers with peace of mind and protection while they are renting a car from us. We take pride in offering exceptional customer service and want to ensure that our customers are fully satisfied with their rental experience.

              </p>
            </div>
            <div class="col-lg-12 btn-space">
              <a href="#search" class="btn btn-outline-dark btn-lg">Rent Now!</a>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6 p-space">
              <img class="picsize" src="cardowner.jpg" alt="">
            </div>
            <div class="col-lg-6 t-space">
              <h2>Car Rental <span style="color:#6E4BE7;">Patner</span></h2>
              <p>As a car rental patner, you can earn extra money with peace of mind.</p>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12 e-space">
              <h4>Patnership Program</h4>
              <p>As a car rental company, JoCar are excited to announce our new partnership program!! Our partnership program allows customers to rent their personal vehicles to us, and we will take care of renting the vehicle out to other customers on their behalf.
              This partnership program is a great opportunity for customers who want to earn extra income by renting out their personal vehicles. We will take care of all the logistics involved in renting out the vehicle, including marketing, customer service, and maintenance.
              <br><br>Our partnership program offers several benefits to our customers, including:
              <ol>
                <li>
                  Additional income: Customers can earn extra income by renting out their personal vehicles when they are not using them.
                </li>
                <li>
                  Hassle-free rental process: We take care of all the logistics involved in renting out the vehicle, including marketing, customer service, and maintenance.
                </li>
                <li>
                  Flexible rental options: Customers can choose the rental period that works best for them, whether it's a few days, a week, or a month.
                </li>
                <li>
                  Peace of mind: Our partnership program includes insurance coverage for the rental period, so customers can rent out their vehicles with peace of mind.
                </li>
              </ol><br>At our car rental company, we take pride in providing exceptional customer service and creating innovative solutions that meet our customers' needs. What are you waiting for? Come join our partner program now! Interested customers are welcome to contact us for details.

              </p>
            </div>
            <div class="col-lg-12 btn-space">
              <a href="ownerpage_user_in.php" class="btn btn-outline-dark btn-lg">Contact Us Now!</a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- contact section-->
    <section id="bottom">
      <div class="container">
        <div class="row b1-center">
          <div class="col-lg-12">
            <h4><span style="color:#6E4BE7;">Jo</span>Car always welcomes you to contact us at any time</h4>
          </div>
        </div>
        <div class="row b2-center">
          <div class="col-lg-12" id="contact">
            <a href="https://wa.link/2btoja" class="btn btn-outline-dark">WhatsApp <i class="fa-brands fa-whatsapp"></i></a>
            <a href="https://ig.me/m/gareung_1258" class="btn btn-outline-dark">Instagram <i class="fa-brands fa-instagram"></i></a>
          </div>
        </div>
        <div class="row b2-center">
          <div class="col-lg-12">
            <p>© Copyright 2023 JoCar.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- bootstrap and owlcarousel js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>

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

      // responsive owl carousel
      $('.owl-carousel').owlCarousel({
          loop: true,
          margin: 15,
          nav: true,
          responsive: {
              0: {
                  items: 1
              },
              600: {
                  items: 2
              },
              1000: {
                  items: 4
              }
          }
      })
    </script>
  </body>
</html>
