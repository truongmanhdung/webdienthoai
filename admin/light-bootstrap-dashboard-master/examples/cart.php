<?php
    include 'header.php';
?>
<div class="container">
    <h3 class="text-center mt-3 mb-3">Giỏ hàng</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" style="text-align: center !important;">STT</th>
          <th scope="col" style="text-align: center !important;">Tên khách hàng</th>
          <th scope="col" style="text-align: center !important;">Email</th>
          <th scope="col" style="text-align: center !important;">SĐT</th>
          <th scope="col" style="text-align: center !important;">Địa Chỉ</th>
          <th scope="col" style="text-align: center !important;">Tổng hóa đơn</th>
          <th scope="col" style="text-align: center !important;">Ngày mua hàng</th>
          <th scope="col" style="text-align: center !important;">Chi tiết</th>
        </tr>
      </thead>
      <tbody>
        <?php 
            $sql = "SELECT * FROM `order`";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $dem= 0;
                while($row = $result->fetch_assoc()){
                    $dem++;
                    echo '<tr class="text-center">
                            <th style="text-align: center !important;">'.$dem.'</th>
                            <td>'.$row['name'].'</td>
                            <td>'.$row['email'].'</td>
                            <td>'.$row['phone'].'</td>
                            <td>'.$row['address'].'</td>
                            <td>'.number_format($row['tonggia']).'đ</td>
                            <td>'.$row['time'].'</td>
                            <td>
                                <a class="btn btn-primary"href="chitietcart.php?id='.$row['id'].'">Xem chi tiết</a>
                            </td>
                        </tr>';
                }
            }
        ?>
        
      </tbody>
    </table>
</div>