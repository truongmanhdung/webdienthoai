
<?php
include 'db.php';
if(!empty($_POST['keyword'])){
    $search =  $_POST['keyword'];
    $query = "SELECT * FROM `products` WHERE `name_product` like '%$search%'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '
            <div class="p-2 border-bottom">
                <a href="sanpham.php?id=' . $row['id_product'] . '">
                    <div class="product_search_item d-flex align-items-center">
                        <img style=" width: 100px;" src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '" alt="">
                        <div>
                            <p>' . $row['name_product'] . '- ' . $row['product_category'] . '</p>
                            <p>' . number_format($row['product_price']) . 'đ</p>
                        </div>
                    </div>
                </a>
            </div>';
        }
    }else{
        echo '<div class="alert alert-danger w-100" role="alert">
            không tìm thấy sản phẩm nào!!!
        </div>';
    }
}

?>
