<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/about.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/flaticon.css') ?>">

<section class="main_content">
    <div class="container-fluid">
        <div class="container">
            <div class="jumbotron">
                <h1><?php echo $overview['title'] ?></h1>
                <?php echo $overview['content'] ?>
                <!--<a class="btn btn-primary btn-lg hvr-icon-forward" href="#screen_2" role="button">Khám phá</a>-->
            </div>

            <div class="img_frame hidden-xs">
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
    </div>
    <div class="container-fluid" id="infoNumber">
        <div id="infoNumber_header" style="position: absolute; top: -65px; left: 50%; margin-left: -960px;"><img src="<?php echo site_url('assets/public/img/screen_4_header.png') ?>" alt="infoNumber_header"></div>
        <div id="infoNumber_footer" style="position: absolute; bottom: -45px; left: 50%;  margin-left: -960px;"><img src="<?php echo site_url('assets/public/img/screen_4_footer.png') ?>" alt="infoNumber_footer"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.0s">
                    <div class="media">
                        <div class="media-left">
                            <i class="flaticon-school"></i>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">05</h1>
                            <h4>Cơ sở đạt chuẩn quốc gia</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="media">
                        <div class="media-left">
                            <i class="flaticon-mortarboard"></i>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">4000+</h1>
                            <h4>Học sinh theo học</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="1.0s">
                    <div class="media">
                        <div class="media-left">
                            <i class="flaticon-certificate"></i>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">400+</h1>
                            <h4>Giáo viên lành nghề</h4>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="1.5s">
                    <div class="media">
                        <div class="media-left">
                            <i class="flaticon-medal"></i>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">99% +</h1>
                            <h4>Phụ huynh hài lòng về chất lượng</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="2.0s">
                    <div class="media">
                        <div class="media-left">
                            <i class="flaticon-chalk-board"></i>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">500+</h1>
                            <h4>Bài giảng đạt chuẩn</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-12 wow fadeInUp" data-wow-delay="2.5s">
                    <div class="media">
                        <div class="media-left">
                            <i class="flaticon-football"></i>
                        </div>
                        <div class="media-body">
                            <h1 class="media-heading">50+</h1>
                            <h4>Hoạt động ngoại khóa thường xuyên</h4>
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
                    <h1>Đăng ký nhập học</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie enim non odio mattis, sed fermentum elit sodales. Duis bibendum mi sed pulvinar interdum. Donec euismod ipsum vitae ligula posuere, id elementum lacus rhoncus. Nullam ullamcorper urna et elementum viverra. Sed in sem ultrices, mattis nunc sit amet, sollicitudin sem. Mauris tincidunt mauris mi, quis viverra justo consequat nec. Cras nibh quam, cursus at lorem sit amet, scelerisque euismod enim. Nam a interdum velit. Donec pharetra fermentum erat, sed commodo lectus venenatis quis. Integer elit augue, varius quis laoreet vitae, cursus sit amet libero. Integer iaculis libero vel venenatis vehicula. Integer accumsan nulla felis, non congue erat tincidunt sed.</p>
                    <a class="btn btn-primary hvr-icon-forward" role="button" href="<?php echo base_url('nhap-hoc/dang-ky-nhap-hoc') ?>">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

</section>