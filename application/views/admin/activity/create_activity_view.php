<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <h1>THÊM MỚI 
                        <?php 
                            switch ($slug) {
                                case 'thong-bao':
                                    echo 'THÔNG BÁO';
                                    break;
                                case 'tuyen-sinh':
                                    echo 'TUYỂN SINH';
                                    break;
                                case 'trai-nghiem':
                                    echo 'TRAI NGHIỆM';
                                    break;
                                default:
                                    # code...
                                    break;
                            }
                         ?>
                    </h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group picture">
                        <?php
                        echo form_label('Tiêu đề', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('title'), 'class="form-control" id="title"');
                        ?>
                    </div>
                    <div class="form-group picture">
                        <?php
                        echo form_label('Slug', 'slug');
                        echo form_error('slug');
                        echo form_input('slug', set_value('slug'), 'class="form-control" readonly id="slug" readonly');
                        ?>
                    </div>
                    
                    <?php if ($slug == 'thong-bao'): ?>
                        <input type="hidden" name="cat" value="1">
                    <?php elseif($slug == 'tuyen-sinh'): ?>
                        <input type="hidden" name="cat" value="2">
                    <?php elseif($slug == 'trai-nghiem'): ?>
                        <input type="hidden" name="cat" value="3">
                    <?php endif ?>
                    
                    <div class="form-group picture">
                        <?php
                        echo form_label('Hình ảnh', 'image');
                        echo form_error('image');
                        echo form_upload('image','','multiple');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Nội dung', 'content');
                        echo form_error('content');
                        echo form_textarea('content', set_value('content', '', false), 'class="form-control"')
                        ?>
                    </div>
                    <br>
                    <div class="form-group col-sm-12 text-right">
                        <input type="hidden" name="url" value="<?php echo $slug; ?>">
                        <?php
                        echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                        echo form_close();
                        ?>
                        <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>