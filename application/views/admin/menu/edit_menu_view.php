<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<style>
    /*.numberlist{*/
    /*width:450px;*/
    /*}*/
    .numberlist ol{
        counter-reset: li;
        list-style: none;
        *list-style: decimal;
        font: 15px 'trebuchet MS', 'lucida sans';
        padding: 0;
        margin-bottom: 4em;
    }
    .numberlist ol ol{
        margin: 0 0 0 2em;
    }

    .numberlist a{
        width: 80%;
        position: relative;
        display: inline-block;
        padding: .4em .4em .4em 2em;
        *padding: .4em;
        margin: .5em 0;
        background: #FFF;
        color: #444;
        text-decoration: none;
        -moz-border-radius: .3em;
        -webkit-border-radius: .3em;
        border-radius: .3em;
        text-decoration: none;
    }

    .numberlist a:hover{
        background: #cbe7f8;
        text-decoration:none;
    }
    .numberlist a:before{
        content: counter(li);
        counter-increment: li;
        position: absolute;
        left: -1.3em;
        top: 57%;
        margin-top: -1.3em;
        background: #87ceeb;
        height: 2.4em;
        width: 2.4em;
        line-height: 2em;
        border: .3em solid #fff;
        text-align: center;
        font-weight: bold;
        -moz-border-radius: 2em;
        -webkit-border-radius: 2em;
        border-radius: 2em;
        color:#FFF;
    }

</style>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h2>Chỉnh sửa menu <span style="color:<?php echo $menu['color'] ?>"><?php echo $menu['title']; ?></span></h2>
            <div class="modified-mode">
                <div class="col-lg-10 col-lg-offset-0">
                    <?php
                    echo form_open_multipart('', array('class' => 'form-horizontal'));
                    ?>
                    <div class="form-group">
                        <?php
                        echo form_label('Tiêu đề menu', 'title');
                        echo form_error('title');
                        echo form_input('title', set_value('title', $menu['title']), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group">
                        <?php
                        echo form_label('Đường dẫn', 'url');
                        echo form_error('url');
                        echo form_input('url', set_value('url', $menu['url']), 'class="form-control"');
                        ?>
                    </div>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Màu sắc', 'color');
                        echo form_error('color');
                        echo form_input('color', set_value('color', $menu['color']), 'class="form-control" id="colorpicker"');
                        ?>
                    </div>
                    <div class="form-group picture sub-cat">
                        <?php
                        echo form_label('Bật / Tắt menu', 'is_actived');
                        echo form_error('is_actived');
                        echo form_dropdown('is_actived', array('0' => 'Tắt', '1' => 'Bật'), set_value('is_actived', $menu['is_actived']), 'class="form-control" id="is_actived"');
                        ?>
                    </div>
                    <br>
                    <div class="form-group col-sm-12 text-right">
                        <?php
                        echo form_submit('submit', 'OK', 'class="btn btn-primary"');
                        echo form_close();
                        ?>
                        <a class="btn btn-default cancel" href="javascript:window.history.go(-1);">Go back</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content row">
        <div class="container col-md-12 numberlist">
                <h2>Danh sách menu con trong menu <span style="color:<?php echo $menu['color'] ?>"><?php echo $menu['title']; ?></span>&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('admin/menu/create_sub/' . $menu['id']); ?>'"><span class="glyphicon glyphicon-plus"></span> menu con</button></h2>
            <div class="col-lg-10 col-lg-offset-0">
                <ol id="sub-sortable">
                    <?php
                    if (!empty($subs)):
                        foreach ($subs as $key => $item):
                            ?>
                            <li class="treeview" id="<?php echo ($key + 1) . '-' . $item['id'] ?>">
                                <strong><a style="color:<?php echo $item['color'] ?>" href="<?php echo base_url('admin/menu/edit_sub/' . $item['id']) ?>"><?php echo $item['title'] ?></a></strong>
                                <button type="button" class="btn btn-primary" onclick="location.href='<?php echo base_url('admin/menu/edit_sub/' . $item['id']); ?>'"><span class="glyphicon glyphicon-pencil"></span></button>
                                <button data-url="<?php echo base_url('admin/menu/remove'); ?>" data-id="<?php echo $item['id']; ?>" type="button" class="btn btn-danger btn-remove-menu">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
                                </button>
                                <button data-url="<?php echo base_url('admin/menu/active'); ?>" data-id="<?php echo $item['id']; ?>" data-active="<?php echo $item['is_actived']; ?>" type="button" class="btn <?php echo ($item['is_actived'] == 1) ? 'btn-success' : 'btn-danger'; ?> btn-active-menu">
                                    <i class="fa <?php echo ($item['is_actived'] == 1) ? 'fa-check' : 'fa-remove'; ?>" aria-hidden="true"></i>
                                </button>
                            </li>
                            <?php
                        endforeach;
                    else:
                    ?>
                    <div class="row">
                        <div class="col-lg-12 col-lg-offset-0" style="margin-top: 10px;">
                            <table>
                                Không có menu con!
                            </table>

                        </div>

                    </div>
                    <?php endif; ?>
                </ol>
            </div>
        </div>
    </section>
    <script>
        $( function() {
            $('#sub-sortable').sortable({
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
        });
        $("#colorpicker").colorpicker();
    </script>
</div>