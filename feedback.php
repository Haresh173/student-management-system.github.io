<?php
include 'config.php';
session_start();
$user_id = $_SESSION['id'];



if(isset($_POST['submit'])){
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);

  date_default_timezone_set("Asia/Kuala_Lumpur");
  $dateCurrent = date('Y-m-d');


  $insert = mysqli_query($conn, "INSERT INTO feedback (name, email, mobile, comment, created_at, userid) VALUES ('$name', '$email', '$mobile', '$message', '$dateCurrent', '$user_id')") or die('query failed'); 


  if($insert){

      echo "<script>alert('Submit successfully');</script>";
      echo "<script>window.location.href='feedback.php';</script>";

  }else{

      echo "<script>alert('Submit failed');</script>";
      echo "<script>window.location.href='feedback.php';</script>";

  }

}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>STUDENT MANAGEMENT SYSTEM</title>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content = "IE=edge">
        <meta name="viewport" content = "width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <style type="text/css">
          .btn{
            background: #AD1C10;
            border-color: #AD1C10 ;
            color: #fff;
          }
        </style>
    </head>


<header>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="student-dashboard.php">DIRECT ENTRY SYSTEM</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href=""> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="logout.php">Log Out</a>
      </li>
    </ul>
  </div>
</nav>
</header>

<body>
<div class="sidebar">
<a href="student-dashboard.php" class="list-group-item list-group-item-action py-2 ripple ">Dashboard</a>
  <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">Profile</a>
  <a href="upload-form.php" class="list-group-item list-group-item-action py-2 ripple">Credit Transfer</a>
  <a href="planstudy.php" class="list-group-item list-group-item-action py-2 ripple">Study Plan</a>
  <a href="feedback.php" class="list-group-item list-group-item-action py-2 ripple active">Feedback Form</a>

 
</div>
<head>
       <div class="feedback">
    
            <form action="" method="POST">
              <h3>Get In Touch</h3>
              <input type="text" id="name" placeholder="Your Name" name="name" required>
              <input type="email" id="email" placeholder="Email" name="email" required>
              <input type="text" id="mobile" placeholder="Mobile no." name="mobile" required>
              <textarea id="message" rows="4" placeholder="How can we Help you?" name="message" required></textarea>
              <button type="submit" name="submit" class="btn">Send</button>

           </form> 
</div>
<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <h6>About</h6>
        <p class="text-justify">Student Management System <i>is a website created for students from university where student can upload their credit transfer forms to be reviewed by admin
            and create a study plan </i> .</p>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Quick Links</h6>
        <ul class="footer-links">
          <li><a href="#">Academic Calendar</a></li>
          <li><a href="#">E-learning</a></li>
        </ul>
      </div>

      <div class="col-xs-6 col-md-3">
        <h6>Social Medias</h6>
        <ul class="footer-links">
          <li><a href="https://www.facebook.com/">Facebook</a></li>
          <li><a href="https://www.instagram.com/">Instagram</a></li>
          <li><a href="https://twitter.com/">Twitter</a></li>
        </ul>
      </div>
    </div>
    <hr>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-xs-12">
        <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by Student Management System
          <a href="#"></a>
        </p>
      </div>
    </div>
  </div>
  </div>
</footer>


<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>


    

           






























<!-- //footer  -->
 <!-- Site footer -->
<!--  <footer class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6">
            <h6>About</h6>
            <p class="text-justify">Direct Entry System <i>is a website created for direct entry student from all malaysia university where student can transfer credit on their subjects </i> .</p>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Quick Links</h6>
            <ul class="footer-links">
              <li><a href="https://comp.utm.my/direct-entry/">Direct Entry Page</a></li>
              <li><a href="https://amd.utm.my/academic-calendar/">Academic Calendar</a></li>
              <li><a href="https://elearning.utm.my/22231/index.php">E-learning</a></li>
            </ul>
          </div>

          <div class="col-xs-6 col-md-3">
            <h6>Social Medias</h6>
            <ul class="footer-links">
              <li><a href="https://www.facebook.com/univteknologimalaysia/">Facebook</a></li>
              <li><a href="https://www.instagram.com/utmofficial/?hl=en">Instagram</a></li>
              <li><a href="https://twitter.com/utm_my?lang=en">Twitter</a></li>
            </ul>
          </div>
        </div>
        <hr>
      </div>
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-sm-6 col-xs-12">
            <p class="copyright-text">Copyright &copy; 2023 All Rights Reserved by Direct Entry System
         <a href="#"></a>
            </p>
          </div>
          </div>
        </div>
      </div>
</footer> -->