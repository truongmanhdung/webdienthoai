<?php 
    include 'header.php';
    include 'date.php';
    include 'db.php';
?>
<div class="container">
    <h3 class="text-center mt-3 mb-3">Quản trị setting</h3>
    <?php 
      $sql = "SELECT * FROM `setting`";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
      }else{
        echo '
          <a href="setting_add.php" class="btn btn-primary">Thêm Setting</a>
        ';
      }
    ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Logo</th>
          <th scope="col">Chiến dịch</th>
          <th scope="col">Hình thức</th>
          <th scope="col">Slogan</th>
          <th scope="col">Address</th>
          <th scope="col">Note</th>
          <th scope="col">Time</th>
          <th scope="col">Chức năng</th>
      </thead>
        <?php 
            $sql = "SELECT * FROM `setting`";
            $result = $conn->query($sql);
            if($result->num_rows > 0){
              while($row = $result->fetch_assoc()){
                echo '
                <tr>
                    <td><img style="width:100px" src="./images/setting/'.$row['logo'].'" alt=""></td>
                    <td>'.$row['h5_banner'].'</td>
                    <td>'.$row['h3_banner'].'</td>
                    <td>'.$row['slogan'].'</td>
                    <td>'.$row['address'].'</td>
                    <td>'.$row['note'].'</td>
                    <td>'.$row['time'].'</td>
                    <td>
                        <a href="setting_update.php?id='. $row['id'].'" class="btn btn-primary">Sửa</a>
                        <a href="setting_delete.php?id='. $row['id'].'" class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                ';
              }
            }
        ?>
       
      </tbody>
    </table>
</div>