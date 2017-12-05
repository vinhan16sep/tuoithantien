<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                <?php
                    $segment = $this->uri->segment(4);
                    switch ($segment) {
                        case 'muc-tieu':
                            echo 'Mục Tiêu';
                            break;
                        case 'ngoai-ngu':
                            echo 'Ngoại Ngữ';
                            break;
                        case 'giao-duc-theo-lua-tuoi':
                            echo 'Giáo Dục Theo Lứa Tuổi';
                            break;
                        case 'tap-huan':
                            echo 'Tập Huấn';
                            break;
                        case 'ngoai-khoa':
                            echo 'Ngoại Khóa';
                            break;
                        default:
                            break;
                    }
                 ?>
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                 <?php
                    echo form_open_multipart('admin/introduce/index/'.$slug, array('class' => 'form-horizontal'));
                ?>
                    <a type="button" href="<?php echo site_url('admin/introduce/create/'.$slug); ?>" class="btn btn-primary">Thêm mơi</a>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">
                    <input type="text" name="search" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;">
                <?php echo form_close(); ?>
            </div>
            <?php if ($introduces): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table class="table table-hover table-bordered table-condensed">
                            <tr>
                                <td style="width: 100px"><b><a href="#">Ảnh đại diện</a></b></td>
                                <td style="width: 100px"><b><a href="#">Tiêu đề</a></b></td>
                                <td style="width: 100px"><b><a href="#">Slug</a></b></td>
                                <td style="width: 100px"><b><a href="#">Danh mục</a></b></td>
                                <td style="width: 100px"><b><a href="#">Danh mục con</a></b></td>
                                <td><b><a href="#">Nội dung</a></b></td>
                                <td><b>Operations</b></td>
                            </tr>
                            
                            <?php foreach ($introduces as $value): ?>
                                
                                <tr class="row_<?php echo $value['id'] ?>">
                                    <td><img src="<?php echo base_url('assets/upload/introduce/'.$value['image']) ?>" alt=""></td>
                                    <td><?php echo $value['title'] ?></td>
                                    <td><?php echo $value['slug'] ?></td>
                                    <td><?php echo ($value['category'] == 1)? 'Giáo dục' : 'Ngoại khóa' ?></td>
                                    
                                    <?php 
                                        if($value['category'] == 1){
                                            echo '<td>';
                                            switch ($value['sub_category']) {
                                                case 'ngoai-ngu':
                                                    echo 'Ngoại Ngữ';
                                                    break;
                                                case 'giao-duc-theo-lua-tuoi':
                                                    echo 'Giáo Dục Theo Lứa Tuổi';
                                                    break;
                                                case 'tap-huan':
                                                    echo 'Tập Huấn';
                                                    break;
                                                default:
                                                    echo 'Mục Tiêu';
                                                    break;
                                            }
                                            echo '</td>';
                                        }else{
                                            echo '<td></td>';
                                        }
                                        
                                    ?>
                                    <td><?php echo $value['content'] ?></td>
                                    <td>
                                        <form class="form_ajax">
                                            <a href="<?php echo base_url('admin/introduce/edit/'.$value['id']); ?>" title="Chỉnh sửa">
                                                <span class="glyphicon glyphicon-pencil"></span>
                                            </a>
                                            &nbsp&nbsp
                                            <a href="<?php echo base_url('admin/introduce/remove'); ?>" title="Xóa" class="btn-remove" data-id="<?php echo $value['id'] ?>">
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
