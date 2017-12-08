<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Thư viện ảnh <p><?php echo $title['title'] ?></p>
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <?php
                    echo form_open_multipart('admin/image/index', array('class' => 'form-horizontal'));
                ?>
                    <a type="button" href="<?php echo site_url('admin/library/create_image/'.$id); ?>" class="btn btn-primary">THÊM MỚI</a>
                    <a type="button" href="<?php echo site_url('admin/library/remove_all_image/'.$id); ?>" class="btn btn-primary">XÓA HẾT</a>
                <?php echo form_close(); ?>
            </div>
            <?php if ($library): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tbody>
                                <h3>Bài viết: <a href="<?php echo base_url('admin/image/index') ?>" title=""><?php echo $title['title'] ?></a></h3>
                                <tr>
                                    <td style="width: 100px"><b><a href="#">Ảnh</a></b></td>
                                    <td style="width: 150px"><b><a href="#">Tiêu đề hình ảnh</a></b></td>
                                    <td style="width: 100px"><b>Operations</b></td>
                                </tr>
                                <?php foreach ($library as $value): ?>   
                                    <tr class="row_<?php echo $value['id'] ?>">
                                        <td><img src="<?php echo base_url('assets/upload/image/'.$title['slug'].'/'.$value['image']) ?>" alt="" style="width: 200px"></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td>
                                            <form class="form_ajax">
                                                <a href="<?php echo base_url('admin/library/edit_image/'.$id.'/'.$value['id']) ?>" title="Chỉnh sửa">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="<?php echo base_url('admin/library/remove_image') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>"  data-image="<?php echo $value['image_id'] ?>" >
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="col-md-6 col-md-offset-5 page">
                            <!-- <?php echo $page_links ?> -->
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
