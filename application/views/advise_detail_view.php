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
            <div class="post-cover">
                <img class="w-100" src="<?php echo base_url('assets/upload/advise/' . $advise['image']); ?>" alt="post cover">
            </div>

            <h3 class="post-title"><?php echo $advise['title']; ?></h3>
            <i class="fa fa-clock-o"></i> <small><?php echo $advise['created_at']; ?></small>
            <br>
            <br>
            <?php echo $advise['content']; ?>
        </div>
    </section>
    <!-- InstanceEndEditable -->
</section>