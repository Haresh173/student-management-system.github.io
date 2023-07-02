<?php
session_start();
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
  <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple">Profile</a>  
  <a href="upload-form.php" class="list-group-item list-group-item-action py-2 ripple"> Credit Transfer</a>
  <a href="student-create.php" class="list-group-item list-group-item-action py-2 ripple active">Study Plan</a>
  <a href="feedback.php" class="list-group-item list-group-item-action py-2 ripple ">Feedback Form</a>

</div>
 

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Course</h4>
                        <a href="planstudy.php" class="btn btn-danger float-end">BACK</a>
                    </div>
                    <div class="card-body">
                        <form action="code-planstudy.php" method="POST">

                            <div class="mb-3">
                                <label>Course Code</label>
                                <input type="text" name="course_code" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Course Name</label>
                                <input type="text" name="course_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Credit Hours</label>
                                <input type="text" name="credit_hours" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Lecturer Name</label>
                                <input type="text" name="lecturer_name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Semester</label>
                                <input type="text" name="semester" class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_course" class="btn btn-primary">Save Course</button>
                            </div>

                        </form>
                    
                </div>
            </div>
        </div>
    </div>
 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
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