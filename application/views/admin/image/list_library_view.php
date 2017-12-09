<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Thư viện ảnh
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <form action="<?php echo base_url('admin/library/index') ?>" class="form-horizontal" method="get">
                    <a type="button" href="<?php echo site_url('admin/library/create'); ?>" class="btn btn-primary">Thêm mới</a>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">
                    <input type="text" name="search" value="<?php echo $search ?>" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;">
                </form>
            </div>
            <p id="result"></p>
            <?php if ($library): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed admin">
                            <tbody>
                                <tr>
                                    <td style="width: 150px"><b><a href="#">Ảnh đại diện</a></b></td>
                                    <td><b><a href="#">Tiêu đề</a></b></td>
                                    <td><b><a href="#">Slug</a></b></td>
                                    <td style="width: 100px"><b>Operations</b></td>
                                </tr>
                                <?php foreach ($library as $value): ?>
                                    <?php
                                        $where = array('image_id' => $value['id']);
                                        $image = $this->image_model->fetch_row($where);
                                    ?>
                                    <tr class="row_<?php echo $value['id'] ?>">
                                        <td><img src="<?php echo base_url('assets/upload/image/'.$value['slug'].'/'.$image['image']) ?>" alt=""></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['slug'] ?></td>
                                        <td>
                                            <form class="form_ajax">
                                                <a href="<?php echo base_url('admin/library/image/'.$value['id']) ?>" title="Xem danh sách ảnh" class='gallery'>
                                                    <i class="fa fa-list" aria-hidden="true"></i>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="<?php echo base_url('admin/library/edit/'.$value['id']) ?>" title="Chỉnh sửa">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="<?php echo base_url('admin/library/remove') ?>" title="Xóa" class="btn-remove1" data-id="<?php echo $value['id'] ?>">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        không tồn tại!
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
</div>

<script>
    $('.btn-remove1').click(function(e){
    e.preventDefault();
    var image_id = $(this).data('image');
    var client_id = $(this).data('id');
    var url = $(this).attr('href');
    if(confirm('Chắc chắn xóa?')){
        $.ajax({
            url: url,
            type: 'GET',
            data: {id : client_id, image_id : image_id},
            success : function (res){
                        var data = $.parseJSON(res);
                        if(data.check == true){
                            $('.btn-remove1').parents('.row_'+client_id).fadeOut();
                        }else{
                            alert('Vui lòng xóa hết thư viện ảnh của bài viết này trước!');
                        }
                    }
        })
    }
  
    return false;
});

    // $("a.gallery").click(function(){
    //     var $form = $(this).attr('href');
    //     $("a.gallery").colorbox({inline:true, href:$form, width:'70%', height:'70%'});
    // })
</script>