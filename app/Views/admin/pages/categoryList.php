<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <p id="addbutton" data-toggle="modal" data-target="#addcategory"><i id="iconadd" class="fe fe-24 fe-edit-2"></i></p>
      <h2 class="mb-2 page-title"><?= $title ?></h2>
      <p class="card-text">Categories Information</p>
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
                    <th style="color:gray">Detail</th>
                    <th style="color:gray">Action</th>
                  </tr>

                </thead>
                <tbody>
                  <?php foreach ($categories as $category) { ?>
                    <tr>
                      <td>
                        <div class="avatar avatar-md">
                          <img src="../../../../assets/categories/<?= esc($category['category_images']) ?>" alt="..." style="object-fit: contain; height:60px" class="avatar-img rounded-circle">
                        </div>
                      </td>

                      <td>
                        <p class="mb-0 text-muted"><?= esc($category['category_id']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><strong><?= esc($category['category_name']) ?></strong></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($category['category_detail']) ?></p>
                      </td>
                     
                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#suacategory<?= esc($category['category_id']) ?>">Edit</a>
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#xoacategory<?= esc($category['category_id']) ?>">Delete</a>

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

  <div class="modal fade" id="addcategory" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Add Cateory Information</h2>
        </div>
        <form method="post" action="/admin/category/addCategory" enctype="multipart/form-data">
          <div class="row mt-5 align-items-center">
            <div class="col-md-6 text-center mb-6">
              <div class="avatar avatar-xl">
                <img src="../../../../assets/categories/tam.png" alt="..." id="myimage" style="height: 500px;width:350px;margin-left:30px;object-fit:contain" >
                <input style="margin-left: 10px;font-size:10px;margin-top:10px;" size="" onchange="onFileSelected2(event,'myimage')" name="image" type="file">
              </div>
            </div>
            <div class="col">
              <div class="row align-items-center">
                <div class="col-md-10">
                  <div class="mb-1"><strong style="font-size: 18px;"> Name</strong> <input class="form-control" type="text" name="name" value="" required></div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-10">
                <div style="margin-top:5px" style="font-weight:bold;">Detail</div>
                  <textarea class="form-control" name="detail" style="height: 120px;" type="text" value="" required></textarea></div>
              </div>

            </div>
          </div>
          <div style="margin-top:50px" class="row my-12 mx-3">   
          </div>
          <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn mb-2 btn-primary">Accept</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end thêm thông tin nhân viên modal -->
<!-- sủa thông tin nhân viên modal -->
<?php foreach ($categories as $category) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="modal fade" id="suacategory<?= esc($category['category_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Edit Cateory Information</h2>
          </div>
          <form method="post" action="/admin/category/editCategory" enctype="multipart/form-data">
          <div class="row mt-5 align-items-center">
            <div class="col-md-6 text-center mb-6">
              <div class="avatar avatar-xl">
              <img src="../../../../assets/categories/<?= esc($category['category_images']) ?>" style="height: 500px;width:350px;margin-left:30px;object-fit:contain" id="myimage2<?= esc($category['category_id']) ?>" alt="..." >
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" onchange="onFileSelected2(event, 'myimage2<?= esc($category['category_id']) ?>')" name="image" type="file">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" value="<?= esc($category['category_images']) ?>" name="oldimage" type="hidden">
              </div>
            </div>
            <div class="col">
              <div class="row align-items-center">
                <div class="col-md-10">
                  <div class="mb-1"><strong style="font-size: 18px;"> Name</strong> <input class="form-control" type="text" name="name" value="<?=esc($category['category_name'])?>" required></div>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col-md-10">
                <div style="margin-top:5px" style="font-weight:bold;">Detail</div>
                  <textarea class="form-control" name="detail" style="height: 120px;" type="text"  required><?=esc($category['category_detail'])?></textarea></div>
              </div>

            </div>
          </div>
          <div style="margin-top:50px" class="row my-12 mx-3">
            <input type="hidden" name="id" value="<?=esc($category['category_id'])?>">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="submit" class="btn mb-2 btn-primary">Accept</button>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- end sửa thông tin nhân viên modal -->
<!-- xóa thông tin nhân viên modal -->
<?php foreach ($categories as $category) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="col-md-4 mb-4">
      <!-- Modal -->
      <div class="modal fade" id="xoacategory<?= esc($category['category_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form method="post" action="/admin/category/deleteCategory">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="color:red;font-weight:bold" class="modal-title" id="verticalModalTitle">Notification</h5>
              </div>
              <div class="modal-body">Are you sure you want to delete this category? Once deleted, it cannot be undone.</div>
              <input type="hidden" name="id" value="<?= esc($category['category_id']) ?>">
              <input value="<?= esc($category['category_images']) ?>" name="image" type="hidden">
              <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="xoacategory" class="btn mb-2 btn-primary">Accept</button>
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