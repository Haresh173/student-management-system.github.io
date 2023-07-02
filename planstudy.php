<?php
session_start();
require 'dbcon.php';
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
          .gap{
            height: 30px;
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
  <a href="upload-form.php" class="list-group-item list-group-item-action py-2 ripple">Credit Transfer</a>
  <a href="planstudy.php" class="list-group-item list-group-item-action py-2 ripple active">Study Plan</a>
  <a href="feedback.php" class="list-group-item list-group-item-action py-2 ripple ">Feedback Form</a>
 
</div>
<div class="container">
    <div class="gap"></div>
<?php include('message.php'); ?>
    <div class="row">
        <div class="col-md 12">

            <div class="card">
                <div class="card-header">
                   <h4>Study Plan
                    <a href="student-create.php" class="btn btn-primary float-end-right">Add Course</a>
                   </h4> 
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Course Code</th>
                                <th>Course Name</th>
                                <th>Credit Hours</th>
                                <th>Lecturer Name</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        $query = "SELECT * FROM studyplan";
                        $query_run = mysqli_query($conn, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            foreach($query_run as $course)
                            {
                                ?>
                                <tr>
                                    <td><?= $course['id']; ?></td>
                                    <td><?= $course['course_code']; ?></td>
                                    <td><?= $course['course_name']; ?></td>
                                    <td><?= $course['credit_hours']; ?></td>
                                    <td><?= $course['lecturer_name']; ?></td>
                                    <td><?= $course['semester']; ?></td>
                                    <td>
                                        <form action="code-planstudy.php" method="POST" class="d-inline" style="background-color: unset; max-width: 0px; padding: 0px;">
                                            <button type="submit" name="delete_course" value="<?=$course['id'];?>" class="btn btn-danger btn-sm m-0">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else
                        {
                            echo "<h5> No Record Found </h5>";
                        }
                    ?>

                        </tbody>
                    </table>
                </div>
        </div>
    </div>

     <div class="gap"></div>
</div>

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

