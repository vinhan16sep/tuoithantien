<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<style>
    .error{
        color: red;
    }
</style>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h2>Thêm menu con trong menu <span><?php echo $list_parent[$parent] ?></span></h2>
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'menu-form'));
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
                        echo form_input('title', set_value('title'), 'class="form-control"');
                        ?>
                    </div>
                    <hr class="form-group" style="border: solid 0.5px lightgrey">
                    <h3 class="form-group">Dựng đường dẫn cho menu</h3>
                    <div class="form-group sub-cat">
                        <?php
                        $main_category = array(
                            '' => 'Chọn menu chính',
                            'article' => 'Bài viết riêng',
                            'introduce_category' => 'Giới thiệu',
                            'admission_category' => 'Thông tin nhập học',
                            'parental_category' => 'Phối hợp cùng phụ huynh',
                            'activity_category' => 'Hoạt động'
                        );
                        echo form_label('Chọn menu chính (hoặc Bài viết riêng nếu là bài viết lẻ)', 'select_main');
                        echo form_error('select_main');
                        echo form_dropdown('select_main', $main_category, set_value('select_main', $parent), 'class="form-control" id="select_main"');
                        ?>
                    </div>
                    <div class="form-group sub-cat">
                        <?php
                        echo form_label('Chọn danh mục (hoặc bài viết trong Bài viết riêng)', 'select_category');
                        echo form_error('select_category');
                        echo form_dropdown('select_category', array('' => 'Chọn danh mục / bài viết'), set_value('select_category', ''), 'class="form-control" id="select_category"');
                        ?>
                    </div>
                    <div class="form-group sub-cat">
                        <?php
                        echo form_label('Chọn bài viết (nếu không chọn, menu sẽ trỏ đến danh sách bài viết trong danh mục phía trên)', 'select_article');
                        echo form_error('select_article');
                        echo form_dropdown('select_article', array('' => 'Chọn bài viết'), set_value('select_article', ''), 'class="form-control" id="select_article"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Đường dẫn hoàn chỉnh của menu', 'url');
                        echo form_error('url');
                        echo form_input('url', set_value('url'), 'class="form-control" id="url" readonly="readonly"');
                        ?>
                    </div>
                    <hr class="form-group" style="border: solid 0.5px lightgrey">
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Is active', 'is_actived');
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















