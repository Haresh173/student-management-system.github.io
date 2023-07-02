<?php
session_start();
include('dbcon.php');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

function sendemail_verify($name, $email, $verify_token)
{
    $mail = new PHPMailer(true);

    // $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
    $mail->isSMTP();
    $mail->SMTPAuth   = true;    
                                            //Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                                       //Enable SMTP authentication
    $mail->Username   = 'harcnv22@gmail.com';                     //SMTP username
    $mail->Password   = 'Hcnvaa22*';                               //SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
    $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

    //Recipients
    $mail->setFrom('harcnv22@gmail.com', $name);
    $mail->addAddress($email);     //Add a recipient

    //Content
    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Email Verification of Direct Entry System';
    
    $email_template = "
        <h2>You have registered for Direct Entry System</h2>
        <h4>Verify your email address to login with the below given link</h4>
        <br><br/>
        <a href = http://localhost/DESYSTEM_ION/verify-email.php?token=$verify_token> Click here </a>";

    $mail->Body = $email_template;
    $mail->send();
    echo 'Message has been sent';
} 

if(isset($_POST['register_btn']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $verify_token = md5(random_int(5,10));

    $check_email_query = "SELECT email FROM student_signup WHERE email=$email";
    $check_email_query_run = mysqli_query($conn, $check_email_query );

    if(mysqli_num_rows($check_email_query_run) > 0)
    {
        $_SESSION['status'] = "Email already exists";
        header("Location: signup.php");

    }
    else
    {
        $query = "INSERT INTO student_signup (name, email, password, confirm_password, verify_token) VALUES ('$name', '$email', '$password', '$confirm_password', '$verify_token') ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            sendemail_verify("$name", "$email", "$verify_token");

            $_SESSION['status'] = "Registration Successful";
            header("Location: signup.php");
        }
        else
        {
            $_SESSION['status'] = "Registration Failed";
            header("Location: signup.php");
        }

    }

}

?>