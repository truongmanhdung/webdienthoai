<form method="post" action="" class="m-4" enctype="multipart/form-data">
  <a href="category.php?q=category" class="btn btn-primary mb-3">Trở lại</a>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name_category</label>
    <input type="text" name="name_category" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image_category_banner</label>
    <label for="img_banner">
      <img class="" width="100px" src="images/them.png" alt="" id="blah1">
    </label>
    <input type="file" name="image_category_banner" id="img_banner" hidden>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">image_category</label>
    <label for="imgInp">
      <img class="" width="100px" src="images/them.png" alt="" id="blah2">
    </label>
    <input type="file" name="image_category" id="imgInp" hidden>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_add_category">Thêm Category</button>
</form>
<script>
  imgInp.onchange = evt => {
    const [file] = imgInp.files
    if (file) {
      blah2.src = URL.createObjectURL(file)
    }
  }
  img_banner.onchange = evt => {
    const [file] = img_banner.files
    if (file) {
      blah1.src = URL.createObjectURL(file)
    }
  }
</script>
<?php 
  include 'db.php';
  if (isset($_POST["submit_add_category"])) {
    $name_category = $_POST['name_category'];
    if($_FILES['image_category']['type'] == "image/jpeg" || $_FILES['image_category']['type'] == "image/png" || $_FILES['image_category']['type'] == "image/gif" || $_FILES['image_category']['type'] == "image/webp"
     && $_FILES['image_category_banner']['type'] == "image/jpeg" || $_FILES['image_category_banner']['type'] == "image/png" || $_FILES['image_category_banner']['type'] == "image/gif" || $_FILES['image_category_banner']['type'] == "image/webp")
    {
      $image1 = $_FILES['image_category_banner']['name'];
      $image2 = $_FILES['image_category']['name'];

      // Lấy ra tên ảnh
      $tmp2 = $_FILES['image_category']['tmp_name'];
      $tmp1 = $_FILES['image_category_banner']['tmp_name'];
      // Khai báo biến lưu trữ đường dẫn
      move_uploaded_file($tmp2, "images/category/" . $image2);
      move_uploaded_file($tmp1, "images/category/banner" . $image1);
      include 'date.php';
    
      $sql = "SELECT * FROM `categories` WHERE `name_category` =  '$name_category'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        echo '<div class="alert alert-danger" role="alert">
             Đã có danh mục, vui lòng nhập tên danh mục khác !!!
          </div>';
      }else{
        $sql = "INSERT INTO `categories`( `name_category`,`image_banner`, `image`, `time_old`,`time_update`) VALUES ('$name_category','$image1','$image2','$today','$today')";
        $result = $conn->query($sql);
        if($result){
          echo "<script>location.href='category.php?q=category'</script>";
        }
      }
  
    }else{
      echo '<div class="alert alert-danger" role="alert">
          Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
        </div>';
    }
  }
?>