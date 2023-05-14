<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <p id="addbutton" data-toggle="modal" data-target="#addorderdetail"><i id="iconadd" class="fe fe-24 fe-edit-2"></i></p>
      <h2 class="mb-2 page-title"><?= $title ?></h2>
      <p class="card-text">Thông tin toàn bộ đơn hàng</p>
      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <!-- table -->
              <table class="table datatables" id="dataTable-1">
                <thead>

                  <tr>

                    <th style="color:gray">ID</th>
                    <th style="color:gray">Name</th>
                    <th style="color:gray">City</th>
                    <th style="color:gray">Phone</th>
                    <th style="color:gray">Email</th>
                    <th style="color:gray">Action</th>
                  </tr>

                </thead>
                <tbody>
                  <?php
                   $temp=0;
                    
                      foreach ($orderdetails as $orderdetail) {
                        
                     
                       if($orderdetail['order_id']!= $temp){
                     ?>
                    
                    <tr>


                      <td>
                        <p class="mb-0 text-muted"><?= esc($orderdetail['order_id']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><strong><?= esc($orderdetail['order_name']) ?></strong></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($orderdetail['order_city']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($orderdetail['order_phone']) ?></p>
                      </td>

                      <td>
                        <p class="mb-0 text-muted"><?= esc($orderdetail['order_email']) ?></p>
                      </td>
                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#chitietorder<?= esc($orderdetail['order_id']) ?>">Chi tiết</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#suaorder<?= esc($orderdetail['order_id']) ?>">Sửa</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#xoaorder<?= esc($orderdetail['order_id']) ?>">Xóa</a>

                        </div>
                      </td>
                    </tr>
                  <?php  
                    }
                    $temp=$orderdetail['order_id'];}
                    
                    ?>

                </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

<?php foreach ($orderdetails as $orderdetail) { ?>
  <!-- chi tiết  modal -->
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="modal fade" id="chitietorder<?= esc($orderdetail['order_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body">

          </div>
          <div class="checkout_area section-padding-80">
            <div class="container">
              <div class="row">
                <div class="col-12 col-md-5" style="border:solid black 2px;background-color:#EEEE;color:black;margin-left:20px;">
                  <div class="orderdetail-details-confirmation">

                    <div class="cart-page-heading">
                      <h5 style="padding-top:10px;color:black">Order Information </h5>
                      <p>#<?php for ($i = 0; $i < 1; $i++) {
                            echo $orderdetails[$i]['order_id'];
                          } ?></p>
                    </div>

                    <ul class="orderdetail-details-form mb-4" style="list-style: none;">
                      <?php for ($i = 0; $i < 1; $i++) { ?>
                        <li><span><?php echo $orderdetails[$i]['order_name'] ?></span></li>
                        <li><span><?php echo $orderdetails[$i]['order_address'] . " , " . $orderdetails[$i]['order_city'] . " , " . $orderdetails[$i]['order_province'] ?></span></li>
                        <li><span><?php echo $orderdetails[$i]['order_city'] ?></span></li>
                        <li><span><?php echo $orderdetails[$i]['order_phone'] ?></span></li>
                        <li style="text-transform: none;"><span><?php echo $orderdetails[$i]['order_email'] ?></span></li>
                        <li style="color:red;padding-top:20px"><span><?php if ($orderdetails[$i]['order_status'] == 0) {
                                                                        echo "Đang Xử Lý";
                                                                      } else if ($orderdetails[$i]['order_status'] == 1) {
                                                                        echo "Đang Giao";
                                                                      } else {
                                                                        echo "Đã Hủy";
                                                                      } ?></span></li>
                      <?php } ?>
                    </ul>


                  </div>
                </div>
                <div class="col-12 col-md-5 col-lg-6 ml-lg-auto" style="border:solid black 2px;background-color:#EEEE;margin-right:20px;">
                  <div class="orderdetail-details-confirmation">

                    <div style="color:black;" class="cart-page-heading">
                      <h5 style="padding-top:10px;color:black">Product Information</h5>
                      <p>The Details</p>
                    </div>

                    <ul class="orderdetail-details-form mb-4" style="list-style:none;color:black" >

                      <li style="display:flex;margin-bottom:10px"><div style="width:40%;">Name</div><div style="width:30%;">Quantity</div><div style="width:30%;">Price</div></li>
                      <?php $total=0;  foreach ($orderdetails as $orderdetail) { ?>
                       
                        <li style="display:flex"><div style="width:40%;"><?php
                        
                          foreach($products as $product){
                           
                            if($orderdetail['product_id']==$product['product_id']){
                              $total +=$orderdetail['product_price']*$orderdetail['order_quantity']; 
                            
                          echo $product['product_name'] ?></div><div style="width:30%;"><?php echo $orderdetail['order_quantity'] ?></div><div style="width:30%;"><?php  echo $product['product_price'] ?></div></li>
                      <?php }}
                          } ?>
                      <li  style="display:flex;margin-top:20px"><div style="width:40%">Total</div><div style="width:30%;"></div><div style="color:red;width:30%"><?php echo $total; ?></div></li>
                    </ul>


                  </div>

                </div>
              </div>
            </div>
          </div>
          <div class="modal-body">

          </div>
        </div>
      </div>
    </div>
  <?php  } ?>
  <!-- end chi tiết thông tin orderdetail modal -->

  <!-- xóa thông tin nhân viên modal -->
  <?php foreach ($orderdetails as $orderdetail) { ?>
    <div class="card-body">
      <!-- Extra large modal -->
      <div class="col-md-4 mb-4">
        <!-- Modal -->
        <div class="modal fade" id="xoaorder<?= esc($orderdetail['order_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <form method="post" action="/admin/order/deleteorder">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 style="color:red;font-weight:bold" class="modal-title" id="verticalModalTitle">Thông báo</h5>
                </div>
                <div class="modal-body"> Bạn có chắc muốn xóa đơn hàng này! Khi xóa sẽ không thể hoàn tác </div>
                <input type="hidden" name="id" value="<?= esc($orderdetail['order_id']) ?>">
                <div class="modal-footer">
                  <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Hủy</button>
                  <button type="submit" name="xoaorderdetail" class="btn mb-2 btn-primary">Đồng Ý</button>
                </div>
              </div>
            </form>
          </div>
        </div>


      </div>
    </div>
  <?php } ?>
  <!-- end xóa thông tin nhân viên modal -->


  <style>
    #addbutton {
      border-radius: 15px;
      background-color: #2E8B57;
      width: 60px;
      height: 50px;
      line-height: 60px;
      margin-left: 70%;
      position: fixed;
      z-index: 1000;
      display: block;
    }

    #iconadd {
      color: white;
      margin-left: 15px;
    }

    #addbutton:hover #iconadd {
      font-size: 27px;
      margin-left: 25px;
      transition: 0.3s;
    }

    #addbutton:hover {
      background-color: #008000;
    }
  </style>

  <script>
    //   function onFileSelected(event) {
    //   var selectedFile = event.target.files[0];
    //   var reader = new FileReader();

    //   var imgtag = document.getElementById("myimage");
    //   imgtag.title = selectedFile.name;

    //   reader.onload = function(event) {
    //     imgtag.src = event.target.result;
    //   };

    //   reader.readAsDataURL(selectedFile);
    // }

    function onFileSelected2(event, id) {
      var selectedFile = event.target.files[0];
      var reader = new FileReader();

      var imgtag = document.getElementById(id);
      imgtag.title = selectedFile.name;

      reader.onload = function(event) {
        imgtag.src = event.target.result;
      };

      reader.readAsDataURL(selectedFile);
    }

    // var loadFile = function(event) {
    //     var reader = new FileReader();
    //     reader.onload = function(){
    //       var output = document.getElementById('output');
    //       output.src = reader.result;
    //     };
    //     reader.readAsDataURL(event.target.files[0]);
    //   };
  </script>