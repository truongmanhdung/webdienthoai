

  <?php
      if (isset($_COOKIE['user'])) {
        $email = $_COOKIE['user'];
        $sql_user = "SELECT * FROM `users` WHERE `email` = '$email'";
        $result_user = $conn->query($sql_user);
        if ($result_user->num_rows > 0) {
          while ($row_user = $result_user->fetch_assoc()) {
            $admin = $row_user['admin'];
          }
        }
        if ($admin == 1) {
      echo '<div class="d-flex justify-content-between">
      <div class="m-4">
          <a class="btn btn-primary" href="product.php?q=them">Add Product</a>
      </div>
      <div class="search m-4">
        <form method="post" action="" class="d-flex">
          <div class="me-2">
            <input type="text" required placeholder="Tìm kiếm" name="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" name="submit_search" class="btn mx-2 btn-primary">Search</button>
        </form>
      </div>
    </div>
    <table class="table mx-4">
      <thead>
        <tr class="update">
          <th style="text-align: center !important;">STT</th>
          <th style="text-align: center !important;">Name_product</th>
          <th style="text-align: center !important;">Product_category</th>
          <th style="text-align: center !important;">Trademark</th>
          <th style="text-align: center !important;">Product_price</th>
          <th style="text-align: center !important;">View</th>
          <th style="text-align: center !important;">Image</th>
          <th style="text-align: center !important;">Time Update</th>
          <th style="text-align: center !important;">Detail</th>
          <th style="text-align: center !important;">Update/Delete</th>
        </tr>
      </thead>
      <tbody>';
      if(isset($_POST['submit_search'])){
        $search = $_POST['search'];
        $tim = "SELECT * FROM `products` WHERE `name_product` LIKE '%$search%'";
        $result_search = $conn->query($tim);
        $dem=1;
        if($result_search->num_rows > 0){
          while($row_search = $result_search->fetch_assoc()){
            echo '<tr>
                <th style="text-align: center !important;" scope="row">'.$dem.'</th>
                <td style="text-align: center !important;"><a href="../../../sanpham.php?id='.$row_search['id_product'].'">'.$row_search['name_product'].'</a></td>
                <td style="text-align: center">'.$row_search['product_category'].'</td>
                <td style="text-align: center">'.$row_search['product_trademark'].'</td>
                <td style="text-align: center !important;">'.number_format($row_search['product_price']).' đ</td>
                <td style="text-align: center !important;">'.$row_search['view'].'</td>
                <td style="text-align: center !important;"><img width="100px" src="images/product/'.$row_search['image'].'" alt=""></td>
                <td style="text-align: center !important;">'.$row_search['time_update'].'</td>';
                $sql1 = "SELECT * FROM `product_detail` WHERE `id_product`=".$row_search['id_product']."";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0){
                  echo '<th style="text-align: center !important"><a class="btn btn-primary" href="product_detail.php?id='.$row_search['id_product'].'">Chi tiết</a></th>';
                }else{
                  echo '<th style="text-align: center !important"><a class="btn btn-primary" href="product_detail_add.php?id='.$row_search['id_product'].'">Thêm chi tiết</a></th>';
                }
                echo '<td style="text-align: center !important;"><a href="product_delete.php?id='.$row_search['id_product'].'" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a><a href="product_update.php?q=sua&id='.$row_search['id_product'].'"><i class="mx-1 btn btn-primary fas fa-edit"></i></a></td>
              </tr>';
              $dem++;
          }
        }
        else{
          echo '<div class="alert alert-danger" role="alert">
            <p class="m-0">Kết quả tìm kiếm không có!!!</p>
          </div>';
        }
      }else{
        include 'db.php';
        $sql = "SELECT * FROM `products` ORDER BY `product_category`";
        $result = $conn->query($sql);
        $dem=1;
        if($result->num_rows > 0){
            while ($row = $result->fetch_assoc()){
                echo '<tr>
                <th style="text-align: center !important;" scope="row">'.$dem.'</th>
                <td style="text-align: center !important;"><a href="../../../sanpham.php?id='.$row['id_product'].'">'.$row['name_product'].'</a></td>
                <td style="text-align: center">'.$row['product_category'].'</td>
                <td style="text-align: center">'.$row['product_trademark'].'</td>
                <td style="text-align: center !important;">'.number_format($row['product_price']).' đ</td>
                <td style="text-align: center !important;">'.$row['view'].'</td>
                <td style="text-align: center !important;"><img width="100px" src="images/product/'.$row['image'].'" alt=""></td>
                <td style="text-align: center !important;">'.$row['time_update'].'</td>';
                $sql1 = "SELECT * FROM `product_detail` WHERE `id_product`=".$row['id_product']."";
                $result1 = $conn->query($sql1);
                if($result1->num_rows > 0){
                  echo '<th style="text-align: center !important"><a class="btn btn-primary" href="product_detail.php?id='.$row['id_product'].'">Chi tiết</a></th>';
                }else{
                  echo '<th style="text-align: center !important"><a class="btn btn-primary" href="product_detail_add.php?id='.$row['id_product'].'">Thêm chi tiết</a></th>';
                }
                echo '<td style="text-align: center !important;"><a href="product_delete.php?id='.$row['id_product'].'" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a><a href="product_update.php?q=sua&id='.$row['id_product'].'"><i class="mx-1 btn btn-primary fas fa-edit"></i></a></td>
              </tr>';
              $dem++;
            }
        }
      }
        }else {
          echo '<div class="alert mx-auto mt-5 alert-danger">
                <span>Bạn không phải admin!!!</span>
            </div>';
        }
      
      }
    ?>
  </tbody>
</table>