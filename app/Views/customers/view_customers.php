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
                                    View Customer</h4>
                                <hr>

                                <!-- table code start -->
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Lead ID</th>
                                            <th scope="col">Lead Date</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Mobile</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i = 1; ?>
                                        <?php if ($customers && count($customers) >= 1): ?>
                                        <?php foreach ($customers as $customer): 
                                            if($customer['status'] === "New Customer"){
                                                $lstatus = '<span class="bg-primary text-white p-2 rounded">New Customer</span>';
                                            }else{
                                                $lstatus = $customer['status'];
                                            }
                                        ?>
                                        <tr>
                                            <td>
                                                <?= $i++ ?>
                                            </td>
                                            <td>
                                                <a href="#" onclick="openNav(<?= $customer['lead_id'] ?>)"><?= $customer['lead_id'] ?></a>
                                            </td>
                                            <td>
                                                <?= $customer['lead_date'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['fname']." ". $customer['lname'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['mobile'] ?>
                                            </td>
                                            <td>
                                                <?= $lstatus ?>
                                            </td>
                                            <td>
                                            <?php $role = $session->get('role'); 
                                            if($role == 0 || $role == 1 || $role == 2 || $role == 3){
                                            ?>
                                            <a onclick="openNav(<?= $customer['lead_id'] ?>)" href="#" data-toggle="tooltip" data-placement="top" title="view customer"><i class="mdi mdi-account-search bg-primary h4 pt-2 px-2 text-white rounded-circle"></i></a>
                                            <?php } ?>

                                            <?php if($role == 0 || $role == 1 || $role == 3){ ?>
                                            <a href="<?php echo base_url('customer/'.$customer['lead_id']);?>" data-toggle="tooltip" data-placement="top" title="edit customer"><i class="mdi mdi-account-edit bg-primary h4 pt-2 px-2 text-white rounded-circle"></i></a>
                                            <?php } ?>

                                            <?php if($role == 0 || $role == 3){ ?>
                                            <a href="<?php echo base_url('delete/'.$customer['lead_id']);?>" onclick="confirmDelete(this)" data-toggle="tooltip" data-placement="top" title="Delete customer"><i class="mdi mdi-account-remove bg-danger h4 pt-2 px-2 text-white rounded-circle"></i></a>
                                            <?php } ?>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7">No customers found.</td>
                                        </tr>
                                        <?php endif; ?>
                                    </tbody>
                                </table>
                                

                                
                         <!-- table code end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Drawer  -->
            <div id="mySidenav" class="sidenav shadow-lg">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <div class="row px-5 pt-4">
                <div class="col-lg-4"> 
                    <h5>Lead ID</h5> 
                    <p id="leadid"></p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Lead Date</h5> 
                    <p id="ldate"></p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Center Name</h5> 
                    <p id="cname">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>First Name</h5> 
                    <p id="fname">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Last Name</h5> 
                    <p id="lname">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Date Of Birth</h5> 
                    <p id="dob">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>Email</h5> 
                    <p id="email">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Mobile</h5> 
                    <p id="phone">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Telephone</h5> 
                    <p id="telephone">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>Address 1</h5> 
                    <p id="address1">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Address 2</h5>
                    <p id="address2">dsdsd</p> 
                </div>
                <div class="col-lg-4"> 
                    <h5>Post Code</h5> 
                    <p id="postcode">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>Tenure</h5> 
                    <p id="tenure">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Council</h5> 
                    <p id="council">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Boiler Age</h5> 
                    <p id="boilerage">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>Boiler Make</h5> 
                    <p id="boilermake">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Moiler Model</h5> 
                    <p id="boilermodel">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Benefit Flex</h5> 
                    <p id="benefitflex">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>EPC Rating</h5> 
                    <p id="epcrating">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>Additional_notes</h5> 
                    <p id="addnotes">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-12"> 
                    <h5>Uploaded Files</h5> 
                    <div id="imageContainer"></div>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>survey_status</h5> 
                    <p id="survyastatus">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>job_status</h5> 
                    <p id="jobstatus">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>status</h5> 
                    <p id="lstatus">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>payment_status</h5> 
                    <p id="paystatus">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>measures</h5> 
                    <p id="measures">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>epc_link</h5> 
                    <p id="epclink">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>gas_safe_link</h5> 
                    <p id="gas">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>boiler_efficiency_link</h5> 
                    <p id="boiler">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>processing_notes</h5> 
                    <p id="pronotes">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                <div class="col-lg-4"> 
                    <h5>previous_grant_work</h5> 
                    <p id="pgrant">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>contact_center_notes</h5> 
                    <p id="ccenternotes">dsdsd</p>
                </div>
                <div class="col-lg-4"> 
                    <h5>previous_grant_work</h5> 
                    <p id="gwork">dsdsd</p>
                </div>
                <div class="col-lg-12">
                    <hr>
                </div>
                
            </div>
            </div>
            <div class="col-lg-12">
                <?php echo $pager->links('default','full_pagination');?>
            </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    <script>
    function confirmDelete(link) {
        event.preventDefault(); // Prevent the default behavior of the link

        const deleteUrl = link.getAttribute('href'); // Get the URL to delete

        // Show Sweet Alert confirmation
        Swal.fire({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this customer!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                // If user confirms deletion, redirect to the delete URL
                window.location.href = deleteUrl;
            } else {
                // If user cancels deletion, do nothing
                Swal.fire("Cancelled", "Your customer is safe!", "info");
            }
        });
    }
</script>
<script>
    function openNav(id) {
        $.ajax({
            url: 'http://localhost/introcrm/getcustomer/' + id,
            type: 'GET',
            dataType: 'json',
            success: function(data) {
                // Update HTML elements with received data
                $('#leadid').text(data.customer.lead_id);
                $('#ldate').text(data.customer.lead_date);
                $('#cname').text(data.customer.center_name);
                $('#fname').text(data.customer.fname);
                $('#lname').text(data.customer.lname);
                $('#dob').text(data.customer.dob);
                $('#email').text(data.customer.email);
                $('#phone').text(data.customer.mobile);
                $('#telephone').text(data.customer.telephone);
                $('#address1').text(data.customer.address_1);
                $('#address2').text(data.customer.address_2);
                $('#postcode').text(data.customer.post_code);
                $('#tenure').text(data.customer.tenure);
                $('#council').text(data.customer.council);
                $('#boilerage').text(data.customer.boiler_age);
                $('#boilermake').text(data.customer.boiler_make);
                $('#boilermodel').text(data.customer.boiler_model);
                $('#benefitflex').text(data.customer.benefit_flex);
                $('#epcrating').text(data.customer.epc_rating);
                $('#addnotes').text(data.customer.additional_notes);
                $('#survyastatus').text(data.customer.survey_status);
                $('#jobstatus').text(data.customer.job_status);
                $('#lstatus').text(data.customer.status);
                $('#paystatus').text(data.customer.payment_status);
                $('#measures').text(data.customer.measures);
                $('#epclink').text(data.customer.epc_link);
                $('#gas').text(data.customer.gas_safe_link);
                $('#boiler').text(data.customer.boiler_efficiency_link);
                $('#pronotes').text(data.customer.processing_notes);
                $('#pgrant').text(data.customer.previous_grant_work);
                $('#ccenternotes').text(data.customer.contact_center_notes);
                $('#gwork').text(data.customer.previous_grant_work);

                            // Split the image URLs into an array
                            var imageUrls = data.customer.upload_image.split(',');

                // Iterate through each image URL and create img tags
                var imageContainer = $('#imageContainer');
                imageContainer.empty(); // Clear previous images
                imageUrls.forEach(function(imageUrl) {
                    // Prepend the base URL and directory to the image URL
                    var fullImageUrl = '<?= $baseURL ?>assets/images/uploads/' + imageUrl.trim();
                    
                    // Create an <a> tag with the image path as href and an <img> tag inside it
                    var aTag = $('<a>').attr('href', fullImageUrl).attr('target', '_blank').css('display', 'inline-block').css('margin-right', '10px');
                    var img = $('<img>').attr('src', fullImageUrl).attr('style', 'width: 150px;');
                    aTag.append(img);
                    
                    // Append the <a> tag to the imageContainer
                    imageContainer.append(aTag);
                });

                // Open the side navigation
                $('#mySidenav').css('width', '1000px');
                },
                error: function(xhr, status, error) {
                console.error('Error:', error);
    }
});
}

    function closeNav() {
        // Close the side navigation
        $('#mySidenav').css('width', '0');
    }
</script>
    <?= $this->endSection() ?>