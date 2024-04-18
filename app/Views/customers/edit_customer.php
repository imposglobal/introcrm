<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Edit Customer</title>
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
                      <h4 class="card-title"><i class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i> Update Customer</h4>
                      <hr>
                      <form action="<?php echo base_url('/customer/update')?>" method="POST" enctype="multipart/form-data">
                      <div class="row">
                      <div class="col-lg-4">
                            <div class="form-group">
                                <label>Lead ID</label>
                                <input required  type="text" value="<?= $result['lead_id'] ?>" name="lead_id" class="form-control form-control-lg" placeholder="Lead ID" id="lead_id" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Lead Date</label>
                                <input required  type="text" value="<?= $result['lead_date'] ?>" name="lead_date" class="form-control form-control-lg" placeholder="Lead Date" id="lead_date">
                            </div>
                        </div>
                      <!-- hr line tag -->
                        <div class="col-lg-12">
                            <hr>
                        </div>
                      <!-- hr line tag -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>First Name</label>
                                <input required  type="text" value="<?= $result['fname'] ?>" name="fname" class="form-control form-control-lg" placeholder="Customer First Name" id="fname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input required  type="text" value="<?= $result['lname'] ?>" name="lname" class="form-control form-control-lg" placeholder="Customer Last Name" id="lname">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Email</label>
                                <input required  type="email" name="email" value="<?= $result['email'] ?>" class="form-control form-control-lg" placeholder="Customer Email" id="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Mobile</label>
                                <input required  type="text" name="mobile" value="<?= $result['mobile'] ?>" class="form-control form-control-lg" placeholder="Customer Mobile No" id="mobile">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Telephone</label>
                                <input required  type="text" name="telephone" value="<?= $result['telephone'] ?>" class="form-control form-control-lg" placeholder="Customer Telephone No" id="telephone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>DOB</label>
                                <input required  type="date" name="dob" value="<?= $result['dob'] ?>" class="form-control form-control-lg" placeholder="Customer Telephone No" id="dob">
                            </div>
                        </div>
            
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Address 1</label>
                                <input required  type="text" name="address_1" value="<?= $result['address_1'] ?>" class="form-control form-control-lg" placeholder="Customer Address 1" id="address_1">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Address 2</label>
                                <input required  type="text" name="address_2" value="<?= $result['address_2'] ?>" class="form-control form-control-lg" placeholder="Customer Address " id="address_2">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Post Code</label>
                                <input required  type="text" name="post_code" value="<?= $result['post_code'] ?>" class="form-control form-control-lg" placeholder="Post Code" id="postcode">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Tenure</label>
                                <input required  type="text" name="tenure" value="<?= $result['tenure'] ?>" class="form-control form-control-lg" placeholder="Tenure" id="tenure">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Council</label>
                                <input required  type="text" name="council" value="<?= $result['council'] ?>" class="form-control form-control-lg" placeholder="Council" id="council">
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Age</label>
                                <input required  type="text" name="boiler_age" value="<?= $result['boiler_age'] ?>" class="form-control form-control-lg" placeholder="Boiler Age" id="boiler_age">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Make</label>
                                <input required  type="text" name="boiler_make" value="<?= $result['boiler_make'] ?>" class="form-control form-control-lg" placeholder="Boiler Make" id="boiler_make">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Model</label>
                                <input required  type="text" name="boiler_model" value="<?= $result['boiler_model'] ?>" class="form-control form-control-lg" placeholder="Boiler Model" id="boiler_model">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label for="exampleFormControlSelect1">Benefit / Flex</label>
                                <select name="benefit" id="benefit"  class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['benefit_flex'] ?>"><?= $result['benefit_flex'] ?></option>
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
                                <option selected value="<?= $result['epc_rating'] ?>"><?= $result['epc_rating'] ?></option>
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
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Survey Status</label>
                                <input required  type="text" name="survey_status" value="<?= $result['survey_status'] ?>" class="form-control form-control-lg" placeholder="Survey Status" id="survey_status">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Job Status</label>
                                <input required  type="text" name="job_status" value="<?= $result['job_status'] ?>" class="form-control form-control-lg" placeholder="Job Status" id="job_status">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Payment Status</label>
                                <input required  type="text" name="payment_status" value="<?= $result['payment_status'] ?>" class="form-control form-control-lg" placeholder="Payment Status" id="payment_status">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Measures</label>
                                <input required  type="text" name="measures" value="<?= $result['measures'] ?>" class="form-control form-control-lg" placeholder="Measures" id="measures">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>EPC Link</label>
                                <input required  type="text" name="epc_link" value="<?= $result['epc_link'] ?>" class="form-control form-control-lg" placeholder="EPC Link" id="epc_link">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Gas Safe Link</label>
                                <input required  type="text" name="gas_safe_link" value="<?= $result['gas_safe_link'] ?>" class="form-control form-control-lg" placeholder="Gas Safe Link" id="gas_safe_link">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label>Boiler Efficiency Link</label>
                                <input required  type="text" name="boiler_efficiency_link" value="<?= $result['boiler_efficiency_link'] ?>" class="form-control form-control-lg" placeholder="Boiler Efficiency Link" id="boiler_efficiency_link">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="notes">Processing Notes</label>
                                <textarea class="form-control" id="processing_notes" name="processing_notes" rows="8"><?= $result['processing_notes'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="notes">Previous Grant/Work</label>
                                <textarea class="form-control" id="previous_grant_work" name="previous_grant_work" rows="8"><?= $result['previous_grant_work'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="notes">Call Center Notes</label>
                                <textarea class="form-control" id="contact_center_notes" name="contact_center_notes" rows="8"><?= $result['contact_center_notes'] ?></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="notes">Additional Notes</label>
                                <!-- <textarea class="form-control" id="add_notes" name="add_notes" value="<?= $result['additional_notes'] ?>" rows="8"></textarea> -->
                                <textarea class="form-control" id="add_notes" name="add_notes" rows="8"><?= $result['additional_notes'] ?></textarea>

                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="notes">View or upload Documents</label>
                                <div id="drop-area" class="drop-area">
                                    <!-- <h3 class="drop-text">Drag & Drop Files Here</h3> -->
                                    <input  accept="image/*,.pdf" required  type="file" name="images[]"  id="images" multiple>
                                </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">Save And Update </button>
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

