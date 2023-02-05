<?php 
include '../database/config.php';

$id=$_GET['appointment_id'];
$status = $_GET['isStatus'];
$query = "UPDATE tbl_appointment SET isStatus = $status WHERE appointment_id=$id";

mysqli_query($conn, $query);

header('location:records.php');

?>

<?php include './components/component-bottom.php'; ?>