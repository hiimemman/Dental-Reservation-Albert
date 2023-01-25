<?php
session_start();
require_once '../database/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if(isset($_POST['forgot_pass'])) {
    $mail = new PHPMAILER(true);
    $email = $_POST['email'];
    $otp = substr(number_format(time() * rand(), 0, '', ''), 0, 6);

    $check_if_email_exist = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND verified = '1'");

    if(mysqli_num_rows($check_if_email_exist) == 1) {
        //Enable verbose debug output
        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
        //Send using SMTP
        $mail->isSMTP();

        //Set the SMTP server to send through
        $mail->Host = 'smtp.gmail.com';

        //Enable SMTP authentication
        $mail->SMTPAuth = true;

        //SMTP username
        $mail->Username = 'comiadental@gmail.com';

        //SMTP password
        $mail->Password = 'bvtvgvwhmeazyvlx';

        //Enable TLS encryption;
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        $mail->Port = 587;

        //Recipients
        $mail->setFrom('comiadental@gmail.com', 'Comia Dental Care');

        //Add a recipient
        $mail->addAddress($email);

        //Set email format to HTML
        $mail->isHTML(true);

        $mail->Subject = 'Password reset OTP';
        $mail->Body    = '<p>Your OTP code is: <b style="font-size: 30px;">' . $otp . '</b></p>';

        $mail->send();

        $_SESSION['forgot_email'] = $email;
        $_SESSION['otp'] = $otp;
        $_SESSION['time'] = $_SERVER['REQUEST_TIME'];
        echo 'success';
    } else {
        echo 'invalid';
    }
}