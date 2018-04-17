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
  unset($_SESSION['id']);
  unset($_SESSION['username']);
  unset($_SESSION['password']);
  unset($_SESSION['name']);
  unset($_SESSION['age']);
  unset($_SESSION['gender']);
  unset($_SESSION['weight']);
  unset($_SESSION['height']);
  unset($_SESSION['program_id']);
  unset($_SESSION['carb']);
  unset($_SESSION['check']);
  unset($_SESSION['w1']);
  unset($_SESSION['s1']);
  unset($_SESSION['w2']);
  unset($_SESSION['s2']);
  unset($_SESSION['w3']);
  unset($_SESSION['s3']);
  header('Location: index.php');

 ?>
