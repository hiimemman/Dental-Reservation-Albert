<?php
session_start();
require_once '../database/config.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass_wo_hash = $_POST['password'];
    $password = md5($_POST['password']);

    $check = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND password = '$password' AND verified = '1'");

    if (mysqli_num_rows($check) == 1) {
        foreach ($check as $row) {
            if (isset($_POST['rem']) == 'checked') {
                setcookie('email', $email, time() + (86400 * 30), '/');
                setcookie('password', $pass_wo_hash, time() + (86400 * 30), '/');
            } else {
                setcookie('email', '');
                setcookie('password', '');
            }
            $user_id = $row['user_id'];
            $fname = $row['firstname'];
            $_SESSION['user_id'] = $user_id;
            $_SESSION['fname'] = $fname;
            echo 'success';
        }
    } else {
        echo 'invalid';
    }
}
