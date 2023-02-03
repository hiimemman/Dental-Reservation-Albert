<?php

try{
    include '../../database/config.php';
    $sql = mysqli_query($conn, "SELECT * FROM `tbl_legend`;");

    //store in result
    
    $result = mysqli_fetch_all($sql, MYSQLI_ASSOC);
    
    exit(json_encode(array("requestStatus"=>'success', "data" => $result)));
}catch(Exception $e){
    exit(json_encode(array("requestStatus"=>'error', "data" => $e->getMessage())));
}


?>