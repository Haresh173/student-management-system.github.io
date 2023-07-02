<?php

include 'config.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $password = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM student_signup WHERE email = '$email' AND password = '$password'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['id'] = $row['id'];
      header('location:profile.php');
   }else{
      $message[] = 'Incorrect email or password!';
   }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>STUDENT MANAGEMENT SYSTEM</title>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords" content="Login Form" />
    

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style4.css" type="text/css" media="all" />
    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>
    <style type="text/css">
      body{
        display: flex;
        justify-content: center;
        align-items: center;
        background: linear-gradient(#2196f3, #e91e63);
        overflow: scroll;
      }

      .form-wrapper{
          height: unset;
          width: unset;
          padding: 30px;
          border-radius: 6px;
          position: relative;
      }
    </style>

</head>

<body>
        <div class="form-wrapper sign-in">
            <form action="" method="post" enctype="multipart/form-data">
                <h2>Student Login</h2>
                <?php
      if(isset($message)){
         foreach($message as $message){
            echo '<div class="message">'.$message.'</div>';
         }
      }
      ?>
                <div class="input-group">
                    <input type="email" name="email" required>
                    <label for="">email</label>
                </div>
                <div class="input-group">
                    <input type="password" name="password" required>
                    <label for="">Password</label>
                </div>
                <div class="gap" style="height: 5px;">
                    <!-- <a href="forgot-password.php">Forgot Password?</a> -->
                </div>
                <button type="submit" class="btn" name="submit">Login</button>
                <div class="sign-link">
                    <p>Don't have an account? <a href="signup.php" class="signUp-link">Sign Up</a></p>
                </div>
            </form>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>