<?php
include("dataconnection.php");
session_start();

$state = $_SESSION['state'];
$city = $_SESSION['city'];
$pick_up_date = $_SESSION['pick_up_date'];
$drop_off_date = $_SESSION['drop_off_date'];
$pick_up_time = $_SESSION['pick_up_time'];
$drop_off_time = $_SESSION['drop_off_time'];
$total_cost = $_SESSION['total_cost'];
$id = $_SESSION['id'];

if (isset($_POST['submit'])){
  $driver_name=$_POST['driver_name'];
  $driver_email=$_POST['driver_email'];
  $driver_phone=$_POST['driver_phone'];
  $cardholder_name=$_POST['cardholder_name'];
  $card_number=$_POST['card_number'];
  $expiration_date=$_POST['expiration_date'];
  $cvc=$_POST['cvc'];

  $current_time = date('Y-m-d');

  $query=mysqli_query($con,"select vehicle_plate from car where id='$id'");
  $row=mysqli_fetch_array($query);
  $vehicle_plate = $row["vehicle_plate"];

  $sql = "INSERT INTO rent_record (pick_up_state,pick_up_city,pick_up_time,drop_off_time,pick_up_date,drop_off_date,vehicle_plate,driver_name,driver_email,driver_phone,cardholder_name,card_number,expiration_date,cvc,status,total_cost,order_time,total_earning)VALUES ('$state','$city','$pick_up_time','$drop_off_time','$pick_up_date','$drop_off_date','$vehicle_plate','$driver_name','$driver_email','$driver_phone','$cardholder_name','$card_number','$expiration_date','$cvc','reserved','$total_cost','$current_time','0')";
  $result = mysqli_query($con, $sql);
  $rent_record_id = mysqli_insert_id($con); // Get the ID of the newly added rent record

  if ($result) {
  mysqli_query($con, "update car set vehicle_available='no' where id='$id'");
  unset($_SESSION['id']);

  // $rent_record_id = mysqli_insert_id($con); // Get the ID of the newly added rent record
  $query=mysqli_query($con,"select * from rent_record where id='$rent_record_id'");
  $row=mysqli_fetch_array($query);
  $r_r_id = $row["id"];

  header("Location: pay_success_cash.php?r_r_id=$r_r_id");
  }
}

if (isset($_POST['ssubmit'])){
  $driver_name=$_POST['driver_name'];
  $driver_email=$_POST['driver_email'];
  $driver_phone=$_POST['driver_phone'];
  $cardholder_name=$_POST['cardholder_name'];
  $card_number=$_POST['card_number'];
  $expiration_date=$_POST['expiration_date'];
  $cvc=$_POST['cvc'];

  $current_time = date('Y-m-d');

  $query=mysqli_query($con,"select vehicle_plate from car where id='$id'");
  $row=mysqli_fetch_array($query);
  $vehicle_plate = $row["vehicle_plate"];

  $sql = "INSERT INTO rent_record (pick_up_state,pick_up_city,pick_up_time,drop_off_time,pick_up_date,drop_off_date,vehicle_plate,driver_name,driver_email,driver_phone,cardholder_name,card_number,expiration_date,cvc,status,total_cost,order_time,total_earning)VALUES ('$state','$city','$pick_up_time','$drop_off_time','$pick_up_date','$drop_off_date','$vehicle_plate','$driver_name','$driver_email','$driver_phone','$cardholder_name','$card_number','$expiration_date','$cvc','reserved','$total_cost','$current_time','0')";
  $result = mysqli_query($con, $sql);
  $rent_record_id = mysqli_insert_id($con); // Get the ID of the newly added rent record

  if ($result) {
    mysqli_query($con, "update car set vehicle_available='no' where id='$id'");
    unset($_SESSION['id']);

    $query=mysqli_query($con,"select * from rent_record where id='$rent_record_id'");
    $row=mysqli_fetch_array($query);
    $r_r_id = $row["id"];
    $_SESSION['r_r_id'] = $r_r_id;

    header("Location: pay_success_oy3.php");
  }
}
?>
