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

<!-- ##### Single Product Details Area Start ##### -->
<section class="single_product_details_area d-flex align-items-center">

    <!-- Single Product Thumb -->
    <div style="position: relative;" class="single_product_thumb clearfix">
        <img src="../../../../assets/products/<?= esc($product['product_images']) ?>" style="object-fit: cover;margin-left:40%;" alt="">
        <div style="display:none;position:absolute;margin:auto;left:30%;z-index:1000;top:42%" class="alert alert-danger" id="wanring" role="alert">
        You reached limit of product!
    </div>
    </div>

    <!-- Single Product Description -->
    <div class="single_product_desc clearfix">
        <span>NQH Shop</span>
        <a href="cart.html">
            <h2><?= esc($product['product_name']) ?></h2>
        </a>
        <p class="product-price">$<?= esc($product['product_price']) ?></p>
        <p class="product-desc"><?= esc($product['product_detail']) ?></p>
        <p class="product-desc" style="color:black">Quantity: <?= esc($product['product_quantity']) ?></p>
        <!-- Form -->
        <form class="cart-form clearfix" action="addcart" method="post">
            <!-- Select Box -->
            <div style="height: 40px;" class="d-flex mt-50 mb-30">
                <input type="number" id="quantity" onchange="CheckQuantity()" min="1" max="500" value="1"
                 style="text-align:center" name="quantity">
                <input type="hidden" name="id" value="<?= esc($product['product_id']) ?>">
            </div>
            <!-- Cart & Favourite Box -->

            <div class="cart-fav-box d-flex align-items-center">
                <!-- Cart -->
                <button type="submit" <?php if ($product['product_quantity'] == 0) {
                                            echo "disabled";
                                        } ?> name="addtocart" value="5" class="btn essence-btn">
                                        Add to cart</button>
                <!-- Favourite -->
                <div class="product-favourite ml-4">
                    <a href="#" class="favme fa fa-heart"></a>
                </div>
            </div>
        </form>
    </div>

  

</section>
<!-- ##### Single Product Details Area End ##### -->



<script>
    function CheckQuantity() {
        var qty = document.getElementById('quantity').value;

                if (qty><?php echo $product['product_quantity']; ?>) {
                    $("#wanring").css("display","block");
                    setTimeout(function() {
                        $("#wanring").css("display","none");
                    }, 4000);
                    $('#quantity').val(<?php echo $product['product_quantity']; ?>);
                    
                   return;
                }
    }
</script>