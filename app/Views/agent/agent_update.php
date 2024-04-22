<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>View Customer</title>
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

                                <?php if (session()->has('alrt')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session('alrt') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <!-- table code start -->
                                <div class="container-scroller">
                                    <div class="py-4">
                                    <div class=" d-flex align-items-center auth px-0">
                                        <div class="row w-100 mx-0">
                                        <div class="col-lg-12">
                                            <div class="auth-form-light text-left py-1 px-4 px-sm-5">
                                            
                                            <form class="" action="<?php echo base_url('/agent/update'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>First Name</label>
                                                    <input type="text"   name="fname" class="form-control form-control-lg" id="fname" placeholder="First Name" value="<?= $result['fname'] ?>">
                                                    <input type="hidden" id="role" name="role" value="2">
                                                    <input type="hidden" id="role" name="id" value="<?= $result['id']?>">
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Last Name</label>
                                                    <input type="text"  name="lname" class="form-control form-control-lg" id="lname" placeholder="Last Name" value="<?= $result['lname'] ?>">
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Email</label>
                                                    <input type="email"  name="email" class="form-control form-control-lg" id="email" placeholder="Email" value="<?= $result['email'] ?>">
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Phone</label>
                                                    <input type="text"  name="phone" class="form-control form-control-lg" id="phone" placeholder="Phone Number" value="<?= $result['phone'] ?>">
                                                </div> 
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Center Name</label>
                                                    <input type="text"  name="center_name" class="form-control form-control-lg" id="center_name" placeholder="Center Name" value="<?= $result['center_name'] ?>">
                                                </div>
                                                </div>
                                                <div class="col-lg-6">
                                                <div class="form-group">
                                                <label>Location</label>
                                                    <input type="text"  name="location" class="form-control form-control-lg" id="location" placeholder="Location" value="<?= $result['location'] ?>">
                                                </div>
                                                </div>
                                                
                                                <div class="col-lg-12">
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  >Save</button>
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