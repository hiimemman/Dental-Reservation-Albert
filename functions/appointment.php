<?php
session_start();
require_once '../database/config.php';

require '../vendor/smsgatewayme/client/autoload.php';

use SMSGatewayMe\Client\ApiClient;
use SMSGatewayMe\Client\Api\MessageApi;
use SMSGatewayMe\Client\Configuration;
use SMSGatewayMe\Client\Model\SendMessageRequest;

if (isset($_POST['appoint'])) {
    $user_id = $_POST['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $phoneNumber = $_POST['phoneNumber'];
    $contact = '0' . $_POST['phoneNumber'];
    $email = $_POST['email'];
    $date = $_POST['date'];
    $services = implode(', ', $_POST['services']);
    $service_count = count($_POST['services']);
    $request = $conn -> real_escape_string($_POST['request']);

    $check_confirmed_count = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE appointment_date = '$date' AND status = 'CONFIRMED'");

    if (mysqli_num_rows($check_confirmed_count) >= 20) {
        echo 'full slot';
    } else {
        $check_pending = mysqli_query($conn, "SELECT * FROM tbl_appointment WHERE user_id = $user_id AND status = 'PENDING' AND appointment_date = '$date'");

        if (mysqli_num_rows($check_pending) == 1) {
            echo 'already set appointment';
        } else {
            if($service_count > 2) {
                echo '2 services only';
            } else {
                $insert = mysqli_query($conn, "INSERT INTO tbl_appointment (user_id, firstname, lastname, gender, age, contact, appointment_date, service, status, request ) VALUES ('$user_id', '$firstname', '$lastname', '$gender', '$age', '$phoneNumber', '$date', '$services', 'PENDING','$request')");

            if ($insert) {
                $config = Configuration::getDefaultConfiguration();
                $config->setApiKey('Authorization', 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJhZG1pbiIsImlhdCI6MTY1NTQ2MDQ5OSwiZXhwIjo0MTAyNDQ0ODAwLCJ1aWQiOjk1MTU3LCJyb2xlcyI6WyJST0xFX1VTRVIiXX0.8kYEkoHLAKaDqIU01UwicboSvKNRRXP79OFyQc5Px78');
                $apiClient = new ApiClient($config);
                $messageClient = new MessageApi($apiClient);

                $sendMessageRequest1 = new SendMessageRequest([
                    'phoneNumber' => $contact,
                    'message' => 'Good day, ' . $firstname . ' ' . $lastname . '!

Your appointment request is pending. Just wait for our confirmation. Thank you!

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
    }
}