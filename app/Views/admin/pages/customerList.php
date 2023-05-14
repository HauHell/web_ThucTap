<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-12">
      <p id="addbutton" data-toggle="modal" data-target="#addcustomeraccount"><i id="iconadd" class="fe fe-24 fe-edit-2"></i></p>
      <h2 class="mb-2 page-title"><?= $title ?></h2>
      <p class="card-text">Customer Account Information</p>
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
                    <th style="color:gray">Phone</th>
                    <th style="color:gray">Email</th>
                    <th style="color:gray">Action</th>
                  </tr>

                </thead>
                <tbody>
                  <?php foreach ($customers as $customer) { ?>
                    <tr>
                      <td>
                        <div class="avatar avatar-md">
                          <img src="../../../../assetsclient/avatars/<?= esc($customer['customer_images']) ?>" alt="..." style="object-fit: contain; height:60px" class="avatar-img rounded-circle">
                        </div>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($customer['customer_id']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><strong><?= esc($customer['customer_lastname'] . $customer['customer_firstname']) ?></strong></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($customer['customer_phone']) ?></p>
                      </td>
                      <td>
                        <p class="mb-0 text-muted"><?= esc($customer['customer_email']) ?></p>
                      </td>
                      <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="text-muted sr-only">Action</span>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#editcustomeraccount<?= esc($customer['customer_id']) ?>">Edit</a>
                          <a class="dropdown-item" href="#" data-toggle="modal"  data-target="#deletecustomeraccount<?= esc($customer['customer_id']) ?>">Delete</a>
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

  <div class="modal fade" id="addcustomeraccount" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-body">
          <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Add Customer Account</h2>
        </div>
        <form method="post" action="/admin/customer/addcustomeraccount" enctype="multipart/form-data">
          <div class="row mt-5 align-items-center">
            <div class="col-md-6 text-center mb-6">
              <div class="avatar avatar-xl">
                <img src="../../../../assetsclient/avatars/tam.png" alt="..." id="myimage" style="height: 500px;width:350px;margin-left:30px;object-fit:contain">
                <input style="margin-left: 10px;font-size:10px;margin-top:10px;" size="" onchange="onFileSelected2(event,'myimage')" name="image" type="file">
              </div>
            </div>
            <div class="col">
              <div class="row align-items-center">
                <div class="col-md-10">
                  <div class="mb-1"><strong style="font-size: 18px;">UserName</strong>
                    <input class="form-control" type="text" name="username" required>
                  </div>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold;">Password</div>
                  <input class="form-control" name="password" type="password" id="addpassword" required>
                  <i style="margin-left: -30px;position:absolute;margin-top:-25px;right:30px; cursor: pointer;z-index:10000" class="far fa-eye" id="toggleAddPassword"></i>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold;">First Name</div>
                  <input class="form-control" name="firstname" type="text" required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Last Name</div>
                  <input class="form-control" name="lastname" type="text"  required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Country</div>
                  <input class="form-control" name="country" type="text"  required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Address</div>
                  <input class="form-control" name="address" type="text"  required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Town/City</div>
                  <input class="form-control" name="town_city" type="text"  required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Province</div>
                  <input class="form-control" name="province" type="text"  required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Phone</div>
                  <input class="form-control" name="phone" type="number"  required>
                </div>
                <div class="col-md-10">
                  <div style="font-weight:bold">Email</div>
                  <input class="form-control" name="email" type="email"  required>
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
<?php foreach ($customers as $customer) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="modal fade" id="editcustomeraccount<?= esc($customer['customer_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-body">
            <h2 class="col p-2 bg-danger-dark" style="color:white;font-size:35px;text-align:center">Edit Customer Account</h2>
          </div>
          <form action="/admin/customer/editcustomeraccount" method="post" enctype="multipart/form-data">
            <div class="row mt-5 align-items-center">
              <div class="col-md-6 text-center mb-6">
                <div class="avatar avatar-xl">
                  <img src="../../../../assetsclient/avatars/<?= esc($customer['customer_images']) ?>" id="myimage2<?= esc($customer['customer_id']) ?>" style="height: 500px;width:350px;margin-left:30px;object-fit:contain">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" onchange="onFileSelected2(event, 'myimage2<?= esc($customer['customer_id']) ?>')" name="image" type="file">
                  <input style="margin-left: 10px;font-size:10px;margin-top:10px;" value="<?= esc($customer['customer_images']) ?>" name="oldimage" type="hidden">
                </div>
              </div>
              <div class="col">
                <div class="row align-items-center">
                  <div class="col-md-10">
                    <div class="mb-1"><strong style="font-size: 18px;">UserName</strong>
                      <input class="form-control" type="text" name="username" value="<?= esc($customer['customer_username']) ?>" required>
                    </div>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold;">Password</div>
                    <input class="form-control" name="password" id="editpassword" type="password" value="<?= esc($customer['customer_password']) ?>" required>
                    <i style="margin-left: -30px;position:absolute;margin-top:-25px;right:30px; cursor: pointer;z-index:10000" class="far fa-eye" id="toggleEditPassword"></i>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold;">First Name</div>
                    <input class="form-control" name="firstname" type="text" value="<?= esc($customer['customer_firstname']) ?>" required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Last Name</div>
                    <input class="form-control" name="lastname" type="text" value="<?= esc($customer['customer_lastname']) ?>"  required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Country</div>
                    <input class="form-control" name="country" type="text" value="<?= esc($customer['customer_country']) ?>"  required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Address</div>
                    <input class="form-control" name="address" type="text" value="<?= esc($customer['customer_address']) ?>"  required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Town/City</div>
                    <input class="form-control" name="town_city" type="text" value="<?= esc($customer['customer_town_city']) ?>"  required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Province</div>
                    <input class="form-control" name="province" type="text"  value="<?= esc($customer['customer_province']) ?>" required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Phone</div>
                    <input class="form-control" name="phone" type="number"  value="<?= esc($customer['customer_phone']) ?>" required>
                  </div>
                  <div class="col-md-10">
                    <div style="font-weight:bold">Email</div>
                    <input class="form-control" name="email" type="email"  value="<?= esc($customer['customer_email']) ?>" required>
                  </div>
                </div>

              </div>
            </div>
            <div style="margin-top:50px">
              <input type="hidden" name="id" value="<?= esc($customer['customer_id']) ?>">
              <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit"class="btn mb-2 btn-primary">Accept</button>
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
<?php foreach ($customers as $customer) { ?>
  <div class="card-body">
    <!-- Extra large modal -->
    <div class="col-md-4 mb-4">
      <!-- Modal -->
      <div class="modal fade" id="deletecustomeraccount<?= esc($customer['customer_id']) ?>" tabindex="-1" role="dialog" aria-labelledby="verticalModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <form method="post" action="/admin/customer/deletecustomeraccount">
            <div class="modal-content">
              <div class="modal-header">
                <h5 style="color:red;font-weight:bold" class="modal-title" id="verticalModalTitle">Notification</h5>
              </div>
              <div class="modal-body"> Are you sure you want to delete this account? Once deleted, it cannot be undone.</div>
              <input type="hidden" name="id" value="<?= esc($customer['customer_id']) ?>">
              <input value="<?= esc($customer['customer_images']) ?>" name="image" type="hidden">
              <div class="modal-footer">
                <button type="button" class="btn mb-2 btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" name="xoacustomer" class="btn mb-2 btn-primary">Accept</button>
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

     const togglePassword = document.querySelectorAll('.fa-eye');
    const passwords = document.querySelectorAll('input[type="password"]');

    togglePassword.forEach(function(toggle, index) {
        toggle.addEventListener('click', function() {
            togglePasswordVisibility(passwords[index], toggle);
        });
    });

    function togglePasswordVisibility(pass, toggle) {
        const type = pass.getAttribute('type') === 'password' ? 'text' : 'password';
        pass.setAttribute('type', type);
        toggle.classList.toggle('fa-eye-slash');
    }
</script>