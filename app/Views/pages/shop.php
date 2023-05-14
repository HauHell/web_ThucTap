<!-- ##### Right Side Cart Area ##### -->
<div class="cart-bg-overlay"></div>
<div class="right-side-cart-area">

    <!-- Cart Button -->
    <div class="cart-button">
        <a href="#" id="rightSideCart"><img src="assetsclient/img/core-img/bag.svg" alt=""> <span><?php if (isset($items)) {
                                                                                                        echo count($items);
                                                                                                    } ?></span></a>
    </div>

    <div class="cart-content d-flex">

        <!-- Cart List Area -->
        <div class="cart-list">
            <?php

            if (isset($items)) {
                foreach ($items as $item) { ?>
                    <!-- Single Cart Item -->
                    <div class="single-cart-item" >
                        <a href="#" class="product-image">
                            <img  src="../../../../assets/products/<?= esc($item['image']) ?>" class="cart-thumb" alt="" style="object-fit: contain;height:260px;width:200px">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span   onclick="removeCart(<?php echo $item['id']; ?>)" class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">NQH Shop</span>
                                <h6 onclick="updateproduct(<?php echo $item['id']; ?>)"><?= esc($item['name']) ?></h6>
                                <h6><?= esc($item['quantity']) ?></h6>
                                <p class="price">$<?= esc($item['price']) ?></p>
                            </div>
                        </a>
                    </div>
                <?php }} ?>
        </div>




        <!-- Cart Summary -->
        <div class="cart-amount-summary">

            <h2>Summary</h2>
            <?php
            if (isset($items)) {
            ?>
                <ul class="summary-table">

                    <li><span>subtotal:</span> <span>$<?= esc($total) ?></span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-0%</span></li>
                    <li><span>total:</span> <span>$<?= esc($total) ?></span></li>
                </ul>
            <?php } ?>
            <div class="checkout-btn mt-100">
                <?php $session = session();

                if (!empty($session->get('s_customerid'))) {
                ?>
                    <a href="/checkout" style="margin-left:30%;" class="btn essence-btn">check out</a>
                    <?php
                } else {
                    ?>
                        <button type="button" style="margin-left:30%;" class="btn essence-btn" data-toggle="modal" data-target="#checkout">check out</button>
                    <?php
                }
                    ?>
            </div>

            <!-- model check out -->
            <div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">Check Out</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" style="margin-left: 5%;">
                            <a href="checkout" type="button" class="btn essence-btn">Continue as Guest</a>
                            <a href="login" type="button" style="margin-left: 5%;" class="btn essence-btn">Sign In</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
<!-- ##### Right Side Cart End ##### -->
<!-- ##### Breadcumb Area Start ##### -->
<div class="breadcumb_area bg-img" style="background-image: url(assetsclient/img/bg-img/breadcumb.jpg);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="page-title text-center">
                    <h2>shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### Breadcumb Area End ##### -->

<!-- ##### Shop Grid Area Start ##### -->
<section class="shop_grid_area section-padding-80">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4 col-lg-3">
                <div class="shop_sidebar_area">

                    <!-- ##### Single Widget ##### -->
                    <div class="widget catagory mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Catagories</h6>

                        <!--  Catagories  -->
                        <div class="catagories-menu">
                            <ul id="menu-content2" class="menu-content collapse show">
                                <!-- Single Item -->
                                <li data-toggle="collapse" data-target="#clothing">
                                    <a href="#">toys</a>
                                    <ul class="sub-menu collapse show" id="clothing">
                                        <?php foreach ($categories as $category) { ?>
                                            <li><a href="#"><?= esc($category['category_name']) ?></a></li>
                                        <?php } ?>

                                    </ul>
                                </li>

                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget price mb-50">
                        <!-- Widget Title -->
                        <h6 class="widget-title mb-30">Filter by</h6>
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Price</p>

                        <div class="widget-desc">
                            <div class="slider-range">
                                <div data-min="49" data-max="360" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="49" data-value-max="360" data-label-result="Range:">
                                    <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                    <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                                </div>
                                <div class="range-price">Range: $49.00 - $360.00</div>
                            </div>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget color mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Color</p>
                        <div class="widget-desc">
                            <ul class="d-flex">
                                <li><a href="#" class="color1"></a></li>
                                <li><a href="#" class="color2"></a></li>
                                <li><a href="#" class="color3"></a></li>
                                <li><a href="#" class="color4"></a></li>
                                <li><a href="#" class="color5"></a></li>
                                <li><a href="#" class="color6"></a></li>
                                <li><a href="#" class="color7"></a></li>
                                <li><a href="#" class="color8"></a></li>
                                <li><a href="#" class="color9"></a></li>
                                <li><a href="#" class="color10"></a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- ##### Single Widget ##### -->
                    <div class="widget brands mb-50">
                        <!-- Widget Title 2 -->
                        <p class="widget-title2 mb-30">Brands</p>
                        <div class="widget-desc">
                            <ul>
                                <li><a href="#">LEGO</a></li>
                                <li><a href="#">Hasbro</a></li>
                                <li><a href="#">Mattel</a></li>
                                <li><a href="#">Schleich</a></li>
                                <li><a href="#">Battat</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <!-- list products -->


            <div class="col-12 col-md-8 col-lg-9">
                <div class="shop_grid_product_area">
                    <div class="row">
                        <div class="col-12">
                            <div class="product-topbar d-flex align-items-center justify-content-between">
                                <!-- Total Products -->
                                <div class="total-products">
                                    <p><span><?php echo count($getproducts); ?></span> <?php echo $session->get('s_customerid') ?>products </p>
                                </div>
                                <!-- Sorting -->
                                <div class="product-sorting d-flex">
                                    <p>Sort by:</p>
                                    <form action="#" method="get">
                                        <select name="select" id="sortByselect">
                                            <option value="value">Highest Rated</option>
                                            <option value="value">Newest</option>
                                            <option value="value">Price: $$ - $</option>
                                            <option value="value">Price: $ - $$</option>
                                        </select>
                                        <input type="submit" class="d-none" value="">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">

                        <!-- Single Product -->
                        <?php foreach ($getproducts as $product) { ?>
                            <div class="col-12 col-sm-6 col-lg-4">
                                <div class="single-product-wrapper">
                                    <!-- Product Image -->
                                    <div class="product-img">
                                        <img src="../../../../assets/products/<?= esc($product['product_images']) ?>" style="height:220px ;object-fit: contain;" alt="">
                                        <!-- Favourite -->
                                        <div class="product-favourite">
                                            <a href="#" class="favme fa fa-heart"></a>
                                        </div>
                                    </div>
                                    <!-- Product Description -->
                                    <div class="product-description">
                                        <span>NQH Shop</span>
                                        <a href="productdetail">
                                            <h6><?= esc($product['product_name']) ?></h6>
                                        </a>
                                        <p class="product-price">$<?= esc($product['product_price']) ?></p>
                                        <!-- Hover Content -->
                                        <div class="hover-content">
                                            <!-- Add to Cart -->
                                            <div class="add-to-cart-btn">
                                                <a href="productdetail?id=<?= esc($product['product_id']) ?>" class="btn essence-btn">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                    </div>
                </div>


                <!-- Pagination -->

                <div style="width:200px;margin:auto;">
                    <?php if (isset($pager)) {
                        echo $pager->links();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Shop Grid Area End ##### -->