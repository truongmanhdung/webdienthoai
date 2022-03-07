<?php 
    include 'db.php';
    include 'header.php';
?>
<div class="container">
    <h3 class="text-center mt-3 mb-3">Chi tiết giỏ hàng</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" style="text-align: center !important;">STT</th>
          <th scope="col" style="text-align: center !important;">Tên sản phẩm</th>
          <th scope="col" style="text-align: center !important;">Image</th>
          <th scope="col" style="text-align: center !important;">Số lượng</th>
          <th scope="col" style="text-align: center !important;">Giá tiền loại sản phẩm</th>
          <th scope="col" style="text-align: center !important;">Thời gian mua</th>
        </tr>   
      </thead>
      <tbody>
        <?php
            if(isset($_GET['id'])){
                $order_id = $_GET['id'];
                $sql = "SELECT * FROM `order_detail` WHERE `order_id`= '$order_id'";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $dem= 0;
                    while($row = $result->fetch_assoc()){
                        $dem++;
                        $product_id = $row['product_id'];
                        $sql_product = "SELECT * FROM `products` WHERE `id_product` = '$product_id'";
                        $result_product = $conn->query($sql_product);
                        if($result_product->num_rows > 0){
                            while($row_product = $result_product->fetch_assoc()){
                                $image = $row_product['image'];
                                $name_product = $row_product['name_product'];
                            }
                        }
                        echo '<tr class="text-center">
                                <th style="text-align: center !important;">'.$dem.'</th>
                                <td>'.$name_product.'</td>
                                <td><img style="width:100px" src="./images/product/'.$image.'" alt=""></td>
                                <td>'.$row['soluong'].'</td>
                                <td>'.number_format($row['gia']).'đ</td>
                                <td>'.$row['time'].'</td>
                            </tr>';
                    }
                }   
            }
            
        ?>
        
      </tbody>
    </table>
</div>