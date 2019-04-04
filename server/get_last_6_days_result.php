<?php
//test chay ok
//nhan username va exercise tra lai weight 6 ngay gan nhat

include 'DB_functions3.php';
$response = array("error" => FALSE);

if (isset($_POST['username']) && isset($_POST['exercise'])) {
        $t_username = $_POST['username'];
        $t_exercise = $_POST['exercise'];
        //echo $t_exercise;
        $day = getExerciseResult6Days($t_username, $t_exercise);
        if($day != FALSE){
            $response["error"] = FALSE;
            //$response["id"] = $day["id"];
            $response["day1"]["weight"] = $day[0]["weight"];
            $response["day1"]["date"] = $day[0]["date"];
            $response["day2"]["weight"] = $day[1]["weight"];
            $response["day2"]["date"] = $day[1]["date"];
            $response["day3"]["weight"] = $day[2]["weight"];
            $response["day3"]["date"] = $day[2]["date"];
            $response["day4"]["weight"] = $day[3]["weight"];
            $response["day4"]["date"] = $day[3]["date"];
            $response["day5"]["weight"] = $day[4]["weight"];
            $response["day5"]["date"] = $day[4]["date"];
            $response["day6"]["weight"] = $day[5]["weight"];
            $response["day6"]["date"] = $day[5]["date"];
            $response["nodays"] = 6;
            for($i = 0; $i < 6; $i++) {
                if($day[$i]["weight"] == -1)
                    $response["nodays"] --;
            }
            echo json_encode($response);
        }
     else {
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
