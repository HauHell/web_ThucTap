<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title>Essence - Fashion Ecommerce Template</title>

    <!-- Favicon  -->
    <link rel="icon" href="assetsclient/img/core-img/favicon.ico">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="assetsclient/css/core-style.css">
    <link rel="stylesheet" href="assetsclient/style.css">
    <link rel="stylesheet" href="assetsclient/css/custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="<?php echo base_url() ?>"><img src="assetsclient/img/core-img/logo.png" alt=""></a>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="<?php echo base_url() ?>/shop">Shop</a></li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                                    <li><a href="<?php echo base_url() ?>/shop">Shop</a></li>
                                    <?php $session = session();

                                    if (!empty($session->get('s_customerid'))) {
                                    ?>
                                        <li><a href="<?php echo base_url() ?>/checkout">Checkout</a></li>
                                    <?php
                                    } else {
                                    ?>
                                        <li><a href="<?php echo base_url() ?>/checkout" data-toggle="modal" data-target="#checkout">Checkout</a></li>
                                    <?php
                                    }
                                    ?>

                                    <li><a href="<?php echo base_url() ?>/contact">Contact</a></li>
                                    <li><a href="<?php echo base_url() ?>/lookup">Order Lookup</a></li>
                                </ul>
                            </li>
                            <li><a href="<?php echo base_url() ?>/lookup">Order Lookup</a></li>
                            <li><a href="<?php echo base_url() ?>/contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="/search" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <!-- Favourite Area -->
                <div class="favourite-area">
                    <?php $session = session();

                    if (!empty($session->get('s_customerid'))) {
                    ?>
                        <!-- Nav Start -->

                        <div class="classynav">
                            <ul>
                                <li><a><img style="width:100%;margin:auto;text-align:center;" src="../../../../assetsclient/avatars/<?php echo $session->get('s_customerimages') ?>" alt=""></a>
                                    <ul class="dropdown">
                                        <li><a href="<?php echo base_url() ?>/profile">Profile</a></li>
                                        <li><a href="<?php echo base_url() ?>/logout" onclick="checkStatusPage()">Logout</a></li>
                                    </ul>
                                </li>

                            </ul>
                        </div>
                        <!-- Nav End -->
                    <?php
                    } else {

                    ?>
                        <a href="<?php if (empty($session->get('s_customerid'))) {
                                        echo base_url() . "/login";
                                    } ?>" class="favme fa fa-user"></a>
                    <?php
                    }
                    ?>
                </div>

                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="assetsclient/img/core-img/bag.svg" alt=""> <span>
                            <?php
                            if (isset($items)) {


                                $coutcart = 0;
                                foreach ($items as $items) {
                                    $coutcart++;
                                }
                                echo $coutcart;
                            }
                            ?>
                        </span></a>
                </div>
            </div>

        </div>
    </header>