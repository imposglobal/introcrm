<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Add Agent</title>
<style>
    .drop-area {
        border: 2px dashed #ccc;
        padding: 40px;
        text-align: center;
        margin-bottom: 20px;
    }

    .drop-text {
        margin-top: 0;
    }

    .file-list {
        border: 1px solid #ccc;
        padding: 10px;
        max-height: 500px;
        overflow-y: auto;
    }

    .file-item {
        margin-bottom: 5px;
    }
    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 99999 ;
  top: 0;
  right: 0;
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #111;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #11111150;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
<?php $session = session(); ?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12">
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                                <h4 class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                    Add Agent</h4>
                                <hr>

                                <!-- table code start -->
                                <div class="container-scroller">
                                    <div class="py-4">
                                    <div class=" d-flex align-items-center auth px-0">
                                        <div class="row w-100 mx-0">
                                        <div class="col-lg-12">
                                            <div class="auth-form-light text-left py-1 px-4 px-sm-5">
                                            
                                            <form class="" action="<?php echo base_url('/agent/add'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text"   name="fname" class="form-control form-control-lg" id="fname" placeholder="First Name" value="<?= set_value('fname') ?>">
                                                        <input type="hidden" id="role" name="role" value="2">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text"  name="lname" class="form-control form-control-lg" id="lname" placeholder="Last Name" value="<?= set_value('lname') ?>">
                                                     </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Center Name</label>
                                                        <input type="text"  name="center_name" class="form-control form-control-lg" id="center_name" placeholder="Center Name" value="<?= set_value('center_name') ?>">
                                                     </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Location</label>
                                                        <input type="text"  name="location" class="form-control form-control-lg" id="location" placeholder="Location" value="<?= set_value('location') ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>User Name</label>
                                                        <input type="text"  name="username" class="form-control form-control-lg" id="username" placeholder="User Name" value="<?= set_value('username') ?>">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password"  name="password" class="form-control form-control-lg" id="password" placeholder="Password">
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="mt-3">
                                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  >Add Agent</button>
                                                    </div>
                                                </div>
                                                
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

                                
                         <!-- table code end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           
                
            </div>
            </div>
           
        </div>
    </div>
    <!-- content-wrapper ends -->




    <?= $this->endSection() ?>