function footer(){
    return `<div class="row">
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <img width="100%" src="../admin/light-bootstrap-dashboard-master/examples/images/footer/1.jpg" alt="">
    </div>
    
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-center footer_bg pt-5">
        <h4 class="mt-5">BE PART OF CURNON</h4>
        <p>Ai nói bạn không thể lựa chọn gia đình?</p>
        <p class="ketnoi">
            <span><i class="fab fa-facebook-f"></i></span>
            <span><i class="fab fa-instagram"></i></span>
            <span><i class="fab fa-youtube"></i></span>
        </p>
        <p>#CURNONWATCH</p>
    </div>
    
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
        <img width="100%" src="../admin/light-bootstrap-dashboard-master/examples/images/footer/2.jpg" alt="">
    </div>
    
</div>
<div class="bg-dark">
    <div class="container d-flex justify-content-between align-items-center p-4">
        <div class="footer_item d-flex align-items-center color-white">
            <i style="font-size: 38px" class="fas fa-shield-alt me-3"></i>
            <p>BẢO HÀNH 10 NĂM LỖI NHÀ SẢN XUẤT</p>
        </div>
        <div class="footer_item d-flex align-items-center color-white">
            <i style="font-size: 38px" class="fas fa-shipping-fast me-3"></i>
            <p>FREESHIP VỚI ĐƠN HÀNG TỪ 700.000 VND</p>
        </div>
        <div class="footer_item d-flex align-items-center color-white">
            <i style="font-size: 38px" class="fas fa-medal me-3"></i>
            <p>CAM KẾT 100% HÀNG CHÍNH HÃNG</p>
        </div>
    </div>
</div>

<div class="footer_login mt-5">
    <div class="header_footer_login text-center">
        <h5>ĐĂNG KÍ NHẬN TIN MỚI</h5>
        <p>Nhận các tin tức về chương trình và khuyến mãi sớm nhất</p>
    </div>
    <div class="login_footer" style="max-width: 800px; margin: 20px auto;">
        <form method="post" action="" class="d-flex justify-content-between">
          <div class="mb-3">
            <input style="width: 260px; height:50px" placeholder="Họ tên" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
          </div>
          <div class="mb-3">
            <input style="width: 260px; height:50px" placeholder="Email" type="password" class="form-control" id="exampleInputPassword1">
          </div>
          <button type="submit" class="btn btn-dark text-white">ĐĂNG KÝ</button>
        </form>
    </div>
</div>
<div class="footer_end">
    
    <div class="row container">
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <p class="mb-3">© 2019 - Bản quyền của CTCP PHÁT TRIỂN SẢN PHẨM SÁNG TẠO VIỆT</p>
            <p>Giấy chứng nhận ĐKKD số 0108150321 do Sở Kế hoạch và Đầu tư Thành phố Hà Nội cấp ngày 29/01/2018 123C Thụy Khuê, Tây Hồ, Hà Nội</p>
        </div>
        
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 row align-items-center">
            
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-end">
                <img width="50%" src="../admin/light-bootstrap-dashboard-master/examples/images/footer/momo-tS5.png" alt="">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-start">
                <img width="50%" src="../admin/light-bootstrap-dashboard-master/examples/images/footer/vnpay-bBZ.png" alt="">
            </div>
            
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 text-center">
                <img width="100%" src="../admin/light-bootstrap-dashboard-master/examples/images/footer/bct-5Sz.png" alt="">
            </div>
            
        </div>
        
    </div>
    
</div>`;
}
document.getElementById('footer').innerHTML = footer();