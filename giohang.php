<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<?php
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

if (isset($_COOKIE['user'])) {
    $email_user = $_COOKIE['user'];
    $sql_user = "SELECT * FROM `users` WHERE `email` = '$email'";
    $result_user = $conn->query($sql_user);
    if ($result_user->num_rows > 0) {
        while ($row_user = $result_user->fetch_assoc()) {
            $id_user = $row_user['id_user'];
        }
    }
}
if (isset($_GET['action'])) {
    function update_cart($add = false)
    {
        foreach ($_POST['quantity'] as $id => $quantity) {
            if ($quantity == 0) {
                unset($_SESSION['cart'][$id]);
            } else {
                if ($add == true) {
                    $_SESSION['cart'][$id] += $quantity;
                } else {
                    $_SESSION['cart'][$id] = $quantity;
                }
            }
        }
    }
    switch ($_GET['action']) {
        case "add":
            update_cart(true);
            header("Location: giohang.php");
            break;
        case "delete":
            if (isset($_GET['id'])) {
                unset($_SESSION['cart'][$_GET['id']]);
            }
            header("Location: giohang.php");
            break;
        case "submit":
            if (isset($_POST['update_click'])) {
                update_cart();
                header("Location: giohang.php");
            } else if (isset($_POST['submit_click'])) {
                if (empty($_POST['fullname'])) {
                    echo '
                 <script>
                   alert("Bạn phải nhập họ tên");
                 </script>
               ';
                } else if (empty($_POST['email'])) {
                    echo '
           <script>
             alert("Bạn phải nhập email");
           </script>
         ';
                } else if (empty($_POST['phone'])) {
                    echo '
           <script>
             alert("Bạn phải nhập số điện thoại");
           </script>
         ';
                } else if (empty($_POST['address'])) {
                    echo '
           <script>
             alert("Bạn phải nhập địa chỉ");
           </script>
         ';
                } else if (empty($_POST['quantity'])) {
                    echo '
                 <script>
                   alert("Giỏ hàng rỗng");
                 </script>
               ';
                } else {
                    $pro = "SELECT * FROM products Where id_product in (" . implode(",", array_keys($_SESSION['cart'])) . ")";
                    $products = $conn->query($pro);
                    $total = 0;
                    $name = $_POST['fullname'];
                    $id_user = $id_user;
                    $email = $_POST['email'];
                    $address = $_POST['address'];
                    $phone = $_POST['phone'];
                    $ghichu = $_POST['ghichu'];
                    $order_product = array();
                    while ($row = $products->fetch_assoc()) {
                        $order_product[] = $row;
                        $thanhtien = $row['product_price'] * $_SESSION['cart'][$row['id_product']];
                        $total += $thanhtien;
                    }
                    $sql = "INSERT INTO `order` (`id_user`, `name`, `email`, `phone`, `address`, `ghichu`, `tonggia`, `time`, `updatetime`) VALUES ('$id_user', '$name', '$email', '$phone', '$address', '$ghichu', '$total', '$today', '$today');";
                    $results = $conn->query($sql);
                    $insert_string = "";
                    $order_id = $conn->insert_id;
                    $num = 0;
                    foreach ($order_product as $key => $product) {
                        $insert_string .= "($order_id, " . $product['id_product'] . ", " . $_POST['quantity'][$product['id_product']] . ", " . $product['product_price'] . ",'$today','$today')";
                        if ($key != count($order_product) - 1) {
                            $insert_string .= ",";
                        }
                    }
                    $order_detail = "INSERT INTO `order_detail`(`order_id`, `product_id`, `soluong`, `gia`, `time`, `time_update`) VALUES $insert_string";
                    $con = $conn->query($order_detail);
                    if ($con) {
                        echo '
             <script>
               alert("Đặt hàng thành công, tiếp tục mua hàng");
             </script> 
           ';
?><script>
                            <?php echo ("location.href = 'index.php';"); ?>
                        </script><?php
                                    unset($_SESSION['cart']);
                                }
                            }
                        }
                        break;
                }
            }
            if (!empty($_SESSION['cart'])) {
                $pro = "SELECT * FROM `products` Where id_product in (" . implode(",", array_keys($_SESSION['cart'])) . ")";
                $products = $conn->query($pro);
        
            }
                                    ?>
<div class="giohang-content">
    <div class="giohang-content-heading mt-5" style="text-align:center;">
        <h5>
            TRANG CHỦ >
            <span style="color: blue; font-weight: bold">GIỎ HÀNG</span>
        </h5>
    </div>
    <div class="giohang-content-body row">
        <div class="container gio-hang-content-left col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div class="container-heading-form">
                <h5>CHI TIẾT GIỎ HÀNG</h5>
            </div>
            <form action="giohang.php?action=submit" method="post">
                <table class="gh_table">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th colspan="2" style="color: red;">Tên Sản Phẩm</th>
                            <th>Ảnh Sản Phẩm</th>
                            <th>Loại đồng hồ</th>
                            <th style="color: red;">Đơn Giá</th>
                            <th>Số Lượng</th>
                            <th style="color: red;">Thành Tiền</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $num = 1;
                        $total = 0;
                        if (!empty($products)) {
                            while ($row = $products->fetch_assoc()) {
                                $thanhtien = $row['product_price'] * $_SESSION['cart'][$row['id_product']];
                                echo ' <tr>
                       <td>' . $num . '</td>
                       <td colspan="2">' . $row['name_product'] . '</td>
                       <td><img src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '" alt=""></td>
                       <td>' . $row['product_category'] . '</td>
                       <td>' . number_format($row['product_price']) . 'đ</td>
                       <td>
                         <input class="form-control" value="' . $_SESSION['cart'][$row['id_product']] . '" type="number" name="quantity[' . $row['id_product'] . ']" id="">
                       </td>
                       <td>' . number_format($thanhtien) . 'đ</td>
                       <td><a href="giohang.php?action=delete&id=' . $row['id_product'] . '">Xóa</a></td>
                       </tr>';
                                $num++;
                                $total += $thanhtien;
                            }
                            echo '<tr>
                     <td colspan="7" style="font-weight: bold;">Tổng tiền</td>
                     <td style="color: red; font-weight: bold;" colspan="1">' . number_format($total) . 'đ</td>
                     <td></td>
                     </tr>';
                        } else {
                            echo '
                 <script>
                   alert("chưa có sản phẩm nào trong giỏ hàng");
                 </script>
               ';
                        }
                        ?>
                    </tbody>
                </table>
                <div class="mt-4">
                    <button type="submit" name="update_click" class="btn btn-outline-primary btn-primary">Cập nhật<table></table></button>
                    <a href="category.php" class="btn btn-outline-primary btn-primary">Tiếp tục mua hàng</a>
                </div>
                <div class="container gio-hang-content-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="container-form">

                        <div class="container-heading-form">
                            <h5>THÔNG TIN LIÊN HỆ</h5>
                        </div>
                        <div class="dangki-form">
                            <p class="dangki-form-p">
                                Lưu ý: Các ô có dấu <span style="color: red">(*)</span> cần
                                điền đầy đủ thông tin
                            </p>
                        </div>
                        <?php
                        if (isset($_COOKIE['user'])) {
                            $email_user = $_COOKIE['user'];
                            $sql_user = "SELECT * FROM `users` WHERE `email` = '$email'";
                            $result_user = $conn->query($sql_user);
                            if ($result_user->num_rows > 0) {
                                while ($row_user = $result_user->fetch_assoc()) {
                                    $id_user = $row_user['id_user'];
                                    $email_user = $row_user['email'];
                                    $address = $row_user['address'];
                                    $phone = $row_user['phone'];
                                    $username = $row_user['name'];
                                }
                            }
                            echo '<div class="mb-3">
                                <label for="exampleInputName1" class="form-label">Họ và Tên <span style="color: red">(*)</span></label>
                                <input type="name" value="' . $username . '" class="form-control" name="fullname" id="exampleInputName1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address <span style="color: red">(*)</span></label>
                                <input type="email" value="' . $email_user . '" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPhone1" class="form-label">Phone Number <span style="color: red">(*)</span></label>
                                <input type="number" value="' . $phone . '" class="form-control" name="phone" id="exampleInputPhone1" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputAddress1" class="form-label">Address <span style="color: red">(*)</span></label>
                                <input type="text" value="' . $address . '" class="form-control" name="address" id="exampleInputAddress1" aria-describedby="addresslHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Ghi chú</label>
                                <textarea type="text" class="form-control" name="ghichu" id="exampleInputText1"></textarea>
                            </div>';
                        } else {
                            echo '<div class="mb-3">
                                <label for="exampleInputName1" class="form-label">Họ và Tên <span style="color: red">(*)</span></label>
                                <input type="name" class="form-control" name="fullname" id="exampleInputName1">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address <span style="color: red">(*)</span></label>
                                <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPhone1" class="form-label">Phone Number <span style="color: red">(*)</span></label>
                                <input type="number" class="form-control" name="phone" id="exampleInputPhone1" aria-describedby="phoneHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputAddress1" class="form-label">Address <span style="color: red">(*)</span></label>
                                <input type="text" class="form-control" name="address" id="exampleInputAddress1" aria-describedby="addresslHelp">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputText" class="form-label">Ghi chú</label>
                                <textarea type="text" class="form-control" name="ghichu" id="exampleInputText1"></textarea>
                            </div>';
                        }
                        ?>

                        <button type="submit" name="submit_click" class="btn btn-primary">Đặt hàng</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<?php 
    include 'footer.php';
?>