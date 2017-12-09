<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/about.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="jumbotron">
            <h1><?php echo $overview['title'] ?></h1>
            <?php echo $overview['content'] ?>
            <!--<a class="btn btn-primary btn-lg hvr-icon-forward" href="#screen_2" role="button">Khám phá</a>-->
        </div>

        <div class="img_frame">
            <img id="frame_01" src="<?php echo base_url('assets/public/') ?>img/img_frame-07.png" alt="frame-1" class="wow slideInUp">
            <img id="frame_02" src="<?php echo base_url('assets/public/') ?>img/img_frame-08.png" alt="frame-2" class="wow slideInUp">
            <img id="frame_03" src="<?php echo base_url('assets/public/') ?>img/img_frame-09.png" alt="frame-3" class="wow slideInUp">
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-8 col-xs-12">

            </div>
            <div class="col-md-4 col-sm-4 hidden-xs">

            </div>
        </div>

    </div>

    <div class="container-fluid" id="infoNumber">
        <div id="infoNumber_header" style="position: absolute; top: -65px; left: 50%; margin-left: -960px;"><img src="<?php echo site_url('assets/public/img/screen_4_header.png') ?>" alt="infoNumber_header"></div>
        <div id="infoNumber_footer" style="position: absolute; bottom: -45px; left: 50%;  margin-left: -960px;"><img src="<?php echo site_url('assets/public/img/screen_4_footer.png') ?>" alt="infoNumber_footer"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-3 col-xs-6 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="media">
                        <div class="media-left">
                            <span class="info_number">100%</span>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Số học sinh theo học</h3>
                            <h4>Đạt học lực xuất sắc</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="media">
                        <div class="media-left">
                            <span class="info_number">100%</span>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Số học sinh theo học</h3>
                            <h4>Đạt học lực xuất sắc</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 wow fadeInUp" data-wow-delay="1.0s">
                    <div class="media">
                        <div class="media-left">
                            <span class="info_number">100%</span>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Số học sinh theo học</h3>
                            <h4>Đạt học lực xuất sắc</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-6 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="media">
                        <div class="media-left">
                            <span class="info_number">100%</span>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">Số học sinh theo học</h3>
                            <h4>Đạt học lực xuất sắc</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="registerScreen" style="position: relative;">
        <!--<div id="register_header" style="position: absolute; top: -120px; left: 50%; margin-left: -960px;"><img src="img/register_header.png" alt="register_header"></div>
           <div id="register_footer" style="position: absolute; bottom: -56px; left: 50%;  margin-left: -960px;"><img src="img/register_footer.png" alt="register_footer"></div>-->
        <div class="container">
            <div class="row">
                <div class="screen_title">
                    <h1>Đăng ký nhập học</h1>
                    <p>Text giới thiệu chung về các chương trình</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img src="<?php echo site_url('assets/public/img/register.png') ?>" class="wow fadeInUp">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h1><?php echo $procedure['title'] ?></h1>
                    <?php echo $procedure['content'] ?>
                    <a class="btn btn-primary hvr-icon-forward" role="button" href="javascript:void();">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

</section>