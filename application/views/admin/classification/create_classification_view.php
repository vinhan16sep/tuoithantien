<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0" style="margin-left: 15px">
                    <h1>THÊM MỚI</h1>
                    <div>
                        <span><?php echo ($this->session->flashdata('message'))? $this->session->flashdata('message') : ''; ?></span>
                    </div>
                    <?php
                    echo form_open_multipart('admin/classification/create', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group picture">
                        <?php
                        echo form_label('Tên Lớp học', 'name');
                        echo form_error('name');
                        echo form_input('name', set_value('name'), 'class="form-control" id="name"');
                        ?>
                    </div>

                    <div class="form-group">
                        <?php
                        echo form_label('Chọn cở sở trường học (*)', 'placement_id');
                        echo form_error('placement_id');
                        echo form_dropdown('placement_id', $placement, set_value('place'), 'class="form-control"');
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
