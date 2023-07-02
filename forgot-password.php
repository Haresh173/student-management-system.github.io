<!DOCTYPE html>
<html lang="en">

<head>
    <title>STUDENT MANAGEMENT SYSTEM</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="UTF-8" />
    <meta name="keywords"
        content="Login Form" />
    <!-- //Meta tag Keywords -->

    <link href="//fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <!--/Style-CSS -->
    <link rel="stylesheet" href="css/style3.css" type="text/css" media="all" />
    <!--//Style-CSS -->

    <script src="https://kit.fontawesome.com/af562a2a63.js" crossorigin="anonymous"></script>

</head>

<body>

                    <?php

                    if(isset($_SESSION['status']))
                    {
                        ?>
                        <div class = "alert alert-sucess">
                            <h5><?= $_SESSION['status']; ?></h5>
                        </div>
                        <?php
                        unset($_SESSION['status']);
                    }

                    ?>
                    <div class="wrapper">
                        <div class="form-wrapper forgot-password">
                        
                        <form action="password-reset-code.php" method="post">
                            <h2>Forgot Password</h2>
                            <div class="input-group">
                                <input type="email" class="email" name="email"  required>
                                <label for="">Enter Your Email</label>
                            </div>
                            <button name = "password_reset_link" class="btn" type="submit">Send Password Reset Link</button>
                               
                        <div class="sign-link">
                    <p>Back to <a href="student-login.php" class="signIn-link">Login</a></p>
                </div>            
                    </div>    
                        </form>
                        
                    </div>
                </div>
            </div>
            
                
               
        </div>
    </section>

</body>

</html>