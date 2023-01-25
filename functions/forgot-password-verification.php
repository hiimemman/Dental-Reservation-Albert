<?php
session_start();
require_once '../database/config.php';

if(isset($_POST['verify'])) {
    $email = $_POST['email'];
    $vkey = $_POST['verification_code'];
    $timestamp = $_SERVER['REQUEST_TIME'];

    if(($timestamp - $_SESSION['time']) > 60) {
        unset($_SESSION['otp']);
        echo 'expired';
    } else {
        if($_SESSION['forgot_email'] == $email) {
            if($_SESSION['otp'] == $vkey) {
                $_SESSION['change_pass_email'] = $email;
                echo 'success';
            } else {
                echo 'invalid otp';
            }
        } else {
            echo 'invalid email';
        }
    }
}
?>