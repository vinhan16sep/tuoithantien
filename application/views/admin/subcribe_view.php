<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="row">
            <div class="col-lg-12" style="margin-top: 10px;">
                <a type="button" href="<?php echo site_url('admin/subcribe/send_mail_all'); ?>" class="btn btn-primary">GỬI TẤT CẢ</a>
                <?php
                echo '<table class="table table-hover table-bordered table-condensed">';
                echo '<tr>';
                echo '<td><b><a href="#">Email</a></b></td>';
                echo '</tr>';
                if (!empty($subcribes)) {
                    foreach ($subcribes as $key => $item):
                        echo '<tr>';
                        echo '<td>' . $item['email'] . '</td>';
                        ?>
                        <?php
                    endforeach;
                }else {
                    echo '<tr class="odd"><td colspan="9">No records</td></tr>';
                }
                echo '</table>';
                ?>
            </div>
            <div class="col-md-6 col-md-offset-5 page">
                <?php echo $page_links ?>
            </div>
        </div>
    </section>
</div>