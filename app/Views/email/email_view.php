<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Invite</title>
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
            </div>
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                                <h4 class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                 Invite</h4>
                                <hr>
                                <hr>

                                <form action="<?php echo base_url('/save/invite')?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input   type="text" name="fname" class="form-control form-control-lg" placeholder=" First Name" id="fname">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input   type="text" name="lname" class="form-control form-control-lg" placeholder=" Last Name" id="lname">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input   type="email" name="email" class="form-control form-control-lg" placeholder=" Email" id="email">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <label>Center Name </label>
                                                <input   type="text" name="center_name" class="form-control form-control-lg" placeholder="Center Name" id="center_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary w-100 text-center " data-toggle="tooltip" data-placement="top"><i class="fas fa-eye"></i> Invite</button>
                                        </div>  
                                </form>
                                <div>
                                

                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->

    
    <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                                <!-- <h4 class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                 </h4> -->
                                <hr>
                                
                                 <!-- table code start -->
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Center Name</th>
                                            <th scope="col">First Name</th>
                                            <th scope="col">Last Name</th>
                                            <th scope="col">Email</th>
                                            <!-- <th scope="col">Actions</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i = 1; ?>
                                        <?php if ($invite && count($invite) > 0): ?>
                                        <?php foreach ($invite as $invt):?>
                                        
                                        <tr>
                                            <td>
                                            <?= $i++ ?>
                                            </td>
                                            <td>
                                            <?= $invt['center_name'] ?>
                                            </td>
                                            <td>
                                            <?= $invt['fname'] ?>
                                            </td>
                                            <td>
                                            <?= $invt['lname'] ?>
                                            </td>
                                            <td>
                                            <?= $invt['email'] ?>
                                            </td>
                                        

                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="6">No customers found.</td>
                                        </tr>
                                        <?php endif; ?>
                                        
                                    </tbody>
                                </table>

                                

                                
                         <!-- table code end -->
                            
                            </div>
                        </div>
                        
                    </div>
                </div>
                <div class="col-lg-12 my-3">
                                            <?php echo $pager->links('default','full_pagination');?>
                                        </div>
  
    <?= $this->endSection() ?>