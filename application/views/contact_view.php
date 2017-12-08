<link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/public/css/contact.css') ?>">

<section class="main_content">
    <div class="container">
        <div class="row">
            <div class="left col-md-6 col-sm-6 col-xs-12">
                <h1>Gửi ý kiến đóng góp</h1>

                <?php
                echo form_open_multipart('', array('class' => 'form-horizontal', 'id' => 'contact-form'));
                ?>
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <?php
                            echo form_label('Họ và Tên', 'name');
                            echo form_error('name');
                            echo form_input('name', set_value('name'), 'class="form-control contact_name" placeholder="Họ và tên phụ huynh"');
                            ?>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <?php
                            echo form_label('Email address', 'email');
                            echo form_error('email');
                            echo form_input('email', set_value('email'), 'class="form-control" placeholder="Email"');
                            ?>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <?php
                            echo form_label('Ý kiến nhận xét', 'content');
                            echo form_error('content');
                            echo form_textarea('content', set_value('content'), 'class="form-control" rows="4" placeholder=""');
                            ?>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <button class="btn btn-primary hvr-icon-forward" type="submit">Gửi nhận xét</button>
                        </div>
                    </div>
                <?php
                echo form_close();
                ?>
            </div>
            <div class="right col-md-6 col-sm-6 col-xs-12">
                <h1>Liên hệ với chúng tôi</h1>

                <p>Trường MN Tuổi Thần Tiên từ khi thành lập đến nay luôn phát triển không ngừng về cơ sở vật chất, đội ngũ cán bộ, giáo viên, nhân viên và học sinh.</p>

                <div class="social_network">
                    <ul class="list-inline">
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-facebook-f"></i>
                            </a></li>
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-linkedin"></i>
                            </a></li>
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-vk"></i>
                            </a></li>
                        <li><a href="javascript:void();">
                                <i class="fa fa-2x fa-twitter"></i>
                            </a></li>
                    </ul>
                </div>

                <h1>Địa chỉ liên hệ</h1>

                <table class="table">
                    <tr>
                        <td><i class="fa fa-map-marker"></i></td>
                        <td>Địa chỉ trụ sở chính</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-phone"></i></td>
                        <td>024.3311.9828 - 02433119828</td>
                    </tr>
                    <tr>
                        <td><i class="fa fa-envelope"></i></td>
                        <td>mntuoithantien-hd@hanoi.edu.vn</td>
                    </tr>
                </table>
            </div>

            <div class="map col-md-12 col-sm-12 col-xs-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d119215.95477315335!2d105.759425!3d20.972642!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x165d1c48862284c6!2zVHLGsOG7nW5nIG3huqdtIG5vbiBUdeG7lWkgVGjhuqduIFRpw6pu!5e0!3m2!1svi!2sus!4v1512474071713" width="100%" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>

        </div>

    </div>

</section>
<script>

    $('form#contact-form').submit(function(e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "<?php echo base_url('contact/create'); ?>",
            data: {
                input: $("#contact-form").serialize()
            },
            success: function(res){
                alert('Cảm ơn ' + $('.contact_name').val() + ', ý kiến của bạn đã được gửi!');
            },
            error: function() { alert("Error mail."); }
        });

    });
</script>