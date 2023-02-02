<?php
require_once("system/head.php");
?>
<br>
<?php
if (isset($_POST["user"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["repassword"])) {
  if (empty($_POST["user"])) {
    echo "xin vui lòng nhap đầy đủ thông tin tên tài khoản";
  } elseif (empty($_POST["email"])) {
    echo "xin vui lòng nhap thông tin email";
  } elseif (empty($_POST["password"])) {
    echo "xi vui lòng nhập thông tin password";
  } elseif (empty($_POST["repassword"])) {
    echo "xin vui lòng nhập thông tin password";
  } elseif($_POST["password"] != $_POST["repassword"]){
    echo"mật khẩu không trùng nhau";
}else {
    $result = mysqli_query($mysqli, "SELECT COUNT(*) AS `user` FROM `member`");
    $row = mysqli_fetch_assoc($result);
    $count = $row['user'];
    $mai = mysqli_query($mysqli, "SELECT COUNT(*) AS `email` FROM `member`");
    $mai = mysqli_fetch_assoc($mai);
    $mai = $mai['email'];
    if($count>=1 && $mai >= 1){
      echo"tai khoản hoặc email đã tồn tại vui lòng đổi tên tài khoản hoặc email"; 
    }else{
      echo"dang kí thành công";
      $user = $_POST["user"];
      $email = $_POST["email"];
      $password = md5($_POST["password"]);
      mysqli_query($mysqli, "INSERT INTO `member`(`user`, `pass`, `email`) VALUES ('$user','$password','$email')");
    }
  }
}
?>
<div class="card">
  <div class="card-body">
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">user </label>
        <input type="text" class="form-control" name="user">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email </label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">rePassword</label>
        <input type="password" class="form-control" name="repassword">
      </div>
      <button type="submit" class="btn btn-primary">đăng kí</button>
    </form>
  </div>
</div>
<?php
require_once("system/end.php");
?>