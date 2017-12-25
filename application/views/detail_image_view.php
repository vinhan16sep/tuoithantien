<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">
<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/js/lightbox-plus-jquery.css') ?>">

<section class="main_content" id="detail">
    <div class="container">
        <div class="row">
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <div id="category_header"></div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>Danh mục bài viết</h2>
                    </div>
                    <?php $style = 'style="display: none"' ?>
                    <ul class="list-unstyled list-group">
                        <?php foreach ($list as $key => $value): ?>
                            <li class="list-group-item">
                                <a href="<?php echo base_url('thu-vien/thu-vien-anh/'.$value['slug']) ?>" ><?php echo $value['title'] ?></a>
                            </li>
                        <?php endforeach ?>
                    </ul>
                </div>
                <div id="category_footer"></div>
            </div>

			<h4><?php echo $library['content'] ?></h4>
            
            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                <h3>Thư viện ảnh: <?php echo $library['title'] ?></h3>
                <div class="row">
                	<?php if ($images != ''): ?>
	                	<?php foreach ($images as $key => $value): ?>
		                    <div class="item col-md-4 col-sm-6 col-xs-12">
		                        <a class="inner">
                                    <a class="example-image-link" data-lightbox="example-1" href="<?php echo site_url('assets/upload/image/'.$library['slug'].'/'.$value['image']) ?>">
                                        <img class="img-rounded example-image" src="<?php echo site_url('assets/upload/image/'.$library['slug'].'/'.$value['image']) ?>" width=100%>
                                    </a>
		                            <h3 class="blog_title"><?php echo $value['title'] ?></h3>
		                        </div>
		                    </div>
	                    <?php endforeach ?>
	                <?php else: ?>
                        <div class="item col-md-4 col-sm-6 col-xs-12">
                            <div class="inner">
                                Chưa có ảnh được đăng trong bài thư viện này!
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
                <div class="col-md-6 col-sm-6 col-xs-12 wow slideInUp">
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

