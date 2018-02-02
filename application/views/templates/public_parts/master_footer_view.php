
<footer class="footer container-fluid">
    <div id="footer_head">
        <!--<img src="<?php echo site_url('assets/public/img/footer_header.png') ?>" alt="register_footer">-->
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
                <table class="table">
                    <thead>
                        <tr>
                            <td colspan="2"><div id="main_logo"></div></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                            <td>
                                Cơ sở 1: Số 7, Tổ 1 phường La Khê – Quận Hà Đông – Thành phố Hà Nội
                                <br>
                                Điện thoại: 024.33.119.828 – 0963.221.493
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                            <td>
                                Cơ sở 2: Số 108 Phan Đình Giót, Tổ 2 phường La Khê – Quận Hà Đông – Thành phố Hà Nội
                                <br>
                                Điện thoại: 024.33.552.359 – 0973.521.728
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                            <td>
                                Cơ sở 3: Tầng 5 tòa V3 chung cư Victoria Văn Phú – Hà Đông – HN.
                                <br>Điện thoại: 024.62.542.325 - 0167.9360.287
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-map-marker" aria-hidden="true"></i></td>
                            <td>
                                Cơ sở 5: Liền kề 16 – Ô 52 khu đô thị An Hưng – phường La khê – HĐ – HN.
                                <br>
                                Điện thoại: 024.62.942.689 - 0945.688.978
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-envelope" aria-hidden="true"></i></td>
                            <td>mntuoithantien-hd@hanoiedu.vn</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <h3>Thăm dò dư luận</h3>
                <p>
                    Bạn quan tâm nhất điều gì khi con tới trường?
                </p>

                <?php
                echo form_open_multipart('', array('id' => 'survey_form', 'class' => 'form-horizontal'));
                ?>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "1", NULL, 'id="optionsRadios1"'); ?>
                        Con được học và chơi gì?
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "2", NULL, 'id="optionsRadios2"'); ?>
                        "Khi đến tường cô giáo như mẹ hiền"
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "3", NULL, 'id="optionsRadios3"'); ?>
                        Con được ăn gì? Uống gì? Ngủ ngon không?
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "4", NULL, 'id="optionsRadios4"'); ?>
                        Tất cả các ý kiến trên
                    </label>
                </div>

                <br>
                <br>

                <button id="send-survey" type="button" class="btn btn-primary" onclick="sendSurvey()">Bình chọn</button>

                <?php
                echo form_close();
                ?>

                <!--<h3>Về chúng tôi</h3>
                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('trang-chu') ?>">Trang chủ</a></li>
                    <li><a href="<?php echo base_url('gioi-thieu/tam-nhin') ?>">Tầm nhìn</a></li>
                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/thu-tuc-nhap-hoc') ?>">Thủ tục nhập học</a></li>
                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/giao-duc') ?>">Phối hợp cùng phụ huynh</a></li>
                    <li><a href="<?php echo base_url('hoat-dong/thong-bao-nha-truong') ?>">Hoạt động</a></li>
                    <li><a href="<?php echo base_url('lien-he') ?>">Liên hệ</a></li>
                    <br>
                    <li><a href="#" data-toggle="modal" data-target="#survey_modal">Thăm dò dư luận</a> </li>
                </ul>--> <!--Close footer nav -->

            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <h3>Thông tin truy cập</h3>
                <table class="table">
                    <thead>
                    <tr>
                        <td>Lượt truy cập</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Đang trực tuyến</td>
                        <td><?php echo $olnine; ?></td>
                    </tr>
                    <tr>
                        <td>Hôm nay</td>
                        <td><?php echo $total_day; ?></td>
                    </tr>
                    <tr>
                        <td>Hôm qua</td>
                        <td><?php echo $total_yesterday; ?></td>
                    </tr>
                    <tr>
                        <td>Tất cả</td>
                        <td><?php echo $total; ?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h3>Facebook</h3>

                <table class="table">
                    <tr>
                        <td>
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a target="_blank" href="https://www.facebook.com/H%E1%BB%87-Th%E1%BB%91ng-Tr%C6%B0%E1%BB%9Dng-m%E1%BA%A7m-non-Tu%E1%BB%95i-Th%E1%BA%A7n-Ti%C3%AAn-kh%E1%BB%91i-nh%C3%A0-tr%E1%BA%BB-682980001756212/">
                                Hệ Thống Trường mầm non Tuổi Thần Tiên khối nhà trẻ
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a target="_blank" href="https://www.facebook.com/khoi3tuoi/">
                                Hệ thống trường MN Tuổi Thần Tiên khối 3 tuổi
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a target="_blank" href="https://www.facebook.com/hethongtruongmamnontuoithantiencs3/">
                                Hệ thống trường mầm non Tuổi Thần Tiên CS3
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a target="_blank" href="https://www.facebook.com/H%E1%BB%87-th%E1%BB%91ng-tr%C6%B0%E1%BB%9Dng-MN-Tu%E1%BB%95i-Th%E1%BA%A7n-Ti%C3%AAn-Kh%E1%BB%91i-4-Tu%E1%BB%95i-1546143268939800/">
                                Hệ thống trường MN Tuổi Thần Tiên Khối 4 Tuổi
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a target="_blank" href="https://www.facebook.com/Mntuoithantiencs5/?ref=br_rs">
                                Hệ thống trường mầm non Tuổi Thần Tiên CS5
                            </a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <i class="fa fa-facebook-f" aria-hidden="true"></i>
                        </td>
                        <td>
                            <a target="_blank" href="https://www.facebook.com/khoi5tuoi/">
                                Hệ thống trường MN Tuổi Thần Tiên Khối 5 tuổi
                            </a>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
    </div>
</footer>
<div class="scrollup">
    <i class="fa fa-chevron-up fa-3x"></i>
</div>

<!--
<button id="surveyOn" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#survey_modal" data-hover="tooltip" data-placement="left" title="Thăm dò dư luận">
    <i class="fa fa-3x fa-question-circle-o" aria-hidden="true"></i>
</button>
-->

<!--
<div class="modal fade" id="survey_modal" tabindex="-1" role="dialog" aria-labelledby="surveyLabel">
    <div class="modal-dialog modal-sm" role="document">
        <?php
        echo form_open_multipart('', array('id' => 'survey_form', 'class' => 'form-horizontal'));
        ?>
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
                        <?php echo form_radio("option", "1", NULL, 'id="optionsRadios1"'); ?>
                        Con được học và chơi gì?
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "2", NULL, 'id="optionsRadios2"'); ?>
                        "Khi đến tường cô giáo như mẹ hiền"
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "3", NULL, 'id="optionsRadios3"'); ?>
                        Con được ăn gì? Uống gì? Ngủ ngon không?
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <?php echo form_radio("option", "4", NULL, 'id="optionsRadios4"'); ?>
                        Tất cả các ý kiến trên
                    </label>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Bình chọn</button>
                <button id="send-survey" type="button" class="btn btn-primary" onclick="sendSurvey()">Bình chọn</button>
                <button type="button" class="btn btn-default">Xem kết quả</button>
            </div>
        </div>
        <?php
        echo form_close();
        ?>
    </div>
</div>
-->

</body>

<script>
    new WOW().init();

    $(function () {
        $('[data-hover="tooltip"]').tooltip();
    });
</script>
<script type="text/javascript" src="<?php echo site_url('assets/public/js/main.js') ?>"></script>

<!-- InstanceEnd --></html>