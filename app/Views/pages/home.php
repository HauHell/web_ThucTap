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
                            <img onclick="updateproduct(<?php echo $item['id']; ?>)" src="../../../../assets/products/<?= esc($item['image']) ?>" class="cart-thumb" alt="" style="object-fit: contain;height:260px;width:200px">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span   onclick="removeCart(<?php echo $item['id']; ?>)" class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">NQH Shop</span>
                                <h6><?= esc($item['name']) ?></h6>
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

<!-- ##### Welcome Area Start ##### -->
<section class="welcome_area bg-img background-overlay" style="background-image: url(assetsclient/img/bg-img/f83kPN.webp);">
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12">
                <div class="hero-content">
                 
                    <h2 style="color:whitesmoke">New Collection</h2>
                    <a href="#" class="btn essence-btn">view collection</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
<div class="top_catagory_area section-padding-80 clearfix">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <?php foreach($categories as $category){ ?>
            <div class="col-12 col-sm-6 col-md-4">
                <div class="single_catagory_area d-flex align-items-center justify-content-center bg-img" style="background-image: url(assets/categories/<?php echo $category['category_images'] ?>);">
                    <div class="catagory-content">
                        <a href="#"><?php echo $category['category_name'] ?></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
<div class="cta-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="cta-content bg-img background-overlay" style="background-image: url(assetsclient/img/bg-img/2.jpg);">
                    <div class="h-100 d-flex align-items-center justify-content-end">
                        <div class="cta--text">
                            <h6>-60%</h6>
                            <h2>Global Sale</h2>
                            <a href="/shop" class="btn essence-btn">Buy Now</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-80 clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Popular Products</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    <?php for($i=0;$i<5;$i++){ ?>
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img style="height:200px ;object-fit: contain;" src="assets/products/<?php echo $products[$i]['product_images'] ?>" alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>NQH SHOP</span>
                            <a href="single-product-details.html">
                                <h6><?php echo $products[$i]['product_name'] ?></h6>
                            </a>
                            <p class="product-price">$<?php echo $products[$i]['product_price'] ?></p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="productdetail?id=<?= esc($products[$i]['product_id']) ?>" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php } ?>

                 
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
<div class="brands-area d-flex align-items-center justify-content-between">
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="assetsclient/img/core-img/brand10.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="assetsclient/img/core-img/brand11.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="assetsclient/img/core-img/brand13.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="assetsclient/img/core-img/brand14.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="assetsclient/img/core-img/brand15.png" alt="">
    </div>
    <!-- Brand Logo -->
    <div class="single-brands-logo">
        <img src="assetsclient/img/core-img/brand16.webp" alt="">
    </div>
</div>
<!-- ##### Brands Area End ##### -->