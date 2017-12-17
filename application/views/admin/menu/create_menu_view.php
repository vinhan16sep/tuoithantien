<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h2>Thêm menu chính</h2>
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Tiêu đề menu', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('title'), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Đường dẫn', 'url');
                        echo form_error('url');
                        echo form_input('url', set_value('url'), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Màu sắc', 'color');
                        echo form_error('color');
                        echo form_input('color', set_value('color'), 'class="form-control" id="colorpicker"');
                        ?>
                    </div>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Bật / Tắt menu', 'is_actived');
                        echo form_error('is_actived');
                        echo form_dropdown('is_actived', array('0' => 'Tắt', '1' => 'Bật'), set_value('is_actived', 1), 'class="form-control" id="is_actived"');
                        ?>
                    </div>
                    <br>
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
<script>
    $("#colorpicker").colorpicker();
</script>