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
                    <div class="single-cart-item">
                        <a href="#" class="product-image">
                            <img onclick="updateproduct(<?php echo $item['id']; ?>)" src="../../../../assets/products/<?= esc($item['image']) ?>" class="cart-thumb" alt="" style="object-fit: contain;height:260px;width:200px">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span onclick="removeCart(<?php echo $item['id']; ?>)" class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">NQH Shop</span>
                                <h6><?= esc($item['name']) ?></h6>
                                <h6><?= esc($item['quantity']) ?></h6>
                                <p class="price">$<?= esc($item['price']) ?></p>
                            </div>
                        </a>
                    </div>
            <?php }
            } ?>
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
<div class="contact-area d-flex align-items-center" style="background-image: url(assets/images/lego-3625194_1280.png);background-size:cover;height:550px">
    <form action="login/checklogin" method="post" style="margin:auto">
        <div>
            <div class="page-title text-center">
                <h2>Login</h2>
            </div>
            <div class="col-12 mb-3">
                <label for="state">Username </label>
                <input type="text" class="form-control" name="customername" autofocus placeholder="Username" style="width: 500px;" required id="state" value="">
            </div>
            <div class="col-12 mb-3">
                <label for="state">Password</label>
                <input type="password" class="form-control" name="customerpassword" placeholder="Password" style="width: 500px;" required id="password" value="">
                <i style="margin-left: -30px;position:absolute;margin-top:-25px;right:30px; cursor: pointer;" class="far fa-eye" id="togglePassword"></i>
            </div>
            <div class="col-12 mr-1 text-right">
                <a href="/register"><h6 class="text-danger">Register</h6></a>
            </div>
            <button type="submit" style="margin-left:35%;" class="btn essence-btn">Login in</a>

        </div>
    </form>
</div>
<script>
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function(e) {
        // toggle the type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        // toggle the eye slash icon
        this.classList.toggle('fa-eye-slash');
    });

    // const togglePassword = document.querySelectorAll('.fa-eye');
    // const passwords = document.querySelectorAll('input[type="password"]');

    // togglePassword.forEach(function(toggle, index) {
    //     toggle.addEventListener('click', function() {
    //         togglePasswordVisibility(passwords[index], toggle);
    //     });
    // });

    // function togglePasswordVisibility(pass, toggle) {
    //     const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
    //     pass.setAttribute('type', type);
    //     toggle.classList.toggle('fa-eye-slash');
    // }
</script>