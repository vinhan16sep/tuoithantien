<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <div id="slide-top" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <?php if($banners): ?>
                <?php foreach($banners as $key => $banner): ?>
                    <div class="item <?php echo ($key == 0) ? 'active' : ''; ?>">
                        <img class="w-100" src="<?php echo site_url('assets/upload/banner/' . $banner['image']); ?>" alt="slide-1">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#slide-top" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#slide-top" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <div class="present container-fluid">
        <div class="left col-lg-4 col-md-4 col-sm-4 col-xs-12">
            <div class="bordered">
                <div class="title-main">
                    <h3 class="text-center">Sản phẩm mới</h3>
                    <div class="title-line left"></div>
                    <div class="title-line right"></div>
                </div>
                <div id="slide-latest-product" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#slide-latest-product" data-slide-to="0" class="active"></li>
                        <li data-target="#slide-latest-product" data-slide-to="1"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php if($latest_products): ?>
                        <?php foreach($latest_products as $key => $product): ?>
                        <div class="item <?php echo ($key == 0) ? 'active' : ''; ?>">
                            <?php
                            if(strpos($product['image'], '|') == true){
                                $image_array = explode('|', $product['image']);
                                $image = $image_array[0];
                            }else{
                                $image = $product['image'];
                            }
                            ?>
                            <img src="<?php echo site_url('assets/upload/product/' . $image); ?>" alt="latest-product">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h3 class="text-left"><?php echo $product['title']; ?></h3>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <h3 class="text-right price"><?php echo $product['price']; ?> vnđ</h3>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php endif; ?>
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#slide-latest-product" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#slide-latest-product" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>


        </div>


        <div class="right col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <div class="bordered" id="hot-product">
                <div class="title-main">
                    <h3 class="text-center">Sản phẩm tiêu biểu</h3>
                    <div class="title-line left"></div>
                    <div class="title-line right"></div>
                </div>

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                            <div id="slider-control">
                                <a class="left carousel-control" href="#itemslider" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
                                <a class="right carousel-control" href="#itemslider" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                            </div>

                            <div class="carousel-inner">
                                <?php if($feature_products): ?>
                                <?php foreach($feature_products as $key => $product): ?>
                                <div class="item <?php echo ($key == 0) ? 'active' : ''; ?>">
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <?php
                                        if(strpos($product['image'], '|') == true){
                                            $image_array = explode('|', $product['image']);
                                            $image = $image_array[0];
                                        }else{
                                            $image = $product['image'];
                                        }
                                        ?>
                                        <a href="<?php echo base_url('product/detail/' . $product['id']); ?>"><img src="<?php echo site_url('assets/upload/product/' . $image); ?>" class="img-responsive center-block"></a>
                                        <h3><?php echo $product['title']; ?></h3>
                                        <h3 class="price"><strong><?php echo $product['price']; ?> vnđ</strong></h3>
                                    </div>
                                </div>
                                <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row readmore">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <a class="btn btn-default btn-bg" href="shop.html" role="button">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="container mtb-30">
        <div class="title-main">
            <h3 class="text-center">Tin tức</h3>
            <div class="title-line left"></div>
            <div class="title-line right"></div>
        </div>
        <div class="row">
            <?php if($latest_articles): ?>
            <?php foreach($latest_articles as $key => $article): ?>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
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
        <div class="row readmore">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <a class="btn btn-default btn-bg" href="<?php echo base_url('article'); ?>" role="button">Xem tất cả <i class="fa fa-angle-double-right"></i></a>
            </div>
        </div>
    </div>

    <div class="banner container mtb-30">
        <a href="#"><img class="w-100" src="<?php echo site_url('assets/public/img/slide_2.jpg'); ?>" alt="banner"></a>
    </div>

    <div class="container mtb-30">
        <div class="title-main">
            <h3 class="text-center">Video Clip</h3>
            <div class="title-line left"></div>
            <div class="title-line right"></div>
        </div>
        <div class="row">
            <?php if($videos): ?>
            <?php foreach($videos as $video): ?>
            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <iframe width="100%" height="200" src="<?php echo $video['url'] ?>" frameborder="0" allowfullscreen></iframe>
                <h4><a href="#"><?php echo $video['title'] ?></a></h4>
            </div>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <!-- InstanceEndEditable -->
</section>