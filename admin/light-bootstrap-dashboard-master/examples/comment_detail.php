<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<div class="container">
    <div class="d-flex mt-4">
        <a class="btn btn-primary"href="comment.php">Trở về</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">User Name</th>
                <th scope="col">Nội dung</th>
                <th scope="col">Time</th>
                <th scope="col">Trạng thái</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(isset($_COOKIE['user'])){
                $email = $_COOKIE['user'];
                $sql_user = "SELECT * FROM `users` WHERE `email` = '$email'";
                $result_user = $conn->query($sql_user);
                if($result_user->num_rows > 0){
                    while($row_user = $result_user->fetch_assoc()){
                        $user = $row_user['name'];
                        $id_admin = $row_user['id_user'];
                        $admin = $row_user['admin'];
                    }
                }
                if($admin==1){
                    if (isset($_GET['id'])) {
                        $id = $_GET['id'];
                        $sql = "SELECT * FROM `comment` WHERE `id_product` = '$id'";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            $dem = 0;
                            while ($row = $result->fetch_assoc()) {
                                $id_comment = $row['id'];
                                $comment = $row['content'];
                                $user_name = $row['username'];
                                $id_user = $row['id_user'];
                                $product = $row['product'];
                                $time = $row['time'];
                                $admin_rep = $row['admin_rep'];
                                $dem++;
                                echo '<tr>
                        <th scope="row">' . $dem . '</th>
                        <td>' . $user_name . '</td>
                        <td>' . $comment . '</td>
                        <td>' . $time . '</td>';
                                if ($admin_rep == 1) {
                                    echo '<td>
                                <span class="btn btn-primary">Đã rep</span>
                            </td>';
                                } else {
                                    echo '<td>
                                <label for="' . $id_comment . '" class="btn btn-primary">Chưa rep, rep ngay</label>
                                <input type="checkbox" id="' . $id_comment . '" class="rep_input" hidden>
                                <div class="repcomment">
                                    <form action="" method="post">
                                        <input type="text" class="form-control" name="rep_admin" required>
                                        <div class="mt-3">
                                            <button class="btn btn-primary" type="submit" name="repcomment' . $id_comment . '">Trả lời</button>
                                            <label class="btn btn-primary m-0" for="' . $id_comment . '">Hủy</label>
                                        </div>
                                    </form>    
                                </div>
                            </td>';
                                }
        
                                echo '</tr>';
                                if(isset($_POST['repcomment' . $id_comment . ''])){
                                    $update_rep = "UPDATE `comment` SET `admin_rep` = 1 WHERE `id`=$id_comment";
                                    $update_rep_cm = $conn->query($update_rep);
                                    $rep_admin = $_POST['rep_admin'];
                                    $sql_rep = "INSERT INTO `repcomment`(`id_comment`, `id_user`, `comment`, `time`, `user_name`) VALUES ('$id_comment','$id_admin','$rep_admin','$today','$user')";
                                    $result_rep = $conn->query($sql_rep);
                                    if($result_rep){
                                        $id = $_GET['id'];
                                        header("Location: comment_detail.php?id=$id");
                                    }
                                }
                            }
                        }
                    }  
                }else{
                    echo '<div class="alert alert-danger">
                        <span>Bạn không phải admin!!!</span>
                    </div>';
                }
                    
            }
            
            ?>

    </table>
</div>