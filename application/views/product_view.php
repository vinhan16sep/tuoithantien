<section class="content container-fluid">
    <!-- InstanceBeginEditable name="content" -->
    <section class="container">
        <div class="post-content col-lg-9 col-md-9 col-sm-9 col-xs-12">
            <div class="post-cover">
                <img class="w-100" src="<?php echo site_url('assets/public/img/slide_1.png'); ?>" alt="post cover">
            </div>

            <div class="product">
                <?php if($products): ?>
                <?php foreach($products as $item): ?>
                <div class="item col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="bordered">
                        <?php
                            if(strpos($item['image'], '|') == true){
                                $image_array = explode('|', $item['image']);
                                $image = $image_array[0];
                            }else{
                                $image = $item['image'];
                            }
                        ?>
                        <img class="w-100" src="<?php echo site_url('assets/upload/product/' . $image); ?>" alt="product">
                        <h4><a href="<?php echo base_url('product/detail/' . $item['id']); ?>"><?php echo $item['title'] ?></a></h4>
                        <h3 class="price"><strong><?php echo number_format($item['price'], 0, ',', '.'); ?> vnđ</strong></h3>
                    </div>
                </div>
                <?php endforeach; ?>
                <?php endif; ?>
                <div class="col-md-6 col-md-offset-5">
                    <?php echo $page_links; ?>
                </div>
            </div>

        </div>

        <div class="navside col-lg-3 col-md-3 col-sm-3 col-xs-12">
            <div class="title-main">
                <h3>Danh mục sản phẩm</h3>
            </div>
            <ul>
                <?php foreach($product_menu as $key => $trademark): ?>
                <li>
                    <?php
                        $arrKey = explode('|||', $key);
                        $trademark_id = $arrKey[0];
                        $trademark_title = $arrKey[1];
                    ?>
                    <a href="<?php echo base_url('product/list_product_in_trademark/' . $trademark_id); ?>"><?php echo $trademark_title; ?></a>
                    <?php foreach($trademark as $key => $category): ?>
                    <ul>
                        <li><a href="<?php echo base_url('product/list_product_in_category/' . $key); ?>"><?php echo $category; ?></a></li>
                    </ul>
                    <?php endforeach; ?>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <!-- InstanceEndEditable -->
</section>