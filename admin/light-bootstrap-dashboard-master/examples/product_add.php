<?php 
    include 'db.php';
?>

<form method="post" action="" class="m-4" enctype="multipart/form-data">
  <a href="product.php?q=product" class="btn btn-primary mb-3">Trở lại</a>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name_product</label>
    <input type="text" name="name_product" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product_detail</label>
    <input type="text" name="product_detail" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product_category</label>
    <select class="form-control" name="product_category" id="">
        <?php 
            $sql = "SELECT * FROM `categories`";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $product_category = $row['name_category'];
                    echo '<option value="'.$product_category.'">'.$product_category.'</option>';
                }
            }
        ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product_trademark</label>
    <select class="form-control" name="product_trademark" id="">
        <?php 
            $sql = "SELECT * FROM `trademark`";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $product_trademark = $row['name'];
                    $product_category = $row['name_category'];
                    echo '<option value="'.$product_trademark.'">'.$product_trademark.'('.$product_category.')</option>';
                }
            }
        ?>
    </select>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product_price</label>
    <input type="number" name="product_price" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image_product</label>
    <label for="imgInp">
      <img class="" width="100px" src="images/them.png" alt="" id="blah">
    </label>
    <input type="file" name="image_product" id="imgInp" hidden>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_add_product">Thêm Product</button>
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
  include 'db.php';
  if (isset($_POST["submit_add_product"])) {
    $name_product = $_POST['name_product'];
    $product_detail = $_POST['product_detail'];
    $product_category = $_POST['product_category'];
    $product_trademark = $_POST['product_trademark'];
    $product_price = $_POST['product_price'];
    $sql = "SELECT * FROM `categories` WHERE `name_category` = '$product_category'";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
      while($row = $result->fetch_assoc()){
        $id_category = $row['id_category'];
      }
    }
    $sql_t = "SELECT * FROM `trademark` WHERE `name` = '$product_trademark'";
    $result_t = $conn->query($sql_t);
    if($result_t->num_rows > 0){
      while($row_t = $result_t->fetch_assoc()){
        $id_trademark = $row_t['id'];
      }
    }
    if($_FILES['image_product']['type'] == "image/jpeg" || $_FILES['image_product']['type'] == "image/png" || $_FILES['image_product']['type'] == "image/gif" || $_FILES['image_product']['type'] == "image/webp")
    {
      $image = $_FILES['image_product']['name'];
      // Lấy ra tên ảnh
      $tmp = $_FILES['image_product']['tmp_name'];
      // Khai báo biến lưu trữ đường dẫn
      move_uploaded_file($tmp, "images/product/" . $image);
      include 'date.php';
      $sql = "INSERT INTO `products`(`id_category`,`id_trademark`,`name_product`, `product_detail`, `product_category`,`product_trademark`, `product_price`, `image`, `time_old`,`time_update`)
        VALUES ('$id_category','$id_trademark','$name_product','$product_detail','$product_category','$product_trademark','$product_price','$image','$today','$today')";
      $result = $conn->query($sql);
      if($result){
        echo "<script>location.href='product.php?q=product'</script>";
      }
    }
    else{
      echo '<div class="alert alert-danger" role="alert">
          Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
        </div>';
    }
  }

?>