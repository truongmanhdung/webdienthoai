<?php 
    include 'header.php';
    include 'db.php';
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql = "SELECT * FROM `categories` WHERE `id_category` = $id";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $name = $row['name_category'];
                $image1 = $row['image_banner'];
                $image2 = $row['image'];
            }
        }
    }
?>

<form method="post" action="" class="m-4" enctype="multipart/form-data">
  <a href="category.php?q=category" class="btn btn-primary mb-3">Trở lại</a>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">name_category</label>
    <input type="text" name="name_category" value="<?php echo $name; ?>" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <?php
        echo ' <img class="" width="100px" src="images/category/'.$image2.'" alt="">
        <img class="mx-4" width="100px" src="images/chuyendoi.png" alt="">';
     ?>
    
    <label for="imgInp2">
      <img class="" width="100px" src="images/them.png" alt="" id="blah2">
    </label>
    <input type="file" name="image_category" id="imgInp2" hidden>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_add_category">Update Category</button>
</form>
<script>
 
  imgInp2.onchange = evt => {
    const [file] = imgInp2.files
    if (file) {
      blah2.src = URL.createObjectURL(file)
    }
  }
</script>
<?php 
if (isset($_POST["submit_add_category"])) {
    $name_category = $_POST['name_category'];
    if($_FILES['image_category']['type'] == "image/jpeg" || $_FILES['image_category']['type'] == "image/png" || $_FILES['image_category']['type'] == "image/gif" || $_FILES['image_category']['type'] == "image/webp")
    {
        $image2 = $_FILES['image_category']['name'];

        // Lấy ra tên ảnh
        $tmp2 = $_FILES['image_category']['tmp_name'];
        // Khai báo biến lưu trữ đường dẫn
        move_uploaded_file($tmp2, "images/category/" . $image2);
        include 'date.php';
        $sql = "UPDATE `categories` SET `name_category`='$name_category',`image`='$image2',`time_update`='$today' WHERE `id_category` = '$id'";
        $result = $conn->query($sql);
        if($result){
            echo "<script>location.href='category.php?q=category'</script>";
        }
  
    }else{
      echo '<div class="alert alert-danger" role="alert">
          Vui lòng chọn đúng định dạng ảnh jpg/jpeg/png/webp/gif
        </div>';
    }
  }
?>

