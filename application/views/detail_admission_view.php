<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/blog.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="row">
            <div class="category col-md-3 col-sm-3 col-xs-12">
                <h1>Danh mục bài viết</h1>
                <ul>
                	<?php if ($list != ''): ?>
                		<?php foreach ($list as $key => $value): ?>
	                		<li><a href="<?php echo base_url('thong-tin-nhap-hoc/'.$sub_category.'/'.$value['slug']) ?>"><?php echo $value['title'] ?></a></li>
	                	<?php endforeach ?>
	                <?php else: ?>

                	<?php endif ?>
                	
                    
                </ul>
            </div>
            <div class="blogs col-md-9 col-sm-9 col-xs-12">
                <div class="blogs_cover">
                    <img src="<?php echo base_url('assets/upload/introduce/'.$detail['image']) ?>" alt="ảnh cover bài viết" width=100%>
                </div>

                <h2 class="blog_title"><?php echo $detail['title'] ?></h2>

                <blockquote>
                    <?php echo $detail['description'] ?>
                </blockquote>

                <?php echo $detail['content'] ?>

				<br><br>
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
                            	<input type="hidden" name="category_id" value="1" id="category_id">
                            	<input type="hidden" name="slug" value="<?php echo $detail['slug'] ?>" id="slug">
                            	<?php echo form_submit('submit', 'Gửi nhận xét', 'class="btn btn-primary hvr-icon-forward submit-comment"'); ?>
                            </div>
                        </div>
                    <?php echo form_close(); ?>
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



