  <!-- ##### Footer Area Start ##### -->
  <footer class="footer_area clearfix">
      <div class="container">
          <div class="row">
              <!-- Single Widget Area -->
              <div class="col-12 col-md-6">
                  <div class="single_widget_area d-flex mb-30">
                      <!-- Logo -->
                      <div class="footer-logo mr-50">
                          <a href="<?php echo base_url() ?>"><img src="assetsclient/img/core-img/logo2.png" alt=""></a>
                      </div>
                      <!-- Footer Menu -->
                      <div class="footer_menu">
                          <ul>
                              <li><a href="<?php echo base_url() ?>/shop">Shop</a></li>
                              <li><a href="<?php echo base_url() ?>/lookup">Order Lookup</a></li>
                              <li><a href="<?php echo base_url() ?>/contact">Contact</a></li>
                          </ul>
                      </div>
                  </div>
              </div>
              <!-- Single Widget Area -->
              <div class="col-12 col-md-6">
                  <div class="single_widget_area mb-30">
                      <ul class="footer_widget_menu">
                          <li><a href="#">Order Status</a></li>
                          <li><a href="#">Payment Options</a></li>
                          <li><a href="#">Shipping and Delivery</a></li>
                          <li><a href="#">Guides</a></li>
                          <li><a href="#">Privacy Policy</a></li>
                          <li><a href="#">Terms of Use</a></li>
                      </ul>
                  </div>
              </div>
          </div>

          <div class="row align-items-end">
              <!-- Single Widget Area -->

              <!-- Single Widget Area -->
              <div class="col-12 col-md-6">
                  <div class="single_widget_area">
                      <div class="footer_social_area">
                          <a href="https://www.facebook.com/hau.quang.927543" target="_blank" data-toggle="tooltip" data-placement="top" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                          <a href="https://github.com/HauHell" target="_blank" data-toggle="tooltip" data-placement="top" title="Github"><i class="fa fa-github" aria-hidden="true"></i></a>
                          <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i class="fa fa-youtube-play" aria-hidden="true"></i></a>
                      </div>
                  </div>
              </div>
          </div>



      </div>
  </footer>
  <!-- ##### Footer Area End ##### -->

  <!-- jQuery (Necessary for All JavaScript Plugins) -->
  
  <script src="assetsclient/js/jquery/jquery-2.2.4.min.js"></script>
  
  <!-- Popper js -->
  <script src="assetsclient/js/popper.min.js"></script>
  <!-- Bootstrap js -->
  <script src="assetsclient/js/bootstrap.min.js"></script>
  <!-- Plugins js -->
  <script src="assetsclient/js/plugins.js"></script>
  <!-- Classy Nav js -->
  <script src="assetsclient/js/classy-nav.min.js"></script>
  <!-- Active js -->
  <script src="assetsclient/js/active.js"></script>
  <script>
      function removeCart($id) {
          window.location.assign("/removecart?id=" + $id)
      }
  </script>
  <script>
      function updateproduct($id) {
          window.location.assign("/updateproduct?id=" + $id)
      }
  </script>
  <script>
      function orderDetail($id) {
          window.location.assign("/placeorder?id=" + $id)
      }
  </script>
 

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <script>
      function checkStatusPage() {
          <?php
            //  $session = session();
            //  $session =session_destroy();
            ?>
      }
      
  </script>
  
  </body>

  </html>