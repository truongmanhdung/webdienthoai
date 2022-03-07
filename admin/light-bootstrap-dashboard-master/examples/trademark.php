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
    echo '<div class="d-flex justify-content-between">
  
    <div class="m-4">
        <a class="btn btn-primary" href="trademark_add.php?">Thêm Trademark</a>
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
          <th scope="col" style="text-align: center !important;">STT</th>
          <th scope="col" style="text-align: center !important;">NAME Trademark</th>
          <th scope="col" style="text-align: center !important;">NAME Category</th>
          <th scope="col" style="text-align: center !important;">IMAGE</th>
          <th scope="col" style="text-align: center !important;">DESCRIPTION</th>
          <th scope="col" style="text-align: center !important;">TIME UPDATE</th>
          <th scope="col" style="text-align: center !important;">CHỨC NĂNG</th>
        </tr>
      </thead>
      <tbody>';
    if (isset($_POST['submit_search'])) {
      $search = $_POST['search'];
      $tim = "SELECT * FROM `trademark` WHERE `name` LIKE '%$search%'";
      $result_search = $conn->query($tim);
      $dem = 1;
      if ($result_search->num_rows > 0) {
        while ($row_search = $result_search->fetch_assoc()) {
          echo '<tr>
              <th style="text-align: center !important;" scope="row">' . $dem . '</th>
              <td style="text-align: center !important;">' . $row_search['name'] . '</td>
              <td style="text-align: center !important;">' . $row_search['name_category'] . '</td>
              <td style="text-align: center !important;"><img width="100px" src="images/thuonghieu/' . $row_search['image'] . '" alt=""></td>
              <td style="text-align: justify;-webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
              overflow: hidden;
              text-overflow: ellipsis;
              height: 80px;display: -webkit-box; !important;max-width: 300px;">' . $row_search['description'] . '</td>
              <td style="text-align: center !important;">' . $row_search['time'] . '</td>
              <td style="text-align: center !important;">
                <a href="category_delete.php?id=' . $row_search['id'] . '"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a>
                <a href="category_update.php?id=' . $row_search['id'] . '"><i class="mx-1 btn btn-primary fas fa-edit"></i></a>
                </td>
            </tr>';
          $dem++;
        }
      } else {
        echo '<div class="alert alert-danger" role="alert">
          <p class="m-0">Kết quả tìm kiếm không có!!!</p>
        </div>';
      }
    } else {
      $sql = "SELECT * FROM `trademark`";
      $result = $conn->query($sql);
      $dem = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<tr>
              <th style="text-align: center !important;" scope="row">' . $dem . '</th>
              <td style="text-align: center !important;">' . $row['name'] . '</td>
              <td style="text-align: center !important;">' . $row['name_category'] . '</td>
              <td style="text-align: center !important;"><img width="100px" src="images/thuonghieu/' . $row['image'] . '" alt=""></td>
              <td style="text-align: justify;-webkit-line-clamp: 3;
              -webkit-box-orient: vertical;
              overflow: hidden;
              text-overflow: ellipsis;
              height: 80px;display: -webkit-box; !important;max-width: 300px;">' . $row['description'] . '</td>
              <td style="text-align: center !important;">' . $row['time'] . '</td>
              <td style="text-align: center !important;">
                <a href="trademark_delete.php?id=' . $row['id'] . '"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a>
                <a href="trademark_update.php?id=' . $row['id'] . '"><i class="mx-1 btn btn-primary fas fa-edit"></i></a>
                </td>
            </tr>';
          $dem++;
        }
      }
    }
  } else {
    echo '<div class="alert alert-danger">
        <span>Bạn không phải admin!!!</span>
    </div>';
  }
}

?>



</tbody>
</table>