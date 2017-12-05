<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <div class="container">
        <div class="row">
            <?php
                $images = array();
                if($product['image'] != ''){
                    $images = explode('|', $product['image']);
                }
            ?>
            <div class="preview col-lg-5 col-md-5 col-sm-5 col-xs-12">
                <a class="preview" href="<?php echo site_url('assets/upload/product/' . $images[0]) ?>">
                    <img class="w-100" src="<?php echo site_url('assets/upload/product/' . $images[0]) ?>" alt="preview">
                </a>
                <ul class="list-inline other">
                    <?php if(count($images) > 1): ?>
                    <?php for($i = 1; $i < count($images); $i++){ ?>
                    <li>
                        <img class="w-thumbnail" src="<?php echo base_url('assets/upload/product/' . $images[$i]); ?>" alt="preview">
                    </li>
                    <?php } ?>
                    <?php endif; ?>
                </ul>
            </div>
            <div class="infomation col-lg-7 col-md-7 col-sm-7 col-xs-12">
                <h2><?php echo $product['title']; ?></h2>

                <h3 class="price"><?php echo $product['price']; ?> vnđ</h3>

                <div class="info">
                    <table class="table">
                        <tr>
                            <td>Công dụng</td>
                            <td><?php echo $product['effect']; ?></td>
                        </tr>
                        <tr>
                            <td>Trọng lượng</td>
                            <td><?php echo $product['weight']; ?> gr</td>
                        </tr>
                        <tr>
                            <td>Nhà sản xuất</td>
                            <td><?php echo $product['producer']; ?></td>
                        </tr>
                    </table>

                    <strong>Thông tin chi tiết</strong>
                    <p class="post-paragraph"><?php echo substr($product['content'], 0, 400); ?></p>

                    <a class="text-center" data-toggle="collapse" href="#expandInfo" aria-expanded="false" aria-controls="collapseExample">
                        <small>Nhấn để mở rộng</small>
                    </a>

                    <div class="collapse" id="expandInfo">
                        <?php echo substr($product['content'], 400); ?>
                    </div>
                </div>
            </div>

            <div class="related container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-showmanymoveone slide" id="itemslider">
                            <div id="slider-control">
                                <a class="left carousel-control" href="#itemslider" data-slide="prev"><span class="glyphicon glyphicon-menu-left" aria-hidden="true"></span></a>
                                <a class="right carousel-control" href="#itemslider" data-slide="next"><span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a>
                            </div>
                            <div class="carousel-inner">
                                <?php if($trademark_products): ?>
                                <?php for($i = 0; $i < count($trademark_products); $i++){ ?>
                                <div class="item<?php echo ($i == 0) ? ' active' : ''; ?>">
                                    <div class="col-xs-12 col-sm-6 col-md-3">
                                        <?php
                                        $relation_product_images = array();
                                        if($trademark_products[$i]['image'] != ''){
                                            $relation_product_images = explode('|', $trademark_products[$i]['image']);
                                        ?>
                                        <a href="#"><img src="<?php echo base_url('assets/upload/product/' . $relation_product_images[0]); ?>" class="img-responsive center-block"></a>
                                        <?php
                                        }
                                        ?>

                                        <h3><?php echo $trademark_products[$i]['title']; ?></h3>
                                        <h3 class="price"><strong><?php echo $trademark_products[$i]['price']; ?> vnđ</strong></h3>
                                    </div>
                                </div>
                                <?php } ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- InstanceEndEditable -->
</section>