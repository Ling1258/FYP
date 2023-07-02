<?php
include("dataconnection.php");
session_start();
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $code = mysqli_real_escape_string($con, md5(rand()));
    $_SESSION['keep'] = $email;

    if (mysqli_num_rows(mysqli_query($con, "SELECT * FROM register WHERE email='{$email}'")) > 0) {
      $query = mysqli_query($con, "UPDATE register SET code='{$code}' WHERE email='{$email}'");

      if (isset($_POST['submit'])) {
          //Create an instance; passing `true` enables exceptions
          $mail = new PHPMailer(true);

          try {
              //Enable verbose debug output
              $mail->isSMTP();                                            //Send using SMTP
              $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
              $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
              $mail->Username   = 'judsonchin@gmail.com';                     //SMTP username
              $mail->Password   = 'ridmmmvckrkhjymw';                               //SMTP password
              $mail->SMTPSecure = 'ssl';                                      //Enable implicit TLS encryption
              $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

              //Recipients
              $mail->setFrom('judsonchin@gmail.com');
              $mail->addAddress($_POST['email']);

              //Content
              $mail->isHTML(true);     //Set email format to HTML
              $mail->Subject = 'Require Change Password Verification Email';
              $mail->Body    = 'Here is the verification link <b><a href="http://localhost/Car%20Rental/changepass.php?reset='.$code.'">http://localhost/Car%20Rental/changepass.php?reset='.$code.'</a></b>';

              $mail->send();
              // echo 'Message has been sent';
          } catch (Exception $e) {
              // echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
          }
          echo "</div>";
          $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
      }
    } else {
        $msg = "<div class='alert alert-danger'>$email - This email address do not found.</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Car Rental</title>
<!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- css file -->
    <link rel="stylesheet" href="forgetpassword.css">
<!-- icon -->
    <script src="https://kit.fontawesome.com/8ad4094933.js" crossorigin="anonymous"></script>

    <style media="screen">
    .b-link{
      padding-top: 3%;
      text-align: center;
    }
    </style>
  </head>
  <body>
    <section id="navbar">
      <nav class="navbar navbar-expand-lg navbar-dark p-md-3" style="background-color:black;">
        <div class="container-fluid">
          <a class="navbar-brand mx-auto" href="index.html" style="font-size:40px;font-weight:bold;color:white;"><span style="color: #6E4BE7;">Jo</span>Car</a>
          <!-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav mr-auto" style="color:white;font-size:20px;margin-left:20px;">
              <li class="nav-item">
                <a class="nav-link" href="login.php"><i class="fa-regular fa-user"></i> Login</a>
              </li>
            </ul>
          </div> -->
        </div>
      </nav>
    </section>
    <section id="from">
      <h1 class="form-title">Forgot Your Password?</h1>
      <div class="container">
        <div class="Cart">
          <div class="row">
            <div class="col-lg-12">
              <p style="text-align:center">Enter your email to change your password</p>
              <?php echo $msg; ?>
              <form class="" action="forgetpassword.php" method="post">
                <div class="form-group col-lg-12">
                  <input type="email" class="form-control" name="email" value="" placeholder="Enter Your Email" required><br>
                </div>
                <div class="btn col-lg-12">
                  <button type="submit" class="block btn btn-outline-success" name="submit">Send</button>
                </div>
                <div class="b-link">
                  <p>Back to <a class="" href="login.php">Login</a> ?</p>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </body>
</html>
