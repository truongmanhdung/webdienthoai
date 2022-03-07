<?php 
     include 'db.php';
     include 'header.php';
?>

<div class="container">
     <a href="slide_add.php" class="btn btn-primary mt-5">Thêm Slide</a>
     <h3 class="text-center mt-3 mb-3">Quản trị slide</h3>
     <table class="table">
       <thead>
         <tr>
           <th scope="col">STT</th>
           <th scope="col">Ảnh</th>
           <th scope="col">Link</th>
           <th scope="col">Time</th>
           <th scope="col">Chức năng</th>
         </tr>
       </thead>
       <tbody>
          <?php 
               $sql_slide = "SELECT * FROM `slide`";
               $result_slide = $conn->query($sql_slide);
               if($result_slide->num_rows > 0){
                    $dem = 0;
                    while($row_slide = $result_slide->fetch_assoc()){
                         $dem++;
                         echo '
                         <tr>
                              <th scope="row">'.$dem.'</th>
                              <td><img style="width: 100px" src="./images/slide/'.$row_slide['image'].'" alt=""></td>
                              <td><a href="../../../'.$row_slide['link'].'">'.$row_slide['link'].'</a></td>
                              <td>'.$row_slide['time'].'</td>
                              <th>
                                   <a href="slide_delete.php?id=' . $row_slide['id'] . '"><i class="fas mx-1 btn btn-primary fa-times-circle"></i></a>
                                   <a href="slide_update.php?id=' . $row_slide['id'] . '"><i class="mx-1 btn btn-primary fas fa-edit"></i></a>
                              </th>
                         </tr>
                         ';
                    }
               }
          ?>
         
       </tbody>
     </table>
</div>