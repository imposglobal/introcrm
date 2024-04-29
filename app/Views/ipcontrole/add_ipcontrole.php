<!-- Included header sidebar & footer in layout -->
<?= $this->extend('layout/layout') ?>
<!-- Define the content section -->
<?= $this->section('content') ?>
<title>Manage IP</title>
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
                                    IP Management</h4>
                                <hr>
                                <?php if (session()->has('alrt')): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <?= session('alrt') ?>
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                <?php endif; ?>

                                <!-- table code start -->
                                <div class="container-scroller">
                                    <div class="py-4">
                                    <div class=" d-flex align-items-center auth px-0">
                                        <div class="row w-100 mx-0">
                                        <div class="col-lg-12">
                                            <div class="auth-form-light text-left py-1 px-4 px-sm-5">
                                            
                                            <form class="" action="<?php echo base_url('/ip/add'); ?>" method="post">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <div class="form-group">
                                                        <label>IP Adress</label>
                                                        <input type="text"   name="ip_address" class="form-control form-control-lg" id="ip_address" placeholder="Enter IP adress" value="<?= set_value('ip_address') ?>">
                                                        
                                                    </div>
                                                </div>
                                               
                                                <div class="col-lg-4">
                                                    <div class="pt-4">
                                                        
                                                        <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"  >Add IP Address</button>
                                                    </div>
                                                </div>
                                                
                                                </div>
                                            </form>

                                          
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- content-wrapper ends -->
                                    </div>
                                    <!-- page-body-wrapper ends -->
                                </div>

                                
                         <!-- table code end -->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
           
            
                
            </div>

            <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body mt-2">
                                <!-- <h4 class="card-title"><i class="mdi mdi-account-multiple bg-primary h4 pt-1 px-2 text-white rounded"></i>
                                 </h4> -->
                                
                                 <!-- table code start -->
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">IP Address</th>
                                            <th scope="col">Delist IP</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $i=1;?>
                                    <?php if ($ipadress && count($ipadress) >= 1): ?>
                                        <?php foreach ($ipadress as $ipadd):    
                                        ?>
                                        <tr>
                                            <td>
                                            <?= $i++ ?>
                                            </td>
                                            <td>
                                            <?= $ipadd['ip_address'] ?>
                                            </td>

                                            <td>
                                                <a href="<?php echo base_url('ip/delete/'.$ipadd['ip_id']);?>" onclick="confirmDelete(this)" data-toggle="tooltip" data-placement="top" title="Delist IP Address"><i class="mdi mdi-server-remove bg-danger h4 pt-2 px-2 text-white rounded-circle"></i></a>
                                            </td>
                                            
                                        

                                        </tr>
                                        <?php endforeach; ?>
                                        <?php else: ?>
                                        <tr>
                                            <td colspan="6">No IP's found.</td>
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
 
            </div>
           <!-- table code div end -->
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
            text: "Once deleted, you will not be able to recover this IP Address!",
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
                Swal.fire("Cancelled", "Your IP Address is safe!", "info");
            }
        });
    }
</script>



    <?= $this->endSection() ?>