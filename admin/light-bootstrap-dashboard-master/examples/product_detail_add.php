<?php 
    include 'db.php';
    include 'header.php';
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM `products` WHERE `id_product`='$id'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
          $product_name = $row['name_product'];
        }
      }
    }
    
?>

<form method="post" action="" class="m-4" enctype="multipart/form-data">
  <a href="javascript:history.go(-1)" class="btn btn-primary mb-3">Trở lại</a>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CHI TIẾT</label>
    <textarea type="text" name="detail" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">KÍCH THƯỚC MẶT</label>
    <textarea type="text" name="kichthuocmat" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ĐỘ DÀY</label>
    <textarea type="text" name="doday" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MÀU MẶT</label>
    <textarea type="text" name="maumat" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">LOẠI MÁY</label>
    <textarea type="text" name="loaimay" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">KÍCH CỠ DÂY</label>
    <textarea type="text" name="kichcoday" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MẶT KÍNH</label>
    <textarea type="text" name="matkinh" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CHẤT LIỆU DÂY</label>
    <textarea type="text" name="chatlieuday" class="form-control" id="exampleInputexampleInputPassword1"></textarea>
  </div>
  <button type="submit" class="btn btn-primary" name="submit_add_product_detail">Thêm Product_detail</button>
</form>
<?php 
  include 'db.php';
  include 'date.php';
  if (isset($_POST["submit_add_product_detail"])) {
    $detail = $_POST['detail'];
    $kichthuocmat = $_POST['kichthuocmat'];
    $doday = $_POST['doday'];
    $maumat = $_POST['maumat'];
    $loaimay = $_POST['loaimay'];
    $kichcoday = $_POST['kichcoday'];
    $matkinh = $_POST['matkinh'];
    $chatlieuday = $_POST['chatlieuday'];
    $sql1 = "INSERT INTO `product_detail`(`id_product`, `name_product`, `detail`, `kichthuocmat`, `doday`, `maumat`, `loaimay`, `kichcoday`, `matkinh`, `chatlieuday`, `time_old`, `time_update`)
     VALUES ('$id','$product_name','$detail','$kichthuocmat','$doday','$maumat',
     '$loaimay','$kichcoday','$matkinh','$chatlieuday','$today','$today')";
    $result1 = $conn->query($sql1);
    if($result1){
      echo "<script>location.href='product.php?q=product'</script>";
    }
  }
?>


<script src="http://js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
<script type="text/javascript">bkLib.onDomLoaded(nicEditors.allTextAreas);</script>