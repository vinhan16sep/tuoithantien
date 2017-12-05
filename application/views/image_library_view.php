<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <section class="container">
        <div class="navside col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="title-main">
                <h3>Giới thiệu</h3>
            </div>
            <ul>
                <li>
                    <a href="<?php echo base_url('introduce') ?>">Về chúng tôi</a>
                </li>
                <li>
                    <a href="<?php echo base_url('introduce/vision') ?>">Tầm nhìn chiến lược</a>
                </li>
                <li>
                    <a href="<?php echo base_url('introduce/destiny') ?>">Sứ mệnh</a>
                </li>
                <li>
                    <a href="<?php echo base_url('introduce/indentify') ?>">Chứng nhận</a>
                </li>
                <li>
                    <a href="<?php echo base_url('introduce/clause') ?>">Điều khoản</a>
                </li>
                <li>
                    <a href="<?php echo base_url('introduce/image_library') ?>">Thư viện hình ảnh</a>
                </li>
            </ul>
        </div>

        <div class="post-content col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="post-cover">
                <img class="w-100" src="<?php echo site_url('assets/public/img/slide_1.png'); ?>" alt="post cover">
            </div>

            <h3 class="post-title"><?php echo $item['title']; ?></h3>
            <?php echo $item['content']; ?>
        </div>
    </section>
    <!-- InstanceEndEditable -->
</section>