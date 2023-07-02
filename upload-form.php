<?php
include 'filelogic.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>STUDENT MANAGEMENT SYSTEM</title>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <style type="text/css">
    .btn {
      background: #AD1C10;
      border-color: #AD1C10;
    }

    .upload-card {
      border-radius: 6px;
      border: 1px solid #9b9898;
      width: fit-content;
      margin: 40px 40px;
      padding: 20px;
    }

    .upload-card form {
      width: 100%;
    }

    .upload-card form img {
      margin-bottom: 20px;
      margin-top: 20px;
    }

    .upload-card form .btn-submit {
      /*background-color: #000;*/
      border-radius: 6px;
      padding: 10px 20px;
      color: #fff;
      text-transform: uppercase;
      font-weight: 500;
    }

    .upload-card form input {

      border-radius: 4px;
      padding: 10px 20px;
      font-size: 14px;

    }
  </style>
</head>


<header>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="profile.php">STUDENT MANAGEMENT SYSTEM</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href=""><span class="sr-only">(current)</span></a>
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
    <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">Profile</a>
    <a href="upload-form.php" class="list-group-item list-group-item-action py-2 ripple active">Credit Transfer</a>
    <a href="planstudy.php" class="list-group-item list-group-item-action py-2 ripple ">Study Plan</a>
    <a href="feedback.php" class="list-group-item list-group-item-action py-2 ripple ">Feedback Form</a>
  </div>

  <div class="content">
    <div class="container">
      <form class="form-horizontal span6" action="" method="POST" enctype="multipart/form-data">

        <div class="row">
          <div class="col-lg-12">
            <h2 class="page-header">Upload Credit Transfer Form</h2>
          </div>
          <div class="upload-card">
            <form action="" method="post" enctype="multipart/form-data">

              <div class="flex">
                <div class="inputBox">
                  <div>
                    <label>File Name: :</label>
                    <input class="form-control input-sm" id="FileName" name="FileName" placeholder="Name" type="text" value="">
                  </div>
                  <!-- <div>
                            <label>Select File Type :</label>
                            <select class="form-control input-sm" id="Category" name="Category" >
                                <option>Docs</option>
                             </select>
                          </div> -->

                  <div class="mt-3">
                    <label>Upload File:</label>
                    <input type="file" name="file" />
                  </div>

                </div>


              </div>
              <button class="btn btn-primary btn-sm" name="save" type="submit"><span class="fa fa-save fw-fa"></span>Submit</button>
            </form>
          </div>

        </div>



      </form>
    </div>
  </div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


<!-- Site footer -->
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

</html>