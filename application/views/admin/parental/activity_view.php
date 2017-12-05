<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="">

        <div class="container" style="width: 95%;">
            <h3>
                <?php 
                    switch ($slug) {
                        case 'gio-dua-don':
                            echo 'GIỜ ĐƯA ĐÓN';
                            break;
                        case 'che-do-sinh-hoat-1-ngay':
                            echo 'CHẾ ĐỘ SINH HOẠT 1 NGÀY';
                            break;
                        default:
                            # code...
                            break;
                    }
                 ?>
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-top: 10px;">
                        <?php
                            echo form_open_multipart('admin/parental/activity/'.$slug, array('class' => 'form-horizontal'));
                        ?>
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td><b><a href="#">Ảnh đại diện</a></b></td>
                                <td><img src="<?php echo base_url('assets/upload/parental/'.$activity['image']) ?>" alt="" style="width: 50%"></td>
                            </tr>

                            <tr>
                                <td><b><a href="#">Ảnh đại diện</a></b></td>
                                <td><input type="file" name="image" multiple="" disabled></td>
                            </tr>

                            <tr>
                                <td ><b><a href="#">Tiêu đề</a></b></td>
                                <td><input type="text" name="title" value="<?php echo $activity['title'] ?>" class="form-control" readonly id="title"></td>
                                
                            </tr>

                            <tr>
                                <td ><b><a href="#">Slug</a></b></td>
                                <td>
                                    <input type="text" name="slug" value="<?php echo $activity['slug'] ?>" class="form-control" readonly id="slug">
                                </td>
                                
                            </tr>

                            
                            <tr>
                                <td ><b><a href="#">Nội dung</a></b></td>
                                <td class="form-group">
                                    <textarea name="content" class="form-control content txt_hide" style="height: 200px"><?php echo $activity['content'] ?></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td style="float: right">
                                    <input type="button" name="edit" value="Cập nhật" class="btn btn-primary" id="edit">
                                    <input type="submit" name="ok" value="OK" class="btn btn-primary" id="ok">
                                    <a class="btn btn-default cancel go_back" href="javascript:window.history.go(-1);">Go back</a>
                                </td>
                            </tr>
                        </table>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>
    </section>
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