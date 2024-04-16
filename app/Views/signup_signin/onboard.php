<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $baseURL; ?>/assets/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-6 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?php echo $baseURL; ?>/assets/images/logo.svg" alt="logo">
              </div>
             
              <form class="pt-3" action="<?php echo base_url('/signup_signin/login'); ?>" method="post">
                <div class="form-group">
                  <input type="text"  required name="fname" class="form-control form-control-lg" id="fname" placeholder="First Name" value="<?= set_value('fname') ?>">
                </div>
                <div class="form-group">
                  <input type="text" required name="lname" class="form-control form-control-lg" id="lname" placeholder="Last Name" value="<?= set_value('lname') ?>">
                </div>
                <div class="form-group">
                  <input type="email" required name="email" class="form-control form-control-lg" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                </div>
                <div class="form-group">
                  <input type="text" required name="phone" class="form-control form-control-lg" id="phone" placeholder="Phone Number" value="<?= set_value('phone') ?>">
                </div>                
                <div class="form-group">
                  <input type="text" required name="center_name" class="form-control form-control-lg" id="center_name" placeholder="Location" value="<?= set_value('center_name') ?>">
                </div>
                <div class="form-group">
                  <input type="text" required name="location" class="form-control form-control-lg" id="location" placeholder="Location" value="<?= set_value('location') ?>">
                </div>
                <div class="form-group">
                  <input type="password" required name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                </div>
                <div class="mb-4">
                  
                </div>
                <div class="mt-3">
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="<?php echo $baseURL; ?>/assets/index.html">SIGN UP</a> -->
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  >Register</button>
                </div>
                
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo $baseURL; ?>/assets/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo $baseURL; ?>/assets/js/off-canvas.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/hoverable-collapse.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/template.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/settings.js"></script>
  <script src="<?php echo $baseURL; ?>/assets/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
