<?php
//test chay ok
// nhan ket qua tap luyen va luu vao database

include 'DB_functions3.php';
$response = array("error" => FALSE);
if (isset($_POST['username']) && isset($_POST['weight']) /*&& isset($_POST['noreps']) */&& isset($_POST['nosets'])
    && isset($_POST['date']) && isset($_POST['exercise'])) {

    $t_username = $_POST['username'];
    $t_weight = $_POST['weight'];
    $t_noreps = /*$_POST['noreps']*/ 0;
    $t_nosets = $_POST['nosets'];
    $t_date = $_POST['date'];
    $t_exercise = $_POST['exercise'];
    //echo $t_username;
    $track = storeTracking($t_username, $t_weight, $t_noreps, $t_nosets, $t_date, $t_exercise);
    if($track != FALSE){
        $response["error"] = FALSE;
        $response["id"] = $track["id"];
        $response["user"]["id"] = $track["user_id"];
        $response["user"]["username"] = $track["username"];
        $response["user"]["weight"] = $track["weight"];
        $response["user"]["trainer_id"] = $track["trainer_id"];
        echo json_encode($response);
    } else {
        // user failed to store
        $response["error"] = TRUE;
        $response["error_msg"] = "Unknown error occurred in registration!";
        echo json_encode($response);
    }
    }


else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}

?>
