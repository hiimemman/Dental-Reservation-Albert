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
        $result_array['service'] = $row['service'];
        $result_array['request'] = $row['request'];
    }

    echo json_encode($result_array);
}

// UPDATE
if (isset($_POST['update_appointment'])) {
    $update_appointment_id = $_POST['update_appointment_id'];
    $update_status = $_POST['update_status'];
    $reason = $_POST['reason'];
    $update_reason = $_POST['update_reason'] ?? null;
    $update_appointment_time = $_POST['update_appointment_time' ?? null];

    if ($update_status == 'CONFIRMED') {
        $update = mysqli_query($conn, "UPDATE tbl_appointment SET status = '$update_status', appointment_time = '$update_appointment_time' WHERE appointment_id = $update_appointment_id");

        if ($update) {
            $get_info = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $update_appointment_id");

            $row = mysqli_fetch_array($get_info);

            $contact = '0'.$row['contact'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $date_time = date('F d, Y', strtotime($row['appointment_date'])) . ' ' . date('h:i A', strtotime($update_appointment_time));

            $config = Configuration::getDefaultConfiguration();
            $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY1NTQ2MDQ5OSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjk1MTU3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.8kYEkoHLAKaDqIU01UwicboSvKNRRXP79OFyQc5Px78');
            $apiClient = new ApiClient($config);
            $messageClient = new MessageApi($apiClient);

            $sendMessageRequest1 = new SendMessageRequest([
                'phoneNumber' => $contact,
                'message' => 'Good day, ' . $firstname . ' ' . $lastname . '!

Your appointment request has been confirmed.  

Appointment schedule: ' . $date_time . ' 

Thank you!

- Comia Dental Care',
                'deviceId' => 128701,
            ]);

            $sendMessages = $messageClient->sendMessages([
                $sendMessageRequest1,
            ]);

            if ($sendMessageRequest1) {
                echo 'success';
            }
        }
    } else {
        $update = mysqli_query($conn, "UPDATE tbl_appointment SET status = '$update_status', reason = '$update_reason', reason2='$reason' WHERE appointment_id = $update_appointment_id");

        if ($update) {
            $get_info = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_id = $update_appointment_id");

            $row = mysqli_fetch_array($get_info);

            $contact = '0'.$row['contact'];
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $date_time = date('F d, Y', strtotime($row['appointment_date'])) . ' ' . date('h:i A', strtotime($update_appointment_time));

            $config = Configuration::getDefaultConfiguration();
            $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY1NTQ2MDQ5OSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjk1MTU3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.8kYEkoHLAKaDqIU01UwicboSvKNRRXP79OFyQc5Px78');
            $apiClient = new ApiClient($config);
            $messageClient = new MessageApi($apiClient);

            $sendMessageRequest1 = new SendMessageRequest([
                'phoneNumber' => $contact,
                'message' => 'Good day, ' . $firstname . ' ' . $lastname . '!

Sorry, but your appointment request has been cancelled.

Reason: ' . $update_reason . '

- Comia Dental Care',
                'deviceId' => 128701,
            ]);

            $sendMessages = $messageClient->sendMessages([
                $sendMessageRequest1,
            ]);

            if ($sendMessageRequest1) {
                echo 'success';
            }
        }
    }
}
