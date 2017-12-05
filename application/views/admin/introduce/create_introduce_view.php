<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <h1>ADD NEW ITEM</h1>
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
                    <?php if ($this->uri->segment(4) == 'ngoai-khoa'): ?>
                        <div class="form-group picture">
                            <label for="slug">Danh mục</label>
                            <input type="text" name="" value="Ngoại Khóa" readonly class="form-control">
                            <input type="hidden" name="cat" value="2">
                        </div>
                    <?php else: ?>
                        <div class="form-group picture">
                            <label for="slug">Danh mục</label>
                            <input type="text" name="" value="Giáo Dục" readonly class="form-control">
                            <input type="hidden" name="cat" value="1">
                        </div>
                        <div class="form-group picture sub-cat">
                            <?php
                            echo form_label('Danh mục con', 'sub-cat');
                            echo form_error('sub-cat');
                            ?>
                            <select name="sub-cat" class="form-control">
                                <?php foreach ($sub_cat as $key => $value): ?>
                                    <option value="<?php echo $key ?>" <?php echo ($key == $this->uri->segment(4))? 'selected' : '' ?> >
                                        <?php echo $value ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <?php endif ?>
                    
                    <div class="form-group picture">
                        <?php
                        echo form_label('Image', 'image');
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