<?php
include 'header.php';
include 'date.php';
include 'db.php';
?>
<div class="container">
    <h3 class="text-center mt-3 mb-3">Thêm Slide</h3>
    <form method="post" action="" class="m-4" enctype="multipart/form-data">
        <a href="slide.php" class="btn btn-primary mb-3">Trở lại</a>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Image</label>
            <label for="imgInp1">
                <img class="" width="100px" src="images/them.png" alt="" id="blah1">
            </label>
            <input type="file" name="image" id="imgInp1" hidden>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Link</label>
            <input type="text" name="link" class="form-control" id="exampleInputexampleInputPassword1">
        </div>
        
        <button type="submit" class="btn btn-primary" name="add_slide">Thêm Slide</button>
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
    if (isset($_POST["add_slide"])) {
     
        $image = $_FILES['image']['name'];
        $link = $_POST['link'];
        // Lấy ra tên ảnh
        $tmp1 = $_FILES['image']['tmp_name'];
        // Khai báo biến lưu trữ đường dẫn
        move_uploaded_file($tmp1, "images/slide/" . $image);
        $slide = "INSERT INTO `slide`(`image`, `link`, `time`) VALUES ('$image','$link','$today')";
        $result_slide = $conn->query($slide);
        if ($result_slide) {
            echo "<script>location.href='slide.php'</script>";
        }
    }

    ?>
</div>