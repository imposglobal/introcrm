<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Add Customers</title>
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
                      <h4 class="card-title"><i class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i> Add Customer</h4>
                      <hr>
                      <form action="<?php echo base_url('/customer/add')?>" method="POST" enctype="multipart/form-data">
                      <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label style="font-weight: bold;">Name</label>
                                <input required  type="text" name="fname" class="form-control form-control-lg" placeholder="Customer Full Name" id="fname">
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Last Name</label>
                                <input required  type="text" name="lname" class="form-control form-control-lg" placeholder="Customer Last Name" id="lname">
                            </div>
                        </div> -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Email</label>
                                <input type="email" name="email" class="form-control form-control-lg" placeholder="Customer Email" id="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Mobile</label>
                                <input required  type="text" name="mobile" class="form-control form-control-lg" placeholder="Customer Mobile No" id="mobile">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Telephone</label>
                                <input required  type="text" name="telephone" class="form-control form-control-lg" placeholder="Customer Telephone No" id="telephone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">DOB</label>
                                <input required  type="date" name="dob" class="form-control form-control-lg" placeholder="Customer Telephone No" id="dob">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label style="font-weight: bold;">Address</label>
                                <input required  type="text" name="address_1" class="form-control form-control-lg" placeholder="Customer Address " id="address_1">
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Address 2</label>
                                <input required  type="text" name="address_2" class="form-control form-control-lg" placeholder="Customer Address " id="address_2">
                            </div>
                        </div> -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Post Code</label>
                                <input required  type="text" name="post_code" class="form-control form-control-lg" placeholder="Post Code" id="postcode">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Residential Status</label>
                                <select style="color: #000;" name="tenure" id="tenure" class="form-control form-control-lg" >
                                <option selected >Please Select</option>
                                <option value="Home Owner">Home Owner</option>
                                <option value="Private Tenant">Private Tenant</option>
                                <option value="Council Tenant">Council Tenant</option>
                                <option value="HA Tenant">HA Tenant</option>
                                <option value="Not Available">Not Available</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Council<small>(If Flex)</small></label>
                                <input type="text" name="council" class="form-control form-control-lg" placeholder="Council" id="council">
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Boiler Age</label>
                                <input required  type="text" name="boiler_age" class="form-control form-control-lg" placeholder="Boiler Age" id="boiler_age">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Boiler Make</label>
                                <input required  type="text" name="boiler_make" class="form-control form-control-lg" placeholder="Boiler Make" id="boiler_make">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Boiler Model</label>
                                <input required  type="text" name="boiler_model" class="form-control form-control-lg" placeholder="Boiler Model" id="boiler_model">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label style="font-weight: bold;">Boiler Efficeincy</label>
                                <input required  type="text" name="boiler_effi" class="form-control form-control-lg" placeholder="Boiler Efficeincy" id="boiler_effi">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">Benefit / Flex</label>
                                <select style="color: #000;" name="benefit" id="benefit" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option Selected>Please Select</option>
                                <option value="Income Support">Income Support (IS)</option>
                                <option value="Housing Benefit">Housing Benefit (HB) </option>
                                <option value="Universal Credit">Universal Credit (UC) </option>
                                <option value="Working Tax Credit">Working Tax Credit (WTC)</option>
                                <option value="Jobseeker’s Allowance">Jobseeker’s Allowance (JSA)</option>
                                <option value="Child Benefit (subject to income)">Child Benefit (subject to income)</option>
                                <option value="Pension Credit Savings Credit">Pension Credit Savings Credit (PCSC)</option>
                                <option value="Pension Credit Guarantee Credit">Pension Credit Guarantee Credit (PCGC)</option>
                                <option value="Employment and Support Allowance">Employment and Support Allowance (ESA) </option>
                                <option value="Part Time Employed">Part Time Employed</option>
                                <option value="Full Time Employed">Full Time Employed</option>
                                <option value="No Benefit">No Benefit</option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">EPC Rating</label>
                                <select style="color: #000;" name="epc" id="epc" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option value="Not Available">Not Available</option>
                                <option value="A">A</option>
                                <option value="B">B </option>
                                <option value="C">C </option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                                <option value="F">F</option>
                                <option value="G">G</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">On Gas Registered</label>
                                <select style="color: #000;" name="gas_registered" id="gas_registered" class="form-control form-control-lg" >
                                <option value="Not Available">Not Available</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">                  
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="font-weight-bold" for="notes">Additional Notes</label>
                                <textarea class="form-control" id="comments" name="add_notes" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label class="font-weight-bold" for="notes">Drag & Drop Files Here</label>
                                <div id="drop-area" class="drop-area">
                                    <!-- <h3 class="drop-text">Drag & Drop Files Here</h3> -->
                                    <input  accept="image/*,.pdf" type="file" name="images[]" id="images" multiple>
                                </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">Add Customer</button>
                            </div>
                        </div>
                      </div>
                        </form>     
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

