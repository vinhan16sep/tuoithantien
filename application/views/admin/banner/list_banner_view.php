<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <div >
                <span><?php echo $this->session->flashdata('message'); ?></span>
            </div>
            <div >
                <a type="button" href="<?php echo site_url('admin/banner/create'); ?>" class="btn btn-primary">ADD NEW</a>
            </div>
            <div >
                <div  style="margin-top: 10px;">
                    <?php
                    echo '<table class="table table-hover table-bordered table-condensed">';
                    echo '<tr>';
                    echo '<td><b><a href="#">Title</a></b></td>';
                    echo '<td><b><a href="#">Image</a></b></td>';
                    echo '<td><b>Operations</b></td>';
                    echo '</tr>';
                    if (!empty($banners)) {
                        foreach ($banners as $item):
                            echo '<tr>';
                            echo '<td>' . $item['text'] . '</td>';
                            echo '<td><img src="' . site_url('assets/upload/banner/' . $item['image']) . '" /></td>';
                            echo '<td>';
                            echo '<a href="'.base_url('admin/banner/remove').'" title="Xóa" class="btn-remove" data-id="'.$item['id'].'" >';
                            echo '<i class="fa fa-trash-o" aria-hidden="true"></i>';
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
<script>
    var url = '<?php echo base_url('admin/banner/delete') ?>';

    function confirmDelete(id){
        if (confirm('Chắc chắn xoá?')) {
            $.ajax({
                url: url,
                method: 'GET',
                data: {
                    id: id
                },
                success: function(res){
                    alert('Image ' + res.image + ' has deleted successful');
                    location.reload();
                },
                error: function(){
                    alert('Delete unsuccessful');
                }
            });
        } else {
            return false;
        }
    }

</script>
