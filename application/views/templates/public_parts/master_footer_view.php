
<footer class="footer container-fluid">
    <div id="footer_footer" style="position: absolute; top: -182px; left: 50%;  margin-left: -960px;">
        <img src="<?php echo site_url('assets/public/img/footer_header.png') ?>" alt="register_footer">

    </div>
    <div class="container">
        <div class="row subscribe">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h2 class="title-subscribe">Đăng ký theo dõi</h2>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                Đăng ký email để liên tục được cập nhật thông tin từ chúng tôi
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="input-group">
                    <input type="text" class="form-control subcribe_email" placeholder="Email của quý khách">
                    <span class="input-group-btn">
					<button class="btn btn-default btn-bg subcribe_bnt" type="button">Đăng ký</button>
				  </span>
                </div><!-- /input-group -->
            </div>
        </div>

        <div class="row bottom_nav">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h3>Về chúng tôi</h3>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('gioi-thieu') ?>">Tổng quan</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu/muc-tieu') ?>">Mục tiêu</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu/ngoai-ngu') ?>">Ngoại ngữ</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu/giao-duc-theo-lua-tuoi') ?>">Giáo dục theo lứa tuổi</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu/tap-huan') ?>">Tập huấn</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu/ngoai-khoa') ?>">Ngoại khóa</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h3>Thông tin nhập học</h3>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/thu-tuc-nhap-hoc') ?>">Thủ tục nhập học</a></li>
                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/danh-sach/hoc-phi') ?>">Học phí</a></li>
                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/lich-hoc') ?>">Lịch học</a></li>
                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/danh-sach/chuong-trinh-khuyen-mai') ?>">Chương trình khuyến mãi</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h3>Phối hợp cùng phụ huynh</h3>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/che-do-sinh-hoat-1-ngay') ?>">Chế độ sinh hoạt 1 ngày</a></li>
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/lien-lac') ?>">Liên lạc</a></li>
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/thuc-don') ?>">Thực đơn</a></li>
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/y-te') ?>">Y tế</a></li>
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/gio-dua-don') ?>">Giờ đưa đón</a></li>
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/danh-sach/ky-luat') ?>">Kỷ luật</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h3>Hoạt động</h3>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('hoat-dong/thong-bao') ?>">Thông báo của trường</a></li>
                    <li><a href="<?php echo base_url('thu-vien/thu-vien-anh') ?>">Thư viện ảnh</a></li>
                    <li><a href="<?php echo base_url('thu-vien/video') ?>">Video</a></li>
                    <li><a href="<?php echo base_url('hoat-dong/tuyen-sinh') ?>">Tuyển sinh</a></li>
                    <li><a href="<?php echo base_url('hoat-dong/trai-nghiem') ?>">Trải nghiệm</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<div class="scrollup">
    <i class="fa fa-chevron-up fa-3x"></i>
</div>

<button id="surveyOn" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#survey" data-hover="tooltip" data-placement="left" title="Thăm dò dư luận">
    <i class="fa fa-3x fa-check-circle-o" aria-hidden="true"></i>
</button>

<div class="modal fade" id="survey" tabindex="-1" role="dialog" aria-labelledby="surveyLabel">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>
            <div class="modal-body">
                <h1 class="modal-title" id="myModalLabel">Thăm dò dư luận</h1>
                <label>
                    Bạn quan tâm nhất điều gì khi con tới trường?
                </label>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>
                        Con được học và chơi gì?
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
                        "Khi đến tường cô giáo như mẹ hiền"
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">
                        Con được ăn gì? Uống gì? Ngủ ngon không?
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios4" value="option4">
                        Tất cả các ý kiến trên
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">Bình chọn</button>
                <button type="button" class="btn btn-default">Xem kết quả</button>
            </div>
        </div>
    </div>
</div>

</body>

<script>
    new WOW().init();

    $(function () {
        $('[data-hover="tooltip"]').tooltip();
    });
</script>
<script type="text/javascript" src="<?php echo site_url('assets/public/js/main.js') ?>"></script>

<!-- InstanceEnd --></html>