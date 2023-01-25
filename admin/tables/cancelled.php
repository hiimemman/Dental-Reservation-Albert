<?php
require_once '../../database/config-pdo.php';

$column = array('appointment_id', 'firstname', 'lastname', 'date_completed', 'payment');

$query = "SELECT * FROM tbl_appointment WHERE status = 'CANCELLED'";

if($_POST["is_date_search"] == "yes")
{
 $query .= 'AND date_completed BETWEEN "'.$_POST["start_date"].'" AND "'.$_POST["end_date"].'" ';
}

if (isset($_POST['search']['value'])) {
    $query .= '
 AND (appointment_id LIKE "%' . $_POST['search']['value'] . '%"
 OR firstname LIKE "%' . $_POST['search']['value'] . '%"
 OR lastname LIKE "%' . $_POST['search']['value'] . '%"
 OR reason LIKE "%' . $_POST['search']['value'] . '%"
 OR reason2 LIKE "%' . $_POST['search']['value'] . '%"
 OR appointment_date LIKE "%' . $_POST['search']['value'] . '%" )
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

$total_sales = 0;

foreach ($result as $row) {
    $sub_array = array();
    $sub_array[] = $row['appointment_id'];
    $sub_array[] = ucwords($row['firstname']);
    $sub_array[] = ucwords($row['lastname']);
    $sub_array[] = $row['reason2'].'<br>'.$row['reason'];
    $sub_array[] = $row['appointment_date'];
   
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    $query = "SELECT * FROM tbl_appointment WHERE status = 'COMPLETED'";
    $statement = $connect->prepare($query);
    $statement->execute();
    return $statement->rowCount();
}

$output = array(
    'draw' => intval($_POST['draw']),
    'recordsTotal' => count_all_data($connect),
    'recordsFiltered' => $number_filter_row,
    'data' => $data,
    'total'    => number_format($total_sales, 2)
);

echo json_encode($output);