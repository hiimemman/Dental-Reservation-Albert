<?php
session_start();
require_once '../../database/config-pdo.php';

$column = array('appointment_id', 'firstname', 'lastname', 'appointment_date', 'service');

$query = "SELECT * FROM tbl_appointment WHERE status = 'CONFIRMED'";

if (isset($_POST['search']['value'])) {
    $query .= '
 AND (appointment_id LIKE "%' . $_POST['search']['value'] . '%"
 OR firstname LIKE "%' . $_POST['search']['value'] . '%"
 OR lastname LIKE "%' . $_POST['search']['value'] . '%"
 OR appointment_date LIKE "%' . $_POST['search']['value'] . '%"
 OR appointment_time LIKE "%' . $_POST['search']['value'] . '%"
 OR service LIKE "%' . $_POST['search']['value'] . '%"
 OR dentist LIKE "%' . $_POST['search']['value'] . '%" )
 ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY appointment_id DESC ';
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
    $update = '<button type="button" id="get_update" data-id="'.$row['appointment_id'].'" class="btn btn-success">UPDATE</button>';
    $sub_array = array();
    $sub_array[] = '#'.$row['appointment_id'];
    $sub_array[] = ucwords($row['firstname']);
    $sub_array[] = ucwords($row['lastname']);
    $sub_array[] = date('F d, Y', strtotime($row['appointment_date'])) . ' ' . date('g:i A', strtotime($row['appointment_time']));
    $sub_array[] = $row['service'];
    $sub_array[] = '
    <div class="d-flex flex-row gap-1">
        <button type="button" id="get_view" data-id="'.$row['appointment_id'].'" class="btn btn-primary"><i class="bi bi-eye-fill"></i></button>'. $update .'
    </div>
    ';
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tbl_appointment WHERE status = 'CONFIRMED'";
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
