<?php
  include_once 'database/db_inc.php';
  session_start();
  echo 'Thong tin ca nhan<br>';
  echo 'Ten tai khoan:'.$_SESSION['username'].'<br>';
  echo 'Ten nguoi dung: '.$_SESSION['name'].'<a href="#"><Thay doi></a><br>';
  echo 'Mat khau:******** <a href="changeinfo_pass.php">Thay doi</a><br>';
  echo 'Chieu cao:'.$_SESSION['height'].'(cm) <a href="#"><Thay doi></a><br>';
  echo 'Can nang:'.$_SESSION['weight'].'(kg) <a href="#"><Thay doi></a><br>';
 ?>
