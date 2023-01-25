<?php
session_start();
require_once '../database/config.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require '../vendor/autoload.php';

if(isset($_POST['register'])) {
    $mail = new PHPMAILER(true);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $bday = $_POST['bday'];
    $contact = $_POST['contact'];
    $email = $_POST['email'];
    $password = md5($_POST['pass1']);
    $profile_image = "profile.png";

    $check_if_exist = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email'");

    if(mysqli_num_rows($check_if_exist) > 0) {
        foreach($check_if_exist as $get_info) {
            if($get_info['verified'] == '' || $get_info['verified'] == NULL) {
                $delete = mysqli_query($conn, "DELETE FROM tbl_user WHERE email = '$email'");

                if($delete) {
                    try {
                        //Enable verbose debug output
                        $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
             
                        //Send using SMTP
                        $mail->isSMTP();
             
                        //Set the SMTP server to send through
                        $mail->Host = 'smtp.gmail.com';
             
                        //Enable SMTP authentication
                        $mail->SMTPAuth = true;
             
                        //SMTP username
                        $mail->Username = 'comiadentalcare@gmail.com';
             
                        //SMTP password
                        $mail->Password = 'zwhnafdmmhfcbtrp';
             
                        //Enable TLS encryption;
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
             
                        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
                        $mail->Port = 587;
             
                        //Recipients
                        $mail->setFrom('comiadentalcare@gmail.com', 'Comia Dental Care');
             
                        //Add a recipient
                        $mail->addAddress($email, $fname . ' ' . $lname);
             
                        //Set email format to HTML
                        $mail->isHTML(true);
             
                        $vkey = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
             
                        $mail->Subject = 'Email verification';
                        $mail->Body    = '<center><h1 style="font-weight: bold;">COMIA DENTAL CARE	&#174;</h1><h3 style="color: black;">Hi, '.$fname.' '.$lname.'!</h3><p style="color: black;">Thanks for using Comia Dental Care Website,<br>Use this OTP to complete your Sign up procedure and verify your account on Comia Dental Care.</p><p style="color: black;">Remember, never share this OTP to anyone.</p><b style="font-size: 30px;">' . $vkey . '</b><p><strong>- Comia Dental Care</strong></p></center>';
             
                        $mail->send();
             
                        // insert in users table
                        $insert = mysqli_query($conn, "INSERT INTO tbl_user (firstname, lastname, contact, email, password, vkey, birthdate, profile_image) VALUES ('$fname', '$lname', '$contact', '$email', '$password', '$vkey', '$bday', '$profile_image')");
        
                        if($insert) {
                            $_SESSION['email'] = $email;
                            echo 'verification.php';
                        }
                        exit();
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                }
            } else {
                echo 'email already used';
            }
        }
    } else {
        try {
            //Enable verbose debug output
            $mail->SMTPDebug = 0;//SMTP::DEBUG_SERVER;
 
            //Send using SMTP
            $mail->isSMTP();
 
            //Set the SMTP server to send through
            $mail->Host = 'smtp.gmail.com';
 
            //Enable SMTP authentication
            $mail->SMTPAuth = true;
 
            //SMTP username
            $mail->Username = 'comiadentalcare@gmail.com';
 
            //SMTP password
            $mail->Password = 'zwhnafdmmhfcbtrp';
 
            //Enable TLS encryption;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
 
            //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
            $mail->Port = 587;
 
            //Recipients
            $mail->setFrom('comiadentalcare@gmail.com', 'Comia Dental Care');
 
            //Add a recipient
            $mail->addAddress($email, $fname . ' ' . $lname);
 
            //Set email format to HTML
            $mail->isHTML(true);
 
            $vkey = substr(number_format(time() * rand(), 0, '', ''), 0, 6);
 
            $mail->Subject = 'Email verification';
            $mail->Body    = '<center><h1 style="font-weight: bold;">COMIA DENTAL CARE	&#174;</h1><h3 style="color: black;">Hi, '.$fname.' '.$lname.'!</h3><p style="color: black;">Thanks for using Comia Dental Care Website,<br>Use this OTP to complete your Sign up procedure and verify your account on Comia Dental Care.</p><p style="color: black;">Remember, never share this OTP to anyone.</p><b style="font-size: 30px;">' . $vkey . '</b><p><strong>- Comia Dental Care</strong></p></center>';
 
            $mail->send();
 
            // insert in users table
            $insert = mysqli_query($conn, "INSERT INTO tbl_user (firstname, lastname, contact, email, password, vkey, birthdate, profile_image) VALUES ('$fname', '$lname', '$contact', '$email', '$password', '$vkey', '$bday', '$profile_image')");

            if($insert) {
                $_SESSION['email'] = $email;
                echo 'verification.php?email='.$email;
            }
            exit();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
?>