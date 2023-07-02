<?php
include("dataconnection.php");
session_start();
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
      background-image: url(part.jpeg);
      background-color: #fff;
      background-position: center;
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
      background: rgba(0, 0, 128, 0.2);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(6.2px);
      -webkit-backdrop-filter: blur(6.2px);
      padding: 5%;
      margin: 10% 0% 5% 0%;
    }
    .title{
      margin: 5% 0 0 0;
    }
    .r-space{
      margin: 5% 0 5% 0;
    }
    .c-space{
      padding: 2%;
    }
    .profile_link{
      margin-right: 10%;
    }
    .profile_link li a{
      text-decoration: none;
      color: black;
    }
    .profile_link li a h5{
      font-size: 18px;
    }
    @media screen and (max-width: 767px) {
      .profile_link.vl {
        border-style: none;
      }
      .profile_link.hr{
        border-bottom: 3px solid grey;
        width: 300px;
      }
    }
    .vl{
      border-right: 3px solid grey;
      height: 150px;
    }
    .p{
      display: block;
      margin-bottom: 2%;
    }
    .p_link:hover{
      color: #6E4BE7;
      text-decoration: none;
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
          <a class="navbar-brand mx-auto" href="userpage.php" style="font-size:40px;font-weight:bold;"><span style="color:#6E4BE7;">Jo</span>Car</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span id="btn-hamburger" class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
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
      <div class="container">
        <div class="row">
          <div class="col-lg-12 glass">
            <div class="BT">
              <h2><span style="color:#6E4BE7;">Partner</span>ship</h2>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section id="setting">
      <div class="container">
        <div class="row r-space">
          <div class="col c-space">
            <h3>You have not become our partner yet. <br>For more details, please click the link below.</h3>
            <a href="ownerpage_user_in.php" class="btn btn-success" style="text-align: center;">Partnership Program</a>
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
