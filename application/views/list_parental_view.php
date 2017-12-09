<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="row">
            <h3>
                <?php 
                    switch ($this->uri->segment(2)) {
                        case 'lien-lac':
                            echo 'Liên lạc';
                            break;
                        case 'thuc-don':
                            echo 'Thực đơn';
                            break;
                        case 'y-te':
                            echo 'Y tế';
                            break;
                        case 'ky-luat':
                            echo 'Kỷ luật';
                            break;
                        default:
                            # code...
                            break;
                    }
                ?>
            </h3>
            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                    <?php if ($list != ''): ?>

                        <?php foreach ($list as $key => $value): ?>
                        <?php 
                            switch ($value['category']) {
                                case '1':
                                    $slug = 'lien-lac';
                                    break;
                                case '2':
                                    $slug = 'thuc-don';
                                    break;
                                case '3':
                                    $slug = 'y-te';
                                    break;
                                case '4':
                                    $slug = 'ky-luat';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                        ?>
                            <div class="item col-md-4 col-sm-6 col-xs-12">
                                <div class="inner">
                                    <img class="img-rounded" src="<?php echo site_url('assets/upload/parental/'.$value['image']) ?>">
                                    <a href="<?php echo base_url('phoi-hop-cung-phu-huynh/').$slug.'/'.$value['slug']; ?>"><h3 class="blog_title"><?php echo $value['title'] ?></h3></a>
                                    <a class="btn btn-primary hvr-icon-forward" role="button" href="<?php echo base_url('phoi-hop-cung-phu-huynh/').$slug.'/'.$value['slug']; ?>">Khám phá</a>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner">
                                Chưa có bài viết nào!
                            </div>
                        </div>
                    <?php endif ?>
                </div>
            </div>
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <h1>Danh mục bài viết</h1>

                <ul>
                    <li><a href="<?php echo base_url('che-do-sinh-hoat-1-ngay') ?>" >Chê độ sinh hoạt 1 ngày</a></li>

                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/lien-lac') ?>" >Liên lạc</a></li>

                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/thuc-don') ?>" >Thực đơn</a></li>

                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/y-te') ?>" >Y tế</a></li>

                    <li><a href="<?php echo base_url('gio-dua-don') ?>" >Giờ đưa đón</a></li>

                    <li><a href="<?php echo base_url('phoi-hop-cung-phu-huynh/ky-luat') ?>" >Kỷ luật</a></li>
                </ul>
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
                    <img src="<?php echo base_url('assets/upload/admission/'.$procedure['image']) ?>" class="wow fadeInUp" width=100%>
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