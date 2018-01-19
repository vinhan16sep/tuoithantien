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
            <p></p>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
                <h1><?php echo $procedure['title'] ?></h1>
                <h2><?php echo ($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?></h2>
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12">
                    <h3>Dành cho người đăng ký</h3>

                        <?php
                        echo form_open_multipart('nhap-hoc/dang-ky-nhap-hoc', array('class' => 'form-horizontal', 'id' => 'contact-form'));
                        ?>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Họ và Tên phụ huynh, người đăng ký (*)', 'parent_name');
                                echo form_error('parent_name');
                                echo form_input('parent_name', set_value('parent_name'), 'class="form-control contact_name" placeholder="Họ và tên"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Số điện thoại liên hệ (*)', 'phone');
                                echo form_error('phone');
                                echo form_input('phone', set_value('phone'), 'class="form-control" placeholder="Số điện thoại liên hệ"');
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
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <h3>Dành cho học sinh</h3>
                        <div class="row">
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Họ và Tên học sinh (*)', 'name');
                                echo form_error('name');
                                echo form_input('name', set_value('name'), 'class="form-control contact_name" placeholder="Họ và tên"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Ngày sinh (*)', 'dob');
                                echo form_error('dob');
                                echo form_input('dob', set_value('dob'), 'class="form-control" placeholder="Ngày sinh" id="dob"');
                                ?>
                            </div>

                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                <?php
                                echo form_label('Nơi sinh', 'pob');
                                echo form_error('pob');
                                echo form_input('pob', set_value('pob'), 'class="form-control" placeholder="Nơi sinh"');
                                ?>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Chọn cở sở trường học (*)', 'place');
                                echo form_error('place');
                                echo form_dropdown('place', $placement, set_value('place'), 'class="form-control" id="place"');
                                ?>
                            </div>

                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <?php
                                echo form_label('Chọn lớp học tham gia (*)', 'grade');
                                echo form_error('grade');
                                echo form_dropdown('grade', array('' => '---Chọn một lớp tham gia---'), set_value('grade'), 'class="form-control"  id="grade"');
                                ?>
                            </div>


                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                <label>Cần thêm tư vấn về các thông tin nhập học</label>
                                <div class="checkbox">
                                    <label>
                                        <?php
                                        //echo form_label('Sản phẩm đặc biệt', 'is_special');
                                        echo form_error('callback');
                                        echo form_checkbox('callback', 1, false, 'id="callback"') . 'Gọi lại hoặc email cho tôi';
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
                                <input type="submit" class="btn btn-primary hvr-icon-forward" value="Gửi đăng ký" name="submit">
                                <a href="<?php echo site_url('assets/public/doc/register_form.doc') ?>" class="btn btn-default" role="button">
                                    Download đơn xin nhập học <i class="fa fa-download" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                        <?php
                        echo form_close();
                        ?>


                    </div>

                </div>
            </div>

            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                <div id="register_image"></div>
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