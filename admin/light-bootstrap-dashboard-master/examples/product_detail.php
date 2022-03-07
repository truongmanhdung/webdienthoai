<?php 
    include 'db.php';
    include 'header.php';
?>
<div class="m-4">
    <a class="btn btn-primary" href="javascript:history.go(-1)">Trở lại</a>
</div>
<table class="table mx-4">
  <thead>
    <tr class="update">
      <th style="text-align: center !important;">Tên SP</th>
      <th style="text-align: center !important;">Chi tiết</th>
      <th style="text-align: center !important;">Kích thước mặt</th>
      <th style="text-align: center !important;">Độ dày</th>
      <th style="text-align: center !important;">Màu mặt</th>
      <th style="text-align: center !important;">Loại máy</th>
      <th style="text-align: center !important;">Kích cỡ dây</th>
      <th style="text-align: center !important;">Mặt kính</th>
      <th style="text-align: center !important;">Chất liệu dây</th>
      <th style="text-align: center !important;">Time Update</th>
      <th style="text-align: center !important;">Update/Delete</th>
    </tr>
  </thead>
  <tbody>
    <?php
        if(isset($_GET['id'])){
          include 'db.php';
          $id = $_GET['id'];
          $sql = "SELECT * FROM `product_detail` WHERE `id_product` = '$id'";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
              while ($row = $result->fetch_assoc()){
                  echo '<tr>
                  <th style="text-align: center !important;" scope="row">'.$row['name_product'].'</th>
                  <td style="text-align: justify;-webkit-line-clamp: 3;
                  -webkit-box-orient: vertical;
                  overflow: hidden;
                  text-overflow: ellipsis;
                  height: 80px;display: -webkit-box; !important;max-width: 300px;">'.$row['detail'].'</td>
                  <td style="text-align: center">'.$row['kichthuocmat'].'</td>
                  <td style="text-align: center !important;">'.$row['doday'].'</td>
                  <td style="text-align: center">'.$row['maumat'].'</td>
                  <td style="text-align: center !important;">'.$row['loaimay'].'</td>
                  <td style="text-align: center">'.$row['kichcoday'].'</td>
                  <td style="text-align: center !important;">'.$row['matkinh'].'</td>
                  <td style="text-align: center !important;">'.$row['chatlieuday'].'</td>
                  <td style="text-align: center !important;">'.$row['time_update'].'</td>
                  <td style="text-align: center !important;"><a href="product_detail_delete.php?id='.$row['id_product_detail'].'" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a><a href="product_detail_update.php?q=sua&id='.$row['id_product_detail'].'"><i class="mx-1 btn btn-primary fas fa-edit"></i></a></td>
                </tr>';
              }
        }
        }
        
    ?>
  </tbody>
</table>