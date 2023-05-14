<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <p id="addbutton" data-toggle="modal" data-target="#addproduct"><i id="iconadd" class="fe fe-24 fe-edit-2"></i></p>
      <h2 class="mb-2 page-title"><?= $title ?></h2>
      <p class="card-text">Products Information</p>
      <div class="row my-4">
        <!-- Small table -->
        <div class="col-md-12">
          <div class="card shadow">
            <div class="card-body">
              <!-- table -->
              <table class="table datatables" id="dataTable-1">
                <thead>

                  <tr>
                    <th style="color:gray"></th>
                    <th style="color:gray">ID</th>
                    <th style="color:gray">Name</th>
                    <th style="color:gray">Price</th>
                    <th style="color:gray">Detail</th>
                    <th style="color:gray">Category</th>
                    <th style="color:gray">Quantity</th>
                    <th style="color:gray">Action</th>
                  </tr>

                </thead>
                <tbody>
                  <?php foreach ($getproducts as $product) { ?>
                    <tr>
                      <td>
                        <div class="avatar avatar-md">
                          <img src="../../../../assets/products/<?= esc($product['product_images']) ?>" style="object-fit: contain; height:60px" alt="..." class="avatar-img rounded-circle">
                        </div>
                      </td>

                      <td>
                        <p class="mb-0 text-muted"><?= esc($product['product_id']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><strong><?= esc($product['product_name']) ?></strong></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($product['product_price']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($product['product_detail']) ?></p>
                      </td>
                      <td>
                        <?php foreach ($categories as $category) {
                          if ($category['category_id'] == $product['category_id']) {
                        ?>
                            <p class="mb-0 text-muted"><?= esc($category['category_name']) ?></p>
                        <?php }
                        } ?>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($product['product_quantity']) ?></p>
                      </td>
                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editproduct<?= esc($product['product_id']) ?>">Edit</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#deleteproduct<?= esc($product['product_id']) ?>">Delete</a>

                        </div>
                      </td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
        </div> <!-- simple table -->
      </div> <!-- end section -->
    </div> <!-- .col-12 -->
  </div> <!-- .row -->
</div> <!-- .container-fluid -->

<!-- thêm  modal -->
<div class="card-body">

  <!-- Extra large modal -->

  <div class="modal fade" id="addproduct" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Add Product</h2>
        </div>
        <form method="post" action="/admin/product/addProduct" enctype="multipart/form-data">
          <div class="row mt-5 align-items-center">
            <div class="col-md-6 text-center mb-6">
              <div class="avatar avatar-xl">
                <img src="../../../../assets/products/p3.jpg" alt="..." id="myimage" style="height: 500px;width:350px;margin-left:30px;object-fit:contain" >
                <input style="margin-left: 10px;font-size:10px;margin-top:10px;" size="" onchange="onFileSelected2(event,'myimage')" name="image" type="file">
              </div>
            </div>
            <div class="col">
              <div class="row align-items-center">
                <div class="col-md-10">
                  <h4 class="mb-1"><strong style="font-size: 18px;">Product Name</strong><input class="form-control" type="text" name="name" value="" required></h4>
                </div>

                <div class="col-md-10">
                  <div style="font-weight:bold;" style="margin-top:5px">Price</div>
                  <input class="form-control" min="1" name="price" type="number" value="" required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold;" style="margin-top:5px">Detail</div>
                  <input class="form-control" name="detail" type="text" value="" required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold;" style="margin-top:5px">Category</div>
                  <select class="form-control" name="category" id="example-select">
                    <?php foreach ($categories as $category) { ?>
                      <option value="<?= esc($category['category_id']) ?>"><?= esc($category['category_name']) ?></option>
                    <?php } ?>
                  </select>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold;" style="margin-top:5px">Quantity</div>
                  <input class="form-control" min="1" name="quantity" type="number" value="" required>
                </div>
              </div>

            </div>
          </div>
          <div style="margin-top:50px">
            <div class="modal-footer">
              <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn mb-2 btn-primary">Accept</button>
            </div>
          </div>
      </div>

      </form>
    </div>
  </div>
</div>
</div>
<!-- end thêm thông tin product modal -->
<!-- sủa thông tin product modal -->
<?php foreach ($getproducts as $product) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="modal fade" id="editproduct<?= esc($product['product_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Edit Product Information</h2>
          </div>
          <form action="/admin/product/editProduct" method="post" enctype="multipart/form-data">
            <div class="row mt-5 align-items-center">
              <div class="col-md-6 text-center mb-6">
                <div class="avatar avatar-xl">
                  <img src="../../../../assets/products/<?= esc($product['product_images']) ?>" id="myimage2<?= esc($product['product_id']) ?>" style="height: 500px;width:350px;margin-left:30px;object-fit:contain">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" onchange="onFileSelected2(event, 'myimage2<?= esc($product['product_id']) ?>')" name="image" type="file">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" value="<?= esc($product['product_images']) ?>" name="oldimage" type="hidden">
                </div>
              </div>
              <div class="col">
                <div class="row align-items-center">
                  <div class="col-md-10">
                    <h4 class="mb-1"><strong style="font-size: 18px;">Product Name</strong><input class="form-control" type="text" name="name" value="<?= esc($product['product_name']) ?>" required></h4>
                  </div>

                  <div class="col-md-10">
                    <div style="font-weight:bold;" style="margin-top:5px">Price</div>
                    <input class="form-control" name="price" min="1" type="number" value="<?= esc($product['product_price']) ?>" required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold;" style="margin-top:5px">Detail</div>
                    <input class="form-control" name="detail" type="text" value="<?= esc($product['product_detail']) ?>" required>
                  </div>
                  <div class="col-md-10">
                  <div style="font-weight:bold;">Category</div>
                    <select class="form-control" name="category" id="example-select">
                      <?php foreach ($categories as $category) {
                        if ($category['category_id'] == $product['category_id']) {
                      ?>
                          <option value="<?= esc($category['category_id']) ?>" selected><?= esc($category['category_name']) ?></option>
                      <?php }
                      } ?>

                      <?php foreach ($categories as $category) {
                        if ($category['category_id'] != $product['category_id']) {
                      ?>
                          <option value="<?= esc($category['category_id']) ?>"> <?= esc($category['category_name']) ?></option>
                      <?php }
                      } ?>
                    </select>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold;" style="margin-top:5px">Quantity</div>
                    <input class="form-control" name="quantity" min="1" type="number" value="<?= esc($product['product_quantity']) ?>" required>
                  </div>
                </div>

              </div>
            </div>
            <div style="margin-top:50px">
              <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="xoaproduct" class="btn mb-2 btn-primary">Accept</button>
              </div>
              <input type="hidden" name="id" value="<?= esc($product['product_id']) ?>">
            </div>

          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- end sửa thông tin product modal -->
<!-- xóa thông tin product modal -->
<?php foreach ($products as $product) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="col-md-4 mb-4">
      <!-- Modal -->
      <div class="modal fade" id="deleteproduct<?= esc($product['product_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form method="post" action="/admin/product/deleteProduct">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="color:red;font-weight:bold" class="modal-title" id="verticalModalTitle">Notification</h5>
              </div>
              <div class="modal-body"> Are you sure you want to delete this order?</div>
              <input type="hidden" name="id" value="<?= esc($product['product_id']) ?>">
              <input value="<?= esc($product['product_images']) ?>" name="image" type="hidden">
              <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="xoaproduct" class="btn mb-2 btn-primary">Accept</button>
              </div>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div>
<?php } ?>
<!-- end xóa thông tin product modal -->


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