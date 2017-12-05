<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <section class="container">
        <div class="navside col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="title-main">
                <h3>Tư vấn làm đẹp</h3>
            </div>
            <ul>
                <?php if($advise_categories): ?>
                <?php foreach($advise_categories as $item): ?>
                <li>
                    <a href="<?php echo base_url('advise/list_advise_in_category/' . $item['id']); ?>"><?php echo $item['title']; ?></a>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>

        <div class="post-content col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <?php if($advises): ?>
            <?php foreach($advises as $advise): ?>
            <div class="item col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="bordered">
                    <img class="w-100" src="<?php echo site_url('assets/upload/advise/' . $advise['image']); ?>" alt="tin tức">
                    <h4><a href="<?php echo base_url('advise/detail/' . $advise['id']); ?>"><?php echo $advise['title']; ?></a></h4>
                    <i class="fa fa-clock-o"></i> <small><?php echo $advise['created_at']; ?></small>
                    <br>
                    <a href="<?php echo base_url('advise/detail/' . $advise['id']); ?>">Xem tiếp <i class="fa fa-arrow-right"></i></a>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </section>
    <!-- InstanceEndEditable -->
</section>