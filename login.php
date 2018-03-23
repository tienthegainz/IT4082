<?php
	include_once 'database/db_inc.php';
?>
<!doctype html>

<html>
<head>
<title>Login</title>
</head>
<body>
	<form action="database/login_func.php" method="post">
    Username:<input type="text" name="username" placeholder="At least 5 characters">
    <br>
    Password:<input type="password" name="pass" placeholder="Password">
    <br>
    <button type="submit" name="submit">Login</button>
		<br>
  </form>
  <h3>Not a HST member yet? </h3>
  <a href="signup.php">Signup for free</a><br>
  <?php

  if(!isset($_GET['login'])){
    exit();
  }
  else{
    $loginCheck=$_GET['login']; //take what after login
    if($loginCheck == "empty"){
      printf("Hay dien het thong tin\n");
    }
    else if($loginCheck == "error"){
      printf("Loi du lieu. Xin thu lai\n");
    }
    else if($loginCheck == "notfound"){
      printf("Khong tim thay tai khoan. Xin kiem tra lai\n");
    }
    else if($loginCheck == "success"){
      header("Location: index.php?login=success");
    }
  }

  ?>
</body>
</html>
