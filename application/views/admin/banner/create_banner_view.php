<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
        <div class="container col-md-12">
            <?php
            echo form_open_multipart('', array('class' => 'form-horizontal'));
            ?>
            <div id="collapseOne" class="collapse in">
                <div class="checkout-step-body">
                    <div class="row">
                        <div class="form-group">
                            <?php
//                            echo form_label('Active?', 'is_actived');
//                            echo form_error('is_actived');
//                            echo form_checkbox('is_actived', '1', TRUE, 'class="form-control is-actived"');
                            ?>
                        </div>
                        <div class="form-group picture">
                            <?php
                            echo form_label('Banner', 'image');
                            echo form_error('image');
                            echo form_upload('image', set_value('image'), 'classs="form-control"');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Tiêu đề', 'text');
                            echo form_error('text');
                            echo form_input('text', set_value('text'), 'class="form-control text"');
                            ?>
                        </div>
                        <div class="form-group">
                            <?php
                            echo form_label('Url', 'url');
                            echo form_error('url');
                            echo form_input('url', set_value('url'), 'class="form-control url"');
                            ?>
                        </div>
                    </div>
                </div>
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
    </section>
</div>