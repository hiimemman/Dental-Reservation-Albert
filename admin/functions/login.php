<?php
session_start();
require_once '../../database/config.php';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = md5($_POST['password']);


    $check = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'");
    $row = mysqli_fetch_array($check); 

    $role = $row['role'];

    if ($role == 'DENTIST') {
        if (mysqli_num_rows($check) == 1) {
            foreach ($check as $row) {
                $admin_id = $row['admin_id'];
                $username = $row['username'];
                $role = $row['role'];
                $clinic = $row['clinic'];
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                echo 'success';
            }
        } else {
            echo 'invalid';
        }
    } else {
        $check = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password' AND role = '$role'");

        if (mysqli_num_rows($check) == 1) {
            foreach ($check as $row) {
                $admin_id = $row['admin_id'];
                $username = $row['username'];
                $role = $row['role'];
                $_SESSION['admin_id'] = $admin_id;
                $_SESSION['username'] = $username;
                $_SESSION['role'] = $role;
                echo 'success';
            }
        } else {
            echo 'invalid';
        }
    }
}
