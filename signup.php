<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<div class="login_regeter">
    <div class="login_body">
        <h1 class="text-center">Sign Up</h1>
        <p class="text-center color-red mb-4">Đăng kí ngay để nhận rất nhiều ưu đãi nào!!!</p>
        <form method="post" action="">
            <div class="mb-3">
                <input type="name" name="user_name" placeholder="User Name" required class="form-control" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <input type="email" name="email" placeholder="Email" required class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <input type="password"  placeholder="Password" required name="password" class="form-control" id="exampleInputPassword1">
            </div>
            <button type="submit" name="signup" class="btn btn-dark text-white">Sign Up</button>
        </form>
    </div>
    <?php
    if (isset($_POST['signup'])) {
        $email = $_POST['email'];
        $sql = "SELECT * FROM users WHERE `email` = '$email'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            echo '<div class="alert alert-danger" role="alert">
            Email này đã được đăng kí, vui lòng đăng nhập
          </div>';
        }else{
            $user_name = $_POST['user_name'];
            $password = md5($_POST['password']);
            $email = $_POST['email'];
            setcookie('user',$email,time() + (86400 * 30), "/");
            $sql1 = "INSERT INTO `users`(`name`, `email`, `password`,`image` ,`time`) VALUES ('$user_name','$email','$password','user.jpg','$today')";
            $result1 = $conn->query($sql1);
            if($result1){
                header("Location: index.php");
            }
        }
    }
    ?>
</div>

<?php
include 'footer.php';
?>