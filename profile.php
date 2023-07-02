<?php
include 'config.php';
session_start();
$user_id = $_SESSION['id'];



if(isset($_POST['update_profile'])){
  $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
  $update_phone = mysqli_real_escape_string($conn, $_POST['update_phone-number']);
  $update_mnumber = mysqli_real_escape_string($conn, $_POST['update_matric-number']);
  $update_program = mysqli_real_escape_string($conn, $_POST['update_program']);
  $new_pass = mysqli_real_escape_string($conn, $_POST['new_pass']);
  $oldpath = $_POST['oldpath'];

  $sql = "UPDATE student_signup SET name = '$update_name', phone_number = '$update_phone', matric_number = '$update_mnumber', program = '$update_program' ";


  $selected = "WHERE id = '$user_id'";

  if(isset($_FILES['update_image']['name']) && !empty($_FILES['update_image']['name'])){

      $update_image = date('YmdHis').'_'.$_FILES['update_image']['name'];
      $update_image_size = $_FILES['update_image']['size'];
      $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
      $update_image_folder = 'uploaded_img/'.$update_image;

      if($update_image_size > 2000000){
        $message[] = 'image is too large';
      }else{

        if(!empty($update_image)){

          if(!empty($oldpath)){

            if(file_exists('uploaded_img/'.$oldpath)){
                unlink('uploaded_img/'.$oldpath);
            } 

          }
          
          $img_path = ", image = '$update_image' ";  
          $sql .= $img_path;
          move_uploaded_file($update_image_tmp_name, $update_image_folder);
        }
          
        // $message[] = 'image updated succssfully!';
      }
  }

  if(isset($new_pass) && !empty($new_pass)){

      $pass_path = ", password = '".md5($new_pass)."' ";
      $sql .=  $pass_path;

  }


  $sql .= $selected;

  $update = mysqli_query($conn, $sql) or die('query failed');

  if($update){

      $message[] = 'Profile update successfully!';

  }else{

      $message[] = 'Profile updated failed!';

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
    </head>
    <style type="text/css">
        .update-profile img{
            width: 100px;
        }

        .profile-card{
           border-radius: 6px;
           border: 1px solid #9b9898;
           width: fit-content;
           margin: 40px 40px;
        }

        .profile-card form{
          width: 100%;
        }

        .profile-card form img{
          margin-bottom: 20px;
          margin-top: 20px;
        }

        .profile-card form .btn-submit{
          /*background-color: #000;*/
          border-radius: 6px;
          padding: 10px 20px;
          color: #fff;
          text-transform: uppercase;
          font-weight: 500;
        }

        .profile-card form input{

            border-radius: 4px;
            padding: 10px 20px;
            font-size: 14px;

        }

        .center{
          text-align: center;
        }

        .gap{
           height: 20px;
        }

        .inputBox label{
          width: 180px;
        }

        .inputBox input{
          width: 280px;
        }

        .hide{
          display: none;
        }

        .btn{
          background: #AD1C10;
          border-color: #AD1C10 ;
        }
    </style>

<body>
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
<div class="sidebar">
  <a href="profile.php" class="list-group-item list-group-item-action py-2 ripple active">Profile</a>
  <a href="upload-form.php" class="list-group-item list-group-item-action py-2 ripple ">Credit Transfer</a>
  <a href="planstudy.php" class="list-group-item list-group-item-action py-2 ripple ">Study Plan</a>
  <a href="feedback.php" class="list-group-item list-group-item-action py-2 ripple ">Feedback Form</a>

</div>

<div class="content">

    <div class="update-profile">

           <?php
              $select = mysqli_query($conn, "SELECT * FROM student_signup WHERE id = '$user_id'") or die('query failed');
              if(mysqli_num_rows($select) > 0){
                 $fetch = mysqli_fetch_assoc($select);
              }
           ?>
           <div class="gap"></div>

           <div class="profile-card">
             <form action="" method="post" enctype="multipart/form-data">
                <div class="center">
                <?php
                   if($fetch['image'] == ''){
                      echo '<img src="images/default-avatar.jpg">';
                   }else{
                      echo '<img src="uploaded_img/'.$fetch['image'].'">';
                   }
                   if(isset($message)){
                      foreach($message as $message){
                         echo '<div class="message">'.$message.'</div>';
                      }
                   }
                ?>
                </div>
                <div class="flex">
                   <div class="inputBox">
                      <div>
                        <label>Name :</label>
                        <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" class="box" required>
                      </div>
                      <div>
                        <label>Email (Readonly) :</label>
                        <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>" class="box" disabled>
                      </div>
                      <div>
                        <label>Phone Number :</label>
                        <input type="number" name="update_phone-number" value="<?php echo $fetch['phone_number']; ?>" class="box" required>
                      </div>
                      <div>
                        <label>Matric Number :</label>
                        <input type="text" name="update_matric-number" value="<?php echo $fetch['matric_number']; ?>" class="box" required>
                      </div>
                      <div>
                        <label>Program :</label>
                        <input type="text" name="update_program" value="<?php echo $fetch['program']; ?>" class="box" required>
                      </div>
                      <div class="hide">
                        <label>Old Path :</label>
                        <input type="text" name="oldpath" value="<?php echo $fetch['image']; ?>" class="box" >
                      </div>
                      <div>
                        <label>New Profile Image :</label>
                        <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" class="box">
                      </div>
                      <div>
                          <label>new password :</label>
                          <input type="password" name="new_pass" placeholder="New Password" class="box">
                      </div>
                   </div>
                 
             
                </div>
                <input type="submit" value="Update" name="update_profile" class="btn btn-submit mt-4">
             </form>
           </div>

           <div class="gap"></div>
        </div>
          
</div>





<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src = "https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



<!-- //footer  -->
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
</body>
</html>