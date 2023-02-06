<?php
include '../../database/config.php';
$appointment_id = $_POST['id'];
try{
   
    $sql = mysqli_query($conn, " SELECT * FROM `tbl_appointment` WHERE `tbl_appointment`.`appointment_id` = $appointment_id;");

    //store in result
    
    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    
    exit(json_encode(array("requestStatus"=>'success', "data" => $result)));
}catch(Exception $e){
    exit(json_encode(array("requestStatus"=>'error', "data" => $e->getMessage())));
}


?>