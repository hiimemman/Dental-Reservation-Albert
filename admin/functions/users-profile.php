<?php
session_start();
require_once '../../database/config.php';

// UPDATE IMAGE
if (isset($_POST['update_profile_picture'])) {
    $image = $_FILES['profile_image']['name'];
    $image_tmp = $_FILES['profile_image']['tmp_name'];
    $old_image = $_POST['old_profile_pic'] ?? null;
    $admin_id = $_POST['admin_id'];

    $image_ext = explode('.', $image);
    $image_ext = strtolower(end($image_ext));

    $new_image_name = uniqid() . '.' . $image_ext;
    move_uploaded_file($image_tmp, '../assets/img/profile_image/' . $new_image_name);

    $update_profile = mysqli_query($conn, "UPDATE tbl_admin SET profile_image = '$new_image_name' WHERE admin_id = $admin_id");

    if ($update_profile) {
        if ($old_image != 'profile.png') {
            if (file_exists('../assets/img/profile_image/' . $old_image)) {
                unlink('../assets/img/profile_image/' . $old_image);
            }
        }
        echo 'success';
    }
}

// DELETE IMAGE
if (isset($_POST['delete_image'])) {
    $admin_id = $_POST['admin_id'];
    $old_image = $_POST['old_profile'];

    $update_image = mysqli_query($conn, "UPDATE tbl_admin SET profile_image = 'profile.png' WHERE admin_id = $admin_id");

    if ($update_image) {
        if (file_exists('../assets/img/profile_image/' . $old_image)) {
            unlink('../assets/img/profile_image/' . $old_image);
        }
        echo 'success';
    }
}

// UPDATE ACCOUNT
if(isset($_POST['update_profile_details'])) {
    $admin_id = $_POST['admin_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $old_pass = md5($_POST['old_pass']);
    $new_pass = $_POST['new_pass'] ?? null;
    $md5_pass = md5($new_pass);

    $get_account = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE admin_id = $admin_id AND role = '$role'");

    $row = mysqli_fetch_array($get_account);
    
    if($new_pass == '' || $new_pass == null ) {
        $password_db = $row['password'];

        if($old_pass == $password_db) {
            $check_username = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username' AND admin_id != $admin_id AND role = '$role'");

            if(mysqli_num_rows($check_username) > 0) {
                echo 'username already used';
            } else {
                $update = mysqli_query($conn, "UPDATE tbl_admin SET firstname = '$firstname', lastname = '$lastname', username = '$username' WHERE admin_id = $admin_id");

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
            $check_username = mysqli_query($conn, "SELECT * FROM tbl_admin WHERE username = '$username' AND admin_id != $admin_id AND role = '$role'");

            if(mysqli_num_rows($check_username) > 0) {
                echo 'username already used';
            } else {
                $update = mysqli_query($conn, "UPDATE tbl_admin SET firstname = '$firstname', lastname = '$lastname', username = '$username', password = '$md5_pass' WHERE admin_id = $admin_id AND role = '$role'");

                if($update) {
                    echo 'success';
                }
            }
        } else {
            echo 'wrong password';
        }
    }
}