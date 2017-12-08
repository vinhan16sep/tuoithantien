<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                <?php 
                    switch ($slug) {
                        case 'chuong-trinh-khuyen-mai':
                            echo 'CHƯƠNG TRÌNH KHUYẾN MẠI';
                            break;
                        case 'hoc-phi':
                            echo 'HỌC PHÍ';
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
                
                <form action="<?php echo base_url('admin/admission/list/'.$slug) ?>" class="form-horizontal" method="get">
                    <a type="button" href="<?php echo site_url('admin/admission/create/'.$slug); ?>" class="btn btn-primary">Thêm Mới</a>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">
                    <input type="text" name="search" value="<?php echo $search ?>" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;">
                </form>
            </div>
            <?php if ($admission): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td style="width: 100px"><b><a href="#">Ảnh đại diện</a></b></td>
                                    <td style="width: 100px"><b><a href="#">Tiêu đề</a></b></td>
                                    <td style="width: 100px"><b><a href="#">Slug</a></b></td>
                                    <td style="width: 100px"><b><a href="#">Danh mục</a></b></td>
                                    <td><b><a href="#">Nội dung</a></b></td>
                                    <td><b>Operations</b></td>
                                </tr>
                                <?php foreach ($admission as $value): ?>   
                                    <tr class="row_<?php echo $value['id'] ?>">
                                        <td><img src="<?php echo base_url('assets/upload/admission/'.$value['image']) ?>" alt=""></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['slug'] ?></td>
                                        <td><?php echo ($value['category'] == 1)? 'Học phí' : 'Chương trình khuyến mại' ?></td>
                                        <td><?php echo $value['content'] ?></td>
                                        <td>
                                            <form class="form_ajax">
                                                <a href="<?php echo base_url('admin/admission/edit/'.$slug.'/'.$value['id']) ?>" title="Chỉnh sửa">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="<?php echo base_url('admin/admission/remove') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
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