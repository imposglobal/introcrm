<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Onboard</title>
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
              <div class="brand-logo text-center">
                <p class="h3 text-primary"><b>ECO4</b> Portal</p>
              </div><hr>
              <?php
             
              if(isset($_GET['id'])){
                $id = $_GET['id'];
              }else{
                $id = "";
              }
              
              $decode = base64_decode($id);
              if($decode == "Approve"){
              ?>
              <form class="pt-3" action="<?php echo base_url('/login'); ?>" method="post">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>First Name</label>
                    <input type="text"  required name="fname" class="form-control form-control-lg" id="fname" placeholder="First Name" value="<?= set_value('fname') ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Last Name</label>
                    <input type="text" required name="lname" class="form-control form-control-lg" id="lname" placeholder="Last Name" value="<?= set_value('lname') ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Email</label>
                    <input type="email" required name="email" class="form-control form-control-lg" id="email" placeholder="Email" value="<?= set_value('email') ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Phone</label>
                    <input type="text" required name="phone" class="form-control form-control-lg" id="phone" placeholder="Phone Number" value="<?= set_value('phone') ?>">
                  </div> 
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Center Name</label>
                    <input type="text" required name="center_name" class="form-control form-control-lg" id="center_name" placeholder="Center Name" value="<?= set_value('center_name') ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Location</label>
                    <input type="text" required name="location" class="form-control form-control-lg" id="location" placeholder="Location" value="<?= set_value('location') ?>">
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                  <label>Password</label>
                    <input type="password" required name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mt-3">
                    <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="<?php echo $baseURL; ?>/assets/index.html">SIGN UP</a> -->
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  >Register</button>
                  </div>
                </div>
                
                </div>
              </form>
              <?php }else{
                echo '<p class="h4">Given Link Is Expired Please Contact - <a href="mailto:support@eco4.doodlo.in">support@eco4.doodlo.in</a></p>';
              } ?>
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
