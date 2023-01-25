<?php
session_start();
require_once '../../database/config.php';

require '../../vendor/smsgatewayme/client/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Model\SendMessageRequest;

// GET VIEW
if (isset($_POST['appointment_id'])) {
    $appointment_id = $_POST['appointment_id'];

    $get_appointment = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $appointment_id");

    $result_array = array();
    foreach ($get_appointment as $row) {
        $result_array['appointment_id'] = $row['appointment_id'];
        $result_array['firstname'] = ucwords($row['firstname']);
        $result_array['lastname'] = ucwords($row['lastname']);
        $result_array['gender'] = $row['gender'];
        $result_array['age'] = $row['age'];
        $result_array['contact'] = $row['contact'];
        $result_array['appointment_date'] = $row['appointment_date'];
        $result_array['appointment_time'] = date('h:i A', strtotime($row['appointment_time']));
        $result_array['service'] = $row['service'];
        $result_array['reason'] = $row['reason'];
    }

    echo json_encode($result_array);
}