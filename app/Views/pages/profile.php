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
                            <img src="../../../../assets/products/<?= esc($item['image']) ?>" class="cart-thumb" alt="" style="object-fit: contain;height:260px;width:200px">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span onclick="removeCart(<?php echo $item['id']; ?>)" class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">NQH Shop</span>
                                <h6 onclick="updateproduct(<?php echo $item['id']; ?>)"><?= esc($item['name']) ?></h6>
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

<?php
if (isset($customers)) {
?>
    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">

        <div class="container">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="information-tab" data-toggle="tab" href="#information" role="tab" aria-controls="information" aria-selected="true">Account Information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="orderhistory-tab" data-toggle="tab" href="#orderhistory" role="tab" aria-controls="orderhistory" aria-selected="false">Order History</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="changepassword-tab" data-toggle="tab" href="#changepassword" role="tab" aria-controls="changepassword" aria-selected="false">Change Password</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active " id="information" role="tabpanel" aria-labelledby="information-tab">
                    <form action="/updateprofile" method="post" id="profile" enctype="multipart/form-data">
                        <div class="row">

                            <div class="col-12 col-md-6">
                                <div class="checkout_details_area mt-50 clearfix">

                                    <div class="cart-page-heading mb-30">
                                        <h5>Information</h5>
                                    </div>


                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="first_name">First Name <span>*</span></label>
                                            <input type="text" class="form-control" name="first_name" id="first_name" value="<?php echo $customers['customer_firstname'] ? $customers['customer_firstname']:''  ?>" required>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="last_name">Last Name <span>*</span></label>
                                            <input type="text" class="form-control" name="last_name" id="last_name" value="<?php echo $customers['customer_lastname'] ? $customers['customer_lastname']: '' ?>" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="country">Country <span>*</span></label>
                                            <select class="w-100" id="country" name="country">
                                                <?php
                                                $countries = array("VietNam", "United States", "United Kingdom", "Germany", "France", "India", "Australia", "Brazil");
                                                foreach ($countries as $country) {
                                                ?>
                                                    <option <?php
                                                            if ($customers['customer_country'] == $country) {
                                                                echo ' selected';
                                                            }
                                                            ?>><?php echo $country  ?>
                                                    </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="street_address">Address <span>*</span></label>
                                            <input type="text" class="form-control mb-3" name="address" value="<?php echo $customers['customer_address']? $customers['customer_address'] :'' ?>" id="street_address" required value="">

                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="city">Town/City <span>*</span></label>
                                            <input type="text" class="form-control" name="city" value="<?php echo $customers['customer_town_city'] ? $customers['customer_town_city']:'' ?>" required id="city">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="state">Province <span>*</span></label>
                                            <input type="text" class="form-control" name="province" value="<?php echo $customers['customer_province'] ? $customers['customer_province']:''?>" required id="state">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="phone_number">Phone No <span>*</span></label>
                                            <input type="number" class="form-control" name="phone" required id="phone_number" min="0" value="<?php echo $customers['customer_phone'] ? $customers['customer_phone']: '' ?>">
                                        </div>
                                        <div class="col-12 mb-4">
                                            <label for="email_address">Email Address <span>*</span></label>
                                            <input type="email" class="form-control" name="email" required id="email_address" value="<?php echo $customers['customer_email']? $customers['customer_email']:'' ?>">
                                        </div>

                                        <div class="col-12">
                                            <input type="submit" href="#" class="btn essence-btn" value="Update Profile">
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div class="col-12 col-md-6 col-lg-5 ml-lg-auto" style="margin-top:20px">
                                <div class="order-details-confirmation">
                                    <ul class="order-details-form mb-4" style="text-align:center">
                                        <img style="object-fit:cover" src="../../../../assetsclient/avatars/<?php echo $session->get('s_customerimages') ?>" id="image" alt="">
                                    </ul>
                                    <input type="file" onchange="onFileSelected(event)" name="image" class="form-control" style="font-size: 12px;">
                                    <input type="hidden" name="oldimage" value="<?php echo $session->get('s_customerimages') ?>">
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="tab-pane fade " id="orderhistory" role="tabpanel" aria-labelledby="orderhistory-tab">
                    <div class="row">

                        <div class="col-12 col-md-12">
                            <div class="checkout_details_area mt-50 clearfix">
                                <?php foreach ($orders as $order) {
                                ?>
                                    <div style="cursor: pointer;" onclick="orderDetail(<?php echo $order['order_id'] ?>)" class="alert <?php
                                                                                                                if ($order['order_status'] == 3) {
                                                                                                                    echo "alert-danger";
                                                                                                                } else if ($order['order_status'] == 2) {
                                                                                                                    echo "alert-success";
                                                                                                                } else if ($order['order_status'] == 1) {
                                                                                                                    echo "alert-warning";
                                                                                                                } else {
                                                                                                                    echo "alert-secondary";
                                                                                                                }
                                                                                                                ?>" role="alert">Order code
                                        <?php echo "#" . $order['order_id'] ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="tab-pane fade " id="changepassword" role="tabpanel" aria-labelledby="changepassword-tab">
                    <div class="row">

                        <div class="col-12 col-md-12">
                            <div class="checkout_details_area mt-50 clearfix">
                                <form action="/changepassword" method="post" >
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label for="street_address">Old Password <span>*</span></label>
                                            <i style="margin-left: -30px;position:absolute;margin-top:40px;right:25px; cursor: pointer;" class="far fa-eye" id="toggleOldPassword"></i>
                                            <input type="password" class="form-control mb-3" name="oldpassword" value="" id="oldpassword" required value="">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="city">New Password <span>*</span></label>
                                            <i style="margin-left: -30px;position:absolute;margin-top:40px;right:25px; cursor: pointer;" class="far fa-eye" id="toggleNewPassword"></i>
                                            <input type="password" class="form-control" name="newpassword" value="" id="newpassword" required>
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label for="state">Confirm password <span>*</span></label>
                                            <i style="margin-left: -30px;position:absolute;margin-top:40px;right:25px; cursor: pointer;" class="far fa-eye" id="toggleConfirmPassword"></i>
                                            <input type="password" class="form-control" name="confirmpassword" value="" id="confirmpassword" required>
                                            
                                        </div>
                                        <div class="col-12 mb-3">
                                            <div class="custom-control custom-checkbox d-block mb-3">
                                                <input type="checkbox" class="custom-control-input" required id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">Comfirm change</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" onclick="checkpassword()" href="#" class="btn essence-btn" value="Submit">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
    <div style="display:none;position:absolute;margin:auto;left:42%;z-index:1000;top:33%" class="alert alert-danger" id="wanring" role="alert">

    </div>

<?php
}
?>
<script>
    function checkpassword() {
        let oldpassword = document.getElementById("oldpassword").value;
        let newpassword = document.getElementById("newpassword").value;
        let confirmpassword = document.getElementById("confirmpassword").value;
        <?php $session = session(); ?>
        if (oldpassword != <?php echo $session->get('s_customerpassword'); ?>) {
            $("#wanring").css("display", "block");
            setTimeout(function() {
                $("#wanring").css("display", "none");
            }, 4000);
            document.getElementById("wanring").innerHTML = "Incorrect password";
            return;
        }
        if (newpassword != confirmpassword) {
            $("#wanring").css("display", "block");
            setTimeout(function() {
                $("#wanring").css("display", "none");
            }, 4000);
            document.getElementById("wanring").innerHTML = "Confirm new password is incorrect";
            return;
        }
    }

    function onFileSelected(event) {
        var selectedFile = event.target.files[0];
        var reader = new FileReader();

        var imgtag = document.getElementById('image');
        imgtag.title = selectedFile.name;

        reader.onload = function(event) {
            imgtag.src = event.target.result;
        };

        reader.readAsDataURL(selectedFile);
    }
    const togglePassword = document.querySelector('#toggleOldPassword');
    const password = document.querySelector('#oldpassword');
    const togglePassword2 = document.querySelector('#toggleNewPassword');
    const password2 = document.querySelector('#newpassword');
    const togglePassword3 = document.querySelector('#toggleConfirmPassword');
    const password3 = document.querySelector('#confirmpassword');

    function togglePasswordVisibility(toggle, pass) {
        toggle.addEventListener('click', function(e) {
            const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
            pass.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    }

    togglePasswordVisibility(togglePassword, password);
    togglePasswordVisibility(togglePassword2, password2);
    togglePasswordVisibility(togglePassword3, password3);
</script>