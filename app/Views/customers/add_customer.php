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
                                <input type="text" name="fname" class="form-control form-control-lg" placeholder="Customer First Name" id="fname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="lname" class="form-control form-control-lg" placeholder="Customer Last Name" id="lname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Customer Email" id="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input type="text" name="mobile" class="form-control form-control-lg" placeholder="Customer Mobile No" id="mobile">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" name="telephone" class="form-control form-control-lg" placeholder="Customer Telephone No" id="telephone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input type="text" name="telephone" class="form-control form-control-lg" placeholder="Customer Telephone No" id="telephone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Address 1</label>
                                <input type="text" name="address_1" class="form-control form-control-lg" placeholder="Customer Address 1" id="address_1">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Address 2</label>
                                <input type="text" name="address_2" class="form-control form-control-lg" placeholder="Customer Address " id="address_2">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Post Code</label>
                                <input type="text" name="postcode" class="form-control form-control-lg" placeholder="Post Code" id="postcode">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tenure</label>
                                <input type="text" name="tenure" class="form-control form-control-lg" placeholder="Tenure" id="tenure">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Council</label>
                                <input type="text" name="council" class="form-control form-control-lg" placeholder="Council" id="council">
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Age</label>
                                <input type="text" name="boiler_age" class="form-control form-control-lg" placeholder="Boiler Age" id="boiler_age">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Make</label>
                                <input type="text" name="boiler_make" class="form-control form-control-lg" placeholder="Boiler Make" id="boiler_make">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Model</label>
                                <input type="text" name="boiler_model" class="form-control form-control-lg" placeholder="Boiler Model" id="boiler_model">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Benefit / Flex</label>
                                <select class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option value="Universal credit">Universal credit</option>
                                <option value="Income Support">Income Support </option>
                                <option value="Pension Credit">Pension Credit </option>
                                <option value="Child Tax Credit">Child Tax Credit</option>
                                <option value="Housing Benefit">Housing Benefit</option>
                                <option value="Universal Credit">Universal Credit</option>
                                <option value="Employment and support allowance">Employment and support allowance</option>
                                <option value="Universal Credit">Universal Credit</option>
                                <option value="Child Tax support">Child Tax support </option>
                                <option value="Working Tax Credit">Working Tax Credit</option>
                                <option value="Pension credit and income Support credit">Pension credit and income Support credit</option>
                                <option value="working tax credit">working tax credit </option>
                                <option value="No Benefits">No Benefits</option>
                                
                                </select>
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