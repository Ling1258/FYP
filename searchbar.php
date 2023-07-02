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
    .glass{
      background: rgba(0, 0, 128, 0.2);
      box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
      backdrop-filter: blur(6.2px);
      -webkit-backdrop-filter: blur(6.2px);
      padding: 5%;
      margin: 5% 0% 5% 0%;
    }
    .title{
      margin: 5% 0 0 0;
    }
    </style>
  </head>

  <body>
    <!-- jquery link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <section id="rent">
      <div class="container">
        <div class="row mt-3 mb-2">
          <div class="col-lg-2">
            <a href="dash_rent_record_list.php" class="block btn btn-secondary">Back</a>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12 glass">
            <h4 style="color:black"><span style="color:#6E4BE7;">Jo</span>Car<i> make your journey more enjoyable and economical</i></h4>
            <p style="color:black">Let start your journey with us!!</p>
            <?php
              session_start();

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
                  <button type="submit" class="btn btn-outline-dark btn-lg" name="submit">Search Car</button>
                  <!-- <a href="searchpage.php" class="btn btn-outline-dark btn-lg">Search Car</a> -->
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
