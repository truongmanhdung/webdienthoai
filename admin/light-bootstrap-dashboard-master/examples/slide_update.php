<?php
include 'header.php';
include 'date.php';
include 'db.php';
?>
<div class="container">
     <?php
     if (isset($_GET['id'])) {
          $id = $_GET['id'];
          $sql_slide = "SELECT * FROM `slide` WHERE `id` = '$id'";
          $result_slide = $conn->query($sql_slide);
          if ($result_slide->num_rows > 0) {
               $dem = 0;
               while ($row_slide = $result_slide->fetch_assoc()) {
                    $image  = $row_slide['image'];
                    $link = $row_slide['link'];
               }
          }
     }

     ?>
     <h3 class="text-center mt-3 mb-3">Thêm Slide</h3>
     <form method="post" action="" class="m-4" enctype="multipart/form-data">
          <a href="slide.php" class="btn btn-primary mb-3">Trở lại</a>
          <div class="mb-3">
               <?php
               echo ' <img class="" width="100px" src="images/slide/' . $image . '" alt="">
          <img class="mx-4" width="100px" src="images/chuyendoi.png" alt="">';
               ?>
               <label for="imgInp1">
                    <img class="" width="100px" src="images/them.png" alt="" id="blah1">
               </label>
               <input type="file" name="image" id="imgInp1" hidden>
          </div>
          <div class="mb-3">
               <label for="exampleInputPassword1" class="form-label">Link</label>
               <input type="text" name="link" required value="<?php echo $link ?>" class="form-control" id="exampleInputexampleInputPassword1">
          </div>

          <button type="submit" class="btn btn-primary" name="update_slide">Update Slide</button>
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
     if (isset($_POST["update_slide"])) {
          if ($_FILES['image']['type'] == "image/jpeg" || $_FILES['image']['type'] == "image/png" || $_FILES['image']['type'] == "image/gif" || $_FILES['image']['type'] == "image/webp") {
               $image = $_FILES['image']['name'];
               $link = $_POST['link'];
               // Lấy ra tên ảnh
               $tmp1 = $_FILES['image']['tmp_name'];
               // Khai báo biến lưu trữ đường dẫn
               move_uploaded_file($tmp1, "images/slide/" . $image);
               $slide = "UPDATE `slide` SET `image`='$image',`link`='$link',`time`='$today' WHERE `id` = '$id'";
               $result_slide = $conn->query($slide);
               if ($result_slide) {
                    echo "<script>location.href='slide.php'</script>";
               }
          } else {
               echo '<div class="alert alert-danger" role="alert">
               Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
          </div>';
          }
     }

     ?>
</div>