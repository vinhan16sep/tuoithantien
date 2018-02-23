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
        <div id="header_index_about">
            <!--<img src="<?php echo site_url('assets/public/img/footer_slider.png') ?>" alt="about_header">-->
        </div>
        <div class="container">
            <div class="row">
                <div class="left col-md-6 col-sm-6 col-xs-12">
                    <h1>Giới thiệu</h1>
                    <p><?php echo $introduce['description'] ?></p>
                    <?php if(!empty($introduce['description'])): ?>
                    <div class="row">
                        <a href="<?php echo base_url('gioi-thieu/gioi-thieu/gioi-thieu-chung'); ?>" style="float: right; color: #fff"><span>Xem thêm</span></a>
                    </div>

                    <?php endif; ?>
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
                                <ul class="list-unstyled">
                                    <li>
                                        <h4 class="media-heading">
                                            <strong>CS1: 024.3311.9828</strong>
                                        </h4>
                                    </li>
                                    <li>
                                        <h4 class="media-heading">
                                            <strong>CS2: 024.3355.2359</strong>
                                        </h4>
                                    </li>
                                    <li>
                                        <h4 class="media-heading">
                                            <strong>CS3: 024.6254.2325</strong>
                                        </h4>
                                    </li>
                                    <li>
                                        <h4 class="media-heading">
                                            <strong>CS5: 024.6294.2689</strong>
                                        </h4>
                                    </li>
                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="right col-md-6 col-sm-6 col-xs-12">
                    <div class="img_frame">
                        <div id="frame_01" class="frame wow slideInUp"></div>
                        <div id="frame_02" class="frame wow slideInUp"></div>
                        <div id="frame_03" class="frame wow slideInUp"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer_img" id="footer_index_about"></div>
    </div>

    <?php if ($activity): ?>
        <div class="container" id="featured_01">
            <div class="screen_title">
                <h1>Học mà chơi - Chơi mà học</h1>
                <p>Chúng tôi mang đến trương trình giáo dục tiên tiến nhất, được cập nhật thường xuyên nhằm phát triển kỹ năng toàn diện cho trẻ.</p>
            </div>
            <div class="row featured">
                <div class="col-md-12">
                    <div class="carousel carousel-showmanymoveone slide" id="slideFeatured_01">
                        <div class="carousel-inner">
                            <?php foreach ($activity as $key => $value): ?>
                            <div class="item <?php echo ($key == 0) ? 'active' : '' ?>">
                                
                                    <div class="col-md-3 col-sm-6 col-xs-12">
                                        <div class="inner">
                                            <a href="<?php echo base_url('hoat-dong/'.$value['sub'].'/'.$value['slug']) ?>">
                                                <div class="mask">
                                                    <img class="img-rounded" src="<?php echo site_url('assets/upload/activity/'.$value['image']) ?>" alt="featured_1_1">
                                                </div>
                                            </a>
                                            <a href="<?php echo base_url('hoat-dong/'.$value['sub'].'/'.$value['slug']) ?>">
                                                <h2><?php echo $value['title'] ?></h2>
                                            </a>
                                            <p><?php echo $value['description'] ?></p>
                                        </div>
                                    </div>
                                
                            </div>
                            <?php endforeach ?>
                        </div>
                        <?php if(count($activity) > 4): ?>
                        <a class="left carousel-control" href="#slideFeatured_01" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                        <a class="right carousel-control" href="#slideFeatured_01" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif ?>

    <div class="container-fluid" id="blogs">
        <div class="container">
            <div class="row">
                <div class="row">
                    <div class="left col-md-6 col-sm-6 col-xs-12">
                        <h1>Thông tin nhập học</h1>

                        <ul class="media-list">
                            <?php if ($admission): ?>
                                <?php foreach ($admission as $value): ?>
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="<?php echo base_url('thong-tin-nhap-hoc/'.$value['sub'].'/'.$value['slug']) ?>">
                                                <img class="media-object img-rounded" src="<?php echo site_url('assets/upload/admission/'.$value['image']) ?>" alt="ảnh tin tức">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading"><strong><?php echo $value['title'] ?></strong></h3>
                                            <p><?php echo $value['description'] ?></p>
                                            <a class="btn btn-primary hvr-icon-forward" href="<?php echo base_url('thong-tin-nhap-hoc/'.$value['sub'].'/'.$value['slug']) ?>" role="button">Xem tiếp</a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <!-- <li>
                                    <a href="<?php echo base_url('thong-tin-nhap-hoc') ?>" class="pull-right readMore">Xem tất cả <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </li> -->
                            <?php else: ?>
                                <li class="media">
                                    Chưa có bài viết nào
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="col-md-6 col-sm-6 hidden-xs text-center">
                        <img id="frame_04" src="<?php echo site_url('assets/public/img/img_frame-07.png') ?>" alt="frame-1" class="wow slideInUp">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 col-sm-6 hidden-xs text-center">
                        <img id="frame_05" src="<?php echo site_url('assets/public/img/img_frame-08.png') ?>" alt="frame-2" class="wow slideInUp">
                    </div>

                    <div class="right col-md-6 col-sm-6 col-xs-12">
                        <h1>Phối hợp cùng phụ huynh</h1>

                        <ul class="media-list">
                            <?php if ($experience): ?>
                                <?php foreach ($experience as $value): ?>
                                    <li class="media">
                                        <div class="media-left">
                                            <a href="<?php echo base_url('phoi-hop-cung-phu-huynh/'.$value['sub'].'/'.$value['slug']) ?>">
                                                <img class="media-object img-rounded" src="<?php echo site_url('assets/upload/parental/'.$value['image']) ?>" alt="ảnh tin tức">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h3 class="media-heading"><strong><?php echo $value['title'] ?></strong></h3>
                                            <p><?php echo $value['description'] ?></p>
                                            <a class="btn btn-primary hvr-icon-forward" href="<?php echo base_url('phoi-hop-cung-phu-huynh/'.$value['sub'].'/'.$value['slug']) ?>" role="button">Xem tiếp</a>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                                <!-- <li>
                                    <a href="<?php echo base_url('phoi-hop-cung-phu-huynh/chia-se-kinh-nghiem-hay') ?>" class="pull-right readMore">Xem tất cả <i class="fa fa-arrow-right" aria-hidden="true"></i></a>
                                </li> -->
                            <?php else: ?>
                                <li class="media">
                                    Chưa có bài viết nào
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_img" id="footer_index_blogs"></div>

    </div>

    <div class="container" id="featured_02">
        <div class="screen_title">
            <h1>Cơ sở vật chất</h1>
            <p>Mang đến những không gian học tập, vui chơi thoải mái, thoáng mát, vô cùng hiện đại giúp trẻ phát triển toàn diện.</p>
        </div>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInLeft">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="<?php echo site_url('assets/public/img/phongan.jpg') ?>" alt="ảnh tin tức">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><strong>Góc thiên nhiên</strong></h3>
                        <p>Với môi trường cây xanh quanh bé có cơ hội trải nghiệm chăm sóc cây xanh mỗi ngày.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeIn">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="<?php echo site_url('assets/public/img/khuvuichoi.jpg') ?>" alt="ảnh tin tức">
                        </a>
                    </div>
                    <div class="media-body">
                        <h2 class="media-heading"><strong>Khu vui chơi</strong></h2>
                        <p>Khu vui chơi thỏa sức cho các bé vui đùa, sáng tạo.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12 wow fadeInRight">
                <div class="media">
                    <div class="media-left">
                        <a href="#">
                            <img class="media-object img-rounded" src="<?php echo site_url('assets/public/img/phonghoc.jpg') ?>" alt="ảnh tin tức">
                        </a>
                    </div>
                    <div class="media-body">
                        <h3 class="media-heading"><strong>Phòng học</strong></h3>
                        <p>Phòng học khang trang với những vật dụng an toàn, tiện ích mà vẫn vô cùng đẹp mắt cho các bé thỏa sức học tập.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" id="comments">
        <div class="container">
            <div class="screen_title">
                <h1>Ý kiến phụ huynh</h1>
                <p></p>
            </div>
            <?php if ($parent_comments): ?>
                <div class="row">
                    <div class="col-md-12 wow fadeIn" data-wow-delay="0.2s">
                        <div class="carousel slide" data-ride="carousel" id="quote-carousel">
                            <!-- Bottom Carousel Indicators -->
                            <ol class="carousel-indicators hidden-xs">
                                <?php foreach ($parent_comments as $key => $value): ?>
                                    <li data-target="#quote-carousel" data-slide-to="<?php echo $key ?>"  class="<?php echo ($key == 0) ? 'active' : '' ?>">
                                        <img class="img-responsive " src="<?php echo base_url('assets/upload/parental/'.$value['image']); ?>" alt="">
                                    </li>
                                <?php endforeach ?>
                            </ol>

                            <!-- Carousel Slides / Quotes -->
                            <div class="carousel-inner text-center">

                                <!-- Quote 1 -->
                                <?php foreach ($parent_comments as $key => $value): ?>
                                    <div class="item <?php echo ($key == 0) ? 'active' : '' ?>">
                                        <blockquote>
                                            <div class="row">
                                                <div class="col-sm-8 col-sm-offset-2">
                                                    <p><?php echo $value['content'] ?></p>
                                                    <small><?php echo $value['title'] ?></small>
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div>
                                <?php endforeach ?>
                            </div>

                            <!-- Carousel Buttons Next/Prev -->
                            <a data-slide="prev" href="#quote-carousel" class="left carousel-control hidden-xs"><i class="fa fa-chevron-left"></i></a>
                            <a data-slide="next" href="#quote-carousel" class="right carousel-control hidden-xs"><i class="fa fa-chevron-right"></i></a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <span style="color:#e60ae0">Chưa có ý kiến được ghi nhận từ phía phụ huynh học sinh</span>
                    </div>
                </div>
            <?php endif ?>


        </div>
        <img id="cloud_01" src="<?php echo site_url('assets/public/img/img_cloud-02.png') ?>" alt="cloud-1" class="wow slideInUp hidden-xs">
        <img id="cloud_02" src="<?php echo site_url('assets/public/img/img_cloud-03.png') ?>" alt="cloud-2" class="wow slideInUp hidden-xs">
    </div>

</section>



<scrpit src="<?php echo site_url('assets/public/js/homepage.js') ?>"></scrpit>