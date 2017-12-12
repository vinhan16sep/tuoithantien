<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/homepage.css') ?>">

<section class="main_content">
    <div id="slideHomepage" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators hidden-xs">
            <?php for($i = 0; $i < count($banner); $i++){ ?>
                <li data-target="#slideHomepage" data-slide-to="<?php echo $i + 1; ?>" <?php echo ($i == 0) ? 'class="active"' : ''; ?>></li>
            <?php } ?>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php foreach ($banner as $key => $value): ?>
                <div class="item <?php echo ($key == 0) ? 'active' : ''; ?>">
                    <img src="<?php echo site_url('assets/upload/banner/'.$value['image']) ?>" alt="slide_01">
                    <div class="carousel-caption">
                        ...
                    </div>
                </div>
            <?php endforeach;?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#slideHomepage" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slideHomepage" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container-fluid" id="introduce">
        <div id="about_header">
            <img src="<?php echo site_url('assets/public/img/footer_slider.png') ?>" alt="about_header">
        </div>
        <div class="container">
            <div class="row">
                <div class="left col-md-6 col-sm-6 col-xs-12">
                    <h1>Giới thiệu</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent tincidunt mi vel nisl vehicula, non iaculis erat tincidunt. Nam dignissim mattis orci vitae porttitor. Nulla vel tincidunt nunc, at convallis magna. Integer malesuada elit et bibendum auctor. Sed et auctor metus. Pellentesque dapibus augue nec varius varius. Fusce eget magna viverra, tempor libero non, porta nunc. Proin sed laoreet eros. Aliquam pulvinar fermentum justo in ultrices. Duis suscipit pharetra arcu, eget tincidunt ante sodales hendrerit. Nulla nec sapien a orci tristique convallis eu eu velit. Vivamus diam arcu, tempus ut consectetur sit amet, aliquet vitae arcu. Quisque ullamcorper urna eu dolor sollicitudin eleifend. Nulla accumsan turpis condimentum neque rhoncus, sed mollis arcu porta. Quisque a felis sit amet leo posuere convallis. Sed mi mi, finibus sed nisi ut, porttitor vestibulum nisl.</p>
                    <div class="row">
                        <div class="media col-md-6 col-sm-6 col-xs-12">
                            <div class="media-left">
                                <img class="media-object" src="<?php echo site_url('assets/public/img/clock.png') ?>" alt="Giờ làm việc">
                            </div>
                            <div class="media-body">
                                <p>Giờ làm việc</p>
                                <h4 class="media-heading"><strong>7h00 - 18h00</strong></h4>
                            </div>
                        </div>
                        <div class="media col-md-6 col-sm-6 col-xs-12">
                            <div class="media-left">
                                <img class="media-object" src="<?php echo site_url('assets/public/img/phone.png') ?>" alt="Hotline">
                            </div>
                            <div class="media-body">
                                <p>Hotline liên hệ</p>
                                <h4 class="media-heading"><strong>09 1234 5678</strong></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="right col-md-6 col-sm-6 col-xs-12">
                    <div class="img_frame">
                        <img id="frame_01" src="<?php echo site_url('assets/public/img/img_frame-07.png') ?>" alt="frame-1" class="wow slideInUp">
                        <img id="frame_02" src="<?php echo site_url('assets/public/img/img_frame-08.png') ?>" alt="frame-2" class="wow slideInUp">
                        <img id="frame_03" src="<?php echo site_url('assets/public/img/img_frame-09.png') ?>" alt="frame-3" class="wow slideInUp">
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_img" id="footer_about">
            <img src="<?php echo site_url('assets/public/img/footer_pink.png') ?>" alt="about_footer">
        </div>
    </div>

    <div class="container" id="featured_01">
        <div class="screen_title">
            <h1>Học mà chơi - Chơi mà học</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
        </div>

        <div class="row featured">
            <div class="item col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.0s">
                <div class="inner">
                    <a href="<?php echo base_url('gioi-thieu/muc-tieu') ?>"><img class="img-rounded" src="<?php echo site_url('assets/public/img/photo/muc-tieu.jpg') ?>" alt="featured_1_1"></a>
                    <a href="<?php echo base_url('gioi-thieu/muc-tieu') ?>"><h2>Mục tiêu</h2></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
                </div>
            </div>

            <div class="item col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="inner">
                    <a href="<?php echo base_url('gioi-thieu/ngoai-ngu') ?>"><img class="img-rounded" src="<?php echo site_url('assets/public/img/photo/ngoai-ngu.jpg') ?>" alt="featured_1_2"></a>
                    <a href="<?php echo base_url('gioi-thieu/ngoai-ngu') ?>"><h2>Ngoại ngữ</h2></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
                </div>
            </div>

            <div class="item col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="1.0s">
                <div class="inner">
                    <a href="<?php echo base_url('gioi-thieu/giao-duc-theo-lua-tuoi') ?>"><img class="img-rounded" src="<?php echo site_url('assets/public/img/photo/gdmlt.jpg') ?>" alt="featured_1_3"></a>
                    <a href="<?php echo base_url('gioi-thieu/giao-duc-theo-lua-tuoi') ?>"><h2>Giáo dục theo lứa tuổi</h2></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
                </div>
            </div>

            <div class="item col-md-3 col-sm-6 col-xs-12 wow fadeInUp" data-wow-delay="1.5s">
                <div class="inner">
                    <a href="<?php echo base_url('gioi-thieu/tap-huan') ?>"><img class="img-rounded" src="<?php echo site_url('assets/public/img/photo/tap-huan.jpg') ?>" alt="featured_1_4"></a>
                    <a href="<?php echo base_url('gioi-thieu/tap-huan') ?>"><h2>Tập huấn</h2></a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
                </div>
            </div>

            <div class="item col-md-12 col-sm-12 col-xs-12 wow fadeInUp" data-wow-delay="0.5s">
                <div class="inner">
                    <div class="row">
                        <div class="col-md-6 col-xs-12 col-xs-12">
                            <a href="<?php echo base_url('gioi-thieu/tap-huan') ?>"><img class="img-rounded" src="<?php echo site_url('assets/public/img/photo/ngoai-khoa.jpg') ?>" alt="featured_1_5"></a>
                        </div>
                        <div class="col-md-6 col-xs-12 col-xs-12">
                            <a href="<?php echo base_url('gioi-thieu/ngoai-khoa') ?>"><h2>Ngoại khóa</h2></a>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="blogs">
        <div class="container">
            <div class="row">
                <div class="left col-md-6 col-sm-6 col-xs-12">
                    <h1>Thông báo nhà trường</h1>

                    <ul class="media-list">
                        <?php if ($notify): ?>
                            <?php foreach ($notify as $value): ?>
                                <li class="media">
                                    <div class="media-left">
                                        <a href="<?php echo base_url('hoat-dong/thong-bao/'.$value['slug']) ?>">
                                            <img class="media-object img-rounded" src="<?php echo site_url('assets/upload/activity/'.$value['image']) ?>" alt="ảnh tin tức">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="media-heading"><strong><?php echo $value['title'] ?></strong></h3>
                                        <p><?php echo $value['description'] ?></p>
                                        <a class="btn btn-primary hvr-icon-forward" href="<?php echo base_url('hoat-dong/thong-bao/'.$value['slug']) ?>" role="button">Xem tiếp</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li>
                                <a href="<?php echo base_url('hoat-dong/thong-bao') ?>" class="pull-right readMore">Xem tất cả <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </li>
                        <?php else: ?>
                            <li class="media">
                                Chưa có bài viết nào
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>

                <div class="right col-md-6 col-sm-6 col-xs-12">
                    <h1>Chia sẻ kinh nghiệm hay</h1>

                    <ul class="media-list">
                        <?php if ($experience): ?>
                            <?php foreach ($experience as $value): ?>
                                <li class="media">
                                    <div class="media-left">
                                        <a href="<?php echo base_url('hoat-dong/thong-bao/'.$value['slug']) ?>">
                                            <img class="media-object img-rounded" src="<?php echo site_url('assets/upload/activity/'.$value['image']) ?>" alt="ảnh tin tức">
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <h3 class="media-heading"><strong><?php echo $value['title'] ?></strong></h3>
                                        <p><?php echo $value['description'] ?></p>
                                        <a class="btn btn-primary hvr-icon-forward" href="<?php echo base_url('hoat-dong/trai-nghiem/'.$value['slug']) ?>" role="button">Xem tiếp</a>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <li>
                                <a href="<?php echo base_url('hoat-dong/trai-nghiem') ?>" class="pull-right readMore">Xem tất cả <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                            </li>
                        <?php else: ?>
                            <li class="media">
                                Chưa có bài viết nào
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <img id="frame_04" src="<?php echo site_url('assets/public/img/img_frame-07.png') ?>" alt="frame-1" class="wow slideInUp hidden-xs">
            <img id="frame_05" src="<?php echo site_url('assets/public/img/img_frame-08.png') ?>" alt="frame-2" class="wow slideInUp hidden-xs">
        </div>

        <div class="footer_img" id="footer_about">
            <img src="<?php echo site_url('assets/public/img/footer_cyan.png') ?>" alt="about_footer">
        </div>

    </div>

    <div class="container" id="featured_02">
        <div class="screen_title">
            <h1>Cơ sở vật chất</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="<?php echo site_url('assets/public/img/kids.jpg') ?>" alt="ảnh tin tức">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><strong>Nam a egestas sem</strong></h3>
                        <p>Sed a risus elit. Morbi vehicula augue in lectus dignissim, ut pretium risus mattis. Phasellus gravida ac orci eget vehicula. In porttitor purus sit amet ex finibus, eu ultrices erat imperdiet. Curabitur gravida imperdiet risus vel pretium. Integer at felis a nisi sagittis viverra.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="<?php echo site_url('assets/public/img/kids.jpg') ?>" alt="ảnh tin tức">
                        </a>
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading"><strong>Nam a egestas sem</strong></h2>
                        <p>Sed a risus elit. Morbi vehicula augue in lectus dignissim, ut pretium risus mattis. Phasellus gravida ac orci eget vehicula. In porttitor purus sit amet ex finibus, eu ultrices erat imperdiet. Curabitur gravida imperdiet risus vel pretium. Integer at felis a nisi sagittis viverra.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInRight">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="<?php echo site_url('assets/public/img/kids.jpg') ?>" alt="ảnh tin tức">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><strong>Nam a egestas sem</strong></h3>
                        <p>Sed a risus elit. Morbi vehicula augue in lectus dignissim, ut pretium risus mattis. Phasellus gravida ac orci eget vehicula. In porttitor purus sit amet ex finibus, eu ultrices erat imperdiet. Curabitur gravida imperdiet risus vel pretium. Integer at felis a nisi sagittis viverra.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="comments">
        <div class="container">
            <div class="screen_title">
                <h1>Ý kiến phụ huynh</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris et feugiat est. Donec eu lobortis tellus. Praesent erat lectus, eleifend facilisis nulla</p>
            </div>

            <div class="row">
                <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">
                    <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                        <!-- Bottom Carousel Indicators -->
                        <ol class="carousel-indicators hidden-xs">
                            <li data-target="#quote-carousel" data-slide-to="0" class="active"><img class="img-responsive " src="https://s3.amazonaws.com/uifaces/faces/twitter/brad_frost/128.jpg" alt="">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="1"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/rssems/128.jpg" alt="">
                            </li>
                            <li data-target="#quote-carousel" data-slide-to="2"><img class="img-responsive" src="https://s3.amazonaws.com/uifaces/faces/twitter/adellecharles/128.jpg" alt="">
                            </li>
                        </ol>

                        <!-- Carousel Slides / Quotes -->
                        <div class="carousel-inner text-center">

                            <!-- Quote 1 -->
                            <div class="item active">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. !</p>
                                            <small>Họ tên phụ huynh</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 2 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                            <small>Họ tên phụ huynh</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                            <!-- Quote 3 -->
                            <div class="item">
                                <blockquote>
                                    <div class="row">
                                        <div class="col-sm-8 col-sm-offset-2">
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. .</p>
                                            <small>Họ tên phụ huynh</small>
                                        </div>
                                    </div>
                                </blockquote>
                            </div>
                        </div>

                        <!-- Carousel Buttons Next/Prev -->
                        <a data-slide="prev" href="#quote-carousel" class="left carousel-control hidden-xs"><i class="fa fa-chevron-left"></i></a>
                        <a data-slide="next" href="#quote-carousel" class="right carousel-control hidden-xs"><i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <img id="cloud_01" src="<?php echo site_url('assets/public/img/img_cloud-02.png') ?>" alt="cloud-1" class="wow slideInUp hidden-xs">
        <img id="cloud_02" src="<?php echo site_url('assets/public/img/img_cloud-03.png') ?>" alt="cloud-2" class="wow slideInUp hidden-xs">
    </div>

</section>

<scrpit src="<?php echo site_url('assets/public/js/homepage.js') ?>"></scrpit>