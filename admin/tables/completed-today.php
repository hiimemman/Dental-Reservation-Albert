<?php
require_once '../../database/config-pdo.php';

$current_date = date('Y-m-d');

$column = array('appointment_id', 'firstname', 'lastname',  'dentist', 'service', 'description', 'payment', 'date_completed');

$query = "SELECT * from tbl_appointment WHERE status = 'COMPLETED' AND date_completed = '$current_date'";

if (isset($_POST['search']['value'])) {
    $query .= '
 AND (appointment_id LIKE "%' . $_POST['search']['value'] . '%"
 OR firstname LIKE "%' . $_POST['search']['value'] . '%"
 OR lastname LIKE "%' . $_POST['search']['value'] . '%"
 OR dentist LIKE "%' . $_POST['search']['value'] . '%"
 OR service LIKE "%' . $_POST['search']['value'] . '%"
 OR description LIKE "%' . $_POST['search']['value'] . '%"
 OR payment LIKE "%' . $_POST['search']['value'] . '%"
 OR date_completed LIKE "%' . $_POST['search']['value'] . '%" )
 ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY tbl_appointment.appointment_id DESC ';
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
    $sub_array = array();
    $sub_array[] = $row['appointment_id'];
    $sub_array[] = ucwords($row['firstname']);
    $sub_array[] = ucwords($row['lastname']);
    $sub_array[] = ucwords($row['dentist']);
    $sub_array[] = $row['service'];
    $sub_array[] = $row['description'];
    $sub_array[] = $row['payment'];
    $sub_array[] = date('F d, Y', strtotime($row['date_completed'])) . ' ' . date('h:i A', strtotime($row['time_completed']));
    $sub_array[] = '
    <div class="d-flex flex-row gap-1">
        <a href="view-records.php?id='.$row['appointment_id'].'" type="button" id="get_view" data-id="'.$row['appointment_id'].'" class="btn btn-primary"><i class="bi bi-eye-fill"></i></a>
    </div>
    ';
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    global $current_date;
    $query = "SELECT * from tbl_appointment WHERE status = 'COMPLETED' AND date_completed = '$current_date'";
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