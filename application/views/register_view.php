<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/register.css') ?>">
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<section class="main_content">
    <div class="cover container-fluid">
        <img src="<?php echo site_url('assets/public/img/cover/coverRegister.jpg') ?>" alt="cover">
    </div>
    <div class="container" id="registerScreen">
        <div class="screen_title">
            <h1>Đăng ký nhập học</h1>
            <p>Text giới thiệu chung về các chương trình</p>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1><?php echo $procedure['title'] ?></h1>
                <div class="row">
                    <form class="col-md-6 col-sm-6 col-xs-12">
                    <h3>Dành cho người đăng ký</h3>

                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'contact-form'));
                        ?>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Họ và Tên phụ huynh, người đăng ký (*)', 'name');
                                echo form_error('name');
                                echo form_input('name', set_value('name'), 'class="form-control contact_name" placeholder="Họ và tên"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Số điện thoại liên hệ (*)', 'telNumber');
                                echo form_error('tel');
                                echo form_input('tel', set_value('telNumber'), 'class="form-control" placeholder="Số điện thoại liên hệ"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Email liên hệ', 'email');
                                echo form_error('email');
                                echo form_input('email', set_value('email'), 'class="form-control" placeholder="Email"');
                                ?>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Địa chỉ hiện tại', 'address');
                                echo form_error('address');
                                echo form_textarea('address', set_value('address'), 'class="form-control" rows="3" placeholder=""');
                                ?>
                            </div>

                        </div>
                        <?php
                        echo form_close();
                        ?>
                    </form>
                    <form class="col-md-6 col-sm-6 col-xs-12">
                        <h3>Dành cho học sinh</h3>

                        <?php
                        echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'contact-form'));
                        ?>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Họ và Tên phụ huynh, người đăng ký (*)', 'name');
                                echo form_error('name');
                                echo form_input('name', set_value('name'), 'class="form-control contact_name" placeholder="Họ và tên"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Ngày sinh (*)', 'dob');
                                echo form_error('dateOfBirth');
                                echo form_input('date', set_value('dateOfBirth'), 'class="form-control" placeholder="Ngày sinh" id="dob"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Nơi sinh', 'pob');
                                echo form_error('placeOfBirth');
                                echo form_input('pob', set_value('placeOfBirth'), 'class="form-control" placeholder="Nơi sinh"');
                                ?>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Chọn lớp học tham gia (*)', 'grade');
                                echo form_error('grade');
                                echo form_dropdown('grade', array('' => '---Chọn một lớp tham gia---', '0' => 'Lớp bé (Trẻ từ 3-4 tuổi)', '1' => 'Lớp nhỡ (Trẻ từ 4-5 tuổi)', '2' => 'Lớp lớn (Trẻ hơn 5 tuổi)'), set_value('grade'), 'class="form-control"');
                                ?>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Chọn cở sở trường học (*)', 'place');
                                echo form_error('place');
                                echo form_dropdown('place', array('' => '---Chọn một cơ sở---', '0' => 'Cơ sở I Hà Đông', '1' => 'Cơ sở II Hà Đông', '2' => 'Cơ sở III Hà Đông', '3' => 'Cơ sở III Hà Đông', '4' => 'Cơ sở IV Hà Đông', '5' => 'Cơ sở V Hà Đông'), set_value('place'), 'class="form-control"');
                                ?>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label>Cần thêm tư vấn về các thông tin nhập học</label>
                                <div class="checkbox">
                                    <label>
                                        <?php
                                        //echo form_label('Sản phẩm đặc biệt', 'is_special');
                                        echo form_error('advise');
                                        echo form_checkbox('is_special', 1, false, 'id="advise"') . 'Gọi lại hoặc email cho tôi';
                                        //echo '<div class="checkbox">';
                                        //echo '<label>';
                                        //echo '<input type="checkbox" value="1" name="is_special" id="is_special" checked="false"> Sản phẩm đưa lên trang chủ';
                                        //echo '</label>';
                                        //echo '</div>';
                                        ?>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <small>Lưu ý: Các phần đánh dấu (*) là bắt buộc</small>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <button class="btn btn-primary hvr-icon-forward" type="submit">Gửi đăng ký</button>
                            </div>
                        </div>
                        <?php
                        echo form_close();
                        ?>


                    </form>

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs- text-center">
                <img src="<?php echo site_url('assets/public/img/register.png') ?>" class="wow fadeInUp">
            </div>
        </div>

    </div>
</section>

<script>
    $( function() {
        $( "#dob" ).datepicker({
            dateFormat: "dd-mm-yy",
            showAnim: "fadeIn"
        });

    } );
</script>