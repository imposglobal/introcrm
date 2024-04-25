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
          <div class="col-lg-8 mx-auto">
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

              
              
              <!-- Login form  -->
              
                 <div class="alert alert-danger" role="alert">
                        <h2>you are not authorized user to access this portal.</h2>
                 </div>
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