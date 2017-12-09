<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="row">
            <h3>Thư viện ảnh: <?php echo $library['title'] ?></h3>
			
			<h4><?php echo $library['content'] ?></h4>
            
            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                <div class="row">
                	<?php if ($images != ''): ?>
	                	<?php foreach ($images as $key => $value): ?>
		                    <div class="item col-md-4 col-sm-6 col-xs-12">
		                        <div class="inner">
		                            <img class="img-rounded" src="<?php echo site_url('assets/upload/image/'.$library['slug'].'/'.$value['image']) ?>" width=100%>
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
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <h1>Danh mục bài viết</h1>
                <?php $style = 'style="display: none"' ?>
                <ul>
                	<?php foreach ($list as $key => $value): ?>
                		<li>
	                        <a href="<?php echo base_url('thu-vien/thu-vien-anh/'.$value['slug']) ?>" ><?php echo $value['title'] ?></a>
	                    </li>
                	<?php endforeach ?>
                    
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
                    <img src="<?php echo site_url('assets/public/img/register.png') ?>" class="wow fadeInUp" width=100%>
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

