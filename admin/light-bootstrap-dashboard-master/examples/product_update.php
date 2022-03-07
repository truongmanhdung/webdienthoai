<?php 
    include 'db.php';
    include 'header.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `products` WHERE `id_product` = $id";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                $name_product = $row['name_product'];
                $product_detail = $row['product_detail'];
                $product_price = $row['product_price'];
                $image = $row['image'];
                
            }
        }
    }
?>

<form method="post" action="" class="m-4" enctype="multipart/form-data">
  <a href="product.php?q=product" class="btn btn-primary mb-3">Trở lại</a>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name_product</label>
    <input type="text" value="<?php echo $name_product;?>" name="name_product" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">product_detail</label>
    <input type="text" value="<?php echo $product_detail;?>" name="product_detail" class="form-control" id="exampleInputexampleInputPassword1">
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
    <input type="number" value="<?php echo $product_price;?>" name="product_price" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <?php
        echo ' <img class="" width="100px" src="images/product/'.$image.'" alt="">
        <img class="mx-4" width="100px" src="images/chuyendoi.png" alt="">';
     ?>
    <label for="imgInp">
      <img class="" width="100px" src="images/them.png" alt="" id="blah">
    </label>
    <input type="file" name="image_product" id="imgInp" hidden>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_add_product">Update Product</button>
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
    $sql_t = "SELECT * FROM `trademark` WHERE `name` like '%$product_trademark%'";
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
      $sql = "UPDATE `products` SET `id_category`='$id_category', `id_trademark`='$id_trademark',`product_trademark` = '$product_trademark', `name_product`='$name_product',`product_detail`='$product_detail',`product_category`='$product_category',`product_price`='$product_price',`image`='$image',`time_update`='$today' WHERE `id_product`='$id'";
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