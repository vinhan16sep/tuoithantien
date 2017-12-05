<footer class="container">
    <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h2 class="title-main">Kết nối với chúng tôi</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus accumsan felis eget tellus molestie porttitor. Etiam sagittis mi ac feugiat consequat. Morbi eu sagittis orci. Ut pretium cursus nibh in tempor.</p>

            <ul class="list-inline">
                <li>
                    <a href="#"><i class="fa fa-facebook-f fa-2x" aria-hidden="true"></i></a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-youtube-square fa-2x" aria-hidden="true"></i></a>
                </li>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h2 class="title-main">Bài viết mới</h2>

            <ul>
                <?php if($latest_articles): ?>
                <?php foreach($latest_articles as $key => $article): ?>
                <li>
                    <a href="<?php echo base_url('article/detail/' . $article['id']); ?>"><?php echo $article['title']; ?></a>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <h2 class="title-main">Bài viết tư vấn mới</h2>

            <ul>
                <?php if($latest_advises): ?>
                <?php foreach($latest_advises as $key => $advise): ?>
                <li>
                    <a href="<?php echo base_url('advise/detail/' . $advise['id']); ?>"><?php echo $advise['title']; ?></a>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </div>

    <div class="subscribe mtb-30">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                <h2 class="title-main">Đăng ký theo dõi</h2>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                Đăng ký email để liên tục được cập nhật thông tin từ chúng tôi
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="form-inline">
                    <div class="input-group">
                        <div class="row">
                            <span><?php echo $this->session->flashdata('message'); ?></span>
                        </div>
                        <?php
                        echo form_open_multipart('contact/subcribe', array('class' => 'form-horizontal'));
                        echo form_input('email', set_value('email'), 'class="form-control" placeholder="Email của quý khách"');
                        ?>
                        <span class="input-group-btn">
                        <?php
                        echo form_submit('submit', 'Đăng ký', 'class="btn btn-default btn-bg"');
                        echo form_close();
                        ?>
                        </span>
                    </div><!-- /input-group -->
                </div>
            </div>
        </div>
    </div>

    <div class="nav-bottom container">
        <ul class="list-inline text-center">
            <li><a href="<?php echo base_url('homepage'); ?>">Trang chủ</a></li>
            <li><a href="<?php echo base_url('introduce'); ?>">Giới thiệu</a></li>
            <li><a href="<?php echo base_url('product'); ?>">Sản phẩm</a></li>
            <li><a href="<?php echo base_url('advise'); ?>">Tư vấn</a></li>
            <li><a href="<?php echo base_url('article'); ?>">Tin tức</a></li>
            <li><a href="<?php echo base_url('contact'); ?>">Liên hệ</a></li>
        </ul>
    </div>
</footer>

</body>

<script type="text/javascript" src="<?php echo site_url('assets/public/libraries/js/jquery-3.2.1.js') ?>"></script>
<script type="text/javascript" src="<?php echo site_url('assets/public/libraries/js/bootstrap.js') ?>"></script>
<!-- InstanceBeginEditable name="js" -->

<!-- InstanceEndEditable -->
<script type="text/javascript" src="<?php echo site_url('assets/public/js/script.js') ?>"></script>

<!-- InstanceEnd --></html>