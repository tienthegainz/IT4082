<?php
// test chay ok


include 'DB_functions3.php';
//require_once('connection.php');
//require_once('work_around_func.php');



// json response array
$response = array("error" => FALSE);

if (isset($_POST['name']) && isset($_POST['trainer_id']) && isset($_POST['password']) && isset($_POST['username'])
&& isset($_POST['height']) && isset($_POST['gender']) && isset($_POST['age'])
&& isset($_POST['weight']) && isset($_POST['program_id'])) {

    // receiving the post params
    $r_name = $_POST['name'];
    $r_email = $_POST['email'];
    $r_password = $_POST['password'];
    $r_username = $_POST['username'];
    $r_age = $_POST['age'];
    $r_gender = $_POST['gender'];
    $r_weight = $_POST['weight'];
    $r_height = $_POST['height'];
    $r_trainer_id = $_POST['trainer_id'];
    $r_program_id = $_POST['program_id'];

    if (isUserExisted($r_email)) {
        // user already existed
        $response["error"] = TRUE;
        $response["error_msg"] = "User already existed with " . $r_email;
        echo json_encode($response);
    }

    else {
        echo "not existed";
        // create a new user
        $row = storeUser($r_name, $r_trainer_id, $r_program_id, $r_password, $r_username, $r_age, $r_height, $r_weight, $r_gender);
        if ($row != FALSE) {
            // user stored successfully
            $response["error"] = FALSE;
            $response["id"] = $row["id"];
            $response["user"]["name"] = $row["name"];
            $response["user"]["username"] = $row["username"];
            $response["user"]["age"] = $row["age"];
            $response["user"]["gender"] = $row["gender"];
            $response["user"]["height"] = $row["height"];
            $response["user"]["weight"] = $row["weight"];
            $response["user"]["program_id"] = $row["program_id"];
            $response["user"]["trainer_id"] = $row["trainer_id"];
            echo json_encode($response);
        } else {
            // user failed to store
            $response["error"] = TRUE;
            $response["error_msg"] = "Unknown error occurred in registration!";
            echo json_encode($response);
        }
    }
}
else {
    $response["error"] = TRUE;
    $response["error_msg"] = "Required parameters are missing!";
    echo json_encode($response);
}

//mysqli_close($conn);
?>
