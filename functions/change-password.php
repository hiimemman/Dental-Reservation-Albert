<?php
session_start();
require_once '../database/config.php';

if (isset($_POST['change_pass'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $check_if_email_exist = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND verified = '1'");

    if(mysqli_num_rows($check_if_email_exist) == 1) {
        $update = mysqli_query($conn, "UPDATE tbl_user SET password = '$password' WHERE email = '$email'");

        if($update) {
            echo 'success';
        }
    } else {
        echo 'invalid';
    }
}
