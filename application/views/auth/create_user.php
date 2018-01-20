<link rel="stylesheet" href="<?php echo site_url('assets/admin/'); ?>bower_components/bootstrap/dist/css/bootstrap.css">
<div class="content-wrapper" style="min-height: 916px;">
    <section class="content row">
            <div class="col-lg-4 col-lg-offset-4">
                <h1><?php echo lang('create_user_heading');?></h1>
                <p><?php echo lang('create_user_subheading');?></p>

                <div id="infoMessage" class="col-lg-4 col-lg-offset-4"><?php echo $message;?></div>

                <?php echo form_open("admin/auth/create_user");?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo lang('create_user_username_label', 'username');?> <br />
                            <?php echo form_input($username, '', 'class="form-control"');?>
                        </div>
                        <div class="col-md-12">
                            <?php echo lang('create_user_fname_label', 'first_name');?> <br />
                            <?php echo form_input($first_name, '', 'class="form-control"');?>
                        </div>

                        <div class="col-md-12">
                            <?php echo lang('create_user_lname_label', 'last_name');?> <br />
                            <?php echo form_input($last_name, '', 'class="form-control"');?>
                        </div>

                      <?php
                      if($identity_column!=='email') {
                          echo '<p>';
                          echo lang('create_user_identity_label', 'identity');
                          echo '<br />';
                          echo form_error('identity');
                          echo form_input($identity);
                          echo '</p>';
                      }
                      ?>

                        <div class="col-md-12">
                            <?php echo lang('create_user_company_label', 'company');?> <br />
                            <?php echo form_input($company, '', 'class="form-control"');?>
                        </div>

                        <div class="col-md-12">
                            <?php echo lang('create_user_email_label', 'email');?> <br />
                            <?php echo form_input($email, '', 'class="form-control"');?>
                        </div>

                        <div class="col-md-12">
                            <?php echo lang('create_user_phone_label', 'phone');?> <br />
                            <?php echo form_input($phone, '', 'class="form-control"');?>
                        </div>

                        <div class="col-md-12">
                            <?php echo lang('create_user_password_label', 'password');?> <br />
                            <?php echo form_input($password, '', 'class="form-control"');?>
                        </div>

                        <div class="col-md-12">
                            <?php echo lang('create_user_password_confirm_label', 'password_confirm');?> <br />
                            <?php echo form_input($password_confirm, '', 'class="form-control"');?>
                        </div>


                        <div class="col-md-12"><?php echo form_submit('submit', lang('create_user_submit_btn'));?></div>

                <?php echo form_close();?>
                    </div>
            </div>
    </section>
</div>
