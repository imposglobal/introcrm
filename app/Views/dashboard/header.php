<?php $session = session();?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- plugins:css -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>

  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?php echo $baseURL; ?>/assets/js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
   <!-- Plugin css for this page -->
   <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo $baseURL; ?>/assets/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo $baseURL; ?>/assets/images/favicon.png" />
  <style>
    #searchQuery::placeholder{
      color: #00000061;
    }
    .tb-responsive {
    overflow-x: auto !important;
    width: 100%;
}
#loader{
  display: none;
}
td{
  width: 3%;
}
.tableb-responsive td{
    font-size: 14px;
}
  </style>
</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="<?php echo $baseURL; ?>/assets/images/logo.svg" class="mr-2" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo $baseURL; ?>/assets/images/logo-mini.svg" alt="logo"/></a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav mr-lg-2">
          <li class="nav-item nav-search d-none d-lg-block">
            <div class="input-group">
              <input style="border-radius: 10px; width:500px" type="text" class="bg-light text-dark form-control border px-4 border-rounded" id="searchQuery" placeholder="Check Duplicate Email or Mobile No" aria-label="search" aria-describedby="search">
              <div class="input-group-prepend hover-cursor ml-2" id="duplicatechk">
                <span class="input-group-text" id="searchCustomer">
                  <i class="icon-search"></i>
                </span>
              </div>
              <div id="loader" class="spinner-border p-3" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
          </li>
        </ul>
        <ul class="navbar-nav navbar-nav-right">
          
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle text-primary mt-3 pt-2" href="#" data-toggle="dropdown" id="profileDropdown">
            <i class=" menu-icon mdi mdi-account-circle" style="font-size:38px"></i>
            <span class="font-weight-bold pb-3"><?php 
                         echo $session->get('fname');?></span>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item">
                <i class="ti-settings text-primary"></i>
                Settings
              </a>
              <a class="dropdown-item"  href="<?php echo base_url('logout'); ?>">
                <i class="ti-power-off text-primary"></i>
                Logout 
              </a>
            </div>
          </li>
      
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
  
      <!-- partial:partials/_settings-panel.html -->
      <!-- <div class="theme-setting-wrapper">
        <div id="settings-trigger"><i class="ti-settings"></i></div>
        <div id="theme-settings" class="settings-panel">
          <i class="settings-close ti-close"></i>
          <p class="settings-heading">SIDEBAR SKINS</p>
          <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
          <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
          <p class="settings-heading mt-2">HEADER SKINS</p>
          <div class="color-tiles mx-0 px-4">
            <div class="tiles success"></div>
            <div class="tiles warning"></div>
            <div class="tiles danger"></div>
            <div class="tiles info"></div>
            <div class="tiles dark"></div>
            <div class="tiles default"></div>
          </div>
        </div>
      </div> -->
      
      <!-- partial -->
