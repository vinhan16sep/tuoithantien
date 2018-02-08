<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <h3 style="text-transform: uppercase; text-align: center;">
                Bình luận
            </h3>
            <div>
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div class="row">
                <?php if ($list_comment): ?>
                    <?php $i = 1; ?>
                    <table class="table">
                        <th>STT</th>
                        <th>Tên bài viết</th>
                        <th>Số comment mới</th>
                        <?php foreach ($list_comment as $key => $value): ?>
                            <?php foreach ($value as $k => $item): ?>
                            <tr>
                                <td><?php echo $i++ ?></td>
                                <td>
                                    <a href="<?php echo base_url('admin/comment/'.$key.'/'.$item[0]['slug']); ?>" data-slug="<?php echo $item[0]['slug'] ?>" data-category="<?php echo $item[0]['category'] ?>" class="comment"><?php echo $item[0]['title'] ?></a>
                                </td>
                                <td><?php echo $item['total'] ?></td>
                            </tr>
                            <?php endforeach ?>
                        <?php endforeach ?>
                    </table>
                <?php else: ?>
                    <div class="row">
                        Chưa có bình luận mới!
                    </div>
                <?php endif ?>
            </div>
        </div>
    </section>
</div>
<script type="text/javascript">
    var url = location.protocol + "//" + location.host + (location.port ? ':' + location.port : '')+'/tuoithantien/'
    $('.comment').click(function(){
        var slug = $(this).data('slug');
        var category = $(this).data('category');
        $.ajax({
             url: url + 'admin/comment/check_status',
             method: 'GET',
             data: {
                 slug : slug,
                 category : category,
             },
             success: function(){
             }
         })
    })
</script>