<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <p id="addbutton" data-toggle="modal" data-target="#adduser"><i id="iconadd" class="fe fe-24 fe-edit-2"></i></p>
      <h2 class="mb-2 page-title"><?= $title ?></h2>
      <p class="card-text">User Account Information</p>
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
                    <th style="color:gray">Full Name</th>
                    <th style="color:gray">Email</th>
                    <th style="color:gray">Action</th>
                  </tr>

                </thead>
                <tbody>
                  <?php foreach ($users as $user) { ?>
                    <tr>
                      <td>
                        <div class="avatar avatar-md">
                          <img src="../../../../assets/avatars/<?= esc($user['user_image']) ?>" 
                          alt="..." style="object-fit: contain; height:60px" class="avatar-img rounded-circle">
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($user['user_id']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><strong><?= esc($user['user_name']) ?></strong></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($user['user_fullname']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($user['user_email']) ?></p>
                      </td>
                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" 
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edituser<?= esc($user['user_id']) ?>">Edit</a>
                          <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#deleteuser<?= esc($user['user_id']) ?>">Delete</a>
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

  <div class="modal fade" id="adduser" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Add User Account</h2>
        </div>
        <form method="post" action="/admin/user/addUser" enctype="multipart/form-data">
          <div class="row mt-5 align-items-center">
            <div class="col-md-6 text-center mb-6">
              <div class="avatar avatar-xl">
                <img src="../../../../assets/avatars/tam.png" alt="..." id="myimage" style="height: 500px;width:350px;margin-left:30px;object-fit:contain">
                <input style="margin-left: 10px;font-size:10px;margin-top:10px;" size="" onchange="onFileSelected2(event,'myimage')" name="image" type="file">
              </div>
            </div>
            <div class="col">
              <div class="row align-items-center">
                <div class="col-md-10">
                  <div class="mb-1"><strong style="font-size: 18px;">User Name</strong>
                  <input class="form-control" type="text" name="name" value="" required></div>
                </div>
                <div class="col-md-10">
                <div style="font-weight:bold;">Full Name</div>
                  <input class="form-control" name="fullname" type="text" value="" required>
                </div>
                <div class="col-md-10">
                <div style="font-weight:bold;">Email</div>
                  <input class="form-control" name="email" type="email" value=""required>
                </div>
                <div class="col-md-10">
                <div style="font-weight:bold">Password</div>
                  <input class="form-control" name="password" type="password" id="custom-phone" required>
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
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end thêm thông tin nhân viên modal -->
<!-- sủa thông tin nhân viên modal -->
<?php foreach ($users as $user) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="modal fade" id="edituser<?= esc($user['user_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Edit User Account</h2>
          </div>
          <form action="/admin/user/editUser" method="post" enctype="multipart/form-data">
            <div class="row mt-5 align-items-center">
              <div class="col-md-6 text-center mb-6">
                <div class="avatar avatar-xl">
                  <img src="../../../../assets/avatars/<?= esc($user['user_image']) ?>" id="myimage2<?= esc($user['user_id']) ?>" style="height: 500px;width:350px;margin-left:30px;object-fit:contain">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" onchange="onFileSelected2(event, 'myimage2<?= esc($user['user_id']) ?>')" name="image" type="file">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" value="<?= esc($user['user_image']) ?>" name="oldimage" type="hidden">
                </div>
              </div>
              <div class="col">
                <div class="row align-items-center">
                  <div class="col-md-10">
                  <div class="mb-1"><strong style="font-size: 18px;">User Name</strong><input class="form-control" 
                  type="text" name="name" value="<?= esc($user['user_name']) ?>" required></div>
                  </div>
                  <div class="col-md-10">
                  <div style="font-weight:bold;">Full Name</div>
                    <input class="form-control" type="text" name="fullname" value="<?= esc($user['user_fullname']) ?>">
                  </div>
                  <div class="col-md-10">
                  <div style="font-weight:bold">Email</div>
                    <input class="form-control" name="email" type="email" value="<?= esc($user['user_email']) ?>"
                     id="custom-phone">
                  </div>
                  <div class="col-md-10">
                  <div style="font-weight:bold">Password</div>
                    <input class="form-control" value="<?= esc($user['user_password']) ?>" type="password" name="password">
                  </div>
                </div>
              </div>
            </div>
            <div style="margin-top:50px"> 
              <input type="hidden" name="id" value="<?= esc($user['user_id']) ?>">
              <div class="modal-footer">
              <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
              <button type="submit" class="btn mb-2 btn-primary">Accept</button>
            </div>
            </div>
            
          </form>
        </div>
      </div>
    </div>
  </div>
<?php } ?>
<!-- end sửa thông tin nhân viên modal -->
<!-- xóa thông tin nhân viên modal -->
<?php foreach ($users as $user) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="col-md-4 mb-4">
      <!-- Modal -->
      <div class="modal fade" id="deleteuser<?= esc($user['user_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form method="post" action="/admin/user/deleteUser">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="color:red;font-weight:bold" class="modal-title" id="verticalModalTitle">Notification</h5>
              </div>
              <div class="modal-body">Are you sure you want to delete this account? Once deleted, it cannot be undone.</div>
              <input type="hidden" name="id" value="<?= esc($user['user_id']) ?>">
              <input value="<?= esc($user['user_image']) ?>" name="image" type="hidden">
              <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="submit" name="xoauser" class="btn mb-2 btn-primary">Đồng Ý</button>
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