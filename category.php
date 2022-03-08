<?php
include 'db.php';
include 'header.php';
?>
<title>Đồng hồ nam</title>
<style>
  .container-fluid {
    margin: 0;
    padding: 0;
  }

  a {
    text-decoration: none;
  }

  .banner {

    height: 300px;
    width: 100%;
    background-size: cover;
    background-position: center center;
  }



  .banner-footer {
    background-image: url(https://cf.shopee.vn/file/233be77758a6373022bcda83dabbf31d);
    height: 370px;
    margin: 100px 0;
  }

  .banner-footer p.text-secondary {
    font-size: 35px;
    font-weight: 100;
  }

  .banner-footer p.text-secondary,
  .banner-footer button {
    margin-left: 37px;
  }
</style>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM `categories` WHERE `id_category` = '$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $name_category = $row['name_category'];
      $image_banner = $row['image_banner'];
      $sql_pr = "SELECT * FROM `products` WHERE product_category LIKE '$name_category'";
      $result_pr = $conn->query($sql_pr);
      if ($result_pr->num_rows > 0) {
        $dem = 0;
        while ($row_pr = $result_pr->fetch_assoc()) {
          $dem++;
        }
      }
    }
  }
  echo '<div class="container-fluid">
  <div class="banner" style="background-image: url(./admin/light-bootstrap-dashboard-master/examples/images/category/banner/' . $image_banner . ');">
    <div class="container pt-5">
      <h1 class="text-white pt-5 py-2" style="text-transform: uppercase; 
      ">' . $name_category . '</h1>
    </div>
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
  <div class="banner" style="background-image: url(./admin/light-bootstrap-dashboard-master/examples/images/category/banner/Banner_Mens.webp);">
    <div class="container pt-5">
      <h1 class="text-white pt-5 py-2" style="text-transform: uppercase; 
      ">Tất cả sản phẩm</h1>
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
}
?>

<div class="category_product row">

  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
    <div class="p-3">
      <div class="top_view border">
        <h3 style="padding: 10px 0;" class="text-center bg-light">Top sản phẩm</h3>
        <div class="view_sp">
          <div class="row">
            <?php
            if (isset($_GET['id'])) {
              $sql3 = "SELECT * FROM products WHERE product_category LIKE '$name_category' ORDER BY view DESC LIMIT 5";
              $top_view = $conn->query($sql3);
              if ($top_view->num_rows > 0) {
                while ($row = $top_view->fetch_assoc()) {
                  echo '
                  <a class="d-flex" href="sanpham.php?id=' . $row['id_product'] . '">
                  <div class="col-5 border-bottom">
                  <img width="100%" src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '" alt="">
                </div>
                <div class="col-7 border-bottom pt-3">
                  <h6>' . $row['name_product'] . '</h6>
                  <p>' . number_format($row['product_price']) . ' đ</p>
                  <p><i class="fas fa-eye"></i> ' . $row['view'] . '</p>
                </div></a>
                ';
                }
              }
            } else {
              $sql3 = "SELECT * FROM products ORDER BY view DESC LIMIT 5";
              $top_view = $conn->query($sql3);
              if ($top_view->num_rows > 0) {
                while ($row = $top_view->fetch_assoc()) {
                  echo '
                    <a class="d-flex" href="sanpham.php?id=' . $row['id_product'] . '">
                    <div class="col-5 border-bottom">
                    <img width="100%" src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row['image'] . '" alt="">
                  </div>
                  <div class="col-7 border-bottom pt-3">
                    <h6>' . $row['name_product'] . '</h6>
                    <p>' . number_format($row['product_price']) . ' đ</p>
                    <p><i class="fas fa-eye"></i> ' . $row['view'] . '</p>
                  </div></a>
                  ';
                }
              }
            }
            ?>

          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="product container col-xs-9 col-sm-9 col-md-9 col-lg-9">
    <div class="row pb-4 mt-4">
      <?php
      if (isset($_GET['id'])) {
        $sql = "SELECT * FROM products where `product_category` = '$name_category'";
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
                    <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view view1"><span>XEM SẢN PHẨM</span></a>
                  </div>
                </div>';
          }
        }
      } else {
        if (isset($_GET['select_search'])) {
          $select_search = $_GET['select_search'];
          if ($select_search == 'giamdan') {
            $sql = "SELECT * FROM `products` ORDER BY `products`.`product_price` DESC";
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
                      <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view view1"><span>XEM SẢN PHẨM</span></a>
                    </div>
                  </div>';
              }
            }
          } else if ($select_search == 'tangdan') {
            $sql = "SELECT * FROM `products` ORDER BY `products`.`product_price` ASC";
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
                      <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view view1"><span>XEM SẢN PHẨM</span></a>
                    </div>
                  </div>';
              }
            }
          }
        } else {
          $sql = "SELECT * FROM products ORDER BY `product_category`";
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
                      <a href="./sanpham.php?id=' . $row['id_product'] . '" class="view view1"><span>XEM SẢN PHẨM</span></a>
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
<!-- end product_nam -->
<div class="container">
  <div class="banner-footer d-flex justify-content-center flex-column">
    <p class="text-white ms-5 mb-4 ">MIX&MATCH PHỤ KIỆN</p>
    <button class="btn btn-dark text-white" href="/phu-kien.html">TÌM HIỂU THÊM</button>
  </div>
  <div class="mb-4">
    <?php
    if (isset($_GET['id'])) {
      echo '<a href=""> ' . $name_category . '</a> thời trang từ lâu đã trở thành món phụ kiện không thể thiếu của các đấng mày râu. Thế nhưng làm thế nào để lựa chọn được <a href="">những mẫu ' . $name_category . ' đẹp</a>, phù hợp để nâng tầm phong cách là việc không phải
      ai cũng biết. Hướng dẫn cách chọn ' . $name_category . ' của chúng tôi sẽ giúp mọi việc trở nên dễ dàng hơn bao giờ! >> Xem chi tiết tại: <a href="">' . $name_category . ' thời trang - Phụ kiện hàng hiệu xu hướng mới nhất</a>';
    } else {
      echo '<a href=""> đồng hồ</a> thời trang từ lâu đã trở thành món phụ kiện không thể thiếu của các đấng mày râu. Thế nhưng làm thế nào để lựa chọn được <a href="">những mẫu đồng hồ đẹp</a>, phù hợp để nâng tầm phong cách là việc không phải
      ai cũng biết. Hướng dẫn cách chọn đồng hồ của chúng tôi sẽ giúp mọi việc trở nên dễ dàng hơn bao giờ! >> Xem chi tiết tại: <a href="" đồng hồ thời trang - Phụ kiện hàng hiệu xu hướng mới nhất</a>';
    }
    ?>
  </div>
</div>
<?php
include 'footer.php';
?>