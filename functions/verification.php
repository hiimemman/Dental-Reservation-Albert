<?php
session_start();
require_once '../database/config.php';

if(isset($_POST['verify'])) {
    $email = $_POST['email'];
    $vkey = $_POST['verification_code'];

    $check = mysqli_query($conn, "SELECT * FROM tbl_user WHERE email = '$email'");

    if(mysqli_num_rows($check) > 0) {
        foreach($check as $row) {
            if($row['vkey'] == $vkey) {
                $update = mysqli_query($conn, "UPDATE tbl_user SET vkey = NULL, verified = '1' WHERE email = '$email'");

                if($update) {
                    echo 'success';
                }
            } else {
                echo 'invalid';
            }
        }
    } else {
        echo 'invalid email';
    }
}
?>