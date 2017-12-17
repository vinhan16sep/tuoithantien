<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h2>Chỉnh sửa menu <span><?php echo $list_parent[$menu['parent']] ?></span>  <i style="color:red" class="fa fa-long-arrow-right" aria-hidden="true"></i>  <span><?php echo $menu['title']; ?></span></h2>
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Parent', 'parent');
                        echo form_error('parent');
                        echo form_dropdown('parent', $list_parent, set_value('parent', $parent), 'class="form-control" id="parent"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Title', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('title', $menu['title']), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Url', 'url');
                        echo form_error('url');
                        echo form_input('url', set_value('url', $menu['url']), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Is active', 'is_actived');
                        echo form_error('is_actived');
                        echo form_dropdown('is_actived', array('0' => 'Tắt', '1' => 'Bật'), set_value('is_actived', $menu['is_actived']), 'class="form-control" id="is_actived"');
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