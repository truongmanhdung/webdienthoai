<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>

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
    echo '<div class="comment container">
        <table class="table">
          <thead>
            <tr>
              <th style="text-align: center !important;" scope="col">STT</th>
              <th style="text-align: center !important;" scope="col">Tên SP</th>
              <th style="text-align: center !important;" scope="col">Số comment</th>
              <th style="text-align: center !important;" scope="col">Chi tiết</th>
            </tr>
          </thead>
          <tbody>';
    $sql = "SELECT DISTINCT `id_product` FROM `comment`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
      $dem = 0;
      while ($row = $result->fetch_assoc()) {
        $id_product = $row['id_product'];
        $sql_comment = "SELECT * FROM `comment` WHERE `id_product` = '$id_product'";
        $result_comment = $conn->query($sql_comment);
        if ($result_comment->num_rows > 0) {
          
          $dem1 = 0;
          $dem2 = 0;
          while ($row_comment = $result_comment->fetch_assoc()) {
            $name_product = $row_comment['product'];
            $id_comment = $row_comment['id'];
            $sql_rep = "SELECT * FROM `repcomment` WHERE `id_comment` = '$id_comment'";
            $result_rep = $conn->query($sql_rep);
            if ($result_rep->num_rows > 0) {
              while ($row_rep = $result_rep->fetch_assoc()) {
                $dem2++;
              }
            }
            $dem1++;
          }
        }
        $dem++;
        echo '<tr>
                    <th style="text-align: center !important;" scope="row">' . $dem . '</th>
                    <td style="text-align: center !important;" ><a href="../../../sanpham.php?id='.$id_product.'">' . $name_product . '</a></td>
                    <td style="text-align: center !important;" >' . $dem1 . '</td>
                    <td style="text-align: center !important;" ><a class="btn btn-primary"href="comment_detail.php?id=' . $id_product . '">Xem chi tiết</a></td>
                  </tr>';
      }
    }
  } else {
    echo '<div class="alert mx-auto mt-5 alert-danger">
                    <span>Bạn không phải admin!!!</span>
                </div>';
  }
}
?>
</tbody>
</table>

</div>