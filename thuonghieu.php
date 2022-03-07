<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `trademark` WHERE `id` = '$id'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $sql_pr = "SELECT * FROM `products` WHERE `id_trademark` = '$id'";
            $result_pr = $conn->query($sql_pr);
            if ($result_pr->num_rows > 0) {
                $dem = 0;
                while ($row_pr = $result_pr->fetch_assoc()) {
                    $dem++;
                }
            }
            $id_category = $row['id_category'];
            $category = $row['name_category'];
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];
            echo '<div class="container-fluid">
                <div class="banner pb-5" style="background-size: cover;
                background-position: center center;background-image: url(./admin/light-bootstrap-dashboard-master/examples/images/thuonghieu/' . $image . ');">
                    <div class="container pt-5">';
            if ($category == 'Đồng Hồ Nam') {
                echo '<h1 class="text-white pt-5 py-2" style="text-transform: uppercase; 
                        ">' . $name . '</h1>
                        <p class="text_trang" style="width: 600px; color:white !important, text-align: justify; background-color: transparent !important;">' . $description . '</p>';
            } else if ($category == 'Đồng Hồ Nữ') {
                echo '<h1 class="text-black pt-5 py-2" style="text-transform: uppercase; 
                        ">' . $name . '</h1>
                        <p class="text_den" style="width: 600px; color:white !important, text-align: justify; background-color: transparent !important;">' . $description . '</p>';
            }

            echo '</div>
                </div>
                <div class="container">
                    <div class="row">
                    <div class="d-flex justify-content-between">
                        <div class="mb-3 mt-3">
                        </div>
                    </div>
                    </div>
                </div>
                <div class="bg-light pt-4 pb-4"><p class="container">' . $dem . ' of ' . $dem . ' products</p></div>
                </div>';
        }
    }
} else {
    $sql_pr = "SELECT * FROM `products`";
    $result_pr = $conn->query($sql_pr);
    if ($result_pr->num_rows > 0) {
        $dem = 0;
        while ($row_pr = $result_pr->fetch_assoc()) {
        $dem++;
        }
    }
    echo '<div class="container-fluid">
    <div class="banner pb-5" style="background-size: cover;
    background-position: center center;background-image: url(./admin/light-bootstrap-dashboard-master/examples/images/thuonghieu/Beverly_2.jpg);">
        <div class="container pt-5">
    <h1 class="text-black pt-5 py-2" style="text-transform: uppercase; 
            ">Tất cả thương hiệu đồng hồ</h1>
    </div>
    </div>
    <div class="container">
        <div class="row">
        <div class="d-flex justify-content-between">
            <div class="mb-3 mt-3">
            <form action="" method="get">
                <select class="form-select" name="select_search" onchange="this.form.submit()" aria-label="Default select example">
                <option selected>Sắp xếp phù hợp nhất</option>
                <option value="tangdan">Giá tăng dần</option>
                <option value="giamdan">Giá giảm dần</option>
                </select>
            </form>
            </div>

        </div>
        </div>
    </div>
    <div class="bg-light pt-4 pb-4"><p class="container">' . $dem . ' of ' . $dem . ' products</p></div>
    </div>';
    $sql = "SELECT * FROM `trademark`";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $id_category = $row['id_category'];
            $category = $row['name_category'];
            $name = $row['name'];
            $description = $row['description'];
            $image = $row['image'];
        }
    }
}

?>
<div class="thuonghieu">
    <div class="container">
        <div class="row pb-4 mt-4">
            <?php
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                $sql = "SELECT * FROM products WHERE `id_trademark`='$id'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="col-xs-3 col-sm-3 col-md-3 col-6 col-lg-3">
                    <div class="product-item">
                        <input
                        type="checkbox"
                        hidden
                        id="' . $row['id_product'] . '"
                        class="input_focus"
                        />
                        <label class="i_position" for="' . $row['id_product'] . '">
                        <i class="far fa-heart"></i>
                        </label>
                        <img
                        src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '"
                        alt=""
                        />
                        <a href="./sanpham.php?id=' . $row['id_product'] . '" class="title"><span>' . $row['product_detail'] . '</span></a>
                        <a href="./sanpham.php?id=' . $row['id_product'] . '" class="name d-block"><span>' . $row['name_product'] . '</span></a>
                        <p class="price mt-3 mb-3">' . number_format($row['product_price']) . ' đ</p>
                        <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view"><span>XEM SẢN PHẨM</span></a>
                    </div>
                    </div>';
                    }
                }
            } else {
                if (isset($_GET['select_search'])) {
                    $select_search = $_GET['select_search'];
                    if ($select_search == 'giamdan') {
                        $sql = "SELECT * FROM products WHERE `product_category` like '%đồng hồ%' ORDER BY `product_price` DESC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-xs-3 col-sm-3 col-md-3 col-6 col-lg-3">
                                <div class="product-item">
                                    <input
                                    type="checkbox"
                                    hidden
                                    id="' . $row['id_product'] . '"
                                    class="input_focus"
                                    />
                                    <label class="i_position" for="' . $row['id_product'] . '">
                                    <i class="far fa-heart"></i>
                                    </label>
                                    <img
                                    src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '"
                                    alt=""
                                    />
                                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="title"><span>' . $row['product_detail'] . '</span></a>
                                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="name d-block"><span>' . $row['name_product'] . '</span></a>
                                    <p class="price mt-3 mb-3">' . number_format($row['product_price']) . ' đ</p>
                                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view"><span>XEM SẢN PHẨM</span></a>
                                </div>
                                </div>';
                            }
                        }
                    } else if ($select_search == 'tangdan') {
                        $sql = "SELECT * FROM products WHERE `product_category` like '%đồng hồ%' ORDER BY `product_price` ASC";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<div class="col-xs-3 col-sm-3 col-md-3 col-6 col-lg-3">
                                <div class="product-item">
                                    <input
                                    type="checkbox"
                                    hidden
                                    id="' . $row['id_product'] . '"
                                    class="input_focus"
                                    />
                                    <label class="i_position" for="' . $row['id_product'] . '">
                                    <i class="far fa-heart"></i>
                                    </label>
                                    <img
                                    src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '"
                                    alt=""
                                    />
                                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="title"><span>' . $row['product_detail'] . '</span></a>
                                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="name d-block"><span>' . $row['name_product'] . '</span></a>
                                    <p class="price mt-3 mb-3">' . number_format($row['product_price']) . ' đ</p>
                                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view"><span>XEM SẢN PHẨM</span></a>
                                </div>
                                </div>';
                            }
                        }
                    }
                } else {
                    $sql = "SELECT * FROM products WHERE `product_category` like '%đồng hồ%' ORDER BY `product_category`";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<div class="col-xs-3 col-sm-3 col-md-3 col-6 col-lg-3">
                        <div class="product-item">
                            <input
                            type="checkbox"
                            hidden
                            id="' . $row['id_product'] . '"
                            class="input_focus"
                            />
                            <label class="i_position" for="' . $row['id_product'] . '">
                            <i class="far fa-heart"></i>
                            </label>
                            <img
                            src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '"
                            alt=""
                            />
                            <a href="./sanpham.php?id=' . $row['id_product'] . '" class="title"><span>' . $row['product_detail'] . '</span></a>
                            <a href="./sanpham.php?id=' . $row['id_product'] . '" class="name d-block"><span>' . $row['name_product'] . '</span></a>
                            <p class="price mt-3 mb-3">' . number_format($row['product_price']) . ' đ</p>
                            <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view"><span>XEM SẢN PHẨM</span></a>
                        </div>
                        </div>';
                        }
                    }
                }
            }
            ?>
        </div>
    </div>
</div>
</div>
<?php
include 'footer.php';
?>