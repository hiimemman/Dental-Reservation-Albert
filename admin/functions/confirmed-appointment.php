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
    }

    echo json_encode($result_array);
}

// UPDATE
if (isset($_POST['update_appointment'])) {
    $update_appointment_id = $_POST['update_appointment_id'];
    $update_status = $_POST['update_status'];
    $update_reason = $_POST['update_reason'] ?? null;
    $update_description = $_POST['update_description'] ?? null;
    $update_price = $_POST['update_price'] ?? null;
    $update_dentist = $_POST['update_dentist'] ?? null;
    $update_date_completed = date('Y-m-d');
    $update_time_completed = date('H:i:s');

    $reason2 = $_POST['reason'];

  

    if ($update_status == 'COMPLETED') {
        $services = implode(', ', $_POST['services']);
        $ser = implode(' ',$_POST['ser']);
        $diagram = $services .' - '.$ser;


        $update = mysqli_query($conn, "UPDATE tbl_appointment SET status = '$update_status', payment = '$update_price', description = '$update_description', date_completed = '$update_date_completed', time_completed = '$update_time_completed', dentist = '$update_dentist', diagram = '$diagram' WHERE appointment_id = $update_appointment_id");

        if ($update) {
            echo 'success';
        }
    } else {
        $update = mysqli_query($conn, "UPDATE tbl_appointment SET status = '$update_status', reason = '$update_reason', reason2 = '$reason2' WHERE appointment_id = $update_appointment_id");

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
