<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])) {
  $email = $_SESSION['store'];
  $query = mysqli_query($con, "SELECT p_v_plate_no FROM partnership WHERE p_email = '$email'");
  if (mysqli_num_rows($query) > 0) {
    $row = mysqli_fetch_array($query);
    $p_v_plate_no = $row["p_v_plate_no"];
  }
}

$rentQuery = mysqli_query($con, "SELECT * FROM rent_record WHERE vehicle_plate = '$p_v_plate_no' AND vehicle_feedback != '' ORDER BY id DESC");


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
    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style media="screen">
      h2{
        padding: 2%;
      }
      i{
        padding-left: 5%;
        padding-bottom: 5%;
      }
      a{
        color:#6E4BE7;
      }
      .card-list{
      background-color: white;
      border-radius: 10px;
      box-shadow: rgba(0, 0, 255, 0.16) 0 10px 36px 0, rgba(0, 0, 255, 0.16) 0 0 0 1px;
      padding: 2%;
      margin: 2%;
      height: auto;
      width: auto;
      /* text-align: center; */
      }
      @import url('https://fonts.googleapis.com/css?family=Montserrat:600&display=swap');
      .card-list .heart-btn {
        position: relative;
        margin: 10px 75% 0 0;
      }
      .card-list .content {
        position: relative;
        padding: 3%;
        padding-left: 20px;
        border: 1px solid #eae2e1;
        border-radius: 5px;
        cursor: pointer;
      }
      .card-list .heart {
        position: absolute;
        top: 50%;
        left: 20px;
        height: 90px;
        width: 90px;
        transform: translate(-50%, -50%);
        background: url("img.png") no-repeat;
        background-position: left;
        background-size: 2900%;
      }
      .card-list .content.heart-active{
        border-color: #f9b9c4;
        background: #fbd0d8;
      }
      .card-list .text{
        font-size: 18px;
        margin-left: 30px;
        color: grey;
        font-family: 'Montserrat',sans-serif;
      }
      .card-list .numb:before{
        font-size: 21px;
        margin-left: 7px;
        font-weight: 600;
        color: #9C9496;
        font-family: sans-serif;
      }
      .card-list .numb.heart-active:before{
        color: #000;
      }
      .card-list .text.heart-active{
        color: #000;
      }
      .card-list .heart.heart-active{
        animation: animate .8s steps(28) 1;
        background-position: right;
      }
      @keyframes animate {
        0%{
          background-position: left;
        }
        100%{
          background-position: right;
        }
      }
    </style>

    <script>
    $(document).ready(function(){
      $('.content').click(function(){
        $(this).toggleClass("heart-active"); // Toggle class only for the clicked button
        $(this).find('.text').toggleClass("heart-active"); // Toggle class only for the text inside the clicked button
        $(this).find('.numb').toggleClass("heart-active"); // Toggle class only for the number inside the clicked button
        $(this).find('.heart').toggleClass("heart-active"); // Toggle class only for the heart icon inside the clicked button
      });
    });
    </script>

  </head>
  <body>
    <div class="container">
      <div class="row">
        <?php
          while($rentRow = mysqli_fetch_array($rentQuery)) {
        ?>
        <div class="col-lg-6">
          <div class="card-list">
            <div class="row">
              <div class="col-1">
                <i class="fa-solid fa-user"></i>
              </div>
              <div class="col-11" style="margin-left:-3%;">
                <span style="color:#6E4BE7;">Feedback received from </span><?php echo !empty($rentRow["driver_name"]) ? $rentRow["driver_name"] : "unknown"; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-1">

              </div>
              <div class="col-11" style="margin-left:-3%;">
                <?php echo $rentRow["vehicle_feedback"]; ?>
              </div>
            </div>
            <div class="row">
              <div class="col-1">

              </div>
              <div class="col-11" style="margin-left:-3%;">
                <div class="heart-btn">
                  <div class="content">
                    <span class="heart"></span>
                    <span class="text">Like</span>
                    <span class="numb"></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
        }
      ?>
      </div>
    </div>

    <!-- bootstrap and owlcarousel js link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"></script>

  </body>
</html>
