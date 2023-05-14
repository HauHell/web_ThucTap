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


<div class="contact-area d-flex align-items-center">
    <div class="google-map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.6050648328574!2d106.67120151428696!3d10.7648897623514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31752ee10a99ee19%3A0xa24c4b785ce479b!2zMzMgVsSpbmggVmnhu4VuLCBQaMaw4budbmcgMiwgUXXhuq1uIDEwLCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZpZXRuYW0!5e0!3m2!1sen!2s!4v1670866899727!5m2!1sen!2s"
         width="747" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="contact-info">
        <h2>How to Find Us</h2>
        <div class="contact-address mt-50">
            <p><span>address:</span> 33 Vinh Vien, Ho Chi Minh, Viet Nam</p>
            <p><span>telephone:</span> +84 84 260 6360</p>
            <p><a  style="color:black !important" href="mailto:20662002@kthcm.edu.vn">
            20662002@kthcm.edu.vn</a></p>
        </div>
    </div>
</div>