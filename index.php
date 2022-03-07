    <?php
    include 'header.php';
    include 'db.php';
    ?>
    <main>
     
      <div class="container-fluid">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
      <ol class="carousel-indicators">
      <?php
      $sql_slide = 'SELECT * FROM `slide` LIMIT 1';
      $result_slide = $conn->query($sql_slide);
      if ($result_slide->num_rows > 0) {
          while ($row_slide = $result_slide->fetch_assoc()) {
              $id_slide = $row_slide['id'];
              echo '<li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></li>';
          }
      }
      ?>
        <?php
        $sql_slide = "SELECT * FROM `slide` WHERE NOT (`id` = '$id_slide')";
        $result_slide = $conn->query($sql_slide);
        if ($result_slide->num_rows > 0) {
            $dem = 1;
            while ($row_slide = $result_slide->fetch_assoc()) {
                echo ' <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="' .
                    $dem .
                    '"></li>';
                $dem++;
            }
        }
        ?>
       
      </ol>
      
      <div class="carousel-inner">
      <?php
      $sql_slide = 'SELECT * FROM `slide` LIMIT 1';
      $result_slide = $conn->query($sql_slide);
      if ($result_slide->num_rows > 0) {
          while ($row_slide = $result_slide->fetch_assoc()) {
              $id_slide = $row_slide['id'];
              $link = $row_slide['link'];
              $sql_setting_menu = 'SELECT * FROM `setting`';
              $result_setting_menu = $conn->query($sql_setting_menu);
              if ($result_setting_menu->num_rows > 0) {
                  while (
                      $row_setting_menu = $result_setting_menu->fetch_assoc()
                  ) {
                      $h1 = $row_setting_menu['h5_banner'];
                      $h3 = $row_setting_menu['h3_banner'];
                      $slogan = $row_setting_menu['slogan'];
                  }
              }
              echo '
            <div class="carousel-item active">
              <img src="./admin/light-bootstrap-dashboard-master/examples/images/slide/' .
                  $row_slide['image'] .
                  '" class="d-block w-100" alt="' .
                  $row_slide['image'] .
                  '">
              <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white mb-5">' .
                  $h1 .
                  '</h1>
                <h3 class="text-white mb-5">' .
                  $h3 .
                  '</h3>
                <p class="mb-5">' .
                  $slogan .
                  '</p>
                <a href="' .
                  $link .
                  '" data-aos="fade-down"
                  data-aos-anchor-placement="top-bot" data-aos-duration="1500" class="btn btn-outline-primary bg-test btn_view mb-5"
                                  >MUA ĐỒNG HỒ NGAY</a
                                >
              </div>
            </div>
            ';
          }
      }
      ?>
      <?php
      $sql_slide = "SELECT * FROM `slide`  WHERE NOT (`id` = '$id_slide')";
      $result_slide = $conn->query($sql_slide);
      if ($result_slide->num_rows > 0) {
          while ($row_slide = $result_slide->fetch_assoc()) {
              $link = $row_slide['link'];
              echo '
            <div class="carousel-item">
              <img src="./admin/light-bootstrap-dashboard-master/examples/images/slide/' .
                  $row_slide['image'] .
                  '" class="d-block w-100" alt="' .
                  $row_slide['image'] .
                  '">
              <div class="carousel-caption d-none d-md-block">
                <h1 class="text-white mb-5"></h1>
                <h3 class="text-white mb-5"></h3>
                <p class="mb-5"></p>
                <a href="' .
                  $link .
                  '" data-aos="fade-down"
                  data-aos-anchor-placement="top-bot" data-aos-duration="1500" class="btn btn-outline-primary bg-test btn_view mb-5"
                                  >Mua ngay</a
                                >
              </div>
            </div>
            ';
          }
      }
      ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </a>
    </div>
        <!-- end banner -->
        <div class="category pt-5" data-aos="fade-up"
     data-aos-anchor-placement="top-center" data-aos-duration="1500">
          <div class="row">
            <?php
            $sql = 'SELECT * FROM `categories`';
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-xs-6 col-6 col-sm-6 col-md-6 col-lg-6 mt-3">
                  <a href="category.php?id=' .
                        $row['id_category'] .
                        '">
                    <div class="category_item">
                      <img src="./admin/light-bootstrap-dashboard-master/examples/images/category/' .
                        $row['image'] .
                        '" alt="" />
                      <div class="category_position">
                        <h3 style="text-transform: uppercase;">' .
                        $row['name_category'] .
                        '</h3>
                        <p>MUA NGAY</p>
                      </div>
                    </div>
                  </a>
                </div>';
                }
            }
            ?>
            
          </div>
        </div>
        <!-- end category -->
        <div class="product container" data-aos="fade-up"
     data-aos-anchor-placement="top-center" data-aos-duration="2000">
          <div class="text-center mt-5 mb-5">
            <h3>MEN'S BEST SELLERS</h3>
            <p>KHÁM PHÁ THÊM <i class="fas fa-arrow-right"></i></p>
          </div>
          <div class="row pb-4 ">
            <?php
            $sql =
                "SELECT * FROM products where product_category like N'%đồng hồ nam%' LIMIT 8";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <div class="product-item">
                    <input
                      type="checkbox"
                      hidden
                      id="' .
                        $row['id_product'] .
                        '"
                      class="input_focus"
                    />
                    <label class="i_position" for="' .
                        $row['id_product'] .
                        '">
                      <i class="far fa-heart"></i>
                    </label>
                    <img
                      src="./admin/light-bootstrap-dashboard-master/examples/images/product/' .
                        $row['image'] .
                        '"
                      alt=""
                    />
                    <a href="#" class="title"><span>' .
                        $row['product_detail'] .
                        '</span></a>
                    <a href="#" class="name d-block"><span>' .
                        $row['name_product'] .
                        '</span></a>
                    <p class="price mt-3 mb-3">' .
                        number_format($row['product_price']) .
                        ' đ</p>
                    <a href="./sanpham.php?id=' .
                        $row['id_product'] .
                        '" class="view"><span>XEM SẢN PHẨM</span></a>
                  </div>
                </div>';
                }
            }
            ?>
            
          </div>
        </div>
        <!-- end product_nam -->
        <div class="product container" data-aos="fade-up"
     data-aos-anchor-placement="top-center" data-aos-duration="2000">
          <div class="text-center mt-5 mb-5">
            <h3>WOMEN'S BEST SELLERS</h3>
            <p>KHÁM PHÁ THÊM <i class="fas fa-arrow-right"></i></p>
          </div>
          <div class="row pb-4">
          <?php
          $sql =
              "SELECT * FROM products where product_category like N'%đồng hồ nữ%' LIMIT 8";
          $result = $conn->query($sql);
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {
                  echo '<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                  <div class="product-item">
                    <input
                      type="checkbox"
                      hidden
                      id="' .
                      $row['id_product'] .
                      '"
                      class="input_focus"
                    />
                    <label class="i_position" for="' .
                      $row['id_product'] .
                      '">
                      <i class="far fa-heart"></i>
                    </label>
                    <img
                      src="./admin/light-bootstrap-dashboard-master/examples/images/product/' .
                      $row['image'] .
                      '"
                      alt=""
                    />
                    <a href="#" class="title"><span>' .
                      $row['product_detail'] .
                      '</span></a>
                    <a href="#" class="name d-block"><span>' .
                      $row['name_product'] .
                      '</span></a>
                    <p class="price mt-3 mb-3">' .
                      number_format($row['product_price']) .
                      ' đ</p>
                    <a href="./sanpham.php?id=' .
                      $row['id_product'] .
                      '" class="view"><span>XEM SẢN PHẨM</span></a>
                  </div>
                </div>';
              }
          }
          ?>
            
          </div>
        </div>
        <!-- end product_nu -->
        <div class="video pb-5 pt-5 mt-4">
            <div class="video_click pt-5">
              <div class="container video_show color-white" data-aos="fade-down"
     data-aos-easing="linear"
     data-aos-duration="1500">
                <p class="pt-4">#CURNONWATCH <span class="ms-2">#GOCCANHDI</span></p>
                <h2 class="mt-2">VŨ. X CURNON</h2>
                <h3 class=" mb-5">BST đồng hồ góc cạnh Mykonos</h3>
                <a href="" class="btn btn-outline-primary btn_view mb-4"
                >KHÁM PHÁ BỘ SƯU TẬP</a>
                <p class="mt-5 border-bottom pb-4" style="z-index: 1000000;"><a href="" style="z-index: 1000000;" class="color-white link_video">XEM VIDEO <i class="fas fa-play"></i></a></i></p>
              </div>
              <div class="video_posision" data-aos="flip-left"
     data-aos-easing="ease-out-cubic"
     data-aos-duration="2000">
              
                <div class="row container">
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="d-flex align-items-center click_youtobe1">
                      <div class="click_youtobe click_youtobe1 me-3 color-white">
                        <i class="fas fa-play"></i>
                      </div>
                      <div class="click_right click_right1 color-white">
                        <p>VŨ. X CURNON</p>
                        <p>BST đồng hồ góc cạnh Mykonos</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="d-flex align-items-center ">
                      <div class="click_youtobe click_youtobe2 me-3 color-white">
                        <i class="fas fa-play"></i>
                      </div>
                      <div class="click_right click_right2 color-white">
                        <p>VŨ. X CURNON</p>
                        <p>BST đồng hồ góc cạnh Mykonos</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <div class="d-flex align-items-center ">
                      <div class="click_youtobe click_youtobe3 me-3 color-white">
                        <i class="fas fa-play"></i>
                      </div>
                      <div class="click_right click_right3 color-white">
                        <p>VŨ. X CURNON</p>
                        <p>BST đồng hồ góc cạnh Mykonos</p>
                      </div>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
        </div>
        <!-- video -->
      </div>
    </main>
    <!-- Optional JavaScript; choose one of the two! -->
    <?php include 'footer.php';
?>
