<?php
require_once("db.php");
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>Hello, world!</title>
</head>

<body>
  <div class="container">
    <?php
    if ($_SESSION['user']) {
      echo "thành công ";
      echo '<a href="logout.php">dang xuat</a>';
    } else {
    ?>
      <a href="red.php"> <button type="button" class="btn btn-lg btn-primary">đăng kí</button></a>
      <a href="login.php"> <button type="button" class="btn btn-secondary btn-lg">dăng nhập</button></a>
    <?php
    }
    ?>