<?php
session_start();
require_once '../database/config-pdo.php';

$user_id = $_SESSION['user_id'];

$column = array('appointment_id', 'firstname', 'lastname', 'appointment_date', 'status');

$query = "SELECT * FROM tbl_appointment WHERE user_id = $user_id AND status != 'COMPLETED' ";

if (isset($_POST['search']['value'])) {
    $query .= '
 AND (appointment_id LIKE "%' . $_POST['search']['value'] . '%"
 OR firstname LIKE "%' . $_POST['search']['value'] . '%"
 OR lastname LIKE "%' . $_POST['search']['value'] . '%"
 OR appointment_date LIKE "%' . $_POST['search']['value'] . '%"
 OR status LIKE "%' . $_POST['search']['value'] . '%" )
 ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY appointment_date DESC ';
}

$query1 = '';

if ($_POST['length'] != -1) {
    $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $connect->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $connect->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach ($result as $row) {
    $cancel_btn = '';

    if($row['status'] != 'CONFIRMED') {
        $cancel_btn = '<a href="my-appointment.php?appointment_id='.$row['appointment_id'].'" id="get_cancel" data-id="'.$row['appointment_id'].'" class="btn btn-danger"><i class="bi bi-trash3"></i></a>';
    }
    $sub_array = array();
    $sub_array[] = '#'.$row['appointment_id'];
    $sub_array[] = $row['firstname'];
    $sub_array[] = $row['lastname'];
    $sub_array[] = date('M d, Y', strtotime($row['appointment_date']));
    $sub_array[] = $row['status'];
    $sub_array[] = '<div class="d-flex gap-1">
    <a href="my-appointment.php?appointment_id='.$row['appointment_id'].'" id="get_view" data-id="'.$row['appointment_id'].'" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>'. $cancel_btn .'
    </div>';
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM tbl_appointment WHERE user_id = $user_id AND status != 'COMPLETED'";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
);

echo json_encode($output);
