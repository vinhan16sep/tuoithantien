<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/contact.css') ?>">

<section class="main_content" id="contact">
    <div class="container">
        <div class="row">
            <div class="left col-md-6 col-sm-6 col-xs-12">
                <h1>Gửi ý kiến đóng góp</h1>

                <?php
                echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'contact-form'));
                ?>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <?php
                            echo form_label('Họ và Tên', 'name');
                            echo form_error('name');
                            echo form_input('name', set_value('name'), 'class="form-control contact_name" placeholder="Họ và tên phụ huynh"');
                            ?>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <?php
                            echo form_label('Email address', 'email');
                            echo form_error('email');
                            echo form_input('email', set_value('email'), 'class="form-control" placeholder="Email"');
                            ?>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <?php
                            echo form_label('Ý kiến nhận xét', 'content');
                            echo form_error('content');
                            echo form_textarea('content', set_value('content'), 'class="form-control" rows="4" placeholder=""');
                            ?>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary hvr-icon-forward" type="submit">Gửi nhận xét</button>
                        </div>
                    </div>
                <?php
                echo form_close();
                ?>
            </div>
            <div class="right col-md-6 col-sm-6 col-xs-12">
                <h1>Liên hệ với chúng tôi</h1>

                <p>Trường MN Tuổi Thần Tiên từ khi thành lập đến nay luôn phát triển không ngừng về cơ sở vật chất, đội ngũ cán bộ, giáo viên, nhân viên và học sinh.</p>

                <div class="social_network">
                    <h3>Facebook</h3>
                    <ul class="list-unstyled">
                        <li><a target="_blank" href="https://www.facebook.com/H%E1%BB%87-Th%E1%BB%91ng-Tr%C6%B0%E1%BB%9Dng-m%E1%BA%A7m-non-Tu%E1%BB%95i-Th%E1%BA%A7n-Ti%C3%AAn-kh%E1%BB%91i-nh%C3%A0-tr%E1%BA%BB-682980001756212/">Hệ Thống Trường mầm non Tuổi Thần Tiên khối nhà trẻ</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/khoi3tuoi/">Hệ thống trường MN Tuổi Thần Tiên khối 3 tuổi</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/hethongtruongmamnontuoithantiencs3/">Hệ thống trường mầm non Tuổi Thần Tiên CS3</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/H%E1%BB%87-th%E1%BB%91ng-tr%C6%B0%E1%BB%9Dng-MN-Tu%E1%BB%95i-Th%E1%BA%A7n-Ti%C3%AAn-Kh%E1%BB%91i-4-Tu%E1%BB%95i-1546143268939800/">Hệ thống trường MN Tuổi Thần Tiên Khối 4 Tuổi</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/Mntuoithantiencs5/?ref=br_rs">Hệ thống trường mầm non Tuổi Thần Tiên CS5</a></li>
                        <li><a target="_blank" href="https://www.facebook.com/khoi5tuoi/">Hệ thống trường MN Tuổi Thần Tiên Khối 5 tuổi</a></li>
                    </ul>

                    <!--<ul class="list-inline">
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-facebook-f"></i>
                            </a></li>
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-linkedin"></i>
                            </a></li>
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-vk"></i>
                            </a></li>
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-twitter"></i>
                            </a></li>
                    </ul>-->
                </div>

                <h1>Địa chỉ liên hệ</h1>

                <table class="table">
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
                </table>
            </div>

            <div class="map col-md-12 col-sm-12 col-xs-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d119215.95477315335!2d105.759425!3d20.972642!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x165d1c48862284c6!2zVHLGsOG7nW5nIG3huqdtIG5vbiBUdeG7lWkgVGjhuqduIFRpw6pu!5e0!3m2!1svi!2sus!4v1512474071713" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

        </div>

    </div>

</section>
<script>

    $('form#contact-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('contact/create'); ?>",
            data: {
                input: $("#contact-form").serialize()
            },
            success: function(res){
                alert('Cảm ơn ' + $('.contact_name').val() + ', ý kiến của bạn đã được gửi!');
            },
            error: function() { alert("Error mail."); }
        });

    });
</script>