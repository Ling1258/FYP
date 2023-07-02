<?php
include("dataconnection.php");
session_start();

if (isset($_SESSION['store'])){
  $email = $_SESSION['store'];
  $query = mysqli_query($con, "SELECT * FROM rent_record WHERE driver_email = '$email' ORDER BY order_time DESC");

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
    <!-- jquery link -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- icon -->
        <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>
    <!-- font -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">
    <!-- css -->
    <style media="screen">
    #top{
      background-image: url(userpage3.jpg);
      background-color: #fff;
      background-position: top;
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
    .table-y-scrollbar{
      overflow-y: scroll;
      max-height: 400px;
    }
    /* .table-x-scrollbar{
      overflow-x: scroll;
    } */
    .feedback-modal {
    display: none;
    position: fixed;
    z-index: 9999;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.4);
    }

    .feedback-modal-content {
      background-color: #fefefe;
      margin: 15% auto;
      padding: 20px;
      border: 1px solid #888;
      width: 80%;
      max-width: 600px;
    }

    .close {
      color: #aaa;
      float: right;
      font-size: 28px;
      font-weight: bold;
      cursor: pointer;
    }

    .close:hover,
    .close:focus {
      color: black;
      text-decoration: none;
      cursor: pointer;
    }
    </style>

    <!-- <script>
      var selectedRecordId; // Variable to store the clicked record ID

      // Function to open the feedback pop-up box and store the record ID
      function openFeedbackModal(recordId) {
        selectedRecordId = recordId; // Store the clicked record ID
        document.getElementById("feedbackModal").style.display = "block";
      }

      // Function to close the feedback pop-up box
      function closeFeedbackModal() {
        document.getElementById("feedbackModal").style.display = "none";
      }

      // Function to submit the feedback form
      function submitFeedback() {
        // Get the feedback from the form
        var feedback = document.getElementById("feedbackText").value;

        // Perform any validation or processing of the feedback here

        // Send the feedback along with the record ID to the server for storage
        // You can use AJAX or any other method to send the data to the server
        // Example AJAX code:
        $.ajax({
          type: "POST",
          url: "store_feedback.php",
          data: { recordId: selectedRecordId, feedback: feedback },
          success: function(response) {
            // Handle the server response
            console.log("Feedback stored successfully");
            closeFeedbackModal(); // Close the feedback pop-up box
          },
          error: function() {
            // Handle errors, if any
            console.log("Error storing feedback");
          }
        });

        // For demonstration purposes, display the feedback and record ID in the console
        // console.log("Record ID: " + selectedRecordId);
        // console.log("Feedback: " + feedback);
        closeFeedbackModal(); // Close the feedback pop-up box
      }
    </script> -->


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
              <h3>Your Car Rented Record</h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="container">
      <div class="row mt-5">
        <div class="col">
          <div class="card">
            <div class="card-header">
              <h2 style="text-align:center;">Your Car Rented Record</h2>
            </div>
            <div class="card-body">
              <div class="table-y-scrollbar">
                <!-- <div class="table-x-scrollbar"> -->
                  <table class="table table-bordered text-center" style="min-width:max-content;">
                    <tr style="text-align:center;color:white;background-color:black;">
                      <td>State</td>
                      <td>City</td>
                      <td>Pick-up-Time</td>
                      <td>Drop-off-Time</td>
                      <td>Pick-up-Date</td>
                      <td>Drop-off-Date</td>
                      <td>Vehicle Plate</td>
                      <td>Status</td>
                      <td>Total Price (RM)</td>
                      <td>Feedback</td>
                      <td>Cancel Order</td>
                    </tr>
                    <tr>
                      <?php
                        while($row = mysqli_fetch_assoc($query)){
                      ?>
                      <td><?php echo $row["pick_up_state"]; ?></td>
                      <td><?php echo $row["pick_up_city"]; ?></td>
                      <td><?php echo $row["pick_up_time"]; ?></td>
                      <td><?php echo $row["drop_off_time"]; ?></td>
                      <td><?php echo $row["pick_up_date"]; ?></td>
                      <td><?php echo $row["drop_off_date"]; ?></td>
                      <td><?php echo $row["vehicle_plate"]; ?></td>
                      <td><?php echo $row["status"]; ?></td>
                      <td><?php echo $row["total_cost"]; ?></td>
                      <td> <a href="rentcar_feedback.php?rentcar_id=<?php echo $row["id"]; ?>" class="btn btn-info">Feedback</a> </td>
                      <td> <a href="rentcar_cancel.php?rentcar_id=<?php echo $row["id"]; ?>" class="btn btn-danger">Cancel</a> </td>
                      <!-- <td><a onclick="openFeedbackModal('<?php echo $row["id"]; ?>')" class="btn btn-info">Feedback</a></td> -->
                      <!-- <td><a data-record-id="<?php echo $row["id"]; ?>" class="btn btn-info feedback-btn">Feedback</a></td> -->
                    </tr>
                    <?php
                      }
                    ?>
                  </table>
                </div>
              </div>
              <div class="text-center p-3">
                <p>Note: Your are <b>only</b> allow to<span style="color:#BF2222;"> <b>CANCEL</b> </span> the order before <span style="color:#2235BF;"> <b>24 HOURS</b> </span> of the pick up date.</p>
              </div>
            </div>
            <br>
          </div>
        </div>
      </div>

      <!-- <form method="POST" action="store_feedback.php">
        <div id="feedbackModal" class="feedback-modal">
          <div class="feedback-modal-content">
            <span class="close" onclick="closeFeedbackModal()">&times;</span>
            <h3>Feedback</h3>
            <p>You feedback are important to us!! Just write down your command below.</p>
            Add a textarea for the user to enter feedback
            <input type="hidden" name="recordId" value="<?php echo $row['id']; ?>">
            <textarea class="form-control" id="feedback" name="feedback" rows="3"></textarea>
            Add a submit button to submit the feedback
            <button type="submit" onclick="submitFeedback()" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form> -->
    </div>



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
