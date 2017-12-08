<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <h3>Quản lý video trên trang chủ</h3>
            <div class="row">
                <form action="<?php echo base_url('admin/video') ?>" class="form-horizontal" method="get">
                    <a type="button" href="<?php echo site_url('admin/video/create'); ?>" class="btn btn-primary">THÊM MỚI</a>
                    <input type="submit" name="btn-search" value="Tìm Kiếm" class="btn btn-primary" style="float: right">
                    <input type="text" name="search" placeholder="Tìm Kiếm ..." class="form-control" style="float: right; width: 50%;" value="<?php echo $search ?>">
                </form>
            </div>
            <?php if ($videos): ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <?php
                        echo '<table class="table table-hover table-bordered table-condensed">';
                        echo '<tr>';
                        echo '<td class="col-md-5"><b><a href="#">Title</a></b></td>';
                        echo '<td class="col-md-6"><b><a href="#">Url</a></b></td>';
                        echo '<td class="col-md-1"><b>Operations</b></td>';
                        echo '</tr>';
                        if (!empty($videos)) {
                            foreach ($videos as $key => $item):
                                echo '<tr>';
                                echo '<td>' . $item['title'] . '</td>';
                                echo '<td>' . $item['url'] . '</td>';
                                echo '<td>';
                                echo '<a href="' . base_url('admin/video/edit/' . $item['id']) . '">';
                                echo '<span class="glyphicon glyphicon-pencil"></span>';
                                echo '</a>';
                                echo '&nbsp;&nbsp;&nbsp;&nbsp;';
                                echo '<a href="' . base_url('admin/video/remove') . '" class="btn-remove" data-id="'.$item['id'].'" >';
                                echo '<i class="fa fa-trash-o" aria-hidden="true"></i>';
                                echo '</a>';

                                echo '</td>';
                                echo '</tr>';
                            endforeach;
                        }
                        echo '</table>';
                        ?>
                        <div class="col-md-6 col-md-offset-5 page">
                            <?php echo $page_links; ?>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <div class="row">
                    <div class="col-lg-12" style="margin-top: 10px;">
                        <table>
                            Không tồn tại!
                        </table>
                        
                    </div>
                    
                </div>
            <?php endif ?>
        </div>
    </section>
</div>
