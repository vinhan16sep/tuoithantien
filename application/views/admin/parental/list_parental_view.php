<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                HỌC PHÍ
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <form action="<?php echo base_url('admin/parental/list/'.$slug) ?>" class="form-horizontal" method="get">
                    <a type="button" href="<?php echo site_url('admin/parental/create/'.$slug); ?>" class="btn btn-primary">Thêm Mơi</a>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">
                    <input type="text" name="search" value="<?php echo $search ?>" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;">
                </form>
            </div>
            <?php if ($parental): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tbody>
                                <tr>
                                    <td style="width: 150px"><b><a href="#">Ảnh đại diện</a></b></td>
                                    <td><b><a href="#">Tiêu đề</a></b></td>
                                    <td><b><a href="#">Slug</a></b></td>
                                    <td><b><a href="#">Danh mục</a></b></td>
                                    <td style="width: 50px"><b>Operations</b></td>
                                </tr>
                                <?php foreach ($parental as $value): ?>   
                                    <tr class="row_<?php echo $value['id'] ?>">
                                        <td><img src="<?php echo base_url('assets/upload/parental/'.$value['image']) ?>" alt=""></td>
                                        <td><?php echo $value['title'] ?></td>
                                        <td><?php echo $value['slug'] ?></td>
                                        <td>
                                            <?php
                                                if($value['category'] == 1){
                                                    echo 'Liên lạc';
                                                }elseif($value['category'] == 2){
                                                    echo 'Thực đơn';
                                                }elseif($value['category'] == 3){
                                                    echo 'Y tế';
                                                }elseif($value['category'] == 4){
                                                    echo 'Kỷ luật';
                                                }
                                                
                                            ?>
                                        </td>
                                        <td>
                                            <form class="form_ajax">
                                                <a href="<?php echo base_url('admin/comment/index/'.$value['slug']); ?>" title="Danh sách comment">
                                                    <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                </a>
                                                &nbsp&nbsp
                                                <a href="<?php echo base_url('admin/parental/edit/'.$slug.'/'.$value['id']) ?>" title="Chỉnh sửa">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                &nbsp;&nbsp;
                                                <a href="<?php echo base_url('admin/parental/remove') ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>" >
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