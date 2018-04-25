<?php
// test chay ok


function hashSSHA($password) {

    $salt = sha1(rand());
    $salt = substr($salt, 0, 10);
    $encrypted = base64_encode(sha1($password . $salt, true) . $salt);
    $hash = array("salt" => $salt, "encrypted" => $encrypted);
    return $hash;
}


function checkhashSSHA($salt, $password) {

    $hash = base64_encode(sha1($password . $salt, true) . $salt);

    return $hash;
}

function storeUser($name, $trainer_id, $program_id, $password, $username, $age, $height, $weight, $gender){
    include 'connection.php';
    require_once('work_around_func.php');
    //echo $password."\n";

    $query = "INSERT INTO t_users (id, name, username, password, age, gender, weight, height, trainer_id, program_id)
    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn,$query);
    mysqli_stmt_bind_param($stmt, "sssisiiii", $name, $username, $password, $age, $gender, $weight, $height, $trainer_id, $program_id);

    if(mysqli_stmt_execute($stmt))
    {
        //echo "executed\n";
        $kq = TRUE;
    }
    mysqli_stmt_close($stmt);

    if($kq){
        //echo "co kq\n";
        $query = "SELECT * FROM t_users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $username);

        if(mysqli_stmt_execute($stmt)){
        $result = get_result($stmt);
        $user = $result[0];
        mysqli_stmt_close($stmt);
        }
        return $user;
    }
    else {
        return false;
    }
    mysqli_close($conn);
}


function isUserExisted($email) {
    include 'connection.php';
    require_once('work_around_func.php');
    $query = "SELECT * FROM t_users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);

    //if(mysqli_stmt_execute($stmt)) echo "existed executed\n";
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {
        // user existed
        mysqli_stmt_close($stmt);
        return true;
    } else {
        // user not existed
        mysqli_stmt_close($stmt);
        return false;
    }
    mysqli_close($conn);

}
function getUserByUsernameAndPassword($username, $password) {
    include 'connection.php';
    require_once('work_around_func.php');
    $query = "SELECT * FROM t_users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);

    if(mysqli_stmt_execute($stmt)){
        //echo " get executed";
        $result = get_result($stmt);
        $user = $result[0];
        mysqli_stmt_close($stmt);


        $saved_password = $user['password'];
        //verifying $passWord

        if($password == $saved_password){
            return $user;
        }
        else{
            return NULL;
        }


    }


    mysqli_close($conn);

}


function getUserByUsername($username) {
    include 'connection.php';
    require_once('work_around_func.php');
    $query = "SELECT * FROM t_users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);

    if(mysqli_stmt_execute($stmt)){
        //echo " get executed";
        $result = get_result($stmt);
        $user = $result[0];
        mysqli_stmt_close($stmt);

        return $user;


    }


    mysqli_close($conn);

}

function storeTracking($username, $weight, $noreps, $nosets, $date, $exercise){

    include 'connection.php';
    require_once('work_around_func.php');
    $user = getUserByUsername($username);
    $user_id = $user["id"];
    $trainer_id = $user["trainer_id"];
    //lay nosets de so sanh
    $query = "SELECT nosets FROM t_tracking WHERE user_id = ? AND exercise = ? ORDER BY id DESC LIMIT 1";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $exercise);
    if(mysqli_stmt_execute($stmt)){

        mysqli_stmt_store_result($stmt);
        $result = get_result($stmt);

    }
    if (mysqli_stmt_num_rows($stmt) > 0) {
        mysqli_stmt_close($stmt);
        $old_nosets = $result[0]["nosets"];
    } else {

        mysqli_stmt_close($stmt);
        $old_nosets = -1;
    }

    if($nosets == 1){
        if($old_nosets == 1) {
            $nosets = 0;
        }
        else {
            $nosets = 1;
        }
    }

    $query = "INSERT INTO t_tracking (id, date, nosets, noreps, weight, exercise, user_id, trainer_id)
    VALUES (NULL, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = mysqli_prepare($conn,$query);
    //prepared
    mysqli_stmt_bind_param($stmt, "siiisii",$date, $nosets, $noreps, $weight, $exercise, $user_id, $trainer_id);

    if(mysqli_stmt_execute($stmt))
    {
        //echo "executed\n";
        $kq = TRUE;
    }
    mysqli_stmt_close($stmt);

    if($kq){
        //echo "co kq\n";
        $query = "SELECT * FROM t_tracking WHERE user_id = ? AND exercise = ? AND date = ? ORDER BY id DESC LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "iss", $user_id, $exercise, $date);

        if(mysqli_stmt_execute($stmt)){
        $result = get_result($stmt);
        $track = $result[0];
        mysqli_stmt_close($stmt);
        }
        return $track;
    }
    else {
        return false;
    }
    mysqli_close($conn);
}


function getExerciseResult6Days($username, $exercise)
{
    include 'connection.php';
    require_once('work_around_func.php');
    $user = getUserByUsername($username);
    $user_id = $user["id"];
    $query = "SELECT weight, date FROM t_tracking WHERE user_id = ? AND exercise = ? ORDER BY id DESC LIMIT 6";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "is", $user_id, $exercise);
    if(mysqli_stmt_execute($stmt)){

        //echo "executed";
        mysqli_stmt_store_result($stmt);
        $result = get_result($stmt);
        for($i = 0; $i < 6; $i++){
            if($result[$i]["weight"] == NULL)
            $result[$i]["weight"] = -1;
            if($result[$i]["date"] == NULL)
            $result[$i]["date"] = "";

        }

    }
    if (mysqli_stmt_num_rows($stmt) > 0) {

        mysqli_stmt_close($stmt);
        return $result;

    } else {

        mysqli_stmt_close($stmt);
        return false;
    }
    mysqli_close($conn);
}
function getWorkoutByUsername($username){

    include 'connection.php';
    require_once('work_around_func.php');
    //get program_id from username
    $query = "SELECT program_id, weight, id FROM t_users WHERE username = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $username);
    if(mysqli_stmt_execute($stmt)){
    $result = get_result($stmt);
    $program_id = $result[0]["program_id"];
    $bodyweight = $result[0]["weight"];
    $user_id = $result[0]["id"];
    mysqli_stmt_close($stmt);
    }
    //get exercise_id from program_exercise
    $query = "SELECT exercise_id FROM t_program_exercise WHERE program_id = ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "i", $program_id);
    if(mysqli_stmt_execute($stmt)){
    $result = get_result($stmt);
    mysqli_stmt_close($stmt);
    }
    $noexercise = count($result);
    $exercise_ids = array();
    for($i = 0; $i < $noexercise; $i++){
        $exercise_ids[$i+1] = $result[$i]["exercise_id"];
    }
    //echo $exercise_ids["3"];
    //get exercise name from exercise id

    //echo "noexercises = ".$noexercise;
    $exercises = array();
    for($i = 0; $i < $noexercise; $i++){
        $query = "SELECT name FROM t_exercises WHERE id_exercise = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $exercise_ids[$i+1]);
        if(mysqli_stmt_execute($stmt)){
        $result = get_result($stmt);
        mysqli_stmt_close($stmt);
        }
        $exercises[$i+1] = $result[0]["name"];
    }
    //echo $exercises[2];
    //get weight theo exercise
    $weight = array();
    foreach($exercises as $exercise){
        $query = "SELECT weight, nosets FROM t_tracking WHERE exercise = ? AND user_id = ? ORDER BY id DESC LIMIT 1";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "si", $exercise, $user_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        $result = get_result($stmt);

        //mysqli_stmt_close($stmt);
    if (mysqli_stmt_num_rows($stmt) > 0) {

        $nosets = $result[0]["nosets"];
        if($nosets == 0){
            $weight[$exercise] = $result[0]["weight"] - 2;
        }
        else if($nosets == 1){
            $weight[$exercise] = $result[0]["weight"];
        }
        else {
            $weight[$exercise] = $result[0]["weight"] + 2;
        }
        mysqli_stmt_close($stmt);
    }
    else {
        if ($exercise == "Squat"){
            $weight[$exercise] = $bodyweight * 0.6;
        }
        if ($exercise == "Deadlift"){
            $weight[$exercise] = $bodyweight * 0.7;
        }
        if ($exercise == "Bench Press"){
            $weight[$exercise] = $bodyweight * 0.4;
        }
        if ($exercise == "Barbell Row"){
            $weight[$exercise] = $bodyweight * 0.4;
        }
        if ($exercise == "Overhead Press"){
            $weight[$exercise] = $bodyweight * 0.2;
        }

        mysqli_stmt_close($stmt);
    }
}
    /*foreach($weight as $w){
        echo $w." ";
    }
    echo " ".$weight["Deadlift"]." ";*/
    $workout = array();
    for($i = 0; $i < $noexercise; $i++){
        $workout[$i+1]["exercise"] = $exercises[$i+1];
        $workout[$i+1]["weight"] = $weight[$exercises[$i+1]];
    }
    //echo json_encode($workout);
    return $workout;
}








/*SELECT  `weight`
FROM  `t_tracking`
WHERE  `user_id` =9
AND  `exercise` =  'bench'
ORDER BY DATE DESC
LIMIT 2
*/
