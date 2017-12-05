<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <section class="container">
        <div class="navside col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="title-main">
                <h3>Tin tức</h3>
            </div>
            <ul>
                <li>
                    <a href="<?php echo base_url('article/news'); ?>">Tin tức</a>
                </li>
                <li>
                    <a href="<?php echo base_url('article/recruitment'); ?>">Tuyển dụng</a>
                </li>
            </ul>
        </div>

        <div class="post-content col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="post-cover">
                <img class="w-100" src="<?php echo site_url('assets/upload/article/' . $article['image']); ?>" alt="post cover">
            </div>

            <h3 class="post-title"><?php echo $article['title']; ?></h3>
            <i class="fa fa-clock-o"></i> <small><?php echo $article['created_at']; ?></small>
            <br>
            <br>
            <?php echo $article['content']; ?>
        </div>
    </section>
    <!-- InstanceEndEditable -->
</section>