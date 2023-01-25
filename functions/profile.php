<?php
session_start();
require_once '../database/config.php';

if (isset($_POST['update_profile_picture'])) {
    $image = $_FILES['profile_image']['name'];
    $image_tmp = $_FILES['profile_image']['tmp_name'];
    $old_image = $_POST['old_profile_pic'] ?? null;
    $user_id = $_POST['user_id'];

    $image_ext = explode('.', $image);
    $image_ext = strtolower(end($image_ext));

    $new_image_name = uniqid() . '.' . $image_ext;
    move_uploaded_file($image_tmp, '../assets/img/profile_image/' . $new_image_name);

    $update_profile = mysqli_query($conn, "UPDATE tbl_user SET profile_image = '$new_image_name' WHERE user_id = $user_id");

    if ($update_profile) {
        if ($old_image != 'profile.png') {
            if (file_exists('../assets/img/profile_image/' . $old_image)) {
                unlink('../assets/img/profile_image/' . $old_image);
            }
        }
        echo 'success';
    }
}

if (isset($_POST['delete_image'])) {
    $user_id = $_POST['user_id'];
    $old_image = $_POST['old_profile'];

    $update_image = mysqli_query($conn, "UPDATE tbl_user SET profile_image = 'profile.png' WHERE user_id = $user_id");

    if ($update_image) {
        if (file_exists('../assets/img/profile_image/' . $old_image)) {
            unlink('../assets/img/profile_image/' . $old_image);
        }
        echo 'success';
    }
}

if(isset($_POST['update_profile_details'])) {
    $user_id = $_POST['user_id'];
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $bday = $_POST['bday'];
    $old_pass = md5($_POST['old_pass']);
    $new_pass = $_POST['new_pass'] ?? null;
    $md5_pass = md5($new_pass);

    $get_account = mysqli_query($conn, "SELECT * FROM tbl_user WHERE user_id = $user_id");

    $row = mysqli_fetch_array($get_account);
    
    if($new_pass == '' || $new_pass == null ) {
        $password_db = $row['password'];

        if($old_pass == $password_db) {
            $check_email = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND user_id != $user_id AND verified = '1'");

            if(mysqli_num_rows($check_email) > 0) {
                echo 'email already used';
            } else {
                $update = mysqli_query($conn, "UPDATE tbl_user SET firstname = '$firstName', lastname = '$lastName', email = '$email', contact = '$phoneNumber', birthdate = '$bday' WHERE user_id = $user_id");

                if($update) {
                    echo 'success';
                }
            }
        } else {
            echo 'wrong password';
        }
    } else {
        $password_db = $row['password'];
        if($old_pass == $password_db) {
            $check_email = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email' AND user_id != $user_id AND verified = '1'");

            if(mysqli_num_rows($check_email) > 0) {
                echo 'email already used';
            } else {
                $update = mysqli_query($conn, "UPDATE tbl_user SET firstname = '$firstName', lastname = '$lastName', email = '$email', contact = '$phoneNumber', birthdate = '$bday', password = '$md5_pass' WHERE user_id = $user_id");

                if($update) {
                    echo 'success';
                }
            }
        } else {
            echo 'wrong password';
        }
    }
}