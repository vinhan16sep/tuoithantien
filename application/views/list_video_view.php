<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content" id="detail">
    <div class="container">
        <div class="row">
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <div id="category_header"></div>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h2>Danh mục thư viện</h2>
                    </div>
                    <?php $style = 'style="display: none"' ?>
                    <ul class="list-unstyled list-group">

                        <li class="list-group-item"><a href="<?php echo base_url('thu-vien/thu-vien-anh') ?>" <?php echo ($this->uri->segment(2) == 'thu-vien-anh')? 'style="color: #008b44"' : '' ?> >Thư viện ảnh</a></li>

                        <li class="list-group-item"><a href="<?php echo base_url('thu-vien/video') ?>" <?php echo ($this->uri->segment(2) == 'video')? 'style="color: blue"' : '' ?> >Video</a></li>
                    </ul>
                </div>
                <div id="category_footer"></div>
            </div>

            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                <h3>Thư viện Video</h3>
                <div class="row">
                	<?php if (!empty($list)): ?>
	                	<?php foreach ($list as $key => $value): ?>
		                    <div class="item col-md-12 col-sm-12 col-xs-12">
		                        <div class="inner">
		                        	<?php
//		                        		$url = str_replace('watch?v=', 'embed/', $value['url']);
//		                        		if(strstr($url,'&') != ''){
//		                        			$url_r = str_replace(strstr($url,'&'), '', $url);
//		                        		}else{
//		                        			$url_r = $url;
//		                        		}
		                        	 ?>
		                        	<a href=""><h3 class="blog_title"><?php echo $value['title'] ?></h3></a>
                                    <?php echo $value['url'] ?>
		                            <br><br>
		                        </div>
		                    </div>
	                    <?php endforeach ?>

                        <div class="col-md-12 text-center page">
                            <?php echo $page_links; ?>
                        </div>

	                <?php else: ?>
                        <div class="item col-md-3 col-sm-3 col-xs-12">
                            <div class="inner">
                                Chưa có video nào được đăng!
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
                <!--<div class="screen_title">
                    <h1>Đăng ký nhập học</h1>
                    <p>Hãy đăng ký cho con bạn ngay hôm nay để có thể được tư vấn tốt nhất.</p>
                </div>-->
                <div class="col-md-6 col-sm-6 col-xs-12 wow slideInUp">
                    <div id="register_image"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <br><br><br><br><br>
                    <h1>Đăng ký nhập học</h1>
                    <br><br>
                    <p>Hệ thống trường mầm non Tuổi Thần Tiên hướng tới mô hình quốc tế và trang bị các điều kiện giáo dục ưu việt nhất nhằm đáp ứng sự mong đợi của quý vị phụ huynh. Hãy đăng ký ngay để đội ngũ tuyển sinh của chúng tôi sẽ liên hệ với Quý vị trong thời gian sớm nhất.</p>
                    <a class="btn btn-primary hvr-icon-forward" role="button" href="<?php echo base_url('nhap-hoc/dang-ky-nhap-hoc') ?>">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

</section>

