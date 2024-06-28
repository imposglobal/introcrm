<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Edit Profile</title>
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

</style>
<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
            <div class="col-lg-12">
            <?php 
            if(isset($_GET['status'])){
                $status = $_GET['status'];
            }
            if (isset($status)){ 
                if($status === "duplicate"){
                ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      Duplicate Record Found
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                <?php }elseif($status == "added"){ ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Record Added Successfully
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>

                <?php } } ?>
                
            </div>
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body mt-2">
                      <h4 class="card-title"><i class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i> Edit Profile </h4>

                      <?php if (session()->has('alrt')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session('alrt') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                      <hr>
                      <?php foreach ($users as $user): ?>
                        
                      <form action="<?php echo base_url('/profile/update')?>" method="POST" enctype="multipart/form-data">
                      <div class="row">
                      <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Center Name</label>
                                <input  type="text" name="center" class="form-control form-control-lg" placeholder="Customer Last Name" id="center" value=" <?= $user["center_name"] ?>" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">First Name</label>
                                <input  type="text" name="fname" class="form-control form-control-lg" placeholder="Customer First Name" id="fname" value="<?= $user["fname"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Last Name</label>
                                <input  type="text" name="lname" class="form-control form-control-lg" placeholder="Customer Last Name" id="lname" value="<?= $user["lname"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Customer Email" id="email" value="<?= $user["email"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Mobile</label>
                                <input  type="text" name="mobile" class="form-control form-control-lg" placeholder="Customer Mobile No" id="mobile" value="<?= $user["phone"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Location</label>
                                <input  type="text" name="location" class="form-control form-control-lg" placeholder="Customer location" id="location" value="<?= $user["location"] ?>">
                            </div>
                        </div>
                        <div class="col-lg-12 mt-3">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">Update Profile</button>
                            </div>
                        </div>
                        
                      
                      </div>
                        </form>   

                        <h4 class="card-title mt-5"><i class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i> Change Password </h4>
                        <hr>
                        <?php if (session()->has('alrtp')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session('alrtp') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                        
                        <form action="<?php echo base_url('/profile/change-password')?>" method="POST" enctype="multipart/form-data">
                      <div class="row">
                      
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Enter Password</label>
                                <input required  type="password" name="pwd" class="form-control form-control-lg" placeholder="Enter Password" id="pwd" >
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label style="font-weight: bold;">Confirm Password</label>
                                <input required  type="password" name="cpwd" class="form-control form-control-lg" placeholder="Confirm Password" id="cpwd">
                            </div>
                        </div>
                       
                        <div class="col-lg-12 mt-1">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">Change Password</button>
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>
                       
                      </div>
                        </form>   

                        <?php endforeach; ?>  
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
            
            
          </div>
        </div>
        <!-- content-wrapper ends -->
<script>
    $(document).ready(function(){
        CKEDITOR.replace('comments');
    });

</script>
<?= $this->endSection() ?>

