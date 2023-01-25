<?php
session_start();
require_once '../../database/config-pdo.php';

$admin_id = $_SESSION['admin_id'];

$column = array('firstname', 'lastname', 'contact', 'username', 'role');

$query = "SELECT * FROM tbl_admin WHERE admin_id != $admin_id";

if (isset($_POST['search']['value'])) {
    $query .= '
 AND (firstname LIKE "%' . $_POST['search']['value'] . '%"
 OR lastname LIKE "%' . $_POST['search']['value'] . '%"
 OR username LIKE "%' . $_POST['search']['value'] . '%"
 OR role LIKE "%' . $_POST['search']['value'] . '%" )
 ';
}

if (isset($_POST['order'])) {
    $query .= 'ORDER BY ' . $column[$_POST['order']['0']['column']] . ' ' . $_POST['order']['0']['dir'] . ' ';
} else {
    $query .= 'ORDER BY admin_id DESC ';
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
    $sub_array[] = $row['firstname'];
    $sub_array[] = $row['lastname'];
    $sub_array[] = $row['username'];
    $sub_array[] = $row['role'];
    $sub_array[] = '<button type="button" id="get_delete" data-id="'.$row['admin_id'].'" class="btn btn-danger"><i class="bi bi-trash3-fill"></i></button>';
    $data[] = $sub_array;
}

function count_all_data($connect)
{
    global $admin_id;
    $query = "SELECT * FROM tbl_admin WHERE admin_id != $admin_id";
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
