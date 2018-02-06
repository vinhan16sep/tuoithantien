
<div class="container content-wrapper">
    <div class="row" style="margin-left: 0px; margin-right: 55px;">
        <div class="col-md-12">
            <?php
            echo form_open_multipart('admin/article/edit', array('class' => 'form-horizontal'));
            ?>
            <div class="form-group">
                <?php
                echo form_label('Tiêu đề', 'title');
                echo form_error('title');
                echo form_input('title', set_value('title', $article['title']), 'class="form-control" id="title"');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('slug', 'slug');
                echo form_error('slug');
                echo form_input('slug', set_value('slug', $article['slug']), 'class="form-control" id="slug" readonly');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Ảnh đại diện cũ');
                ?>
                <img src="<?php echo base_url('assets/upload/article/'.$article["image"]) ?>" alt="" width=80px>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Ảnh đại diện (Dung lượng ảnh không quá 1 Mb)', 'image');
                echo form_error('image');
                echo form_upload('image','','multiple');
                ?>
            </div>
            <div class="form-group">
                <?php
                echo form_label('Giới thiệu', 'description');
                echo form_error('description');
                echo form_textarea('description', set_value('description', $article['description'], false), 'class="form-control" rows="5" ')
                ?>
            </div>

            <div class="form-group">
                <?php
                echo form_label('Nội dung', 'content');
                echo form_error('content');
                echo form_textarea('content', set_value('content', $article['content'], false), 'class="form-control content"')
                ?>
            </div>
            <br>
            <div class="form-group col-sm-12 text-right">
                <input type="hidden" name="id" value="<?php echo $article['id'] ?>">
                <input type="hidden" name="url" value="<?php echo $article['category_id'] ?>">
                <?php
                echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                ?>
                <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
            </div>
            <?php echo form_close(); ?>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo site_url('tinymce/tinymce.min.js'); ?>"></script>
<script>
    tinymce.init({
        selector: ".content",
        theme: "modern",
        height: 200,
        relative_urls: false,
        remove_script_host: false,
        plugins: [
            "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
            "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
            "save table contextmenu directionality emoticons template paste textcolor responsivefilemanager"
        ],
        content_css: "css/content.css",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | responsivefilemanager | print preview media fullpage | forecolor backcolor emoticons",
        style_formats: [
            {title: "Bold text", inline: "b"},
            {title: "Red text", inline: "span", styles: {color: "#ff0000"}},
            {title: "Red header", block: "h1", styles: {color: "#ff0000"}},
            {title: "Example 1", inline: "span", classes: "example1"},
            {title: "Example 2", inline: "span", classes: "example2"},
            {title: "Table styles"},
            {title: "Table row 1", selector: "tr", classes: "tablerow1"}
        ],
        external_filemanager_path: "<?php echo site_url('filemanager/'); ?>",
        filemanager_title: "Responsive Filemanager",
        external_plugins: {"filemanager": "<?php echo site_url('filemanager/plugin.min.js'); ?>"}
    });
</script>