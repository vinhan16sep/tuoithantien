<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <a type="button" href="<?php echo site_url('admin/article/create'); ?>" class="btn btn-primary">ADD NEW</a>
            </div>
            <div class="row">
                <div class="col-lg-12" style="margin-top: 10px;">
                    <?php
                    echo '<table class="table table-hover table-bordered table-condensed">';
                    echo '<tr>';
                    echo '<td><b><a href="#">Title</a></b></td>';
                    echo '<td><b><a href="#">Type</a></b></td>';
                    echo '<td><b>Operations</b></td>';
                    echo '</tr>';
                    if (!empty($articles)) {
                        foreach ($articles as $key => $item):
                            echo '<tr>';
                            echo '<td>' . $item['title'] . '</td>';
                            echo '<td>' . ($item['type'] == 0 ? 'Tin tức' : 'Tuyển dụng') . '</td>';
                            ?>
                            <?php
                            echo '<td>' . anchor('admin/article/edit/' . $item['id'], '<span class="glyphicon glyphicon-pencil"></span>');
                            echo ' ' . anchor('admin/article/remove/' . $item['id'], '<span class="glyphicon glyphicon-remove"></span>') . '</td>';
                            echo '</tr>';
                        endforeach;
                    }else {
                        echo '<tr class="odd"><td colspan="9">No records</td></tr>';
                    }
                    echo '</table>';
                    ?>
                    <div class="col-md-6 col-md-offset-5">
                        <?php echo $page_links; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
