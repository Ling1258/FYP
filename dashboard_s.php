<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
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
      margin: 5%;
      height: auto;
      /* text-align: center; */
    }
    </style>
  </head>
  <body>
    <div class="row">
      <div class="col-lg-4 col-md-6">
        <div class="card-list">
          <div class="row">
            <div class="col-lg-12">
              <h2>Booking Record</h2>
            </div>
            <hr style="width:90%;text-align:left;margin-left:5%">
            <div class="col-lg-12">
              <a href="dash_rent_record_list.php"><i class="fa-solid fa-arrow-right fa-lg"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card-list">
          <div class="row">
            <div class="col-lg-12">
              <h2>Vehicle List</h2>
            </div>
            <hr style="width:90%;text-align:left;margin-left:5%">
            <div class="col-lg-12">
              <a href="dash_car_list.php"><i class="fa-solid fa-arrow-right fa-lg"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card-list">
          <div class="row">
            <div class="col-lg-12">
              <h2>Register List</h2>
            </div>
            <hr style="width:90%;text-align:left;margin-left:5%">
            <div class="col-lg-12">
              <a href="dash_register_list.php"><i class="fa-solid fa-arrow-right fa-lg"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card-list">
          <div class="row">
            <div class="col-lg-12">
              <h2>Partnership List</h2>
            </div>
            <hr style="width:90%;text-align:left;margin-left:5%">
            <div class="col-lg-12">
              <a href="dash_partnership_list.php"><i class="fa-solid fa-arrow-right fa-lg"></i></a>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6">
        <div class="card-list">
          <div class="row">
            <div class="col-lg-12">
              <h2>Partnership Request list</h2>
            </div>
            <hr style="width:90%;text-align:left;margin-left:5%">
            <div class="col-lg-12">
              <a href="dash_request_list.php"><i class="fa-solid fa-arrow-right fa-lg"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
