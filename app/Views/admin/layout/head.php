<a href="#" class="btn collapseSidebar toggle-btn d-lg-none text-muted ml-2 mt-3" data-toggle="toggle">
  <i class="fe fe-x"><span class="sr-only"></span></i>
</a>
<nav class="vertnav navbar navbar-light">
  <!-- nav bar -->
  <div class="w-100 mb-4 d-flex">
    <a class="navbar-brand mx-auto mt-2 flex-fill text-center" href="<?php echo base_url() ?>/admin">
      <svg version="1.1" id="logo" class="navbar-brand-img brand-sm" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 120 120" xml:space="preserve">
        <g>
          <polygon class="st0" points="78,105 15,105 24,87 87,87 	" />
          <polygon class="st0" points="96,69 33,69 42,51 105,51 	" />
          <polygon class="st0" points="78,33 15,33 24,15 87,15 	" />
        </g>
      </svg>
    </a>
  </div>
  <ul class="navbar-nav flex-fill w-100 mb-2">
    <li class="nav-item dropdown">
      <a href="<?php echo base_url() ?>/admin" aria-expanded="false" class=" nav-link">
        <i class="fe fe-home fe-16"></i>
        <span class="ml-3 item-text">Dashboard</span>
      </a>

    </li>
  </ul>

  <p class="text-muted nav-heading mt-4 mb-1">
    <span>Function</span>
  </p>
  <ul class="navbar-nav flex-fill w-100 mb-2">
    <!-- user -->
    <a href="<?php echo base_url() ?>/admin/user" aria-expanded="false" class=" nav-link">
      <i class="fe fe-box fe-16"></i>
      <span class="ml-3 item-text">User</span>
    </a>
    <!-- end user -->
    <!-- category -->
    <a href="<?php echo base_url() ?>/admin/category" aria-expanded="false" class=" nav-link">
      <i class="fe fe-box fe-16"></i>
      <span class="ml-3 item-text">Category</span>
    </a>
    <!-- end category -->
    <!-- products -->
    <a href="<?php echo base_url() ?>/admin/product" aria-expanded="false" class=" nav-link">
      <i class="fe fe-box fe-16"></i>
      <span class="ml-3 item-text">Products</span>
    </a>
    <!-- end products -->
    <!-- order -->
    <a href="<?php echo base_url() ?>/admin/order" aria-expanded="false" class=" nav-link">
      <i class="fe fe-box fe-16"></i>
      <span class="ml-3 item-text">Order</span>
    </a>
    <!-- end order -->
      <!-- customer -->
      <a href="<?php echo base_url() ?>/admin/customeraccount" aria-expanded="false" class=" nav-link">
      <i class="fe fe-box fe-16"></i>
      <span class="ml-3 item-text">Customer Account</span>
    </a>
    <!-- end customer -->
    <p class="text-muted nav-heading mt-4 mb-1">
      <span>Shop</span>
    </p>
    <ul class="navbar-nav flex-fill w-100 mb-2">
      <li class="nav-item w-100">
        <a class="nav-link" href="<?php echo base_url() ?>/shop" target="_blank">
          <i class="fe fe-compass fe-16"></i>
          <span class="ml-3 item-text">Go To Shop</span>
        </a>
      </li>
    </ul>


  </ul>

</nav>