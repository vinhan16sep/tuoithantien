<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <?php if(isset($category_id)): ?>
            <a type="button" href="<?php echo site_url('admin/introduce/create/'.$category_id); ?>" class="btn btn-primary">THÊM MỚI</a>
        <?php else: ?>
            <a type="button" href="<?php echo site_url('admin/introduce/create'); ?>" class="btn btn-primary">THÊM MỚI</a>
        <?php endif; ?>
        <a type="button" href="<?php echo site_url('admin/introduce/category'); ?>" class="btn btn-normal">DANH MỤC</a>
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
            <?php if ($introduces): ?>
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
                            
                            <?php foreach ($introduces as $value): ?>
                                
                                <tr class="row_<?php echo $value['id'] ?>">
                                    <td><img src="<?php echo base_url('assets/upload/introduce/'.$value['image']) ?>" alt=""></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['slug'] ?></td>
                                    <?php if (!empty($categories[$value['category_id']])): ?>
                                        <td><?php echo $categories[$value['category_id']]; ?></td>
                                    <?php else: ?>
                                        <td></td>
                                    <?php endif ?>
                                    
                                    <td>
                                        <form class="form_ajax">
                                            <a href="<?php echo base_url('admin/comment/introduce/'.$value['slug']); ?>" title="Danh sách comment" class="show_comment" data-category="introduce" data-slug="<?php echo $value['slug'] ?>" style="position: relative;" >
                                                <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                                <apan class="badge" style="position: absolute; top: -5px; left: 10px; padding: 3px 6px; font-size: 9px; background: red;"><?php echo $value['count_comment'] ?></apan>
                                            </a>
                                            &nbsp&nbsp
                                            <a href="<?php echo base_url('admin/introduce/edit/'.$value['id']); ?>" title="Chỉnh sửa">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                                </a>
                                                &nbsp&nbsp
                                            <?php if ($introduce_slug == $value['slug']): ?>
                                                <a href="<?php echo base_url('admin/introduce/remove'); ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>"  style="display: none">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            <?php else: ?>
                                                <a href="<?php echo base_url('admin/introduce/remove'); ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                                </a>
                                            <?php endif ?>
                                            
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
