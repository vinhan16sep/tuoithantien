<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <?php if(isset($category_id)): ?>
            <a type="button" href="<?php echo site_url('admin/admission/create/'.$category_id); ?>" class="btn btn-primary">THÊM MỚI</a>
        <?php else: ?>
            <a type="button" href="<?php echo site_url('admin/admission/create'); ?>" class="btn btn-primary">THÊM MỚI</a>
        <?php endif; ?>

        <a type="button" href="<?php echo site_url('admin/admission/category'); ?>" class="btn btn-normal">DANH MỤC</a>
        <div class="container col-md-12">
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <!--            <div class="row">-->
            <!--                <form action="--><?php //echo base_url('admin/admission/index/'.$slug) ?><!--" class="form-horizontal" method="get">-->
            <!--                    <a type="button" href="--><?php //echo site_url('admin/admission/create/'.$slug); ?><!--" class="btn btn-primary">THÊM MỚI</a>-->
            <!--                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">-->
            <!--                    <input type="text" name="search" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;" value="--><?php //echo $search ?><!--">-->
            <!--                </form>-->
            <!--            </div>-->
            <?php if ($admission): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed admin">
                            <tr>
                                <td style="width: 150px"><b><a href="#">Ảnh đại diện</a></b></td>
                                <td><b><a href="#">Tiêu đề</a></b></td>
                                <td><b><a href="#">Slug</a></b></td>
                                <td><b><a href="#">Danh mục</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>

                            <?php foreach ($admission as $value): ?>

                                <tr class="row_<?php echo $value['id'] ?>">
                                    <td><img src="<?php echo base_url('assets/upload/admission/'.$value['image']) ?>" alt=""></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['slug'] ?></td>
                                    <td><?php echo ($categories[$value['category_id']])? $categories[$value['category_id']] : ''; ?></td>
                                    <td>
                                        <form class="form_ajax">
                                            <a href="<?php echo base_url('admin/comment/admission/'.$value['slug']); ?>" title="Danh sách comment" class="show_comment" data-category="admission" data-slug="<?php echo $value['slug'] ?>" >
                                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                            </a>
                                            &nbsp&nbsp
                                            <a href="<?php echo base_url('admin/admission/edit/'.$value['id']); ?>" title="Chỉnh sửa">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            &nbsp&nbsp
                                            <a href="<?php echo base_url('admin/admission/remove'); ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>">
                                                <i class="fa fa-trash-o" aria-hidden="true"></i>
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>Chưa có bài viết</tr>
                        </table>
                    </div>
                </div>
            <?php endif ?>
        </div>
    </section>
</div>
