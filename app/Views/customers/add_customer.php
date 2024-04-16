<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Add Customer</title>
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
            <?php if (isset($status)){ 
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input required  type="text" name="fname" class="form-control form-control-lg" placeholder="Customer First Name" id="fname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input required  type="text" name="lname" class="form-control form-control-lg" placeholder="Customer Last Name" id="lname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input required  type="email" name="email" class="form-control form-control-lg" placeholder="Customer Email" id="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input required  type="text" name="mobile" class="form-control form-control-lg" placeholder="Customer Mobile No" id="mobile">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input required  type="text" name="telephone" class="form-control form-control-lg" placeholder="Customer Telephone No" id="telephone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>DOB</label>
                                <input required  type="date" name="dob" class="form-control form-control-lg" placeholder="Customer Telephone No" id="dob">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Address 1</label>
                                <input required  type="text" name="address_1" class="form-control form-control-lg" placeholder="Customer Address 1" id="address_1">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Address 2</label>
                                <input required  type="text" name="address_2" class="form-control form-control-lg" placeholder="Customer Address " id="address_2">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Post Code</label>
                                <input required  type="text" name="post_code" class="form-control form-control-lg" placeholder="Post Code" id="postcode">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tenure</label>
                                <input required  type="text" name="tenure" class="form-control form-control-lg" placeholder="Tenure" id="tenure">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Council</label>
                                <input required  type="text" name="council" class="form-control form-control-lg" placeholder="Council" id="council">
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Age</label>
                                <input required  type="text" name="boiler_age" class="form-control form-control-lg" placeholder="Boiler Age" id="boiler_age">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Make</label>
                                <input required  type="text" name="boiler_make" class="form-control form-control-lg" placeholder="Boiler Make" id="boiler_make">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Model</label>
                                <input required  type="text" name="boiler_model" class="form-control form-control-lg" placeholder="Boiler Model" id="boiler_model">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Benefit / Flex</label>
                                <select name="benefit" id="benefit" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option value="Universal credit">Universal credit</option>
                                <option value="Income Support">Income Support </option>
                                <option value="Pension Credit">Pension Credit </option>
                                <option value="D">Child Tax Credit</option>
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">EPC Rating</label>
                                <select name="epc" id="epc" class="form-control form-control-lg" id="exampleFormControlSelect1">
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
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="notes">Additional Notes</label>
                                <textarea class="form-control" id="add_notes" name="add_notes" rows="8"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="notes">Drag & Drop Files Here</label>
                                <div id="drop-area" class="drop-area">
                                    <!-- <h3 class="drop-text">Drag & Drop Files Here</h3> -->
                                    <input  accept="image/*,.pdf" required  type="file" name="images[]" id="images" multiple>
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

<?= $this->endSection() ?>
