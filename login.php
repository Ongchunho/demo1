<?php
require_once("system/head.php");
?>
<br>
<?php
if(isset($_POST["user"]) && isset($_POST["password"])){
    if(empty($_POST["user"])){
        echo"xin vui lòng nhập tên tài khoản";
    }elseif(empty($_POST["password"])){
        echo"xin vui lòng nhập mật khẩu";
    }else{
        $user= $_POST["user"];
        $password= md5($_POST["password"]);
        $query= "SELECT * FROM member WHERE user='$user' AND pass= '$password'";
        $results= mysqli_query($mysqli,$query);
        if(mysqli_num_rows($results) == 1){
            $_SESSION['user']= $user;
            $_SESSION['pass']= $password;
            echo"dang nhap thành cong";
        } //mysqli_num_rows đếm só hàng số cột
    }
}
?>
<br>
<div class="card">
  <div class="card-body">
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">user </label>
        <input type="text" class="form-control" name="user">
      </div>
      <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button type="submit" class="btn btn-primary">đăng nhập</button>
    </form>
  </div>
</div>
<?php
require_once("system/end.php");
?>