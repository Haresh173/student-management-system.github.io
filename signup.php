<?php
include 'config.php';



if(isset($_POST['submit'])){

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $matricnumber = mysqli_real_escape_string($conn, $_POST['matric-number']);
    $phonenumber = mysqli_real_escape_string($conn, $_POST['phone-number']);
    $program = mysqli_real_escape_string($conn, $_POST['program']);
    $password = mysqli_real_escape_string($conn, md5($_POST['password']));
    $confirm_password = mysqli_real_escape_string($conn, md5($_POST['confirm-password']));


    $select = mysqli_query($conn, "SELECT * FROM student_signup WHERE email = '$email' AND password = '$password'") or die('query failed');

    if(mysqli_num_rows($select) > 0){
       $message[] = 'user already exist'; 
    }else{
       if($password != $confirm_password){
          $message[] = 'Password not match!';
       }else{
          $insert = mysqli_query($conn, "INSERT INTO student_signup (name, email, matric_number, phone_number, program, password) VALUES ('$name', '$email', '$matricnumber', '$phonenumber', '$program', '$password')") or die('query failed'); 

          if($insert){
                echo "<script>alert('Successfully create account');</script>";
                echo "<script>window.location.href='student-login.php';</script>";
          }
       }
    }
 
 }
 
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>STUDENT MANAGEMENT SYSTEM</title>
  
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"/>
    

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/style3.css" type="text/css" media="all" />
    

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <style type="text/css">
    
        .form-wrapper{
            box-shadow: unset;
            padding-top: 20px;
            border-radius: 6px;
        }
    </style>

</head>

<div class="wrapper" content="Login Form" style="height: unset;">
        <div class="form-wrapper sign-up">
            <form action="" method="POST">
                <h2>Sign Up</h2>
                <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
                <div class="input-group">
                    <input type="text" name="name" required>
                    <label for="">Username</label>
                </div>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="">Email</label>
                </div>
                <div class="input-group">
                    <input type="name" name="matric-number" required maxlength="8">
                    <label for="">Matric Number</label>
                </div>
                <div class="input-group">
                    <input type="number" name="phone-number" required>
                    <label for="">Phone Number</label>
                </div>
                <div class="input-group">
                    <input type="name" name="program" required>
                    <label for="">Program</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="input-group">
                    <input type="password" name="confirm-password" required>
                    <label for="">Confirm Password</label>
                </div>
                <button type="submit" class="btn" name="submit">Sign Up</button>
                <div class="sign-link">
                    <p>Already have an account? <a href="student-login.php" class="signIn-link">Sign In</a></p>
                </div>
            </form>
        </div>
        <script src="script.js"></script>

</body>

</html>
