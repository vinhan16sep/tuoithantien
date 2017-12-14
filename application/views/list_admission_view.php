<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="row">
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <h1>Danh mục bài viết</h1>

                <ul class="list-unstyled">
                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/thu-tuc-nhap-hoc') ?>" >Thủ tục nhập hoc</a></li>

                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/danh-sach/hoc-phi') ?>" >Học phí</a></li>

                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/lich-hoc') ?>" >Lịch học</a></li>

                    <li><a href="<?php echo base_url('thong-tin-nhap-hoc/danh-sach/chuong-trinh-khuyen-mai') ?>" >Chương trình khuyến mãi</a></li>
                </ul>
            </div>
            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                <h3>
                    <?php
                    switch ($this->uri->segment(3)) {
                        case 'hoc-phi':
                            echo 'Học phí';
                            break;
                        case 'chuong-trinh-khuyen-mai':
                            echo 'Chương trình khuyến mãi';
                            break;
                        default:
                            # code...
                            break;
                    }
                    ?>
                </h3>
                <div class="row">
                    <?php if ($list != ''): ?>

                        <?php foreach ($list as $key => $value): ?>
                        <?php 
                            switch ($value['category']) {
                                case '1':
                                    $slug = 'hoc-phi';
                                    break;
                                case '2':
                                    $slug = 'chuong-trinh-khuyen-mai';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        ?>
                            <div class="item col-md-4 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <img class="img-rounded" src="<?php echo site_url('assets/upload/admission/'.$value['image']) ?>">
                                    <a href="<?php echo base_url('thong-tin-nhap-hoc/').$slug.'/'.$value['slug']; ?>"><h3 class="blog_title"><?php echo $value['title'] ?></h3></a>
                                    <a class="btn btn-primary hvr-icon-forward" role="button" href="<?php echo base_url('thong-tin-nhap-hoc/').$slug.'/'.$value['slug']; ?>">Khám phá</a>
                                </div>
                            </div>
                        <?php endforeach ?>

                        <div class="col-md-12 text-center page">
                            <?php echo $page_links; ?>
                        </div>

                    <?php else: ?>
                        <div class="item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner">
                                Chưa có bài viết nào!
                            </div>
                        </div>
                    <?php endif ?>
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
                    <div id="register_image"></div>
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