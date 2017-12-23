<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <a type="button" href="<?php echo site_url('admin/' . $target . '/create_category'); ?>" class="btn btn-primary">THÊM MỚI</a>
        <div class="container col-md-12">
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <!--            <div class="row">-->
            <!--                <form action="--><?php //echo base_url('admin/introduce/index/'.$slug) ?><!--" class="form-horizontal" method="get">-->
            <!--                    <a type="button" href="--><?php //echo site_url('admin/introduce/create/'.$slug); ?><!--" class="btn btn-primary">THÊM MỚI</a>-->
            <!--                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">-->
            <!--                    <input type="text" name="search" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;" value="--><?php //echo $search ?><!--">-->
            <!--                </form>-->
            <!--            </div>-->
            <?php if ($categories): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed admin">
                            <tr>
                                <td><b><a href="#">Tiêu đề</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>

                            <?php foreach ($categories as $value): ?>

                                <tr class="row_<?php echo $value['id'] ?>">
                                    <td><?php echo $value['title'] ?></td>
                                    <td>
                                        <?php if (in_array($value['slug'], $check_slug) == null): ?>
                                            <form class="form_ajax">
                                                <a href="<?php echo base_url('admin/' . $target . '/edit_category/' . $value['id']); ?>" title="Chỉnh sửa">
                                                    <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                &nbsp&nbsp
                                                <a href="<?php echo base_url('admin/' . $target . '/remove_category'); ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            </form>
                                        <?php else: ?>
                                            <b>Không thể xóa</b>
                                        <?php endif ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </table>
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
