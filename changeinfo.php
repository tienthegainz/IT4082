<!doctype html>

<html>
<head>
<title>Private info</title>
</head>
<body>
  <h2>Thong tin cua ban an toan voi chung toi</h2>
  <?php
    session_start();
    echo 'Xin chao '.$_SESSION['username'].'</br>';
    echo '
    <form action="database/change_func.php" method="post">
      Mat khau:<input type="password" name="old_pass" placeholder="Password">
      <br>
      Mat khau moi:<input type="password" name="new_pass" placeholder="Password">
      <br>
      Nhap lai mat khau:<input type="password" name="new_pass2" placeholder="Password">
      <br>
      <button type="submit" name="submit">Thay doi</button>
      <br>
    </form>
    ';
    if(!isset($_GET['change'])){
      exit();
    }
    else{
      $loginCheck=$_GET['change']; //take what after login
      if($loginCheck == "error"){
        printf("Loi du lieu. Xin thu lai\n");
      }
      else if($loginCheck == "failed"){
        printf("Nhap lieu sai. Xin kiem tra lai\n");
      }
    }
   ?>
</body>
</html>
