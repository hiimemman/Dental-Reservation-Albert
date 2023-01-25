<?php
session_start();
require_once '../database/config.php';

if(isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    $delete = mysqli_query($conn, "DELETE FROM tbl_appointment WHERE appointment_id = $appointment_id");

    if($delete) {
        echo 'success';
    }
}