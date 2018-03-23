<?php
  session_start();
  /*here is session
  $_SESSION['username'] = $username;
  $_SESSION['password'] = $password;
  $_SESSION['name'] = $name;
  $_SESSION['age'] = $age;
  $_SESSION['gender'] = $gender;
  $_SESSION['weight'] = $weight;
  $_SESSION['height'] = $height;
  $_SESSION['program_id'] = $program_id;*/
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  unset($_SESSION['name']);
  unset($_SESSION['age']);
  unset($_SESSION['gender']);
  unset($_SESSION['weight']);
  unset($_SESSION['height']);
  unset($_SESSION['program_id']);
  header('Location: index.php');

 ?>
