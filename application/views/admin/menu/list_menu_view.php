<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<style>
    /*#sortable { list-style-type: none; margin: 0; padding: 0; width: 60%; }*/
    /*#sortable li { margin: 0 3px 3px 3px; padding: 0.4em; padding-left: 1.5em; font-size: 1.4em; height: 18px; }*/
    /*#sortable li span { position: absolute; margin-left: -1.3em; }*/
</style>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <h3>Quản lý video trên trang chủ</h3>
            <div class="row">
                <a type="button" href="<?php echo site_url('admin/menu/create'); ?>" class="btn btn-primary">THÊM MỚI</a>
            </div>
            <?php if ($menus): ?>
                <div class="row">
                    <ul id="sortable">
                        <?php
                        if (!empty($menus)):
                        foreach ($menus as $key => $item):
                        ?>
                            <li class="treeview" id="<?php echo ($key + 1) . '-' . $item['id'] ?>">
                                <a href="<?php echo base_url('admin/menu/edit/' . $item['id']) ?>"><?php echo $item['title'] ?></a>
                                <a href="<?php echo base_url('admin/menu/create_sub/' . $item['id']) ?>"><span class="glyphicon glyphicon-plus"></span></a>
                            </li>
                        <?php
                        endforeach;
                        endif;
                        ?>
                    </ul>




<!--                    <div class="col-lg-12" style="margin-top: 10px;">-->
<!--                        --><?php
//                        echo '<table class="table table-hover table-bordered table-condensed">';
//                        echo '<tr>';
//                        echo '<td class="col-md-5"><b><a href="#">Title</a></b></td>';
//                        echo '<td class="col-md-6"><b><a href="#">Url</a></b></td>';
//                        echo '<td class="col-md-1"><b>Operations</b></td>';
//                        echo '</tr>';
//
//                                echo '<tr>';
//                                echo '<td>' . $item['title'] . '</td>';
//                                echo '<td>' . $item['url'] . '</td>';
//                                echo '<td>';
//                                echo '<a href="' . base_url('admin/video/edit/' . $item['id']) . '">';
//                                echo '<span class="glyphicon glyphicon-pencil"></span>';
//                                echo '</a>';
//                                echo '&nbsp;&nbsp;&nbsp;&nbsp;';
//                                echo '<a href="' . base_url('admin/video/remove') . '" class="btn-remove" data-id="'.$item['id'].'" >';
//                                echo '<i class="fa fa-trash-o" aria-hidden="true"></i>';
//                                echo '</a>';
//                                echo '&nbsp;&nbsp;&nbsp;&nbsp;';
//                                echo '<a href="' . base_url('admin/menu/create_sub/' . $item['id']) . '">';
//                                echo '<span class="glyphicon glyphicon-plus"></span>';
//                                echo '</a>';
//                                echo '</td>';
//                                echo '</tr>';
//                            endforeach;
//                        }
//                        echo '</table>';
//                        ?>
<!--                        <div class="col-md-6 col-md-offset-5 page">-->
<!--                            --><?php //echo $page_links; ?>
<!--                        </div>-->
<!--                    </div>-->
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
<script>
    $( function() {
        $('#sortable').sortable({
            axis: 'y',
            update: function (event, ui) {
                var data = $(this).sortable('serialize');

                $.ajax({
                    data: {
                        sort: data,
                    },
                    method: 'GET',
                    url: location.protocol + "//" + location.host + (location.port ? ':' + location.port : '') + "/tuoithantien/admin/menu/sort",
                });
            }
        });
    } );
</script>
