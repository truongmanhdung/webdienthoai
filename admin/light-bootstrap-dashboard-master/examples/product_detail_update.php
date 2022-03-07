<?php 
    include 'db.php';
    include 'header.php';
    if(isset($_GET['id'])){
      $id = $_GET['id'];
      $sql = "SELECT * FROM `product_detail` WHERE `id_product_detail`='$id'";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $id_product = $row["id_product"];
            $detail = $row['detail'];
            $kichthuocmat = $row['kichthuocmat'];
            $doday = $row['doday'];
            $maumat = $row['maumat'];
            $loaimay = $row['loaimay'];
            $kichcoday = $row['kichcoday'];
            $matkinh = $row['matkinh'];
            $chatlieuday = $row['chatlieuday'];
        }
      }
    }
    
?>

<form method="post" action="" class="m-4" enctype="multipart/form-data">
  <a href="javascript:history.go(-1)" class="btn btn-primary mb-3">Trở lại</a>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CHI TIẾT</label>
    <textarea type="text" name="detail" value="" class="form-control" id="exampleInputexampleInputPassword1"><?php echo $detail;?></textarea>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">KÍCH THƯỚC MẶT</label>
    <input type="text" value="<?php echo $kichthuocmat;?>" name="kichthuocmat" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">ĐỘ DÀY</label>
    <input type="text" value="<?php echo $doday;?>" name="doday" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MÀU MẶT</label>
    <input type="text" value="<?php echo $maumat;?>" name="maumat" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">LOẠI MÁY</label>
    <input type="text" value="<?php echo $loaimay;?>" name="loaimay" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">KÍCH CỠ DÂY</label>
    <input type="text" value="<?php echo $kichcoday;?>" name="kichcoday" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">MẶT KÍNH</label>
    <input type="text" value="<?php echo $matkinh;?>" name="matkinh" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">CHẤT LIỆU DÂY</label>
    <input type="text" value="<?php echo $chatlieuday;?>" name="chatlieuday" class="form-control" id="exampleInputexampleInputPassword1">
  </div>
  <button type="submit"  class="btn btn-primary" name="submit_add_product_detail">Update Product_detail</button>
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
    $sql1 = "UPDATE `product_detail` SET `detail`='$detail',`kichthuocmat`='$kichthuocmat',`doday`='$doday',
    `maumat`='$maumat',`loaimay`='$loaimay',`kichcoday`='$kichcoday',`matkinh`='$matkinh',`chatlieuday`='$chatlieuday',`time_update`='$today' WHERE `id_product_detail`='$id'";
    $result1 = $conn->query($sql1);
    if($result1){
        header("Location: product_detail.php?id=$id_product");
    //   echo "<script>location.href='product_detail.php?id='.$id_product.''</script>";
    }
  }
?>