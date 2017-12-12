<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/register.css') ?>">

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
            <div class="col-md-6 col-sm-6 col-xs-12">
                <img src="<?php echo site_url('assets/public/img/register.png') ?>" class="wow fadeInUp">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <h1><?php echo $procedure['title'] ?></h1>

                <form>
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
                <form>
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
                            echo form_input('date', set_value('dateOfBirth'), 'class="form-control" placeholder="Ngày sinh"');
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
                            <!--<?php
                            echo form_label('Địa chỉ hiện tại', 'address');
                            echo form_error('address');
                            echo form_textarea('address', set_value('address'), 'class="form-control" rows="3" placeholder=""');
                            ?>-->
                            <label>Chọn lớp học tham gia (*)</label>
                            <select class="form-control">
                                <option>---Chọn một lớp tham gia---</option>
                                <option>Lớp bé (Trẻ từ 3-4 tuổi)</option>
                                <option>Lớp nhỡ (Trẻ từ 4-5 tuổi)</option>
                                <option>Lớp lớn (Trẻ hơn 5 tuổi)</option>
                            </select>
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <!--<?php
                            echo form_label('Địa chỉ hiện tại', 'address');
                            echo form_error('address');
                            echo form_textarea('address', set_value('address'), 'class="form-control" rows="3" placeholder=""');
                            ?>-->
                            <label>Chọn cơ sở trường học (*)</label>
                            <select class="form-control">
                                <option>---Chọn một cơ sở---</option>
                                <option>Cơ sở I Hà Đông</option>
                                <option>Cơ sở II Hà Đông</option>
                                <option>Cơ sở III Hà Đông</option>
                                <option>Cơ sở IV Hà Đông</option>
                                <option>Cơ sở V Hà Đông</option>
                            </select>
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

                <?php echo $procedure['content'] ?>

            </div>
        </div>

    </div>
</section>