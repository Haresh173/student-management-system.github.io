<?php 
session_start(); 
include 'config.php';
// Code for admin login 
if(isset($_POST['login']))
{
  $adminusername=$_POST['username'];
  $pass=$_POST['password'];
  $ret=mysqli_query($conn,"SELECT * FROM admin WHERE username='$adminusername' and password='$pass'");
  $num=mysqli_fetch_array($ret);
if($num>0)
{
$extra="admin-dashboard.php";
$_SESSION['login']=$_POST['username'];
/*$_SESSION['adminid']=$num['id'];*/
echo "<script>window.location.href='".$extra."'</script>";
exit();
}
else
{
echo "<script>alert('Invalid username or password');</script>";
$extra="index.php";
echo "<script>window.location.href='".$extra."'</script>";
exit();
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
            <form action="" method="POST">
                <h2>Admin Login</h2>
                <div class="input-group">
                    <input class="form-control" type="text" name="username"  required>
                    <label for="inputUsername">Username</label>
                </div>
                <div class="input-group">
                    <input class="form-control" type="password" name="password" required>
                    <label for="inputPassword">Password</label>
                </div>
                <button type="submit" name="login" class="btn">
                    Login
                </button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</body>

</html>