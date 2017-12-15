<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <form action="<?php echo base_url('admin/classification/create') ?>" class="form-horizontal" method="get">
                    <a type="button" href="<?php echo site_url('admin/classification/create'); ?>" class="btn btn-primary">Thêm Mơi</a>
                </form>
            </div>
            <?php if($classification): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tbody>
                            <tr>
                                <td style="width: 200px"><b><a href="#">Tên lớp học</a></b></td>
                                <td><b><a href="#">Cơ sở</a></b></td>
                                <td><b><a href="#">Thời gian cập nhật</a></b></td>
                                <td><b>Thao tác</b></td>
                            </tr>
                            <?php foreach ($classification as $value): ?>
                                <tr class="row_<?php echo $value['id']; ?>">
                                    <td><?php echo $value['name']; ?></td>
                                    <td><?php echo $value['placement_name']; ?></td>
                                    <td><?php echo date_format(date_create($value['modified_at']), "d-m-Y H:i:s"); ?></td>
                                    <td>
                                        <form class="form_ajax">
                                            <a href="<?php echo base_url('admin/classification/edit/'.$value['id']) ?>" title="Chỉnh sửa">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            &nbsp;&nbsp;
                                            <a href="<?php echo base_url('admin/classification/remove') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    Không có bài viết nào!
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>