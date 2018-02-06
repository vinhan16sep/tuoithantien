<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <h1>THÊM MỚI ẢNH THƯ VIỆN ẢNH
                    </h1>
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group picture">
                        <?php
                        echo form_label('Tiêu đề', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('<?php echo $image_row["title"] ?>'), 'class="form-control" id="title"');
                        ?>
                    </div>
                    
                    <div class="form-group picture">
                        <?php
                        echo form_label('Image (Dung lượng ảnh không quá 1 Mb)', 'image');
                        echo form_error('image');
                        echo form_upload('image','','multiple');
                        ?>
                    </div>
                    
                    <div class="form-group col-sm-12 text-right">
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