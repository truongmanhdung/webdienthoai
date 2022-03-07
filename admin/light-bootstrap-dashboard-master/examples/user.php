<?php
include 'header.php';
include 'db.php';
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
    echo '
    <div class="container">
    
    <div class="d-flex justify-content-between">
    <div class="m-4">
      
    </div>
    <div class="search m-4">
      <form method="post" action="" class="d-flex">
        <div class="me-2">
          <input type="text" required placeholder="Tìm kiếm" name="search" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>
        <button type="submit" name="submit_search" class="btn ms-2 btn-primary">Search</button>
      </form>
    </div>
  </div>
  <table class="table mx-4">
    <thead>
      <tr class="update">
        <th scope="col" style="text-align: center !important;">STT</th>
        <th scope="col" style="text-align: center !important;">Name_user</th>
        <th scope="col" style="text-align: center !important;">Email</th>
        <th scope="col" style="text-align: center !important;">Image</th>
        <th scope="col" style="text-align: center !important;">TIME UPDATE</th>
        <th scope="col" style="text-align: center !important;">Admin</th>
        <th scope="col" style="text-align: center !important;">CHỨC NĂNG</th>
      </tr>
    </thead>
    <tbody>';
    if (isset($_POST['submit_search'])) {
      $search = $_POST['search'];

      $tim = "SELECT * FROM `users` WHERE `name` LIKE '%$search%'";
      $result_search = $conn->query($tim);
      $dem = 1;
      if ($result_search->num_rows > 0) {
        while ($row_search = $result_search->fetch_assoc()) {
          if ($row_search['admin'] == 1) {
            echo '<tr>
                <th style="text-align: center !important;" scope="row">' . $dem . '</th>
                <td style="text-align: center !important;">' . $row_search['name'] . '</td>
                <td style="text-align: center !important;">' . $row_search['email'] . '</td>
                <td style="text-align: center !important; "><img style="width: 100px" src="./images/user/' . $row_search['image'] . '" alt=""></td>
                <td style="text-align: center !important;">' . $row_search['time'] . '</td>
                <td style="text-align: center !important;"><span class="btn btn-primary">Admin</span></td>
                <td style="text-align: center !important;"><a href="category_delete.php?id=' . $row_search['id_user'] . '"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a></td>
              </tr>';
          } else {
            '<tr>
                <th style="text-align: center !important;" scope="row">' . $dem . '</th>
                <td style="text-align: center !important;">' . $row_search['name'] . '</td>
                <td style="text-align: center !important;">' . $row_search['email'] . '</td>
                <td style="text-align: center !important; "><img style="width: 100px" src="./images/user/' . $row_search['image'] . '" alt=""></td>
                <td style="text-align: center !important;">' . $row_search['time'] . '</td>
                <td style="text-align: center !important;"><a href="" class="btn btn-primary">Update Admin</a></td>
                <td style="text-align: center !important;"><a href="category_delete.php?id=' . $row_search['id_user'] . '" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a></td>
              </tr>';
          }
          $dem++;
        }
      } else {
        echo '<div class="alert alert-danger" role="alert">
          <p class="m-0">Kết quả tìm kiếm không có!!!</p>
        </div>';
      }
    } else {
      $sql = "SELECT * FROM `users`";
      $result = $conn->query($sql);
      $dem = 1;
      if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
          echo '<tr>
                  <th style="text-align: center !important;" scope="row">' . $dem . '</th>
                  <td style="text-align: center !important;">' . $row['name'] . '</td>
                  <td style="text-align: center !important;">' . $row['email'] . '</td>
                <td style="text-align: center !important; "><img style="width: 100px" src="./images/user/' . $row['image'] . '" alt=""></td>
                  <td style="text-align: center !important;">' . $row['time'] . '</td>';
          if ($row['admin'] == 1) {
            echo '<td style="text-align: center !important;"><span class="btn btn-primary">Admin</span><a href="remove_admin.php?id=' . $row['id_user'] . '" class="btn mx-2 btn-primary">Remove Admin</a></td>';;
          } else {
            echo '<td style="text-align: center !important;"><a href="update_admin.php?id=' . $row['id_user'] . '" class="btn btn-primary">Update Admin</a></td>';
          }
          echo '<td style="text-align: center !important;"><a href="category_delete.php?id=' . $row['id_user'] . '" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a></td>
                </tr>
                </div>';
          $dem++;
        }
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