<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content" id="detail">
    <div class="container">
        <div class="row">
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <h1>Danh mục bài viết</h1>
                <ul class="list-unstyled">
                    <?php if ($sidebar != ''): ?>
                        <?php foreach ($sidebar as $key => $value): ?>
                            <li><a href="<?php echo base_url('gioi-thieu/'.$category['slug'].'/'.$value['slug']) ?>" <?php echo ($value['slug'] == $this->uri->segment(3))? 'style="color: #008b44"' : '' ?> ><?php echo $value['title'] ?></a></li>
                        <?php endforeach ?>
                    <?php else: ?>

                    <?php endif ?>
                </ul>
            </div>

            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                

                <h2 class="blog_title"><?php echo $detail['title'] ?></h2>

                <blockquote>
                    <?php echo $detail['description'] ?>
                </blockquote>

                <?php echo $detail['content'] ?>


                <div class="comments">
                	
                    <?php echo form_open(""); ?>
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            	<?php
				                echo form_label('Họ và Tên', 'name');
				                echo form_input('name', set_value('name'), 'class="form-control" id="name" placeholder="Họ và tên phụ huynh"');
				                ?>
				                <span class="name_error" style="color: red"></span>
                            </div>
                            <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            	<?php
				                echo form_label('Email', 'email');
				                // echo form_error('email');
				                echo form_input('email', set_value('email'), 'class="form-control" id="email" placeholder="Email"');
				                ?>
				                <span class="email_error" style="color: red"></span>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            	<?php
				                echo form_label('Ý kiến nhận xét', 'content');
				                echo form_textarea('content', set_value('content'), 'class="form-control" rows="5" id="content"');
				                ?>
				                <span class="content_error" style="color: red"></span>
                            </div>
                            <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            	<input type="hidden" name="category" value="introduce" id="category">
                            	<input type="hidden" name="slug" value="<?php echo $detail['slug'] ?>" id="slug">
                            	<?php echo form_submit('submit', 'Gửi nhận xét', 'class="btn btn-primary hvr-icon-forward submit-comment"'); ?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
                </div>

                <div id="comment">
                    <?php if (isset($comment)): ?>
                        <?php foreach ($comment as $key => $value): ?>
                            <div class="media cmt">
                                <div class="media-left">
                                    <img class="media-object" src="<?php echo site_url('assets/public/img/comment_ava.png') ?>" alt="Comment Avatar" width="64">
                                </div>
                                <div class="media-body">
                                    <h3 class="media-heading" style="color: #f4aa1c"><?php echo $value['name'] ?>:</h3>
                                    <span><?php echo $value['content'] ?></span>
                                    <span style="float: right; font-size: 1em"><?php echo $value['created_at'] ?></span>
                                </div>
                            </div>
                        <?php endforeach ?>
                    <?php else: ?>
                        <div class="media cmt">
                            <p class="cmt_error">Chưa có bình luận cho bài viết này</p>
                        </div>
                    <?php endif ?>


                </div>
                <div id="comment_readmore">
                    <input type="hidden" name="count-comment" id="count-comment" value="<?php echo $count_comment ?>">
                    <button class="btn btn-primary btn-sm center-block" type="submit">Xem thêm bình luận</button>
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
                    <p>Hãy đăng ký cho con bạn ngay hôm nay để có thể được tư vấn tốt nhất.</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 wow slideInUp">
                    <div id="register_image"></div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <br><br><br><br><br>
                    <h1>Đăng ký nhập học</h1>
                    <br><br>
                    <p>Trường MẦM NON TUỔI THẦN TIÊN cung cấp một chương trình giáo dục chất lượng cao từ cấp mầm non, tiểu học đến trung học phổ thông dựa trên những triết lý và thực tiễn giáo dục của Canada nhằm đáp ứng sự mong đợi của quý vị phụ huynh. Hãy đăng ký ngay để đội ngũ tuyển sinh của chúng tôi sẽ liên hệ với Quý vị trong thời gian sớm nhất.</p>
                    <a class="btn btn-primary hvr-icon-forward" role="button" href="<?php echo base_url('nhap-hoc/dang-ky-nhap-hoc') ?>">Đăng ký ngay</a>
                </div>
            </div>
        </div>
    </div>

</section>
