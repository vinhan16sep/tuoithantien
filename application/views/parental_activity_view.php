<section class="main_content">
    <div class="container">
        <div class="row">
            <div class="blogs col-md-8 col-sm-8 col-xs-12">
                <div class="blogs_cover">
                    <img src="<?php echo base_url('assets/upload/parental/'.$activity['image']); ?>" alt="ảnh cover bài viết">
                </div>

                <h2 class="blog_title"><?php echo $activity['title'] ?></h2>

                <blockquote>
                    <?php echo $activity['description'] ?>
                </blockquote>

                <?php echo $activity['content'] ?>


                <br><br>
				<div id="comment">
					<?php if (isset($comment)): ?>
						<?php foreach ($comment as $key => $value): ?>
							<p>
								<span style="color: red"><?php echo $value['name'] ?>:</span style="color: red">
								<span><?php echo $value['content'] ?></span>
								<span style="float: right; font-size: 10px"><?php echo $value['created_at'] ?></span>
							</p>
						<?php endforeach ?>
					<?php else: ?>
						<p class="cmt_error">Chưa có bình luận cho bài viết này</p>
					<?php endif ?>
					
					
				</div>
				<br><br>

                <div class="comments">
                	
                    <?php echo form_open("<?php echo base_url('comment/create_comment'); ?>"); ?>
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
                            	<input type="hidden" name="category_id" value="3" id="category_id">
                            	<input type="hidden" name="slug" value="<?php echo $activity['slug'] ?>" id="slug">
                            	<?php echo form_submit('submit', 'Gửi nhận xét', 'class="btn btn-primary hvr-icon-forward submit-comment"'); ?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
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
                    <img src="img/register.png" class="wow fadeInUp">
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

