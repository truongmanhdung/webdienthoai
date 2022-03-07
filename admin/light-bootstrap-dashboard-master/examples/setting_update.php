<?php
include 'header.php';
include 'date.php';
include 'db.php';
?>
<div class="container">
    <?php 
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM `setting` WHERE `id` = '$id'";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while ($row = $result->fetch_assoc()){
                    $logo = $row['logo'];
                    $h5_banner = $row['h5_banner'];
                    $h3_banner = $row['h3_banner'];
                    $slogan = $row['slogan'];
                    $address = $row['address'];
                    $note = $row['note'];
                    echo '
                    <h3 class="text-center mt-3 mb-3">Update Setting</h3>
                    <form method="post" action="" class="m-4" enctype="multipart/form-data">
                        <a href="setting.php" class="btn btn-primary mb-3">Trở lại</a>
                        <div class="mb-3">
                            <img class="" width="100px" src="images/setting/'.$logo.'" alt="">
                            <img class="mx-4" width="100px" src="images/chuyendoi.png" alt="">
                            <label for="imgInp3">
                                <img class="" width="100px" src="images/them.png" alt="" id="blah3">
                            </label>
                            <input type="file" name="logo" id="imgInp3" hidden>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Chiến dịch</label>
                            <input type="text" name="h5_banner" value="'.$h5_banner.'" class="form-control" id="exampleInputexampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Hình thức</label>
                            <input type="text" name="h3_banner" value="'.$h3_banner.'" class="form-control" id="exampleInputexampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Slogan</label>
                            <input type="text" name="slogan" value="'.$slogan.'" class="form-control" id="exampleInputexampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Address</label>
                            <input type="text" name="address" value="'.$address.'" class="form-control" id="exampleInputexampleInputPassword1">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Note</label>
                            <input type="text" name="note" value="'.$note.'" class="form-control" id="exampleInputexampleInputPassword1">
                        </div>
                        <button type="submit" class="btn btn-primary" name="update_setting">Thêm Setting</button>
                    </form>
                    ';
                }
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
        imgInp2.onchange = evt => {
            const [file] = imgInp2.files
            if (file) {
                blah2.src = URL.createObjectURL(file)
            }
        }
        imgInp3.onchange = evt => {
            const [file] = imgInp3.files
            if (file) {
                blah3.src = URL.createObjectURL(file)
            }
        }
    </script>
    <?php
    if (isset($_POST["update_setting"])) {
        $h5_banner = $_POST['h5_banner'];
        $h3_banner = $_POST['h3_banner'];
        $slogan = $_POST['slogan'];
        $address = $_POST['address'];
        $note = $_POST['note'];
        if ($_FILES['banner']['type'] == "image/jpeg" || $_FILES['banner']['type'] == "image/png" || $_FILES['banner']['type'] == "image/gif" || $_FILES['banner']['type'] == "image/webp"
            && $_FILES['image_left']['type'] == "image/jpeg" || $_FILES['image_left']['type'] == "image/png" || $_FILES['image_left']['type'] == "image/gif" || $_FILES['image_left']['type'] == "image/webp"
        ) {
            $banner = $_FILES['banner']['name'];
            $logo = $_FILES['logo']['name'];
            $image_left = $_FILES['image_left']['name'];
            // Lấy ra tên ảnh
            $tmp1 = $_FILES['banner']['tmp_name'];
            $tmp2 = $_FILES['image_left']['tmp_name'];
            $tmp3 = $_FILES['logo']['tmp_name'];
            // Khai báo biến lưu trữ đường dẫn
            move_uploaded_file($tmp1, "images/setting/" . $banner);
            move_uploaded_file($tmp2, "images/setting/" . $image_left);
            move_uploaded_file($tmp3, "images/setting/" . $logo);
            $setting = "UPDATE `setting` SET `logo`='$logo',`image_banner`='$banner',`h5_banner`='$h5_banner',`h3_banner`='$h3_banner',`slogan`='$slogan',`image_left`='$image_left',`address`='$address',`note`='$note',`time`='$date' WHERE `id` = '$id'";
            $result_setting = $conn->query($setting);
            if ($result_setting) {
                echo "<script>location.href='setting.php'</script>";
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">
          Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
        </div>';
        }
    }

    ?>
</div>