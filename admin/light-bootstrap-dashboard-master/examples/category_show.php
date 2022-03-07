<div class="d-flex justify-content-between">


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
      echo '<div class="m-4">
        <a class="btn btn-primary" href="category.php?q=them">Thêm Category</a>
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
          <th scope="col" style="text-align: center !important;">NAME CATEGORY</th>
          <th scope="col" style="text-align: center !important;">IMAGE BANNER CATEGORY</th>
          <th scope="col" style="text-align: center !important;">IMAGE CATEGORY</th>
          <th scope="col" style="text-align: center !important;">TIME UPDATE</th>
          <th scope="col" style="text-align: center !important;">CHỨC NĂNG</th>
        </tr>
      </thead>
      <tbody>';
      if (isset($_POST['submit_search'])) {
        $search = $_POST['search'];
        $tim = "SELECT * FROM `categories` WHERE `name_category` LIKE '%$search%'";
        $result_search = $conn->query($tim);
        $dem = 1;
        if ($result_search->num_rows > 0) {
          while ($row_search = $result_search->fetch_assoc()) {
            echo '<tr>
                  <th style="text-align: center !important;" scope="row">' . $dem . '</th>
                  <td style="text-align: center !important;"><a href="../../../category.php?id='.$row_search['id_category'].'">' . $row_search['name_category'] . '</a></td>
                  <td style="text-align: center !important;"><img width="100px" src="images/category/banner/' . $row_search['image_banner'] . '" alt=""></td>
                  <td style="text-align: center !important;"><img width="100px" src="images/category/' . $row_search['image'] . '" alt=""></td>
                  <td style="text-align: center !important;">' . $row_search['time_update'] . '</td>
                  <td style="text-align: center !important;"><a href="category_delete.php?id=' . $row_search['id_category'] . '" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a><a href="category_update.php?q=sua&id=' . $row_search['id_category'] . '"><i class="mx-1 btn btn-primary fas fa-edit"></i></a></td>
                </tr>';
            $dem++;
          }
        } else {
          echo '<div class="alert alert-danger" role="alert">
              <p class="m-0">Kết quả tìm kiếm không có!!!</p>
            </div>';
        }
      } else {
        include 'db.php';
        $sql = "SELECT * FROM `categories`";
        $result = $conn->query($sql);
        $dem = 1;
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<tr>
                  <th style="text-align: center !important;" scope="row">' . $dem . '</th>
                  <td style="text-align: center !important;"><a href="../../../category.php?id='.$row['id_category'].'">' . $row['name_category'] . '</td>
                  <td style="text-align: center !important;"><img width="100px" src="images/category/banner/' . $row['image_banner'] . '" alt=""></td>
                  <td style="text-align: center !important;"><img width="100px" src="images/category/' . $row['image'] . '" alt=""></td>
                  <td style="text-align: center !important;">' . $row['time_update'] . '</td>
                  <td style="text-align: center !important;"><a href="category_delete.php?id=' . $row['id_category'] . '" onclick="return confirm(\'Bạn có muốn xóa không ?\')"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a><a href="category_update.php?q=sua&id=' . $row['id_category'] . '"><i class="mx-1 btn btn-primary fas fa-edit"></i></a></td>
                </tr>';
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