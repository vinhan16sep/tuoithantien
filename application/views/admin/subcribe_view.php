<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<div class="container">
    <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <?php
            echo '<table class="table table-hover table-bordered table-condensed">';
            echo '<tr>';
            echo '<td><b><a href="#">Title</a></b></td>';
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
    </div>
</div>
