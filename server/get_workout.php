<?php
//test chay ok
//nhan username va tra lai cac bai tap va muc ta

include 'DB_functions3.php';
$response = array();
//$t_username = "captain america";
//getWorkoutByUsername($t_username);
if (isset($_POST['username'])) {
    $t_username = $_POST['username'];
    $response = getWorkoutByUsername($t_username);
    $response["error"] = false;
    echo json_encode($response);
}


else {
$response["error"] = TRUE;
$response["error_msg"] = "Required parameters are missing!";
echo json_encode($response);
}

?>
