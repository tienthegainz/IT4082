<?php
  include_once 'db_inc.php';

  //post all info into param
  $name = $_POST['fullname'];
  $user = $_POST['username'];
  $pass = $_POST['pass'];
  $pass1= $_POST['pass1'];
  $age = $_POST['age'];
  $gender = $_POST['gender'];
  $weight = $_POST['weight'];
  $height = $_POST['height'];
  $coach = $_POST['coach'];
  $program = $_POST['program'];
  //error handling
  if(empty($name) || empty($user) || empty($pass) || empty($age) || empty($weight) || empty($height)){
    header("Location: ../index.php?signup=empty&name=$name&user=$user&age=$age&weight=$weight&height=$height"); //failed
  }
  else if(!preg_match("/^[a-z A-Z]*$/",$name)){
    header("Location: ../index.php?signup=char&user=$user&age=$age&weight=$weight&height=$height");
  }
  else if(strlen($user)<5){
    header("Location: ../index.php?signup=user&name=$name&age=$age&weight=$weight&height=$height"); //failed
  }
  else if($pass != $pass1){
    header("Location: ../index.php?signup=pass&name=$name&user=$user&age=$age&weight=$weight&height=$height");
  }
  else{
    $sql= "INSERT INTO t_users (name, username, password, age, gender, weight, height,trainer_id,program_id)
    VALUES (?,?,?,?,?,?,?,?,?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      echo "SQL error";
      header("Location: ../index.php?signup=failed");
    }
    else{
      mysqli_stmt_bind_param($stmt,"sssisiiii",$name,$user,$pass,$age,$gender,$weight,$height,$coach,$program);
      mysqli_stmt_execute($stmt);
      header("Location: ../index.php?signup=success"); //thanh cong
    }
  }
