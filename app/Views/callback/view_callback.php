<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>View Agent</title>
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
                                    View Callback</h4>
                                <hr>
                                <!-- alert message code using flash data -->
                                <?php if (session()->has('alrt')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session('alrt') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>
                                <!-- alert message code end -->

                                <!-- table code start -->
                                
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Lead ID</th>
                                            <th scope="col">Source</th>
                                            <th scope="col">Lead Date</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Mobile </th>
                                            <th scope="col">Status </th>
                                            <th scope="col">Call back date</th>
                                                 
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php if ($customers && count($customers) >= 1): ?>
                                        <?php foreach ($customers as $customer):    
                                        ?>
                                        <tr>
                                            <td>
                                            <?= $customer['lead_id'] ?>
                                            </td>                                       
                                            <td>
                                                <?= $customer['center_name'] ?>
                                            </td>
                                            
                                            <td>
                                                <?=  $customer['lead_date'] ?>
                                            </td>                                          
                                            <td>
                                                <?= $customer['fname'] ?>
                                            </td>
                                            <td>
                                                <?= $customer['mobile'] ?>
                                            </td> 
                                            <td>
                                                <?= $customer['status'] ?>
                                            </td> 
                                           
                                            <td>
                                            <?= $customer['calldate'] ?>
                                            
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="7">No agents found.</td>
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
            <div class="col-lg-12">
                <?php echo $pager->links('default','full_pagination');?>
            </div>
                
            </div>
            </div>
           
        </div>
    </div>

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
    <!-- content-wrapper ends -->




    <?= $this->endSection() ?>