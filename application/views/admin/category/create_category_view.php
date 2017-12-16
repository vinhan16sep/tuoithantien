<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0" style="margin-left: 15px;">
                    <h1>THÊM MỚI BÀI VIẾT</h1>
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
                    <div class="form-group col-sm-12 text-right">
                        <input type="hidden" name="url" value="<?php echo $this->uri->segment(4); ?>">
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