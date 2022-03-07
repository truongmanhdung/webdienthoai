<?php
include 'db.php';
include 'header.php';
include 'date.php';
?>
<?php
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM `products` WHERE `id_product` = '$id'";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      $id_product = $row['id_product'];
      $id_category = $row['id_category'];
      $name = $row['name_product'];
      $view = $row['view'] + 1;
      $image = $row['image'];
      $detail1 = $row['product_detail'];
      $price = $row['product_price'];
      $product_category = $row['product_category'];
      $updateview = "UPDATE `products` SET `view`= '$view' WHERE `id_product` = '$id_product'";
      $view_up = $conn->query($updateview);
    }
  }
}
?>
<link rel="stylesheet" href="./public/css/sanpham.css?v=<?php echo time(); ?>" />
<main>
  <div class="overlay d-none"></div>
  <div class="container-fluid">
    <div class="container d-flex py-5 row">
      <div id="" class="col-6">
        <img width="100%" src="./admin/light-bootstrap-dashboard-master/examples/images/product/<?php echo $image; ?>" alt="" />
      </div>
      <div class="col-6">
        <h2 class="fs-5"><?php echo $detail1; ?></h2>
        <div class="text-uppercase fs-1"><span><?php echo $name; ?></span></div>
        <div class="">
          <span class="fw-bold"><?php echo number_format($price); ?> ₫</span>
          <span class="text-secondary">0 đánh giá<i class="ms-1 fas fa-star"></i><i class="ms-1 fas fa-star"></i><i class="ms-1 fas fa-star"></i><i class="ms-1 fas fa-star"></i><i class="ms-1 fas fa-star"></i></span>
        </div>
        <div class="">
          <p>
            hoặc <span class="fw-bold">≈ <?php echo number_format($price / 3); ?> ₫ x 3 kỳ với</span>
            <a href="" class="fw-bold">Fundiin</a>
          </p>
        </div>
        <div class="d-flex">
          <p class="pe-3 border-end border-secondary">
            Tình trạng: <span class="text-success fw-bold"> Còn hàng</span>
          </p>
          <p class="ps-3 clicksize">SIZE GUIDE</p>
        </div>
        <hr width="" style="margin: 25px auto" />
        <div class="p-3 border box-sizing d-flex border-danger">
          <div class="pe-3">
            <img src="https://curnonwatch.com/cuffs-7t3.jpg" alt="cuffs" />
          </div>
          <div>
            <p class="fw-bold text-danger fw-bold">
              BẠN ĐƯỢC TẶNG 1 VÒNG TAY BẤT KỲ KHI MUA CHIẾC ĐỒNG HỒ NÀY
            </p>
            <p>Chương trình kéo dài từ 19/5 - 23/5</p>
          </div>
        </div>
        <div class="">
          <?php 
            echo '<form action="giohang.php?action=add" method="POST" class="mt-3">
            <div class="form-groud d-flex mb-2 align-items-center">
              <span style="display: block; width: 100px;" class="label label-success">Số lượng</span>
              <input style="width: 100px;" value="1" class="form-control" type="number" name="quantity['.$id.']" size="2" id="">
            </div>
            <div class="d-flex justify-content-between mb-4">
              <button type="submit" class="btn btn-dark text-white">Thêm vào giỏ hàng</button>
              <a class="btn btn-dark text-white" href="javascript:history.go(-1)">Trở về</a>
            </div>
          </form>';
          ?>
        </div>
        <div class="">
          <span class="fs-6"><i class="fas fa-truck-monster me-1"></i>MIỄN PHÍ VẬN
            CHUYỂN</span>
          <span class="fs-6"><i class="fas fa-check-circle me-1"></i>BẢO HÀNH 10 NĂM, 1 ĐỔI
            1 TRONG 30 NGÀY</span>
        </div>
        <label for="check_check" class="overlay1"></label>
        <div class="sanpham_hover">
          <div class="
                  sanpham_header
                  d-flex
                  align-items-center
                  justify-content-lg-between
                  pb-4
                  pt-4
                ">
            <h5>CHỌN VÒNG MÀ BẠN MUỐN</h5>
            <label for="check_check" class="fas fa-times"></label>
          </div>
          <div class="spanpham_list">
            <div class="
                    d-flex
                    align-items-center
                    justify-content-around
                    row
                    text-center
                  ">
              <p class="border active_nhan d-block click_nam col-6 p-3">VÒNG TAY NAM</p>
              <p class="border col-6 click_nu p-3">VÒNG TAY NỮ</p>
            </div>
          </div>

          <div class="row nam">
            <?php
            $id = $_GET['id'];
            $sql1 = "SELECT * FROM `products` where `product_category` like N'%phụ kiện nam%'";
            $result1 = $conn->query($sql1);
            if ($result1->num_rows > 0) {
              while ($row1 = $result1->fetch_assoc()) {
                echo '<div class="col-6">
                    <div class="sanpham_item text-center">
                      <img width="100"
                        src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row1['image'] . '";
                        
                        alt=""
                      />
                      <p class="color-red">+' . number_format($row1['product_price']) . 'đ</p>
                      <p>' . $row1['name_product'] . '</p>
                      <a
                        href="sanpham.php?id=' . $id . '&pkn=' . $row1['id_product'] . '"
                        class="
                          btn btn-dark
                          text-white
                          ms-3
                          text-center
                          fw-bold
                          my-4
                          pt-3
                        "
                        >Chọn</a
                      >
                    </div>
                  </div>';
              }
            }
            ?>
          </div>
          <div class="row nu">
            <?php
            $sql_nu = "SELECT * FROM `products` where `product_category` like N'%phụ kiện nữ%'";
            $result_nu = $conn->query($sql_nu);
            if ($result_nu->num_rows > 0) {
              while ($row_nu = $result_nu->fetch_assoc()) {
                echo '<div class="col-6">
                    <div class="sanpham_item text-center">
                      <img width="100"
                        src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row_nu['image'] . '";
                        
                        alt=""
                      />
                      <p class="color-red">+' . number_format($row_nu['product_price']) . 'đ</p>
                      <p>' . $row_nu['name_product'] . '</p>
                      <a
                        href="sanpham.php?id=' . $id . '&pknu=' . $row_nu['id_product'] . '"
                        class="
                          btn btn-dark
                          text-white
                          ms-3
                          text-center
                          fw-bold
                          my-4
                          pt-3
                        "
                        >Chọn</a
                      >
                    </div>
                  </div>';
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <div class="youtube d-none">
    <div class="video">
      <iframe width="640" height="480" src="https://www.youtube.com/embed/ZqSyUkffhUM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
      <i class="fas fa-times-circle text-white clickyoutube"></i>
    </div>
  </div>
  <div class="container-fluid">
    <div class="container mx-auto">
      <?php

      ?>
      <div class="tab text-center d-flex justify-content-between mb-5">
        <button id="chitiet-tab" class="tab btn text-dark pb-3" onclick="clickBtn(event, 'chitiet')">
          CHI TIẾT THÔNG SỐ KĨ THUẬT
        </button>
        <button id="phuongthuc-tab" class="tab btn text-dark pb-3" onclick="clickBtn(event, 'phuongthuc')">
          PHƯƠNG THỨC VẬN CHUYỂN
        </button>
        <button id="baohanh-tab" class="tab btn text-dark pb-3" onclick="clickBtn(event, 'baohanh')">
          ĐỔI TRẢ VÀ BẢO HÀNH
        </button>
        <button id="thanhtoan-tab" class="tab btn text-dark pb-3" onclick="clickBtn(event, 'thanhtoan')">
          PHƯƠNG THỨC THANH TOÁN
        </button>
      </div>
      <?php
      $sql2 = "SELECT * FROM `product_detail` WHERE `id_product` = '$id'";
      $result2 = $conn->query($sql2);
      if ($result2->num_rows > 0) {
        while ($row2 = $result2->fetch_assoc()) {
          $detail2 = $row2['detail'];
          $kichthuocmat = $row2['kichthuocmat'];
          $doday = $row2['doday'];
          $maumat = $row2['maumat'];
          $loaimay = $row2['loaimay'];
          $kichcoday = $row2['kichcoday'];
          $matkinh = $row2['matkinh'];
          $chatlieuday = $row2['chatlieuday'];
          echo '<div id="chitiet" class="content">
              <div class="row">
                <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                  <h2 class="fs-5">Đồng hồ ' . $name . '</h2>
                  <p>' . $detail2 . '</p>
                  <p>
                    <span class="fw-bold">- Kính Sapphire</span> chống xước vượt
                    trội và bảo vệ mặt đồng hồ luôn sáng bóng
                  </p>
                  <p>
                    <span class="fw-bold">- Chất liệu Stainless Steel </span>bền
                    bỉ được lựa chọn cùng phần hoàn thiện Nhám đem lại cho chiếc
                    Đồng hồ Diver sự cứng cáp, mạnh mẽ nhưng vẫn vô cùng trẻ
                    trung.
                  </p>
                  <p>
                    <span class="fw-bold">- Chống nước 10ATM</span> - Giúp bạn tự
                    tin trong hoạt động hàng ngày và trong cả những hoạt động bơi
                    lội dưới nước.
                  </p>
                  <p>
                    <span class="fw-bold">- Tính năng Lịch ngày </span> không thể
                    thiếu không chỉ làm điểm nhấn và còn giúp những người đàn ông
                    hiện đại kiểm soát thời gian tốt hơn.
                  </p>
                </div>
  
                <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7 row">
                  <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3"></div>
                  <div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
                    <ul>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Kích thước mặt</p>
                        <p class="">' . $kichthuocmat . '</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Độ dày</p>
                        <p class="">' . $doday . '</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Màu mặt</p>
                        <p class="">' . $maumat . '</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Loại máy</p>
                        <p class="">' . $loaimay . '</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Kích cỡ dây</p>
                        <p class="">' . $kichcoday . '</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Chống nước</p>
                        <p class="">10ATM</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          pb-2
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Mặt kính</p>
                        <p class="">' . $matkinh . '</p>
                      </li>
                      <li
                        class="
                          d-flex
                          justify-content-between
                          pb-2
                          mt-3
                          border-bottom border-secondary
                        "
                      >
                        <p class="">Chất liệu dây</p>
                        <p class="">' . $chatlieuday . '</p>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>';
        }
      }


      ?>

      <div id="phuongthuc" class="content">
        <table class="table fs-6">
          <thead>
            <tr class="bg-warning">
              <th class="py-4">Hình thức vận chuyển</th>
              <th class="py-4">Phạm vi</th>
              <th class="py-4">Phí vận chuyển</th>
              <th class="py-4">Thời gian vận chuyển</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Tiêu chuẩn</td>
              <td>Toàn quốc</td>
              <td>
                <span>- Miễn phí vận chuyển với đơn hàng từ 700,000đ trở
                  lên</span><br /><span>- 30,000đ với đơn hàng có giá trị thấp hơn 700,000đ</span>
              </td>
              <td>
                <span>- Nội thành Hà Nội: 1-2 ngày</span><br /><span>- Miền Trung: 3-5 ngày</span><br /><span>- Miền Nam: 5-7 ngày</span>
              </td>
            </tr>
            <tr>
              <td rowspan="2" style="border-right: 1px solid rgb(229, 229, 229)">
                Chuyển phát nhanh
              </td>
              <td>Nội thành Hà Nội</td>
              <td>30,000đ</td>
              <td>
                4 tiếng kể từ thời gian nhận được điện thoại xác nhận đơn
                hàng.
              </td>
            </tr>
            <tr>
              <td>Các tỉnh, thành phố khác</td>
              <td>50,000đ</td>
              <td>3-5 ngày</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="baohanh" class="content">
        <p class="fw-bold">• Chính sách đổi trả:</p>
        <p>
          <span class="fw-bold">- 1 ĐỔI 1 </span>trong vòng 3 ngày kể từ khi
          nhận hàng (kèm theo các điều kiện)
        </p>
        <p class="fw-bold">• Chính sách bảo hành:</p>
        <p>
          <span class="fw-bold">- BẢO HÀNH 10 NĂM đối</span> với những lỗi
          từ nhà sản xuất
        </p>
        <p>
          <span class="fw-bold">- BẢO HÀNH MIỄN PHÍ (1 năm đầu)</span>với
          những lỗi người dùng như: vỡ, nứt kính, hấp hơi nước, va đập mạnh,
          rơi linh kiện bên trong mặt đồng hồ...
        </p>
        <p class="fw-bold">- THAY PIN MIỄN PHÍ TRỌN ĐỜI</p>
      </div>
      <div id="thanhtoan" class="content">
        <p>
          Curnon cung cấp các phương thức thanh toán an toàn, bạn có thể
          chọn thanh toán bằng
          <span class="fw-bold">tiền mặt sau khi nhận hàng, ví điện tử Momo, cổng thanh toán
            VNPAY hoặc chuyển khoản trực tiếp</span>
          cho chúng tôi.
        </p>
        <img src="https://curnonwatch.com/momo-tS5.png" alt="" width="60px" height="60px" />
        <img src="https://curnonwatch.com/vnpay-bBZ.png" alt="" width="60px" height="60px" />
      </div>
    </div>
  </div>
  <div class="slide_sp mt-4 mb-4">
    <h3 class="container border-bottom pb-4">Sản phẩm liên quan</h3>
    <div class="swiper-container container">
      <!-- Additional required wrapper -->
      <div class="swiper-wrapper pt-4 pb-4">
        <!-- Slides -->
        <?php
        $sql3 = "SELECT * FROM products WHERE id_category = $id_category AND not (id_product = '$id')";
        $result3 = $conn->query($sql3);
        if ($result3->num_rows > 0) {
          while ($row3 = $result3->fetch_assoc()) {
            echo '<div class="swiper-slide">
                  <div class="product-item">
                    <input
                      type="checkbox"
                      hidden
                      id="' . $row3['id_product'] . '"
                      class="input_focus"
                    />
                    <label class="i_position" for="' . $row3['id_product'] . '">
                      <i class="far fa-heart"></i>
                    </label>
                    <img
                      src="./admin/light-bootstrap-dashboard-master/examples/images/product/' . $row3['image'] . '"
                      alt=""
                    />
                    <a href="./sanpham.php?id=' . $row3['id_product'] . '" class="title"><span>' . $row3['product_detail'] . '</span></a>
                    <a href="./sanpham.php?id=' . $row3['id_product'] . '" class="name d-block"><span>' . $row3['name_product'] . '</span></a>
                    <p class="price mt-3 mb-3">' . number_format($row3['product_price']) . 'đ</p>
                    <a href="./sanpham.php?id=' . $row3['id_product'] . '" class="view"><span>XEM SẢN PHẨM</span></a>
                  </div>
                </div>';
          }
        }
        ?>



      </div>
      <!-- If we need pagination -->
      <div class="swiper-pagination"></div>

      <!-- If we need navigation buttons -->
      <div class="swiper-button-prev"></div>
      <div class="swiper-button-next"></div>

      <!-- If we need scrollbar -->
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
  <div class="comment bg-light container-fluid pb-5">
    <div class="container pt-4">
      <h3 class="ms-4">ĐÁNH GIÁ - BÌNH LUẬN</h3>
      <?php
      if (isset($_COOKIE['user'])) {
        $email = $_COOKIE['user'];
        $sql4 = "SELECT * FROM users WHERE `email` = '$email'";
        $result4 = $conn->query($sql4);
        if ($result4->num_rows > 0) {
          while ($row4 = $result4->fetch_assoc()) {
            $id_user = $row4['id_user'];
            $user_name_comment = $row4['name'];
            $admin = $row4['admin'];
          }
          echo '<form method="post" action class="m-4">
          <div class="mb-3">
            <input type="text" required name="comment" placeholder="Nhập bình luận của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <button type="submit" name="submit_comment" class="btn btn-primary">Bình luận</button>
        </form>';
        }
        if (isset($_POST['submit_comment'])) {
          $comment = $_POST['comment'];
          $sql5 = "INSERT INTO `comment`( `id_user`,`product`, `id_product`,`username`, `content`, `time`) VALUES ('$id_user','$name','$id','$user_name_comment','$comment','$today')";
          $result5 = $conn->query($sql5);
          if ($result5) {
            header('Location: sanpham.php?id=' . $id . '');
          }
        }
      } else {
        echo '<p class="color-red ">Bạn phải đăng nhập để bình luận về sản phẩm!!!</p>';
      }
      ?>

      <div class="d-flex align-items-center justify-content-between m-4">
        <p>Bình luận đi nào!!!</p>
        <p><input width="200px" type="search" class="form-control d-block" placeholder="tìm kiếm"></p>
      </div>
      <?php
      $in = "SELECT * FROM `comment` WHERE `id_product`= '$id'";
      $in_comment = $conn->query($in);
      if ($in_comment->num_rows > 0) {
        while ($row8 = $in_comment->fetch_assoc()) {
          $id_comment = $row8['id'];
          $id_user8 = $row8['id_user'];
          $admin_rep = $row8['admin_rep'];
          $sql_user = "SELECT * FROM `users` WHERE `id_user` = '$id_user8'";
          $img_user = $conn->query($sql_user);
          if ($img_user->num_rows > 0) {
            while ($row_img = $img_user->fetch_assoc()) {
              $user_img = $row_img['image'];
              $user_admin = $row_img['admin'];
            }
          }
          echo '<div class="comment_item d-flex container ps-4">
            <div class="comment_left me-2">
              <img class="mt-1" height="60px" width="60px" src="./admin/light-bootstrap-dashboard-master/examples/images/user/' . $user_img . '" alt="">
            </div>
            <div class="comment_right">';
          if ($user_admin == 1) {
            echo '<h5>Admin</h5>';
          } else {
            echo '<h5>' . $row8['username'] . '</h5>';
          }

          echo '
              <p class="d-block w-100">' . $row8['content'] . '</p>';
          if (isset($_COOKIE['user'])) {
            echo '<p class="d-flex align-items-center"><label style="cursor: pointer;color: blue;" for="' . md5($row8['id']) . '">Trả lời</label><i style="font-size: 10px;" class="fas mx-2 fa-circle"></i>' . $row8['time'] . '
                ';
          }

          if (isset($_COOKIE['user'])) {
            if ($id_user8 == $id_user || $admin == 1) {
              echo '
                      <a class="ms-2"  href="sanpham.php?id=' . $id . '&comment=' . $id_comment . '" onclick="return confirm(\'Bạn có muốn xóa bình luận này không ?\')">Xóa bình luận</a>
                    ';
            }
          }
          echo '</p>
              <input type="checkbox" hidden name="rep_comment" class="check_rep" id="' . md5($row8['id']) . '">
              <div class="rep mt-2">
                <form action="" method="post">
                  <input name="rep_comment_sp" required width="600px" id="" class="form-control" placeholder="trả lời bình luận của ' . $row8['username'] . '">
                  <button type="submit" name="submit_rep_comment' . md5($row8['id']) . '" class="btn btn-primary mt-4 mb-4">Trả lời</button>
                  <label for="' . md5($row8['id']) . '" class="huy"><p class="btn btn-primary">Hủy</p></label>
                </form>
              </div>
            </div>
          </div>';
          $sql10 = "SELECT * FROM `repcomment` WHERE `id_comment`='$id_comment'";
          $result10 = $conn->query($sql10);
          if ($result10->num_rows > 0) {
            while ($row10 = $result10->fetch_assoc()) {
              $id_rep = $row10['id'];
              $id_user10 = $row10['id_user'];
              $sql_user = "SELECT * FROM `users` WHERE `id_user` = '$id_user10'";
              $img_user = $conn->query($sql_user);
              if ($img_user->num_rows > 0) {
                while ($row_img = $img_user->fetch_assoc()) {
                  $user_img = $row_img['image'];
                  $user_admin = $row_img['admin'];
                }
              }
              echo '<div class="comment_item d-flex container" style="padding: 10px 0 10px 85px;">
                  <div class="comment_left me-2">
                  <img class="mt-1" width="60px" height="60px" src="./admin/light-bootstrap-dashboard-master/examples/images/user/' . $user_img . '" alt="">
                  </div>
                  <div class="comment_right">';
              if ($user_admin == 1) {
                echo '<h5>Admin</h5>';
              } else {
                echo '<h5>' . $row10['user_name'] . '</h5>';
              }
              echo '<p class="d-block w-100">' . $row10['comment'] . '</p>
                    <p class="d-flex align-items-center">Đã trả lời ' . $row8['username'] . '<i style="font-size: 10px;" class="fas mx-2 fa-circle"></i>' . $row10['time'] . '
                    ';
              if (isset($_COOKIE['user'])) {
                if ($id_user10 == $id_user || $admin == 1) {
                  echo '
                          <a class="ms-2"  href="sanpham.php?id=' . $id . '&repcomment=' . $id_rep . '" onclick="return confirm(\'Bạn có muốn xóa bình luận này không ?\')">Xóa bình luận</a>
                        ';
                }
              }
              echo '</p>
                  </div>
                </div>';
            }
          }
          if (isset($_POST['submit_rep_comment' . md5($row8['id']) . ''])) {
            $rep_comment_sp = $_POST['rep_comment_sp'];
            $sql7 = "INSERT INTO `repcomment`( `id_comment`, `id_user`, `comment`, `time`, `user_name`) VALUES ('$id_comment','$id_user','$rep_comment_sp','$today','$user_name_comment')";
            $result7 = $conn->query($sql7);
            if ($result7) {
              header('Location: sanpham.php?id=' . $id . '');
            }
          }
        }
      }
      ?>
      <?php
      if (isset($_GET['comment'])) {

        $id_comment = $_GET['comment'];
        $id = $_GET['id'];
        $sql = "DELETE FROM `comment` WHERE `id`='$id_comment'";
        $result = $conn->query($sql);
        if ($result) {
          header('Location: sanpham.php?id=' . $id . '');
        }
      }
      if (isset($_GET['repcomment'])) {
        $id = $_GET['id'];
        $id_repcomment = $_GET['repcomment'];
        $sql = "DELETE FROM `repcomment` WHERE `id`='$id_repcomment'";
        $result = $conn->query($sql);
        if ($result) {
          header('Location: sanpham.php?id=' . $id . '');
        }
      }
      ?>
    </div>
  </div>
</main>

<?php 
  include 'footer.php';
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.5.4/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-beta1/js/bootstrap.min.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="./js/header.js?v=<?php echo time(); ?>"></script>
<script src="./js/footer.js?v=<?php echo time(); ?>"></script>
<script src="./js/app.js?v=<?php echo time(); ?>"></script>
<script src="./js/sanpham.js?v=<?php echo time(); ?>"></script>
</body>
<script>
  function clickBtn(evt, hehe) {
    var i, content, tab;
    content = document.getElementsByClassName("content");
    for (i = 0; i < content.length; i++) {
      content[i].style.display = "none";
    }
    tab = document.getElementsByClassName("tab");
    for (i = 0; i < tab.length; i++) {
      tab[i].classList.remove("border-button");
    }
    document.getElementById(hehe).style.display = "block";
    document.getElementById(hehe + "-tab").classList.add("border-button");
  }
  document.getElementById("chitiet-tab").click();
  $(document).ready(function() {
    $(".clickyoutube").click(function(e) {
      e.preventDefault();
      $(".youtube").addClass("d-none");
      $(".overlay").addClass("d-none");
      $("html, body").css({
        overflow: "unset",
        height: "unset",
      });
    });
    $(".clicksize").click(function(e) {
      e.preventDefault();
      $(".youtube").removeClass("d-none");
      $(".overlay").removeClass("d-none");
      $("html, body").css({
        overflow: "hidden",
        height: "100%",
      });
    });
    $(".overlay").click(function(e) {
      e.preventDefault();
      $(".overlay").addClass("d-none");
      $(".youtube").addClass("d-none");
      $("html, body").css({
        overflow: "unset",
        height: "unset",
      });
    });
  });
</script>

</html>