<?php
	include_once 'db_inc.php';
  session_start();
  $user = $_POST['username'];
  $pass = $_POST['pass'];
  if(empty($user)||empty($pass))
    header("Location:../login.php?login=empty");
  else{
    $sql = "SELECT id,name,username,password,age,gender,weight,height,program_id FROM `t_users` WHERE username= ? AND password= ? ";
    //prepared statement for login
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
      header("Location: ../login.php?login=error&1");
    }
    else{
      mysqli_stmt_bind_param($stmt,"ss",$user,$pass);
      if(!mysqli_stmt_execute($stmt)){
        header("Location: ../login.php?login=error&2");
      }
      else {
        mysqli_stmt_store_result($stmt);
        if(mysqli_stmt_num_rows($stmt) !=1) {
          echo "SQL error";
          header("Location: ../login.php?login=notfound");
        }
        else {
          mysqli_stmt_bind_result($stmt,$id, $name,$username,$password,$age,$gender,$weight,$height,$program_id);
          mysqli_stmt_fetch($stmt);
					$_SESSION['id'] = $id;
          $_SESSION['username'] = $username;
          $_SESSION['password'] = $password;
          $_SESSION['name'] = $name;
          $_SESSION['age'] = $age;
          $_SESSION['gender'] = $gender;
          $_SESSION['weight'] = $weight;
          $_SESSION['height'] = $height;
          $_SESSION['program_id'] = $program_id;

          mysqli_stmt_close($stmt);
          header("Location: ../index.php?login=success"); //thanh cong
        }
      }
    }
  }
?>
