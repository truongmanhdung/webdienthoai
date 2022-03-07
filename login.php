<?php
include 'db.php';
include 'header.php';
?>

<div class="login_regeter">
  <div class="login_body">
    <h1 class="text-center">Login</h1>
    <p class="text-center color-red mb-4">Hãy đăng nhập để nhận những ưu đãi hấp dẫn từ cửa hàng!!!</p>
    <form method="post" action="">
      <div class="mb-3">
        <input type="email" name="email" placeholder="Email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
      </div>
      <div class="mb-3">
        <input type="password" placeholder="Password" required name="password" class="form-control" id="exampleInputPassword1">
      </div>
      <button type="submit" name="login" class="btn btn-dark text-white">Login</button>
    </form>
  </div>
</div>
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $pass = md5($_POST['password']);
  $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $password = $row['password'];
      $check = $row['admin'];
      if ($password == $pass) {
        setcookie('user', $email, time() + (86400 * 30), "/");
        if($check == 1){
          header("location: ./admin/light-bootstrap-dashboard-master/examples/category.php?q=category");
        }
        else{
          header("location: index.php");
        }
      } else {
        echo '<div class="alert alert-danger" role="alert">
                    Password không chính xác, vui lòng nhập lại!!!
                </div>';
      }
    }
  } else {
    echo '<div class="alert alert-danger" role="alert">
                  Email không chính xác, vui lòng nhập lại!!!
              </div>';
  }
}
?>
<?php
include 'footer.php';
?>