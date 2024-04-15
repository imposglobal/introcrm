<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>

<!-- Define the content section -->
<?= $this->section('content') ?>

<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
            <div class="col-12 grid-margin stretch-card">
              <div class="card">
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <h4 class="card-title"><i class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i> Add Customer</h4>
                      <hr>
                      
                      <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Customer's First Name" aria-label="Username">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control form-control-lg" placeholder="Username" aria-label="Username">
                            </div>
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