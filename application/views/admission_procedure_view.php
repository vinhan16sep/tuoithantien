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
                <div class="blogs_cover">
                    <img src="<?php echo base_url('assets/upload/admission/'.$admission['image']); ?>" alt="ảnh cover bài viết">
                </div>

                <h2 class="blog_title"><?php echo $admission['title'] ?></h2>

                <?php echo $admission['content'] ?>

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
                                <input type="hidden" name="category_id" value="2" id="category_id">
                                <input type="hidden" name="slug" value="<?php echo $admission['slug'] ?>" id="slug">
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
                    <p>Text giới thiệu chung về các chương trình</p>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <img src="<?php echo site_url('assets/public/img/register.png') ?>" class="wow fadeInUp">
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

