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
            <?php if($articles): ?>
            <?php foreach($articles as $article): ?>
            <div class="item col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="bordered">
                    <img class="w-100" src="<?php echo site_url('assets/upload/article/' . $article['image']); ?>" alt="tin tức">
                    <h4><a href="<?php echo base_url('article/detail/' . $article['id']); ?>"><?php echo $article['title']; ?></a></h4>
                    <i class="fa fa-clock-o"></i> <small><?php echo $article['created_at']; ?></small>
                    <br>
                    <a href="<?php echo base_url('article/detail/' . $article['id']); ?>">Xem tiếp <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    <!-- InstanceEndEditable -->
</section>