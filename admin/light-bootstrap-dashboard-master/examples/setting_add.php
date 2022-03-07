<?php
include 'header.php';
include 'date.php';
include 'db.php';
?>
<div class="container">
    <h3 class="text-center mt-3 mb-3">Thêm Setting</h3>
    <form method="post" action="" class="m-4" enctype="multipart/form-data">
        <a href="setting.php" class="btn btn-primary mb-3">Trở lại</a>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Logo</label>
            <label for="imgInp1">
                <img class="" width="100px" src="images/them.png" alt="" id="blah1">
            </label>
            <input type="file" name="logo" id="imgInp1" hidden>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Chiến dịch</label>
            <input type="text" name="h5_banner" class="form-control" id="exampleInputexampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Hình thức</label>
            <input type="text" name="h3_banner" class="form-control" id="exampleInputexampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Slogan</label>
            <input type="text" name="slogan" class="form-control" id="exampleInputexampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Address</label>
            <input type="text" name="address" class="form-control" id="exampleInputexampleInputPassword1">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Note</label>
            <input type="text" name="note" class="form-control" id="exampleInputexampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary" name="add_setting">Thêm Setting</button>
    </form>
    <script>
        imgInp1.onchange = evt => {
            const [file] = imgInp1.files
            if (file) {
                blah1.src = URL.createObjectURL(file)
            }
        }
    </script>
    <?php
    if (isset($_POST["add_setting"])) {
        $h5_banner = $_POST['h5_banner'];
        $h3_banner = $_POST['h3_banner'];
        $slogan = $_POST['slogan'];
        $address = $_POST['address'];
        $note = $_POST['note'];

        $banner = $_FILES['banner']['name'];
        $logo = $_FILES['logo']['name'];
        // Lấy ra tên ảnh
        $tmp1 = $_FILES['logo']['tmp_name'];
        // Khai báo biến lưu trữ đường dẫn
        move_uploaded_file($tmp1, "images/setting/" . $logo);
        $setting = "INSERT INTO `setting`(`logo`, `h5_banner`, `h3_banner`, `slogan`, `address`, `note`, `time`) VALUES
             ('$logo','$h5_banner','$h3_banner','$slogan','$address','$note','$today')";
        $result_setting = $conn->query($setting);
        if ($result_setting) {
            echo "<script>location.href='setting.php'</script>";
        }
    }

    ?>
</div>