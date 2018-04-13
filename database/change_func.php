<?php
  include_once 'db_inc.php';
  session_start();
  $old_pass=$_POST['old_pass'];
  $new_pass=$_POST['new_pass'];
  $new_pass2=$_POST['new_pass2'];
  if($old_pass == $_SESSION['password']){
    if($new_pass == $new_pass2){
      $sql = "UPDATE t_users SET password = ? WHERE id = '".$_SESSION['id']."'";
      $stmt = mysqli_stmt_init($conn);
      if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "SQL error";
        header("Location: ../changeinfo.php?change=error");
      }
      else {
        # code...
        mysqli_stmt_bind_param($stmt,"s",$new_pass);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        header("Location: ../index.php?success");
      }
    }
  }
  else header("Location: ../changeinfo.php?change=failed");
 ?>
