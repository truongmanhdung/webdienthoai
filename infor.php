<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<style>
    .header_top_infor {
        height: 300px;
        background: linear-gradient(270deg, rgba(255, 255, 255, 0) 32.01%, #fff 61.46%), url(./admin/light-bootstrap-dashboard-master/examples/images/background-3Ef.png) no-repeat;
        background-position: right;
        box-shadow: 1px 1px 4px 1px rgb(0 0 0 / 10%);
    }

    .information {
        max-width: 800px;
        margin: 40px auto;
        padding: 80px;
        box-shadow: 1px 1px 6px 4px rgba(0, 0, 0, 0.2);
    }

    .hover_form_infor {
        display: none;
    }

    .user_name:checked~.hover_form_infor {
        display: block;
    }
</style>
<?php
if (isset($_COOKIE['user'])) {
    $email = $_COOKIE['user'];
    $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id = $row['id_user'];
            $username = $row['name'];
            $address = $row['address'];
            $email = $row['email'];
            $phone = $row['phone'];
            $avatar = $row['image'];
            $password = $row['password'];
        }
        echo '<div class="infor">
            <div class="header_top_infor d-flex align-items-center">
                <div class="container">
                    <h1>Hello, ' . $username . '</h1>
                    <p>Quản lý tài khoản của bạn.</p>
                </div>
            </div>
            <div class="information">
                <h3 class="text-center mb-4">THÔNG TIN CÁ NHÂN</h3>
                <div class="user_name">
                    <div class="mb-3">
                        <div class="">
                            <h4 class="form-label">User name</h4>
                        </div>
                        <input type="checkbox" hidden id="username" class="user_name">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <p class=" pb-2">' . $username . '</p>
                            <p><label class="test" for="username"><i class="fas fa-edit"></i></label> </p>
                        </div>
        
                        <div class="hover_form_infor p-5 bg-light">
                            <form action="" method="post">
                                <div class="d-flex align-items-center text-center">
                                    <label class="d-block" style="width: 226px;" for="">User Name</label>
                                    <input required style="width: 200px" value="' . $username . '" type="text" class="form-control" name="name">
                                </div>
                                <button type="submit" name="update_name" class="btn d-block mx-auto mt-4 btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user_name">
                    <div class="mb-3">
                        <div class="">
                            <h4 class="form-label">Email</h4>
                        </div>
                        <input type="checkbox" hidden id="email" class="user_name">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <p class=" pb-2">' . $email . '</p>
                            <p><label for="email"><i class="fas fa-edit"></i></label> </p>
                        </div>
        
                        <div class="hover_form_infor p-5 bg-light">
                            <form action="" method="post">
                                <div class="d-flex align-items-center text-center">
                                    <label class="d-block" style="width: 226px;" for="">Email</label>
                                    <input style="width: 200px" value="' . $email . '" type="text" class="form-control" name="email">
                                </div>
                                <button type="submit" name="update_email" class="btn d-block mx-auto mt-4 btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user_name">
                    <div class="mb-3">
                        <div class="">
                            <h4 class="form-label">Password</h4>
                        </div>
                        <input type="checkbox" hidden id="password" class="user_name">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <p class=" pb-2">**************</p>
                            <p><label for="password"><i class="fas fa-edit"></i></label> </p>
                        </div>
        
                        <div class="hover_form_infor p-5 bg-light">
                            <form action="" method="post">
                                <div class="d-flex align-items-center text-center m-3">
                                    <label class="d-block" style="width: 210px;" for="">Nhập password cũ</label>
                                    <input style="width: 200px" type="password" class="form-control" name="password_old">
                                </div>
                                <div class="d-flex align-items-center text-center m-3">
                                    <label class="d-block" style="width: 210px;" for="">Nhập password mới</label>
                                    <input style="width: 200px" type="password" class="form-control" name="password_new">
                                </div>
                                <div class="d-flex align-items-center text-center m-3">
                                    <label class="d-block" style="width: 210px;" for="">Nhập lại password</label>
                                    <input style="width: 200px" type="password" class="form-control" name="password_new1">
                                </div>
                                <button type="submit" name="update_password" class="btn d-block mx-auto mt-4 btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user_name">
                    <div class="mb-3">
                        <div class="">
                            <h4 class="form-label">Address</h4>
                        </div>
                        <input type="checkbox" hidden id="address" class="user_name">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <p class=" pb-2">' . $address . '</p>
                            <p><label for="address"><i class="fas fa-edit"></i></label> </p>
                        </div>
        
                        <div class="hover_form_infor p-5 bg-light">
                            <form action="" method="post">
                                <div class="d-flex align-items-center text-center">
                                    <label class="d-block" style="width: 226px;" for="">Address</label>
                                    <input style="width: 200px" value="' . $address . '" type="text" class="form-control" name="address">
                                </div>
                                <button type="submit" name="update_address" class="btn d-block mx-auto mt-4 btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="user_name">
                    <div class="mb-3">
                        <div class="">
                            <h4 class="form-label">Phone</h4>
                        </div>
                        <input type="checkbox" hidden id="phone" class="user_name">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <p class=" pb-2">+84' . $phone . '</p>
                            <p><label for="phone"><i class="fas fa-edit"></i></label> </p>
                        </div>
        
                        <div class="hover_form_infor p-5 bg-light">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="d-flex align-items-center text-center">
                                    <label class="d-block" style="width: 226px;" for="">Phone</label>
                                    <input style="width: 200px" value="0' . $phone . '" type="number" class="form-control" name="phone">
                                </div>
                                <button type="submit" name="update_phone" class="btn d-block mx-auto mt-4 btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div><div class="user_name">
                    <div class="mb-3">
                        <div class="">
                            <h4 class="form-label">Avatar</h4>
                        </div>
                        <input type="checkbox" hidden id="image" class="user_name">
                        <div class="d-flex justify-content-between align-items-center border-bottom">
                            <img width="100px" src="./admin/light-bootstrap-dashboard-master/examples/images/user/' . $avatar . '" alt="">
                            <p><label for="image"><i class="fas fa-edit"></i></label> </p>
                        </div>
        
                        <div class="hover_form_infor p-5 bg-light">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="d-flex align-items-center text-center justify-content-between">
                                    <img width="100px" src="./admin/light-bootstrap-dashboard-master/examples/images/user/' . $avatar . '" alt="">
                                    <img class="mx-4" width="100px" src="./admin/light-bootstrap-dashboard-master/examples/images/chuyendoi.png" alt="">
                                    <label for="imgInp">
                                        <img class="" width="100px" src="./admin/light-bootstrap-dashboard-master/examples/images/them.png" alt="" id="blah">
                                    </label>
                                    <input type="file" name="image" id="imgInp" hidden>
                                </div>
                                <button type="submit" name="update_image" class="btn d-block mx-auto mt-4 btn-primary">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>';
    }
}
?>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
<?php
if(isset($_POST['update_name'])){
    $name = $_POST['name'];
    $sql = "UPDATE `users` SET `name` = '$name',`time_update` = '$today' WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    if($result){
        header("location: infor.php");
    }
}
else if(isset($_POST['update_email'])){
    $email = $_POST['email'];
    setcookie('user',$email,time() + (86400 * 30), "/");
    $sql = "UPDATE `users` SET `email` = '$email',`time_update` = '$today' WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    if($result){
        header("location: infor.php");
    }
}
else if(isset($_POST['update_password'])){
    $password_old = md5($_POST['password_old']);
    $password_new = md5($_POST['password_new']);
    $password_new1 = md5($_POST['password_new1']);
    if($password_old==$password){
        if($password_new==$password_new1){
            $sql = "UPDATE `users` SET `password` = '$password_new',`time_update` = '$today' WHERE `id_user` = '$id'";
            $result = $conn->query($sql);
            if($result){
                header("location: infor.php");
            }
        }else{
            echo '<div class="alert alert-danger" role="alert">
          Nhập lại password không chính xác!!!
        </div>';
        }
    }else{
        echo '<div class="alert alert-danger" role="alert">
            nhập password cũ không chính xác!!!
      </div>';
    }
    
}
else if(isset($_POST['update_address'])){
    $address = $_POST['address'];
    $sql = "UPDATE `users` SET `address` = '$address',`time_update` = '$today' WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    if($result){
        header("location: infor.php");
    }
}
else if(isset($_POST['update_phone'])){
    $phone = $_POST['phone'];
    $sql = "UPDATE `users` SET `phone` = '$phone',`time_update` = '$today' WHERE `id_user` = '$id'";
    $result = $conn->query($sql);
    if($result){
        header("location: infor.php");
    }
}
else if (isset($_POST['update_image'])) {
    if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/webp") {
        $image = $_FILES['image']['name'];
        // Lấy ra tên ảnh
        $tmp = $_FILES['image']['tmp_name'];
        // Khai báo biến lưu trữ đường dẫn
        move_uploaded_file($tmp, "./admin/light-bootstrap-dashboard-master/examples/images/user/" . $image);
        $sql = "UPDATE `users` SET `image` = '$image',`time_update` = '$today' WHERE `id_user` = '$id'";
        $result = $conn->query($sql);
        if($result){
            header("location: infor.php");
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
                Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
                </div>';
    }
};
?>
<?php
include 'footer.php';
?>