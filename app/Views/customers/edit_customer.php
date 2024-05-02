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

<!-- session start -->
<?php  
    $session = session();
    $role = $session->get('role');
?>


<div class="main-panel">          
        <div class="content-wrapper">
          <div class="row">
          <div class="col-lg-12">
            <?php 
            if(isset($_GET['status'])){
                $status = $_GET['status'];
            }
            if (isset($status)){ 
                if($status === "error"){
                ?>
                  <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      Something went wrong...
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
                <?php }elseif($status == "success"){ ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      Record Updated Successfully.
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
                      <h4 class="card-title"><i class="mdi mdi-account-multiple-plus bg-primary h4 pt-1 px-2 text-white rounded"></i> Update Customer</h4>
                      <hr>
                      <form action="<?php echo base_url('/customer/update')?>" method="POST" enctype="multipart/form-data">
                      <div class="row">
                      <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Lead ID</label>
                                <input required  type="text" value="<?= "EC-    ".$result['lead_no'] ?>" name="lead_no" class="form-control form-control-lg" placeholder="Lead ID" id="lead_no" readonly>
                                <input required  type="hidden" value="<?= $result['lead_id'] ?>" name="lead_id" class="form-control form-control-lg" placeholder="Lead ID" id="lead_id" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Source</label>
                                <input required  type="text" value="<?= $result['center_name'] ?>" name="center" class="form-control form-control-lg" placeholder="Source" id="lead_id" readonly>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Lead Date</label>
                                <input required  type="text" value="<?= $result['lead_date'] ?>" name="lead_date" class="form-control form-control-lg" placeholder="Lead Date" id="lead_date" readonly>
                            </div>
                        </div>
                      <!-- hr line tag -->
                        <div class="col-lg-12">
                            <hr>
                        </div>
                      <!-- hr line tag -->
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Customer Name</label>
                                <input required  type="text" value="<?= $result['fname'] ?>" name="fname" class="form-control form-control-lg" placeholder="Customer Full Name" id="fname">
                            </div>
                        </div>
                        <!-- <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Last Name</label>
                                <input required  type="text" value="<?= $result['lname'] ?>" name="lname" class="form-control form-control-lg" placeholder="Customer Last Name" id="lname">
                            </div>
                        </div> -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Email</label>
                                <input type="email" name="email" value="<?= $result['email'] ?>" class="form-control form-control-lg" placeholder="Customer Email" id="email">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Mobile</label>
                                <input required  type="text" name="mobile" value="<?= $result['mobile'] ?>" class="form-control form-control-lg" placeholder="Customer Mobile No" id="mobile">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Telephone</label>
                                <input required  type="text" name="telephone" value="<?= $result['telephone'] ?>" class="form-control form-control-lg" placeholder="Customer Telephone No" id="telephone">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">DOB</label>
                                <input required  type="date" name="dob" value="<?= $result['dob'] ?>" class="form-control form-control-lg" placeholder="Customer Telephone No" id="dob">
                            </div>
                        </div>
            
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-8">
                            <div class="form-group">
                                <label class="font-weight-bold">Address </label>
                                <input required  type="text" name="address_1" value="<?= $result['address_1'] ?>" class="form-control form-control-lg" placeholder="Customer Address 1" id="address_1">
                            </div>
                        </div>
                    
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Post Code</label>
                                <input required  type="text" name="post_code" value="<?= $result['post_code'] ?>" class="form-control form-control-lg" placeholder="Post Code" id="postcode">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Tenure</label>
                                <input required  type="text" name="tenure" value="<?= $result['tenure'] ?>" class="form-control form-control-lg" placeholder="Tenure" id="tenure">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Council</label>
                                <input required  type="text" name="council" value="<?= $result['council'] ?>" class="form-control form-control-lg" placeholder="Council" id="council">
                            </div>
                        </div>
                        <div class="col-lg-4"></div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Boiler Age</label>
                                <input required  type="text" name="boiler_age" value="<?= $result['boiler_age'] ?>" class="form-control form-control-lg" placeholder="Boiler Age" id="boiler_age">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Boiler Make</label>
                                <input required  type="text" name="boiler_make" value="<?= $result['boiler_make'] ?>" class="form-control form-control-lg" placeholder="Boiler Make" id="boiler_make">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Boiler Model</label>
                                <input required  type="text" name="boiler_model" value="<?= $result['boiler_model'] ?>" class="form-control form-control-lg" placeholder="Boiler Model" id="boiler_model">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Boiler Efficiency</label>
                                <input required  type="text" name="boiler_effi" value="<?= $result['boiler_effi'] ?>" class="form-control form-control-lg" placeholder="Boiler Model" id="boiler_effi">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">Benefit / Flex</label>
                                <select style="color:#000" name="benefit" id="benefit"  class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['benefit_flex'] ?>"><?= $result['benefit_flex'] ?></option>
                                <option value="Not Available">Not Available</option>
                                <option value="Income Support">Income Support (IS)</option>
                                <option value="Housing Benefit">Housing Benefit (HB) </option>
                                <option value="Universal Credit">Universal Credit (UC) </option>
                                <option value="Working Tax Credit">Working Tax Credit (WTC)</option>
                                <option value="Jobseeker’s Allowance">Jobseeker’s Allowance (JSA)</option>
                                <option value="Child Benefit (subject to income)">Child Benefit (subject to income)</option>
                                <option value="Pension Credit Savings Credit">Pension Credit Savings Credit (PCSC)</option>
                                <option value="Pension Credit Guarantee Credit">Pension Credit Guarantee Credit (PCGC)</option>
                                <option value="Employment and Support Allowance">Employment and Support Allowance (ESA) </option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">EPC Rating</label>
                                <select style="color:#000" name="epc" id="epc" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['epc_rating'] ?>"><?= $result['epc_rating'] ?></option>
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
                                <label class="font-weight-bold" for="exampleFormControlSelect1">On Gas Registered?</label>
                                <select style="color:#000" name="gas_registered" id="gas_registered" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['gas_registered'] ?>"><?= $result['gas_registered'] ?></option>
                                <option value="Not Available">Not Available</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">Survey status</label>
                                <select style="color:#000" name="survey_status" id="survey_status" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['survey_status'] ?>"><?= $result['survey_status'] ?></option>
                                <option value="Not Available">Not Available</option>
                                <option value="Done">Done</option>
                                <option value="Not Done">Not Done </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">Job status</label>
                                <select style="color:#000" name="job_status" id="job_status" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['job_status'] ?>"><?= $result['job_status'] ?></option>
                                <option value="Not Available">Not Available</option>
                                <option value="Booked">Booked</option>
                                <option value="Not Booked">Not Booked </option>
                                
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">Payment status</label>
                                <select style="color:#000" name="payment_status" id="payment_status" class="form-control form-control-lg" id="exampleFormControlSelect1">
                                <option selected value="<?= $result['payment_status'] ?>"><?= $result['payment_status'] ?></option>
                                <option value="Not Available">Not Available</option>
                                <option value="Paid">Paid</option>
                                <option value="Not Paid">Not Paid </option>

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold" for="exampleFormControlSelect1">Status</label>
                                <select style="color:#000" name="status" id="status" class="form-control form-control-lg" id="exampleFormControlSelect1"
                                <?php echo ($role == 1) ? 'disabled="true"' : ''; ?>>
                                <option selected value="<?= $result['status'] ?>"><?= $result['status'] ?></option>
                                <option value="Not Available">Not Available</option>
                                <option value="Accepted">Accepted</option>
                                <option value="Rejected">Rejected</option>
                                <option value="On Hold">On Hold</option>
                                <option value="DWP Submitted">DWP Submitted</option>
                                <option value="DWP Passed">DWP Passed</option>
                                <option value="DWP Failed">DWP Failed</option>
                                <option value="Completed">Completed</option>
                                <option value="Paid">Paid</option>
                                <option value="Callback">Callback</option>
                                <option value="Retransfer">Retransfer</option>

                            </select>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Measures</label>
                                <input   type="text" name="measures" value="<?= $result['measures'] ?>" class="form-control form-control-lg" placeholder="Measures" id="measures">
                            </div>
                        </div>
                        <div class="col-lg-12 callback">
                            <hr>
                        </div>
                        <div class="col-lg-4 callback">
                            <div class="form-group">
                                <label class="font-weight-bold">Callback Date</label>
                                <input type="date" name="calldate" value="<?= $result['calldate'] ?>" class="form-control form-control-lg" placeholder="calldate" id="calldate">
                            </div>
                        </div>
                        <div class="col-lg-4 callback">
                            <div class="form-group">
                                <label class="font-weight-bold">Callback Time</label>
                                <input type="time" name="calltime" value="<?= $result['calltime'] ?>" class="form-control form-control-lg" placeholder="calltime" id="calltime">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <hr>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">EPC Link</label>
                                <input   type="text" name="epc_link" value="<?= $result['epc_link'] ?>" class="form-control form-control-lg" placeholder="EPC Link" id="epc_link">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Gas Safe Link</label>
                                <input   type="text" name="gas_safe_link" value="<?= $result['gas_safe_link'] ?>" class="form-control form-control-lg" placeholder="Gas Safe Link" id="gas_safe_link">
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="font-weight-bold">Boiler Efficiency Link</label>
                                <input   type="text" name="boiler_efficiency_link" value="<?= $result['boiler_efficiency_link'] ?>" class="form-control form-control-lg" placeholder="Boiler Efficiency Link" id="boiler_efficiency_link">
                            </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="font-weight-bold" for="notes">Comments</label>
                                <textarea class="form-control" id="comments" name="comments" rows="19"></textarea>
                                <button type="button" id="addcomment" class="bg-primary text-white px-3 py-2"> Add Comment </button>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="notes">All Comments</label>
                                <div id="drop-area" class="drop-area" style="height: 335px; overflow-x:auto">
                                <div id="commentResponse" class="text-left">
                                    
                                </div>
                                </div>
                        </div>

                        <div class="col-lg-12">
                            <hr>
                        </div>

                        <div class="col-md-6">
                            <label class="font-weight-bold" for="notes">View or upload Documents</label>
                                <div id="drop-area" class="drop-area">
                                    <!-- <h3 class="drop-text">Drag & Drop Files Here</h3> -->
                                    <input type="hidden" name="prevImg" value="<?= $result['upload_image']; ?>">
                                    <input  accept="image/*,.pdf"   type="file" name="images[]"  id="images" multiple>
                                </div>
                        </div>
                        <div class="col-md-6">
                            <label class="font-weight-bold" for="notes">Uploaded Document</label>
                                <div id="drop-area" class="drop-area">
                                    <!-- <h3 class="drop-text">Drag & Drop Files Here</h3> -->
                                    <?php
                                        // Assuming $result['upload_image'] contains image names separated by commas
                                        $image_names = explode(',', $result['upload_image']);
                                        if($result['upload_image'] == null){
                                            echo"Document Not Found";
                                        }

                                        foreach ($image_names as $image_name) {
                                            // Assuming the images are in the same directory as this script
                                            $image_path = 'assets/images/uploads/' . trim($image_name);

                                            // Checking if the file exists before creating the <img> tag
                                            if (file_exists($image_path)) {
                                                echo '<a href="' .$baseURL. $image_path . '" target="_blank">
                                                <img class="mx-2 border" src="' .$baseURL. $image_path . '" alt="' . $image_name . '" style="width:100px">
                                                </a>';
                                            } 
                                        }
                                        ?>
                                </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">Update </button>
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
        getComments()
        <?php if($result['status']=='Callback'){
            echo "$('.callback').show();";
        }else{
            echo "$('.callback').hide();";
        }
        ?>

        // Bind change event directly with anonymous function
        $("#status").change(function(){
            var status = $("#status").val();
            if(status === "Callback"){
                $('.callback').show();
            } else {
                $('.callback').hide();
            }
        });
    });

    function getComments() {
    var id = $('#lead_id').val();
    $.ajax({
        url: "<?= $baseURL?>comment/view/" + id, // Correct URL concatenation
        type: "get", // Use POST method
        dataType: "html", // Assuming the response is in HTML format
        success: function(response) {
            // Handle success response
            $('#commentResponse').html(response);
        },
        error: function(xhr, status, error) {
            // Handle errors here
            // Display an error message using SweetAlert2
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'There was an error with your AJAX request.',
            });
            console.error("Error:", error);
        }
    });
}



$("#addcomment").click(function(){
    // Get lead_id and comments data from your form or other source
    var lead_id = $('#lead_id').val();
    
    // Get the content from CKEditor
    var comments = CKEDITOR.instances.comments.getData();

    // Check if the comments field is not empty
    if (comments.trim() === '') {
        // If comments field is empty, show an error message
        Swal.fire({
            icon: 'warning',
            title: 'Empty Comment!',
            text: 'Please enter a comment.',
        });
        return; // Stop execution
    }

    // Construct the data object
    var data = {
        lead_id: lead_id,
        comments: comments
    };

    // Make the AJAX request
    $.ajax({
        url: "<?= $baseURL?>comment/add",
        type: "POST", // Use POST method
        data: data, // Pass the data object
        dataType: "html", // Assuming the response is in HTML format
        success: function(response) {
            // Handle success response
            // Refresh comments
            getComments();
            // Reset the content of CKEditor
            CKEDITOR.instances.comments.setData('');
        },
        error: function(xhr, status, error) {
            // Handle errors here
            // Display an error message using SweetAlert2
            Swal.fire({
                icon: 'error',
                title: 'Error!',
                text: 'There was an error with your AJAX request.',
            });
            console.error("Error:", error);
        }
    });
});

</script>


<?= $this->endSection() ?>

