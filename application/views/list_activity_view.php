<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="row">
            <h3>
                <?php 
                    switch ($this->uri->segment(2)) {
                        case 'thong-bao':
                            echo 'Thông báo';
                            break;
                        case 'tuyen-sinh':
                            echo 'Tuyển sinh';
                            break;
                        case 'trai-nghiem':
                            echo 'Trải nghiệm';
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
	                                $slug = 'thong-bao';
	                                break;
	                            case '2':
	                                $slug = 'tuyen-sinh';
	                                break;
	                            case '3':
	                                $slug = 'trai-nghiem';
	                                break;
	                            default:
	                                # code...
	                                break;
	                        }
	                    ?>
		                    <div class="item col-md-4 col-sm-6 col-xs-12">
		                        <div class="inner">
		                            <img class="img-rounded" src="<?php echo site_url('assets/public/activity/'.$value['image']) ?>">
		                            <a href="<?php echo base_url('hoat-dong/').$slug.'/'.$value['slug']; ?>"><h3 class="blog_title"><?php echo $value['title'] ?></h3></a>
		                            <a class="btn btn-primary hvr-icon-forward" role="button" href="<?php echo base_url('hoat-dong/').$slug.'/'.$value['slug']; ?>">Khám phá</a>
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
                <?php $style = 'style="display: none"' ?>
                <ul>
                    <li><a href="<?php echo base_url('hoat-dong/thong-bao') ?>" >Thông báo nhà trường</a></li>

                    <li><a href="<?php echo base_url('thu-vien/thu-vien-anh') ?>" >Thư viện ảnh</a></li>

                    <li><a href="<?php echo base_url('thu-vien/video') ?>" >Video</a></li>

                    <li><a href="<?php echo base_url('hoat-dong/tuyen-sinh') ?>" >Tuyển sinh</a></li>

                    <li><a href="<?php echo base_url('hoat-dong/trai-nghiem') ?>" >Trải nghiệm</a></li>
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
                    <img src="<?php echo site_url('assets/public/img/register.png') ?>" class="wow fadeInUp">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <h1>Giới thiệu đăng ký nhập học</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In molestie enim non odio mattis, sed fermentum elit sodales. Duis bibendum mi sed pulvinar interdum. Donec euismod ipsum vitae ligula posuere, id elementum lacus rhoncus. Nullam ullamcorper urna et elementum viverra. Sed in sem ultrices, mattis nunc sit amet, sollicitudin sem. Mauris tincidunt mauris mi, quis viverra justo consequat nec. Cras nibh quam, cursus at lorem sit amet, scelerisque euismod enim. Nam a interdum velit. Donec pharetra fermentum erat, sed commodo lectus venenatis quis. Integer elit augue, varius quis laoreet vitae, cursus sit amet libero. Integer iaculis libero vel venenatis vehicula. Integer accumsan nulla felis, non congue erat tincidunt sed.</p>
                    <a class="btn btn-primary hvr-icon-forward" role="button" href="javascript:void();">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

</section>

