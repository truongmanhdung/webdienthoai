<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<?php 
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `trademark` WHERE `id`='$id'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $name = $row['name'];
                $image = $row['image'];
                $description = $row['description'];
            }
        }
    }
?>
<form method="post" action="" class="m-4" enctype="multipart/form-data">
    <a href="trademark.php" class="btn btn-primary mb-3">Trở lại</a>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">name_Trademark</label>
        <input type="text" value="<?php echo $name;?>" name="name_trademark" class="form-control" id="exampleInputexampleInputPassword1">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">product_category</label>
        <select class="form-control" name="product_category" id="">
            <?php
            $sql = "SELECT * FROM `categories`";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $product_category = $row['name_category'];
                    echo '<option value="' . $product_category . '">' . $product_category . '</option>';
                }
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Description</label>
        <textarea type="text" name="description_trademark" class="form-control" id="exampleInputexampleInputPassword1" value=""><?php echo $description?></textarea>
    </div>
    <div class="mb-3">
    <?php
        echo ' <img class="" width="100px" src="images/trademark'.$image.'" alt="">
        <img class="mx-4" width="100px" src="images/chuyendoi.png" alt="">';
     ?>
    
    <label for="imgInp">
      <img class="" width="100px" src="images/them.png" alt="" id="blah">
    </label>
    <input type="file" name="image_trademark" id="imgInp" hidden>
  </div>
  <div class="mb-3">
    <button type="submit" class="btn btn-primary" name="submit_add_trademark">Thêm Trademark</button>
</form>
<script>
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
<?php
if (isset($_POST["submit_add_trademark"])) {
    $name_trademark = $_POST['name_trademark'];
    $description = $_POST['description_trademark'];
    $product_category = $_POST['product_category'];
    if ($_FILES['image_trademark']['type'] == "image/jpeg" || $_FILES['image_trademark']['type'] == "image/png" || $_FILES['image_trademark']['type'] == "image/gif" || $_FILES['image_trademark']['type'] == "image/webp") {
        $image = $_FILES['image_trademark']['name'];

        // Lấy ra tên ảnh
        $tmp = $_FILES['image_trademark']['tmp_name'];
        // Khai báo biến lưu trữ đường dẫn
        move_uploaded_file($tmp, "images/trademark" . $image);
        include 'date.php';
        $sql_cate = "SELECT * FROM `categories`  WHERE `name_category` like '%$product_category%'";
        $result_cate = $conn->query($sql_cate);
        if($result_cate->num_rows > 0){
            while($row_cate = $result_cate->fetch_assoc()){
                $id_category = $row_cate['id_category'];
            }
        }
        $sql1 = "SELECT * FROM `trademark` WHERE `name` =  '$name_trademark'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows > 0) {
            echo '<div class="alert alert-danger" role="alert">
             Đã có thương hiệu, vui lòng nhập tên thương hiệu khác !!!
          </div>';
        } else {
            $sql = "UPDATE `trademark` SET `name`='$name_trademark',`description`='$description',`id_category`='$id_category',`name_category`='$product_category',`image`='$image',`time`='$today' WHERE `id`='$id'";
            $result = $conn->query($sql);
            if ($result) {
                echo "<script>location.href='trademark.php'</script>";
            }
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">
          Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
        </div>';
    }
}
?>