<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>
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
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              
            <!-- code to display flash message -->
            <?php if (isset($alrt)): ?>
                  <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <?= $alrt ?>
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                <?php endif; ?>
              <!-- code to display flash message  end-->

              <div class="brand-logo">
                <img src="<?php echo $baseURL; ?>/assets/images/logo.svg" alt="logo">
              </div>
              <div class="text-center">
                 <h4 style="font-weight: bold;">Agent Login</h4>
              </div>

              
              <!-- Login form  -->
              <!-- flash message code -->
              <?php if (session()->has('msg')): ?>
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                          <?= session()->get('msg') ?>
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                  <?php endif; ?>
              <!-- flash message code end-->
                <form class="pt-3" action="<?php echo base_url('/agentlogin/check'); ?>" method="POST">
                  <div class="form-group">
                    <input type="username"  required name="username"  class="form-control form-control-lg" id="username" placeholder="User name" value="<?= set_value('username') ?>">
                  </div>
                  <div class="form-group">
                    <input type="password" required name="password"  class="form-control form-control-lg" id="password" placeholder="Password">
                  </div>
                  <div class="mt-3">
                    <button type="submit"
                      class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN
                    </button>
                  </div>
                  <div class="my-4 d-flex justify-content-between align-items-center">
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                </form>   
<!-- Login form end -->
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